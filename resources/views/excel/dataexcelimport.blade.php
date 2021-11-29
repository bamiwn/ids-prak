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
      <h1>Data Excel</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Customer</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kode pos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer as $c)
                        <tr>  
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $c -> id_customer }}</td>
                            <td>{{ $c -> nama }}</td>
                            <td>{{ $c -> alamat }}</td>
                            <td>{{ $c -> kodepos }}</td>
                        </tr>
                    @endforeach  
                </tbody>
              </table>
            </div>
        </div>
    </section>
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