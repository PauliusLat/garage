
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sunkvežimio duomenys</div>
               <div class="card-body">
                <form method="GET" style="display: inline-block; float:left" action="{{route('truck.edit', [$truck])}}">
                    @csrf
                    <button type="submit">Koreaguoti</button>
                  </form>
                  <form method="POST" style="display: inline-block; float:right" action="{{route('truck.destroy', [$truck])}}">
                    @csrf
                    <button type="submit">Ištrinti</button>
                  </form>
                  
                <br>
                <br>
                <small class="form-text text-muted">Gamintojas:</small>
                {{$truck->maker}}
                <br>                
                <small class="form-text text-muted">Valst.Nr.:</small>
                {{$truck->plate}}
                <br>
                <small class="form-text text-muted">Gamybos metai:</small>
                {{$truck->make_year}}
                <br>
                <small class="form-text text-muted">Mechanikas:</small>
                {{$truck->truckMechanic->name}} {{$truck->truckMechanic->surname}}
                <br>
                <small class="form-text text-muted">Mechaniko pastabos:</small>
                {!!$truck->mechanic_notices!!}
                <br>
                
               </div>
           </div>
       </div>
   </div>
</div>
@endsection