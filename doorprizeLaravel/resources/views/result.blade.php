@extends('layout.layout')

@section('title')
  <title>Prize Result</title>
@endsection

{{-- TODO:
create button claim per rows
create button claim all --}}

@php
    $i = 1;
@endphp

@section('content')
    <h2 class="text-center">Prize Result</h2><hr>
    <div class="text-center">

        <div class="row justify-content-center">
          <div class="col-md-3">
              <a href="/result/export"> <button type="button" class="btn btn-warning col" name="btnExport">Export</button></a>
           
          </div>
        </div>
        
        <br><br>
        <table class="table">
          <thead>
            <tr>
              <td>No</td>
              <td>Nik</td>
              <td>Name</td>
              <td>Prize</td>
            </tr>
          </thead>
          <tbody>
              @foreach ($results as $result)
              <tr>
                <td>{{ $i}}</td>
                <td>{{ $result->nik }}</td>
                <td>{{ $result->name }}</td>
                <td>{{ $result->prizeName }}</td>
              </tr>  
              @php
                  $i++;
              @endphp
              @endforeach
          </tbody>
        </table>
    </div>
@endsection

@section('script')

@endsection