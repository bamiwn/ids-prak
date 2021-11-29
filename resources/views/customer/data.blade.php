@extends('layouts.master')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Costumer
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Barcode</a></li>
        <li class="active">Data Costumer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Customer</th>
                  <th>Nama Customer</th>
                  <th>Alamat</th>
                  <th>Foto</th>
                  <th>File Path</th>
                  <th>Kelurahan</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($customer as $data)
                              <tr>  
                                <td>{{ $data -> id_customer }}</td>
                                <td>{{ $data -> nama }}</td>
                                <td>{{ $data -> alamat }}</td>
                                <td><img src="{{ $data->foto }}" alt=""></td>
                                <td>{{ $data -> file_path }}</td>
                                <td>{{ $data -> nama_kelurahan }}</td>
                              </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Id Customer</th>
                  <th>Nama Customer</th>
                  <th>Alamat</th>
                  <th>Foto</th>
                  <th>File Path</th>
                  <th>Kelurahan</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
    })
  })
</script>
@endsection