@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prisijungėte</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('mechanic.index') }}" class="btn btn-primary btn-lg btn-block">MECHANIKŲ SĄRAŠAS</a>
                    <a href="{{ route('truck.index') }}" class="btn btn-primary btn-lg btn-block">SUNKVEŽIMIŲ SĄRAŠAS</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
