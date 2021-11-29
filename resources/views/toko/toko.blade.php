@extends('layouts.master')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/flat/blue.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Toko
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Toko</a></li>
        <li class="active">Data Toko</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-header with-border">
              <!-- <a href="/cetak_barcode">
                <td>
                  <button type="button" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Cetak PDF </button>
                </td>
              </a> -->
                <a class="nav-link" href="/tambahToko">
                    <button type="button" class="btn btn-succes"><i class="fa fa-plus"></i> Tambah Data Toko</button>
                </a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th><input type="checkbox" id="cbgroup1_master" onchange="togglecheckboxes(this,'cbgroup1')"></th> -->
                    <th>No</th>
                    <th>Id Toko</th>
                    <th>Nama Toko</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>accuracy</th>
                    <th>Barcode</th>
                    <!-- <th></th> -->
                </tr>
                </thead>
                <tbody>
                @foreach($toko as $data)
                            <tr>  
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $data -> barcode }}</td>
                                <td>{{ $data -> nama_toko }}</td>
                                <td>{{ $data -> latitude }}</td>
                                <td>{{ $data -> longitude }}</td>
                                <td>{{ $data -> accuracy }}</td>
                                <td><?php
                                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->barcode, $generator::TYPE_CODE_128)) . '">';?>
                                    <br>
                                    <?= $data->barcode?>
                                    <br>
                                    <?= $data->nama_toko?>
                                </td>
                                <!-- <a class="nav-link" target="_blank" href="#" >
                                    <td>
                                        <button type="button" class="btn btn-default">Cetak</button>
                                    </td>
                                </a> -->
                            </tr>
                            @endforeach  
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
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
<!-- FastClick -->
<script src="{{ asset('adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('id_customer').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
@endsection