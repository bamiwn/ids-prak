@extends('layouts.master')

@section('css')
<zxing-scanner [tryHarder]="true" [formats]="formats" (scanSuccess)="onScanSuccessHandler($event)"></zxing-scanner>
@endsection
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Scan Barcode Toko
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Toko</a></li>
        <li class="active">Scan Barcode Toko</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
<div class="col-12 col-md-6 col-lg-6">
<div class="card">
<div class="card-body">
<main class="wrapper" style="padding-top:2em">

    <section class="container" id="demo-content">
      <div>
      <button id="startButton" class="btn btn-primary">Start</button>
        <button id="resetButton" class="btn btn-secondary">Reset</button>
      </div>
      <br>

      <div>
        <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
      </div>

      <div id="sourceSelectPanel" style="display:none">
        
        <select type= "hidden" id="sourceSelect" style="max-width:400px">
        </select>
      </div>

      <label>Result:</label>
      <code id="result" class="form-control purchase-code" style="max-width:300px"></code>
      
      
</div>
</div>
</div>
            <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                <div class="card-body">
                  <!-- <input onclick="getLocation()" href="findToko" type="button" class="btn btn-primary" id="tokos" name="tokos" value="Details"><br> -->
                  <h4 class="btn btn-primary">Lokasi Toko</h4>
                  <div class="row">
                    <div class="form-group col-6 col-md-6 col-lg-6">
                      <label>Nama Toko</label>
                      <input type="text" class="form-control" name="nam" id="nam"></input><br>
                    </div>
                    <div class="form-group col-6 col-md-6 col-lg-6">
                      <label>Latitude Toko</label>
                      <input type="text" class="form-control" name="lat" id="lat"></input><br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6 col-md-6 col-lg-6">
                      <label>Longitude Toko</label>
                      <input type="text" class="form-control" name="long" id="long"></input><br>
                    </div>
                    <div class="form-group col-6 col-md-6 col-lg-6">
                      <label>Accuracy Toko</label>
                      <input type="text" class="form-control" name="ac" id="ac"></input><br>
                    </div>
                  </div>
                  <!-- <input onclick="getLocation()" type="button" class="btn btn-success" value="Get Location"> -->
                  <h4 class="btn btn-primary">Lokasi Sekarang</h4>
                  <div class="row">
                    <div class="form-group col-6 col-md-6 col-lg-6">
                      <label>Latitude</label>
                      <input type="text" class="form-control" id= "latitude_now" name="latitude_now">
                    </div>
                    <div class="form-group col-6 col-md-6 col-lg-6">
                      <label>Longitude</label>
                      <input type="text" class="form-control" id="longitude_now" name="longitude_now">
                    </div>
                  </div>
                  <div class="row">                    
                    <div class="form-group col-6 col-md-6 col-lg-6">
                      <label>Accuracy</label>
                      <input type="text" class="form-control" id="accuracy_now" name="accuracy_now">
                    </div>
                  </div>
                  <input onclick="konfirmasi()" type="button" class="btn btn-success" value="Konfirmasi">
                    <!-- <div class="form-group">
                    <input onclick="getLocation()" type="button" class= "btn btn-primary" value="GetLoc">
                    <input type="submit" class="btn btn-success" value="simpan"> -->
                </div>
              </div>
            </div>
              </div>
            </div>
          </form>
</div>
</div>
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
<script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.3-dev.7656630/umd/index.js"></script>
    <script type="text/javascript">
        window.addEventListener('load', function () {
            let selectedDeviceId;
            const codeReader = new ZXing.BrowserBarcodeReader()
            console.log('ZXing code reader initialized')
            codeReader.getVideoInputDevices()
                .then((videoInputDevices) => {
                    const sourceSelect = document.getElementById('sourceSelect')
                    selectedDeviceId = videoInputDevices[0].deviceId
                    if (videoInputDevices.length > 1) {
                        videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option')
                            sourceOption.text = element.label
                            sourceOption.value = element.deviceId
                            sourceSelect.appendChild(sourceOption)
                        })

                        sourceSelect.onchange = () => {
                            selectedDeviceId = sourceSelect.value;
                        }

                        const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                        sourceSelectPanel.style.display = 'block'
                    }

                    document.getElementById('startButton').addEventListener('click', () => {
                        codeReader.decodeOnceFromVideoDevice(selectedDeviceId, 'video').then((result) => {
                            console.log(result)
                            var scan_id = document.getElementById('result').textContent = result.text
                            $.ajax({
                            type:"get",
                            url:"findToko",
                            data:"scan_id="+scan_id,
                            success:function(data){
                              console.log(scan_id);
                              for(var i=0;i<data.length;i++){
                                // $('#ket').append('<label value="'+data[i].id_barang+'">'+data[i].ny
                                document.getElementById("nam").value = data[i].nama_toko;
                                document.getElementById("lat").value = data[i].latitude;
                                document.getElementById("long").value = data[i].longitude;
                                document.getElementById("ac").value = data[i].accuracy;
                              }
                            }
                            });
                            getLocation()
                        }).catch((err) => {
                            console.error(err)
                            document.getElementById('result').textContent = err
                        })
                        console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
                    })

                    document.getElementById('resetButton').addEventListener('click', () => {
                        document.getElementById('result').textContent = '';
                        codeReader.reset();
                        console.log('Reset.')
                    })

                })
                .catch((err) => {
                    console.error(err)
                })
        })

        $("#tokos").click(function(){
        var scan_id = document.querySelector('code').innerText; // find <code> tag and get text
        // var scan_id = console.log(val);
        // element.innerText = console.log(val);
        $.ajax({
          type:"get",
          url:"findToko",
          data:"scan_id="+scan_id,
          success:function(data){
            console.log(scan_id);
            for(var i=0;i<data.length;i++){
              // $('#ket').append('<label value="'+data[i].id_barang+'">'+data[i].ny
              document.getElementById("nam").value = data[i].nama_toko;
              document.getElementById("lat").value = data[i].latitude;
              document.getElementById("long").value = data[i].longitude;
              document.getElementById("ac").value = data[i].accuracy;
            }
          }
          });
        });

        var latitud = document.getElementById("latitude_now");
        var longitud = document.getElementById("longitude_now");
        var accury = document.getElementById("accuracy_now");
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

        function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2-lat1);  // deg2rad below
        var dLon = deg2rad(lon2-lon1); 
        var a = 
          Math.sin(dLat/2) * Math.sin(dLat/2) +
          Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
          Math.sin(dLon/2) * Math.sin(dLon/2)
          ; 
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var d = R * c; // Distance in km
        return d;
      }

      function deg2rad(deg) {
        return deg * (Math.PI/180)
      }

      function konfirmasi(){
        var lat1 = document.getElementById("lat").value;
        var lon1 = document.getElementById("long").value;
        var acc1 = Number(document.getElementById("ac").value);
        var lat2 = document.getElementById("latitude_now").value;
        var lon2 = document.getElementById("longitude_now").value;
        var acc2 = Number(document.getElementById("accuracy_now").value);
        var rac= Number((acc1+acc2)/2);
        var b = Number(getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2));
        console.log(lat1)
        console.log(lon1)
        console.log(acc1)
        console.log(lat2)
        console.log(lon2)
        console.log(acc2)
        if(b <= rac) {
          alert("Anda berada di lokasi toko");
        } 
        else{
          alert("Anda berada di luar lokasi toko");
        }
      }        
    </script>
@endsection