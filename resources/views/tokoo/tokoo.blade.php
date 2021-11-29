@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
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
    <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Toko</h3>
                    </div>
                    <div class="card-tools">
                        <a class="nav-link" href="/tambahTokoo">
                            <button type="button" class="btn btn-primary"><i class="fa fa-plus">Tambah Data Toko</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example2" style="text-align: center" class="table table-bordered table-hover">
                            <thead>
                                <tr>
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
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        
                        </div>
                        <!-- /.card-footer-->
                    </div>
                </div><!--/. container-fluid -->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript"> 
    $(document).ready(function () {
        $('#table-datatables').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>   
@endsection