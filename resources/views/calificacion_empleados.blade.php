@extends('layouts.main_cuestionario')
@foreach($elementos as $ele)
    @section($ele)
        @include('layouts.parts.' . $ele)
    @endsection
@endforeach
