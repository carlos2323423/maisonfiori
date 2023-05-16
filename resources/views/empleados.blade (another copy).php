@extends('layouts.mainusuarios')

@foreach($elementos as $ele)
    @section($ele)
        @include('layouts.parts.' . $ele)     
    @endsection
@endforeach

{{--
--}}

{{--
    @section('Page Heading_introducction')
        @include('layouts.parts.introduccion')     
    @endsection
    
    @section('modal')
        @include('layouts.parts.modal')     
    @endsection
    
    @section('table_head_foot')    
        @include('layouts.parts.table_head_foot')     
    @endsection
    
    @section('table_row_list')
        @include('layouts.parts.table_row_list')     
    @endsection
--}}
