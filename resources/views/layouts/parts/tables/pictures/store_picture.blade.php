@foreach($list as $data)            
    <div class="col mb-5">
        <div class="card h-100">
            {{--
                @if($sale == true)
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                @endif
            --}}
            <!-- Product image-->
            <img class="card-img-top" src="
            {{ $stora_url .'/'. $data->imageqr }}
            " alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">                    
                        {{
                            strtoupper($data->name)
                        }}                        
                    </h5>
                    <!-- Product price-->
                    $40.00 - $80.00
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
            </div>
            <div class="card-body p-4">
                <h5 class="fw-bolder">Gráfico desde Django</h5>            
                @if (isset($django['charts']) && count($django['charts']) > 0)
                @foreach ($django['charts'] as $chart)
                    <img class="card-img-top" src="data:image/png;base64, {{ base64_encode($chart) }}" alt="Gráfico desde Django">                
                @endforeach
                @else
                    <p>No se pudo cargar el gráfico desde Django.</p>
                @endif                        
            </div>
        </div>
    </div>
@endforeach