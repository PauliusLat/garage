
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sukurti naują mechaniką</div>

               <div class="card-body">
                    <form method="POST" action="{{route('mechanic.store')}}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Vardas:</label>
                            <input type="text" name="mechanic_name"  class="form-control" value="{{old('mechanic_name')}}">
                        </div>
                        <div class="form-group">
                            <label>Pavardė:</label>
                            <input type="text" name="mechanic_surname"  class="form-control" value="{{old('mechanic_surname')}}">
                        </div>
                            <label>Foto:</label>
                            <br>
                            <img src="{{asset('images/def.jpg')}}" style="width:150px; height:auto">
                            <input type="file" name="portret">
                        @csrf
                        <button type="submit">Pridėti</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
