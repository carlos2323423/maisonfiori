@extends('layouts.main_store')
@foreach($elementos as $ele)
    @section($ele)
        @include('layouts.parts.' . $ele)     
    @endsection
@endforeach
