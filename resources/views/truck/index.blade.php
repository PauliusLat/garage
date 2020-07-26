


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sunkvežimių sąrašas</div>

               <div class="card-body">
                @foreach ($trucks as $truck)
                <a href="{{route('truck.show',[$truck])}}">{{$truck->maker}} {{$truck->plate}}</a>
                {{$truck->truckMechanic->name}} {{$truck->truckMechanic->surname}}

                <br>
                @endforeach
               </div>
           </div>
       </div>
   </div>
</div>

    
@endsection

