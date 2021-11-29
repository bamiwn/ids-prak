<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Toko;

class TokoController extends Controller
{
    public function indexToko(){
        $toko = DB::table('lokasi_toko')->get();
        $data = array(
            'menu' => 'geo',
            'submenu' => 'toko',
            'toko' => $toko
        );
        return view('toko.toko', $data);
    }

    // public function indexToko2(){
    //     $toko = DB::table('lokasi_toko')->get();
    //     $data = array(
    //         'menu' => 'geo',
    //         'submenu' => 'toko',
    //         'toko' => $toko
    //     );
    //     return view('toko.toko', $data);
    // }

    public function tambahToko(){
        $toko = DB::table('lokasi_toko')->get();
        $data = array(
            'menu' => 'geo',
            'submenu' => 'toko',
            'toko' => $toko
        );
        return view('toko.tambahToko', $data);   
    }

    public function insertToko(Request $post){
        DB::table('lokasi_toko')->insert([
            'nama_toko' => $post->nama_toko,
            'latitude' => $post->latitude,
            'longitude' => $post->longitude,
            'accuracy' => $post->accuracy
        ]);
        return redirect('/toko');
    }

    public function findToko(Request $request){
        $data = Toko::select('barcode', 'nama_toko', 'latitude', 'longitude', 'accuracy')
        ->where('barcode', $request->scan_id)->get();
        return response()->json($data);
    }

    public function barcodeToko(){
        $data = array(
            'menu' => 'geo',
            'submenu' => 'code',
        );
        return view('toko.tokoBarcode', $data);
    }
}
