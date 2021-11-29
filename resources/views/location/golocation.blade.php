@extends('layouts.master')

@section('css')
<link href="{{ asset('css/googlemap.css') }}" rel="stylesheet">
@endsection
<!DOCTYPE html>
<html>
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gelocation
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Gelocation</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="latitud">Latitud</label>
                    <input type="text" id="latitud" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="longitud">Longitud</label>
                    <input type="text" id="longitud" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- <div id="googleMap" style="width:100%;height:400px;"></div> -->
                <!-- <div id="map" style="width:100%;height:400px;"></div> -->
                <div id="mapa" style="witdh: 100%; height: 500px;"></div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('script')
<!-- <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=myAPI&callback=initMap"
    async defer>
</script> -->
<!-- <script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script> -->
<script>
    function myMap(){
        var latitud = 19.388672;
        var longitud = -99.174023;

        coordenas = {
            lng: longitud,
            lat: latitud
        }

        generateMapa(coordenas);
    }

    function generateMapa(coordenas){
        var mapa = new google.maps.Map(document.getElementById('mapa'),
        {
            zoom: 12,
            center: new google.maps.LatLng(coordenadas.lat. coordenadas.lng)
        });
        
        marcador = new google.maps.Marker({
            map: mapa,
            draggable: true,
            position: new google.maps.LatLng(coordenadas.lat. coordenadas.lng)
        });

        marcador.addListener('dragend',function(event){
            document.getElementById('latitud').value = this.getPosition().lat();
            document.getElementById('longitud').value = this.getPosition().lng();
        })
    }
</script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"async></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=iniciarMapa"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
@endsection
</html>
