<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(100000);

        return view('users.index', [
            'user' => $user
           ]);
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
    public function store(UserRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('profile_photo_path'))
        {
            $profile_photo_pathPath = $request->file('profile_photo_path')->store('assets/user', 'public');
            $data['profile_photo_path'] = $profile_photo_pathPath;
            $data['password'] = Hash::make($request->password);
        }


        User::create($data);

        return redirect()->route('users.index')->with('status','Berhasil Tambah Data');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();

        if($request->hasFile('profile_photo_path'))
        {
            Storage::delete('public/'.$user->profile_photo_path);
            $profile_photo_pathPath = $request->file('profile_photo_path')->store('assets/user', 'public');
            $data['profile_photo_path'] = $profile_photo_pathPath;
        }
        $data['password'] = Hash::make($request->password);
        
        $user->update($data);
        
        return redirect()->route('users.index')->with('status','Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
