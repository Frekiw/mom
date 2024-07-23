<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use App\Models\Meeting;
use App\Models\Stmeeting;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id_meeting');
        $limit = $request->input('limit', 100000);

        if($id)
        {
            $meeting = Meeting::with(['owner_id','forward_id','stmeeting_id'])->find($id);

            if($meeting)
                return ResponseFormatter::success(
                    $meeting,
                    'Data meeting user berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data meeting user tidak ada',
                    404
                );
        }

        $meeting = Meeting::with(['owner_id','forward_id','stmeeting_id'])->where('owner_id', Auth::user()->id);

        return ResponseFormatter::success(
            $meeting->paginate($limit),
            'Data list meeting user berhasil diambil'
        );
    }

    public function meeting(Request $request)
    {
        $user = User::find($request->owner_id);
        
        $request->validate([
            'owner_id' => 'required|exists:users,id',
            'stmeeting_id' => 'required',
            'forward_id' => 'required',
            'title' => 'required',
            'date' => 'required',
            'password' => 'required',
            'notes' => 'required',
        ]);
        $category = Stmeeting::find($request->stmeeting_id);
        $randomNumber = mt_rand(199999,999999);

        $meeting = Meeting::create([
            'owner_id' => $request->owner_id,
            'id_mt' => $randomNumber,
            'stmeeting_id' => $request->stmeeting_id,
            'forward_id' =>$request->forward_id,
            'title' => $request->title,
            'date' => $request->date,
            'password'=> $request->password,
            'notes'=> $request->notes,
            'pm_sign'=> "Approve",
        ]);

        $id_meeting = $meeting->id_meeting;

        $lower = strtolower($id_meeting);
    $url = str_replace(' ', '%20', $lower);
    $link = 'http://minutes-meeting.test/sign/ubah/' . $url;

    // Perbarui narasi dengan id_meeting yang baru saja dibuat
    $meeting->narasi = $user->name . " mengundang anda untuk menandatangani dokumen Minutes of Meeting

Topik : Meeting " . $category->name . " ke-" . $request->title . "
Waktu : " . $request->date . "

Lihat Dokumen : " . $link . "

ID Meeting : " . $id_meeting ."
Kode Meeting : " . $meeting->id_mt."
Password : " . $request->password;

    // Simpan perubahan narasi ke database
    $meeting->save();


        $meeting = Meeting::with(['user'])->find($meeting->id_meeting);

        try {
            return ResponseFormatter::success($meeting, 'Minutes of Meeting berhasil');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 'Minutes of Meeting Gagal');
        }
        
    }

}
