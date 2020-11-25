@extends('layout.layout')

@section('title')
  <title>index header</title>
@endsection

@section('content')
    tessadasdsad
@endsection

@section('script')
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
@endsection