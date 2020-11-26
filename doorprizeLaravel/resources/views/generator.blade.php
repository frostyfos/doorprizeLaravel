@extends('layout.layout')

@section('title')
  <title>Doorprize Generator</title>
@endsection

{{-- TODO:
create button claim per rows
create button claim all --}}



@section('content')
    <h2 class="text-center">Prize Generator</h2><hr>
    <div class="text-center">
      <form action="/generator/generate" method="POST">
        @csrf
        <div class="row justify-content-center">
          <div class="col-md-2">
            <input type="number" class="form-control" name="totalGenerate" value=0>
          </div>
          <div class="col-md-3">
            <button type="submit" class="btn btn-primary col">Generate Prize</button>
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
              @if (count($randomParticipant) != 0 || count($randomPrizes) != 0)



                  @for ($i = 0; $i < count($randomParticipant); $i++)
                      <input type="hidden" name="participantId{{ $i }}" value="{{ $randomParticipant[$i]->id }}"> 
                      {{-- <input type="hidden" name="prizeId{{ $i }}" value="{{ $randomPrizes[$i]->id }}">  --}}

                      <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $randomParticipant[$i]->nik }}</td>
                        <td>{{ $randomParticipant[$i]->name }}</td>
                        <td>{{ $prizeList[$i] }}</td>
                      </tr>  
                  @endfor
              @endif
          </tbody>
        </table>
      </form>
    </div>

    



    
@endsection

@section('script')

@endsection