<div class="form-group row">
    <!-- Campo oculto para el dropdownlist -->
    <input type="hidden" name="{{ $space }}" id="Input_Dropdown_id_{{ $space }}" value="{{ old( $space ) }}">
    <!-- Bloque del campo de dropdownlist visible -->
    <div class="col-sm-6">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="ButtonDropdown_{{ $space }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                
                @if(old($space))
                    {{ ucfirst($space) }}: {{ old($space) }}
                @else                
                    Seleccionar {{ucfirst($space)}}
                @enderror    
            </button>
            <div class="dropdown-menu" aria-labelledby="ListModalDropdown_{{ $space }}" id="dropdown-menu_{{ $space }}">            
                @foreach ($list_options[$space.'es'] as $data)
                    @switch($space)
                        @case('areas_de_evaluacion_type')
                            @php
                                $options = '';
                                switch ($data) {
                                    case 'FACTORES DE DESEMPEÑO':
                                        $options = json_encode($factoresdesempeno_names);
                                        break;
                                    case 'COMPETENCIAS LABORALES':
                                        $options = json_encode($competencias_names);
                                        break;
                                    // Agregar más casos según sea necesario
                                    default:
                                        $options = json_encode([]); // Otra opción por defecto
                                        break;
                                }
                            @endphp                                                        

                            <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('{{ $data }}', '{{ $space }}'); agregarOpcionesDropdown('{{ $options }}', '{{ $data }}', '{{ $dropdown2 }}');">{{ ucfirst($data) }}</a>
                            @break
                        @default                            
                            <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('{{ $data }}', '{{ $space }}'); ">{{ ucfirst($data) }}</a>
                    @endswitch                      
                @endforeach                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Otros', '{{ $space }}')">Otros</a>
            </div>
        </div>
    </div>
</div>