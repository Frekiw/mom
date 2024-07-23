<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Stmeeting;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class StmeetingController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id_stmeeting');
        $limit = $request->input('limit', 100000);
        $name = $request->input('name');

        if($id)
        {
            $stmeeting = Stmeeting::find($id);

            if($stmeeting)
                return ResponseFormatter::success(
                    $stmeeting,
                    'Data category meeting berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data category meeting tidak ada',
                    404
                );
        }

        $stmeeting = Stmeeting::query();

        if($name){
            $stmeeting->where('name', 'like','%'.$name.'%');
        }

        return ResponseFormatter::success(
            $stmeeting->paginate($limit),
            'Data list category meeting berhasil diambil'
        );
    }

    public function stmeeting(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
        ]);
        
        $stmeeting = Stmeeting::create([
            'name' => $request->name,
        ]);

        $stmeeting = Stmeeting::find($stmeeting->id_stmeeting);

        try {
            return ResponseFormatter::success($stmeeting, 'Tambah Kategori meeting berhasil');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 'Tambah Kategori meeting Gagal');
        }
    }
}
