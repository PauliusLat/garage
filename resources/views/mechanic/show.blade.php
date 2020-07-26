
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Mechaniko duomenys</div>
               <div class="card-body">
                <form method="GET" style="display: inline-block; float:left" action="{{route('mechanic.edit', [$mechanic])}}">
                    @csrf
                    <button type="submit">Koreaguoti</button>
                  </form>
                  <form method="POST" style="display: inline-block; float:right" action="{{route('mechanic.destroy', [$mechanic])}}">
                    @csrf
                    <button type="submit">Ištrinti</button>
                  </form>
                  
                <br>
                <br>
                <small class="form-text text-muted">Vardas:</small>
                {{$mechanic->name}}
                <br>                
                <small class="form-text text-muted">Pavardė:</small>
                {{$mechanic->surname}}
                <br>
                <small class="form-text text-muted">Priskirti sunkvežimiai:</small>
                @foreach ($mechanic->mechanicTrucks as $truck)
                {{$truck->maker}} | {{$truck->plate}}
                @endforeach
                <br>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection