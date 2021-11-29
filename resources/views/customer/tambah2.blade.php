@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
<!DOCTYPE html>
<html>
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Tambah Costumer 2 (File Path)
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Barcode</a></li>
        <li class="active">Form Tambah Costumer 2</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- general form elements -->
    <div class="box box-primary">
      <!--
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
      -->
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="tambah2" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="nama" class="form-control" id="nama" name="nama" placeholder="Isi Nama">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="alamat" name="alamat" class="form-control" id="alamat" placeholder="Isi Alamat">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Provinsi</label>
                  <select class="form-control select2" name="provinsi" id="provinsi" style="width: 100%;">
                  <option value="0" disabled="true" selected="true">--- Pilih Provinsi ---</option>
                                @foreach ( $provinsi as $prov )
                                <option value="{{ $prov->id_provinsi }}">{{ $prov->nama_provinsi }}</option>
                                @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Kabupaten/Kota</label>
                  <select class="form-control select2" name="kota" id="kota" style="width: 100%;">
                    <option>--- Pilih Kabupaten ---</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Kecamatan</label>
                  <select class="form-control select2" name="kecamatan" id="kecamatan" style="width: 100%;">
                  <option>--- Pilih Kecamatan ---</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Kelurahan/Desa</label>
                  <select class="form-control select2" name="kelurahan" id="kelurahan" style="width: 100%;">
                    <option>--- Pilih Kelurahan ---</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="form-group">
              <label>Hasil Ambil Gambar (WebCam)</label>
                              {{-- Start Modal Ambil Foto --}}
                              <div class="modal fade" id="modal-ambil-foto" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title" style="text-align:center">Take a Picture</h4>
                                            <button type="button" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-footer mt-3 float-right">
                                                    <button id="btn" type="button" class="btn btn-sm btn-secondary " data-toggle="tooltip" data-placement="top" title="Capture">
                                                        <i class="fa fa-camera"></i>
                                                        Shoot
                                                    </button>
                                                    <button id="simpanfoto" type="button" class="btn btn-sm btn-primary " data-dismiss="modal">
                                                        <i class="fa fa-save"></i>
                                                        Save
                                                    </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="container">

                                                <div class="modal-wrapper">
                                                    <div>
                                                        <div id="my_camera" class="modal-kontainer float-left" style="padding-left:10px"></div>        
                                                    </div>
                                                    <div>
                                                        <div id="result1" class="modal-kontainer float-right" style="padding-left:10px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              {{-- End of Modal Ambil Foto --}}
                              <div id="result2">
                                
                              </div>
                              <input type="text" id="imagecam" name="imagecam">
                              {{-- <a id="myBtn" class="btn btn-default bg-maroon">Ambil Gambar</a> --}}
                              <input type="button" class="btn btn-primary" value="Ambil Foto" data-toggle="modal" data-target="#modal-ambil-foto">
                              <br><input type="submit" class="btn btn-success" value="Simpan">
                              <a href="/data" class="btn btn-default">Kembali</a>
            </form>
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection

@section('script')
<script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
</script>

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
  
<script type="text/javascript">
$(document).ready(function(){
 
  $("#provinsi").change(function(){
    var prov_id=$("#provinsi").val();
    $.ajax({
      type:"get",
      url:"findKota",
      data:"prov_id="+prov_id,
      success:function(data){
        $('#kota').html('');
        $('#kota').append('<option value="">--- Pilih Kota ---</option>');
        for(var i=0;i<data.length;i++){
          $('#kota').append('<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>');
        } 
      }
      });
  });

  $("#kota").change(function(){
    var kota_id=$("#kota").val();
    $.ajax({
      type:"get",
      url:"findKecamatan",
      data:"kota_id="+kota_id,
      success:function(data){
        $('#kecamatan').html('');
        $('#kecamatan').append('<option value="">--- Pilih Kecamatan ---</option>');
        for(var i=0;i<data.length;i++){
          $('#kecamatan').append('<option value="'+data[i].id_kecamatan+'">'+data[i].nama_kecamatan+'</option>');
        } 
      }
      });
  });

  $("#kecamatan").change(function(){
    var kec_id=$("#kecamatan").val();
    $.ajax({
      type:"get",
      url:"findKelurahan",
      data:"kec_id="+kec_id,
      success:function(data){
        $('#kelurahan').html('');
        $('#kelurahan').append('<option value="">--- Pilih Kelurahan ---</option>');
        for(var i=0;i<data.length;i++){
          $('#kelurahan').append('<option value="'+data[i].id_kelurahan+'">'+data[i].nama_kelurahan+'</option>');
        } 
      }
      });
  });

  $("#kelurahan").change(function(){
    var kel_id=$("#kelurahan").val();
    $.ajax({
      type:"get",
      url:"findKodepos",
      data:"kel_id="+kel_id,
      success:function(data){
        for(var i=0;i<data.length;i++){
          $('#kodepos').append('<option value="'+data[i].id_kelurahan+'">'+data[i].kodepos+'</option>');
        } 
      }
      });
  });
  Webcam.set({
    width: 320,
    height: 240,
    image_format: 'png',
    png_quality: 100
  });
  Webcam.attach('#my_camera'); 
    function take_picture() {
        Webcam.snap(function(data_url) {
        $('#imagecam').val(data_url);

        document.getElementById('result1').innerHTML = '<img src="' + data_url +'"/>';
        document.getElementById('result2').innerHTML = '<img src="' + data_url +'"/>';
        });
    }
    document.getElementById('btn').addEventListener('click', take_picture);
});
</script>
@endsection
</html>
