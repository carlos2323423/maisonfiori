@extends('layouts.mainusuarios')

@foreach($elementos as $ele)
    @section($ele)
        @include('layouts.parts.' . $ele)     
    @endsection
@endforeach
