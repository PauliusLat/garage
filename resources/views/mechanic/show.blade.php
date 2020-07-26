
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Mechaniko duomenys</div>
               <div class="card-body">
                <small class="form-text text-muted">Vardas:</small>
                {{$mechanic->name}}
                <br>                
                <small class="form-text text-muted">Pavardė:</small>
                {{$mechanic->surname}}
                <br>
                <br>
                <form method="POST" style="display: inline-block; float:left" action="{{route('mechanic.edit', [$mechanic])}}">
                    @csrf
                    <button type="submit">Koreaguoti</button>
                  </form>
                  <form method="POST" style="display: inline-block; float:right" action="{{route('mechanic.destroy', [$mechanic])}}">
                    @csrf
                    <button type="submit">Ištrinti</button>
                  </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection