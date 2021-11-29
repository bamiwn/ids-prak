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
        Tambah Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Barcode</a></li>
        <li class="active">Tambah Barang</li>
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
                    <form role="form" action="tambah_barang" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="nama" class="form-control" id="nama" name="nama" placeholder="Isi Nama Barang">
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" value="Simpan">
                    <a href="/databarang" class="btn btn-default">Kembali</a>
                    <!-- /.box-body -->
                    </form>
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
@section('script')
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
@endsection
</html>