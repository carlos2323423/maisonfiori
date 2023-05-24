<!-- Campo oculto para el género -->
<input type="hidden" name="genero" id="MODAL_id_{{ $space }}">

<!-- Bloque del campo de género visible -->
<div class="form-group row">
    <div class="col-sm-6">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="generoDropdown_{{ $space }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Seleccionar {{$space}}
            </button>
            <div class="dropdown-menu" aria-labelledby="generoDropdown">            
            @foreach ($list_options[$space.'es'] as $data)
                <a class="dropdown-item" href="#" onclick="setDropdownValor('{{ $data }}', '{{ $space }}')">{{ ucfirst($data) }}</a>
            @endforeach                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" onclick="setDropdownValor('Otros', '{{ $space }}')">Otros</a>
            </div>
        </div>
    </div>
</div>