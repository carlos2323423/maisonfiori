<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    @foreach($list as $graph)    
        @include('layouts.parts.tables.pictures.store_picture')        
    @endforeach    
</div>