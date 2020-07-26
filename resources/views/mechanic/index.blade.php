
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Mechanikų sąrašas</div>

               <div class="card-body">
                @foreach ($mechanics as $mechanic)
                <a href="{{route('mechanic.show',[$mechanic])}}">{{$mechanic->name}} {{$mechanic->surname}}</a>
                <br>
                @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection


