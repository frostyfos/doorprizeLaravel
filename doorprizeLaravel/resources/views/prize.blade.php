@extends('layout.layout')

@section('title')
  <title>Prize List</title>
@endsection

@php
    $counter = 0;          
@endphp


@section('content')
    <h2>Prize List</h2>
    <form method="POST" action="/prize" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <input class="btn" type="file" name="file" required="required">
            <button type="submit" class="btn btn-success">Import File</button>
        </div>
        
    </form>
    
    <br/>  <br/>

    <table class="table">
        <thead>
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Qty</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($prizes as $prize)
                <tr>
                    <td>{{ $counter+1 }}</td>
                    <td>{{ $prize->prizeName }}</td>
                    <td>{{ $prize->qty }}</td>
                </tr>
                @php
                    $counter++;
                @endphp
            @endforeach
            
        </tbody>
    </table>
@endsection

@section('script')

@endsection