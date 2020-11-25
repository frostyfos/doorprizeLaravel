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
        <button type="submit" class="btn btn-primary">Generate Prize</button>
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
                  @for ($i = 0; $i < 5; $i++)
                      <input type="hidden" name="participantId{{ $i }}" value="{{ $randomParticipant[$i]->id }}"> 
                      <input type="hidden" name="prizeId{{ $i }}" value="{{ $randomPrizes[$i]->id }}"> 

                      <tr>
                        <td>
                          <div class="form-group">
                            <input class="form-control" type="text"  value="{{ $i+1 }}" readonly>
                          </div>
                        </td>
  
                        <td>
                          <div class="form-group">
                            <input class="form-control" type="text" name="nik{{ $i }}" value="{{ $randomParticipant[$i]->nik }}" readonly>
                          </div>
                        </td>
  
                        <td>
                          <div class="form-group">
                            <input class="form-control" type="text" name="name{{ $i }}" value="{{ $randomParticipant[$i]->name }}" readonly>
                          </div>
                        </td>
  
                        <td>
                          <div class="form-group">
                            <input class="form-control" type="text" name="prizeName{{ $i }}" value="{{ $randomPrizes[$i]->prizeName }}" readonly>
                          </div>
                        </td>
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