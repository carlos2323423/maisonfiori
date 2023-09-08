@foreach ($list as $data)
    <script>
        // var entidades = @json($data);
        // var spaces = @json($spaces);        
    </script>
    <tr>
        @foreach ($spacesTotal as $colum_name)  
            <td>{{ $data->$colum_name }}</td>            
        @endforeach
        
        <td>
            <ul class="list-inline m-0">
                <li class="list-inline-item">
                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Agregar"><i class="fa fa-table"></i></button>
                </li>
                <li class="list-inline-item">
                    @if($errors->any())
                        <p class="error-message">{{$errors->first('mensaje')}}</p>
                    @endif
                    <br>
                    
                    <button onclick="cambiaValores(`{{ route($accionformupdate, $data->id) }}`, {{ json_encode($data) }}, '{{ $form_data_toggle_list }}')" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="modal" data-target="{{ $Modal_target }}" data-placement="top" title="Editar">
                        <i class="fa fa-edit"></i>
                    </button>                                                        
                </li>
                <li class="list-inline-item">
                    <form id="delete_form{{$data->id}}" action="{{ route($accionformdelete, $data->id) }}" method="POST">                                                    
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="showConfirmationPopup('delete_form{{$data->id}}')"><i class="fa fa-trash"></i></button>
                    </form>
                </li>
            </ul>
        </td>
    </tr>
@endforeach