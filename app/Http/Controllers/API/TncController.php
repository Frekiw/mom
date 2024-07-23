<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Tnc;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class TncController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id_tnc');
        $limit = $request->input('limit', 100000);
        $narasi = $request->input('narasi');

        if($id)
        {
            $tnc = Tnc::find($id);

            if($tnc)
                return ResponseFormatter::success(
                    $tnc,
                    'Data Terms And Condition berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data Terms And Condition tidak ada',
                    404
                );
        }

        $tnc = Tnc::query();

        if($narasi){
            $tnc->where('narasi', 'like','%'.$narasi.'%');
        }

        return ResponseFormatter::success(
            $tnc->paginate($limit),
            'Data list Terms And Condition berhasil diambil'
        );
    }

}
