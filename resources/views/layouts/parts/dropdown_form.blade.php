<div class="form-group row">
    <!-- Campo oculto para el dropdownlist -->
    <input type="hidden" name="{{ $space }}" id="MODAL_id_{{ $space }}" value="{{ old( $space ) }}">
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
            <div class="dropdown-menu" aria-labelledby="ListModalDropdown_{{ $space }}">            
            @foreach ($list_options[$space.'es'] as $data)
                <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('{{ $data }}', '{{ $space }}')">{{ ucfirst($data) }}</a>
            @endforeach                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Otros', '{{ $space }}')">Otros</a>
            </div>
        </div>
    </div>
</div>