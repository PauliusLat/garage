
@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Koreaguoti mechaniko duomenis</div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('mechanic.update',[$mechanic->id])}}">
                        <div class="form-group">
                            <label>Vardas:</label>
                            <input type="text" name="mechanic_name"  class="form-control" value="{{old('mechanic_name',$mechanic->name)}}">
                        </div>
                        <div class="form-group">
                            <label>Pavardė:</label>
                            <input type="text" name="mechanic_surname"  class="form-control" value="{{old('mechanic_surname',$mechanic->surname)}}">
                        </div>
                        <label>Mechaniko foto:</label>
                        <br>
                        <img src="{{asset("images/$mechanic->portret")}}" style="width:150px; height:auto">
                        <input type="file" name="portret">
                        @csrf
                        <button type="submit">Išsaugoti</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
 </div>
 @endsection
 