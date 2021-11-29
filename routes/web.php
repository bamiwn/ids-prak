<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UsersImportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard'); 
});

// Route::get('/', function () {
//     return view('customer.tambah1'); 
// })->name('tambah1');

// Route::get('/', function () {
//     return view('customer.tambah2'); 
// })->name('tambah2');

// Route::get('/', function () {
//     return view('barcode.databarang'); 
// })->name('databarang');

// Route::get('/', function () {
//     return view('barcode.scan'); 
// })->name('scan');

//Route::get('/dashboard','AdminController@dashboard');
//Route::get('/data','CustomerController@data');
Route::get('/data', 'CustomerController@indexCustomer');
Route::get('/tambah1', 'CustomerController@list');
Route::post('/tambah1', 'CustomerController@insertCustomer');
Route::get('/tambah2', 'CustomerController@list2');
Route::post('/tambah2', 'CustomerController@insertCustomer2');

Route::get('/findKota', 'CustomerController@findKota');
Route::get('/findKecamatan', 'CustomerController@findKecamatan');
Route::get('/findKelurahan', 'CustomerController@findKelurahan');
Route::get('/findKodepos', 'CustomerController@findKodepos');
Route::get('/dashboard','AdminController@dashboard');

//Barcode
Route::get('/databarang', 'BarcodeController@indexbarang');
//Route::get('/barang', 'BarcodeController@indexbarang');
//Route::get('/barcode', 'BarcodeController@cetak_pdf');
//Scan Barcode
Route::get('/scan', 'BarcodeController@scan');
Route::post('/cetak_barcode', 'BarcodeController@cetakBarcode');

//tambah Barang
Route::post('/tambah_barang', 'BarcodeController@createBarang');
Route::get('/tambah_barang', 'BarcodeController@tambah');

//Toko
Route::get('/toko', 'TokoController@indexToko');
// Route::get('/toko', 'TokoController@indexToko2');
Route::get('/tambahToko', 'TokoController@tambahToko');
Route::post('/tambahToko', 'TokoController@insertToko');
// Route::get('/toko', 'TokoController@insertToko');
Route::get('/tokoBarcode', 'TokoController@barcodeToko');
Route::get('/findToko', 'TokoController@findToko');


//Route::get('/tambah1','CustomerController@customer1');
//Route::get('/tambah2','CustomerController@customer2');


Route::get('/excel', [UsersImportController::class, 'show'])->name('excel.import');
Route::post('/excel', [UsersImportController::class, 'store'])->name('excel.store');
Route::get('/excel/dataexcel', [UsersImportController::class, 'showdata'])->name('excel.data');