@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Toko
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Toko</a></li>
        <li class="active">Data Toko</li>
        <li class="active">Tambah Toko</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
           <form action="tambahToko" method="post">
           <div class="row">
               <div class="col-md-6">
                   @csrf
                    <input type="hidden" id="barcode" name="barcode" class="form-control">
                    <div class="form-group">
                       <label for="exampleInputEmail1">Nama Toko</label>
                       <input type="text" class="form-control" name="nama_toko" placeholder="Masukkan Nama Toko">
                    </div>
                    <div class="form-group">
                       <label for="exampleInputEmail1">Latitude</label>
                       <input type="text" class="form-control" id= "latitude" name="latitude" readonly>
                    </div>
                    <div class="form-group">
                       <label for="exampleInputEmail1">Longitude</label>
                       <input type="text" class="form-control" id="longitude" name="longitude" readonly>
                    </div>
                    <div class="form-group">
                       <label for="exampleInputEmail1">Accuracy</label>
                       <input type="text" class="form-control" id="accuracy" name="accuracy" readonly>
                    </div>
                    <div>
                        <input onclick="getLocation()" type="button" class="btn btn-success" value="Get Location">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        
           </form>
          </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
@section('script')
<!-- jQuery 3 -->
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script>
var latitud = document.getElementById("latitude");
var longitud = document.getElementById("longitude");
var accury = document.getElementById("accuracy");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    latitud.innerHTML = "Geolocation is not supported by this browser.";
    longitud.innerHTML = "Geolocation is not supported by this browser.";
    accury.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  latitud.value = position.coords.latitude;
  longitud.value = position.coords.longitude;
  accury.value = position.coords.accuracy;

}
</script>
@endsection