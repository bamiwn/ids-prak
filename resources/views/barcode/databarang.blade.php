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
        Data Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Barcode</a></li>
        <li class="active">Data Barang</li>
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
              <a class="nav-link" href="/tambah_barang">
                    <button type="button" class="btn btn-succes"><i class="fa fa-plus"></i> Tambah Barang</button>
              </a>
              <button data-toggle="modal" data-target="#pdf" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Cetak PDF</button>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th><input type="checkbox" id="cbgroup1_master" onchange="togglecheckboxes(this,'cbgroup1')"></th> -->
                  <th>Barcode</th>
                  <th>Id Barang</th>
                  <th>Nama Barang</th>
                  <th>Timestamp</th>
                </tr>
                </thead>
                <tbody>
                @foreach($barang as $data)
                    <tr>
                            <!-- <td><input type="checkbox"></td>   -->
                            <td style="text-align: center">
                            <?php
                                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                 echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->id_barang, $generator::TYPE_CODE_128)) . '">';
                            ?>
                            <br>
                            <?= $data->id_barang?>
                            <br>
                            <?= $data->nama?>
                            </td>  
                            <td>{{ $data -> id_barang }}</td>
                            <td>{{ $data -> nama }}</td>
                            <td>{{ $data -> timestamp }}</td>
                    </tr>
                @endforeach
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                  </button></th>
                  <th>Barcode</th>
                  <th>Id Barang</th>
                  <th>Nama Barang</th>
                  <th>Timestamp</th>
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- modal cetak -->
          <div class="modal fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="pdfLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="pdfLabel">Export Mulai Baris & Kolom?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('cetak_barcode') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="baris_barang">Baris</label>
                                <input type="number" class="form-control" id="baris_barang" placeholder="baris Barang" name="baris_barang" required>
                            </div>
                            <div class="form-group">
                                <label for="kolom_barang">Kolom</label>
                                <input type="number" class="form-control" id="kolom_barang" placeholder="kolom Barang" name="kolom_barang" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- end modal -->

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