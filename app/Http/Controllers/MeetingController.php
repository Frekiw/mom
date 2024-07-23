<?php

namespace App\Http\Controllers;

use index;
use App\Models\User;
use App\Models\Meeting;
use App\Models\Stmeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\MeetingRequest;
use App\Http\Requests\Meeting2Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meeting = Meeting::with('stmeeting', 'user')
        ->orderBy('created_at', 'desc')
        ->get();

    $stmeetings = Stmeeting::all();

    return view('meetings.index', compact('meeting', 'stmeetings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stmeetings = Stmeeting::all();
        $meetingCounts = Meeting::select('stmeeting_id', DB::raw('count(*) as total'))
            ->groupBy('stmeeting_id')
            ->pluck('total', 'stmeeting_id');
    
        $forwardUsers = User::whereNotIn('roles',['user','admin'])->get();
        return view('meetings.create', compact('stmeetings', 'meetingCounts', 'forwardUsers'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(MeetingRequest $request)
{
    $user = Auth::user();
    $data = $request->validated(); // Mengambil data yang telah divalidasi
    $category = Stmeeting::findOrFail($data['stmeeting_id']); // Pastikan stmeeting_id valid

    $data['owner_id'] = $user->id;
    $data['pm_sign'] = "Approve";
    $randomNumber = mt_rand(199999,999999);
    $data['id_mt'] = $randomNumber;

    // Simpan data awal ke tabel meetings
    $meeting = Meeting::create($data);

    // Dapatkan id_meeting yang baru saja dibuat
    $id_meeting = $meeting->id_meeting;

    $lower = strtolower($id_meeting);
    $url = str_replace(' ', '%20', $lower);
    $link = 'http://minutes-meeting.test/sign/ubah/' . $url;

    // Perbarui narasi dengan id_meeting yang baru saja dibuat
    $meeting->narasi = $user->name . " mengundang anda untuk menandatangani dokumen Minutes of Meeting

Topik : Meeting " . $category->name . " ke-" . $data['title'] . "
Waktu : " . $data['date'] . "

Lihat Dokumen : " . $link . "

ID Meeting : " . $id_meeting ."
Kode Meeting : " . $meeting->id_mt."
Password : " . $data['password'];

    // Simpan perubahan narasi ke database
    $meeting->save();

    return redirect()->route('meetings.index')->with('status', 'Berhasil Tambah Data');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meeting $meeting)
    {

        $meeting->load('stmeeting');
        $meetingCounts = DB::table('meetings')
                        ->select('stmeeting_id', DB::raw('count(*) as total'))
                        ->groupBy('stmeeting_id')
                        ->pluck('total', 'stmeeting_id')
                        ->all();

       $stmeetings = Stmeeting::all();
       $forwardUsers = User::whereNotIn('roles',['user','admin'])->get();
        return view('meetings.edit', compact('stmeetings','meeting', 'meetingCounts', 'forwardUsers'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Meeting2Request $request,Meeting $meeting)
    {
        $data = $request->all();
        $meeting->update($data);
        return redirect()->route('meetings.index')->with('status','Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meeting $meeting)
    {
        $meeting -> delete();
        return redirect()->route('meetings.index')->with('status','Berhasil Hapus Data');
    }
}
