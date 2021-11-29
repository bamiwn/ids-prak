<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Kelurahan;
use App\Kecamatan;
use App\Kabkot;
use App\Provinsi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function data()
    {
        return view('customer.data');
    }

    public function customer1()
    {
        return view('customer.tambah1');
    }

    public function customer2()
    {
        return view('customer.tambah2');
    }

    public function list()
    {
        $provinsi = Provinsi::all();
        $kota = Kabkot::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $kodepos = Kelurahan::all();

        return view('customer.tambah1', compact('provinsi', 'kota', 'kecamatan', 'kelurahan', 'kodepos'));
    }

    public function list2()
    {
        $provinsi = Provinsi::all();
        $kota = Kabkot::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $kodepos = Kelurahan::all();

        return view('customer.tambah2', compact('provinsi', 'kota', 'kecamatan', 'kelurahan', 'kodepos'));
    }

    public function insertCustomer(Request $post){
        // $img = $post->imagecam;
        // $img = str_replace('data:image/png;base64', '', $img);

        // $img = base64_decode($img);

        //$imagecam = str_replace('data:image/png;base64,', '', $post->imagecam);
        //$imagecam = str_replace(' ', ' + ', $imagecam);
        //$file_path = $post->nama.time(). '.png';;

        //Storage::disk('local')->put($file_path, base64_decode($imagecam));

        DB::table('customer')->insert([
            //'id_customer' => $post->idcust,
            'nama' => $post->nama,
            'alamat' => $post->alamat,
            'foto' => $post->imagecam,
            //'file_path' => $file_path,
            'id_kelurahan' => $post->kelurahan
        ]);

        return redirect('/data');
    }

    public function insertCustomer2(Request $post){
        // $img = $post->imagecam;
        // $img = str_replace('data:image/png;base64', '', $img);

        // $img = base64_decode($img);

        $imagecam = str_replace('data:image/png;base64,', '', $post->imagecam);
        $imagecam = str_replace(' ', ' + ', $imagecam);
        $file_path = $post->nama.time(). '.png';

        Storage::disk('local')->put($file_path, base64_decode($imagecam));

        DB::table('customer')->insert([
            //'id_customer' => $post->idcust,
            'nama' => $post->nama,
            'alamat' => $post->alamat,
            'foto' => $post->imagecam,
            'file_path' => $file_path,
            'id_kelurahan' => $post->kelurahan
        ]);

        return redirect('/data');
    }

    public function indexCustomer(){
        $customer = DB::table('customer')
            ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan', '=', 'customer.id_kelurahan')
            ->get();
        $data = array(
            'menu' => 'home',
            'submenu' => 'customer',
            'customer' => $customer
        );
        return view('customer.data', $data);
    }

    public function findKota(Request $request)
    {
        $data = Kabkot::select('id_kota', 'nama_kota')
        ->where('id_provinsi',$request->prov_id)
        ->get();
        return response()->json($data);
    }

    public function findKecamatan(Request $request)
    {
        $data = Kecamatan::select('id_kecamatan', 'nama_kecamatan')
        ->where('id_kota',$request->kota_id)
        ->get();
        return response()->json($data);
    }

    public function findKelurahan(Request $request)
    {
        $data = Kelurahan::select('id_kelurahan', 'nama_kelurahan')
        ->where('id_kecamatan',$request->kec_id)
        ->get();
        return response()->json($data);
    }

    public function findKodepos(Request $request)
    {
        $data = Kelurahan::select('id_kelurahan', 'kodepos')
        ->where('id_kelurahan',$request->kel_id)
        ->get();
        return response()->json($data);
    }
}
