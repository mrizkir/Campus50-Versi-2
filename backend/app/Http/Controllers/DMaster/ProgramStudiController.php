<?php

namespace App\Http\Controllers\DMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

use App\Models\DMaster\ProgramStudiModel;

class ProgramStudiController extends Controller
{ 
	/**
	 * digunakan untuk mendapatkan daftar program studi
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{ 
    $daftar_prodi = ProgramStudiModel::where('kjur', '!=', 0)
    ->orderBy('kjur', 'ASC')
    ->get();

		return Response()->json([
      'status'=>'00',
      'message'=>"data program studi berhasil diperoleh",
      'record'=>$daftar_prodi
    ], 200);
	}	
}