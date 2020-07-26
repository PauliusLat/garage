

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Naujo sunkvežimio duomenys</div>

               <div class="card-body">
                <form method="POST" action="{{route('truck.store')}}">

                    <div class="form-group">
                        <label>Gamintojas:</label>
                        <input type="text" name="truck_maker"  class="form-control" value="{{old('truck_maker')}}">
                    </div>
                    <div class="form-group">
                        <label>Valst.Nr.:</label>
                        <input type="text" name="truck_plate"  class="form-control" value="{{old('truck_plate')}}">
                    </div>
                    <div class="form-group">
                        <label>Gamybos metai:</label>
                        <input type="text" name="truck_make_year"  class="form-control" value="{{old('truck_make_year')}}">
                    </div>
                    <div class="form-group">
                        <label>Mechaniko pastabos:</label>
                        <textarea name="truck_mechanic_notices" id="summernote"></textarea>
                    </div>
                    <select name="mechanic_id">
                        @foreach ($mechanics as $mechanic)
                            <option value="{{$mechanic->id}}">{{$mechanic->name}} {{$mechanic->surname}}</option>
                        @endforeach
                    </select>
                    @csrf
                    <button type="submit">Pridėti</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            popover: {
            }
        });
    });
</script>
@endsection
