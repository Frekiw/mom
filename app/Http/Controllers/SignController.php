<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Stmeeting;
use Illuminate\Http\Request;
use App\Http\Requests\Meeting2Request;

class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meeting = Meeting::with('stmeeting', 'user')->where('id_meeting')->firstOrFail();

        return view('signs', compact('meeting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
        public function show(string $id)
        {
            
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meeting $meeting)
{
}

public function update(Meeting2Request $request, Meeting $meeting)
{
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ubahsign($id_meeting)
    {
    $sign = Meeting::with('stmeeting', 'user')
                ->where('id_meeting', $id_meeting)
                ->get();

    return view('signs', ['sign' => $sign]);
    }

    public function updatesign(Request $request)
    {
        // Update the record
        Meeting::where('id_meeting', $request->id_meeting)
            ->update([
                'client_sign' => $request->client_sign,
                'sign_date' => $request->sign_date,
            ]);

        // Fetch the updated record
        $sign = Meeting::where('id_meeting', $request->id_meeting)->get();

        // Return the view with the updated record
        return view('signs', ['sign' => $sign]);
    }

    public function showPortal(Request $request)
    {
        return view('portal', ['id_meeting' => $request->session()->get('id_meeting')]);
    }

    public function portal(Request $request)
    {
        if ($request->isMethod('post')) {
            $id_meeting = $request->input('id_meeting');
            $id_mt = $request->input('id_mt');
            $password = $request->input('password');

            $meeting = Meeting::where('id_meeting', $id_meeting)->first();

            if ($meeting && $meeting->id_mt == $id_mt && $meeting->password == $password) {
                session(['authenticated' => true, 'authenticated_id_meeting' => $id_meeting]);
                return redirect()->route('ubahsign', ['id_meeting' => $id_meeting]);
            } else {
                return back()->withErrors(['msg' => 'Invalid ID Meeting or Password']);
            }
        }
    }

}

