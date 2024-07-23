<?php

namespace App\Http\Controllers;

use App\Http\Requests\StmeetingRequest;
use App\Models\Stmeeting;
use Illuminate\Http\Request;

class StmeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $stmeeting = Stmeeting::orderBy('created_at', 'desc')
       ->get();

       return view('stmeetings.index', [
        'stmeeting' => $stmeeting
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
    public function store(StmeetingRequest $request)
    {
        $data = $request->all();

        Stmeeting::create($data);

        return redirect()->route('stmeetings.index')->with('status','Berhasil Tambah Data');
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
    public function update(StmeetingRequest $request, Stmeeting $stmeeting)
    {
        $data = $request->all();
        $stmeeting->update($data);
        return redirect()->route('stmeetings.index')->with('status','Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
