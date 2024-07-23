<?php

namespace App\Http\Controllers;

use App\Models\Tnc;
use Illuminate\Http\Request;
use App\Http\Requests\TncRequest;

class TncController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tnc = Tnc::orderBy('created_at', 'desc')
        ->get();
 
        return view('tncs.index', [
         'tnc' => $tnc
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
    public function store(Request $request)
    {
        //
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
    public function edit(Tnc $tnc)
    {
        $tnc = Tnc::all();
 
        return view('tncs.edit', [
         'tnc' => $tnc
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TncRequest $request, Tnc $tnc)
    {
        $data = $request->all();
        $tnc->update($data);
        return redirect()->route('tncs.index')->with('status','Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
