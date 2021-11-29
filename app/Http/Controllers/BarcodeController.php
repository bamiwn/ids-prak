<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;
use PDF;
use Dompdf\Dompdf;
use imagickpixel;

class BarcodeController extends Controller
{
    public function Barang()
    {
        $data = array(
            'menu' => 'barang',
            'submenu' => ''
        );
        return view('barcode.databarang', $data);
    }
    
    public function indexBarang()
    {
        $barang = DB::table('barang')->get();
        $data = array(
            'menu' => 'Barang',
            'submenu' => 'barang',
            'barang' => $barang
        );
        return view('barcode.databarang', $data);
    }
        
    public function scan()
    {
        return view('barcode.scan');
    }

    public function createBarang(Request $post)
    {
        DB::table('barang')->insert([
            //'id_customer' => $post->idcust,
            'nama' => $post->nama
        ]);
        return redirect('/databarang');
    }

    public function tambah()
    {
        return view('barcode.tambah_barang');
    }

    public function cetakBarcode(Request $request)
    {
        // $barang = DB::table('barang')->get();
        // $no  = 1;
        // $data = array(
        //     // 'menu'=> 'barcode',
        //     // 'submenu'=>'barcode',
        //     'barang' => $barang,
        //     'no' => $no
        // );
        // $pdf = PDF::loadView('barcode.cetak_barcode', compact('barang','data','no'))->setPaper('a4', 'portrait');
        // return $pdf->stream('produk.pdf');
        //dd($barang);
        $data = Barang::all();
        $baris = $request->baris_barang;
        $kolom = $request->kolom_barang;
        $long = count($data);
        $long =intval($long/5);
        $long++;
        //dd($baris,$kolom);
        $pdf = PDF::loadView('barcode.cetak_barcode', compact('data','long','baris','kolom'));
        return $pdf->stream('produk.pdf');
        //return view('barang.barcodePDF',compact('data','long','baris','kolom'));
        
    }
}
