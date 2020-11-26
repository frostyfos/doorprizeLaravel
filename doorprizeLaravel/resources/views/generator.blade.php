@extends('layout.layout')

@section('title')
  <title>Doorprize Generator</title>
@endsection

@section('content')
  <div class="row d-flex justify-content-center">
    <h2 class="text-center">Door Prize</h2><br>
  </div><br><br>

  <div>
    <form action="/generator/generate" method="POST">
      @csrf
      <div class="row justify-content-center">
        <div class="col-md-2">
          <input type="number" class="form-control" name="totalGenerate" value=0>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary col" {{ $currentPrizeQty < 0 ? 'disabled':'' }}>Generate Prize</button>
        </div>
      </div>
      <br><br>

      @php if ($currentPrizeQty <= 0) { @endphp
        <div class="alert alert-warning" role="alert">
          No Prize Left!
        </div>
      @php } @endphp

      <div class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#currentParticipantModal">Participant 
        <span class="badge badge-light">{{ count($currentParticipant) }}</span>
      </div>

      <div class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#currentPrizeModal">Prize 
        <span class="badge badge-light">{{ $currentPrizeQty }}</span>
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
    
  <div class="modal fade" id="currentParticipantModal" tabindex="-1" role="dialog" aria-labelledby="currentParticipantModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="currentParticipantLabel">Current Participant</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th>Nik</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($currentParticipant as $participant)
                  <tr>
                    <td>{{ $participant->nik }}</td>
                    <td>{{ $participant->name }}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="currentPrizeModal" tabindex="-1" role="dialog" aria-labelledby="currentPrizeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="currentPrizeLabel">Current Prize</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th>Prize</th>
                <th>Qty</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($currentPrize as $prize)
                  <tr>
                    <td>{{ $prize->prizeName }}</td>
                    <td>{{ $prize->qty }}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')

@endsection