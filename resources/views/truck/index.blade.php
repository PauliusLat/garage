


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sunkvežimių sąrašas</div>

               <div class="card-body">
                @foreach ($trucks as $truck)
                <a href="{{route('truck.edit',[$truck])}}">{{$truck->maker}} {{$truck->plate}} {{$truck->truckMechanic->name}} {{$truck->truckMechanic->surname}}</a>
                <form method="POST" action="{{route('truck.destroy', [$truck])}}">
                    @csrf
                    <button type="submit">Ištrinti</button>
                </form>
                <br>
                @endforeach
               </div>
           </div>
       </div>
   </div>
</div>

    
@endsection

