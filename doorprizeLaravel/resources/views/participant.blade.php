@extends('layout.layout')

@section('title')
  <title>Participant List</title>
@endsection

@php
    $counter = 0;          
@endphp


@section('content')
    <h2>Participant List</h2>
    <form method="POST" action="/participant" enctype="multipart/form-data">
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
                <td>Nik</td>
                <td>Name</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $participant)
                <tr>
                    <td>{{ $counter+1 }}</td>
                    <td>{{ $participant->nik }}</td>
                    <td>{{ $participant->name }}</td>
                    <td>{{ $participant->claimed == 0 ? 'Not Picked' : 'Picked' }}</td>
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