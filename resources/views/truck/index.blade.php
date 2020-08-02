


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sunkvežimių sąrašas</div>

               <div class="card-header">
                   <form method="GET" action="" style="float:left">
                    <select name="mechanic_id">
                        <option value = 0>Pagal mechaniką</option>
                        @foreach ($mechanics as $mechanic)
                            <option value="{{$mechanic->id}}" @if ($selectId == $mechanic->id) selected @endif>{{$mechanic->name}} {{$mechanic->surname}}</option>
                        @endforeach
                    </select>
                    @csrf
                    <button type="submit" name="filter_mechanic">Filtruoti</button>
                </form>
                <form method="GET" action="" style="float:right">
                    <input type="text" name="maker" placeholder="pagal gamintoją">
                    @csrf
                    <button type="submit" name="filter_maker">Filtruoti</button>
                </form>
               </div>

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

