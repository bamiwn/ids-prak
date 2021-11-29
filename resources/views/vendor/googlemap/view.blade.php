@extends('layouts.master')

@section('css')
<link href="{{ asset('css/googlemap.css') }}" rel="stylesheet">
@endsection

@section('content')
    <x-map-location-view />
@endsection

@section('script')
<script src="{{ asset('js/googlemap.js') }}" defer></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{config('googlemap')['google_api_key']}}&callback=initMap" async defer></script>
@endsection