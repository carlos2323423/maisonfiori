@foreach ($list as $data)  
        <script>
            // var entidades = @json($data);
            // var spaces = @json($spaces);
        </script>
        <tr>
            @foreach ($spaces as $name)  
                <td>{{ $data->$name }}</td>
                <!-- <td>{{ $data->Email }}</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td> -->
            @endforeach
            <td>
                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-table"></i></button>
                    </li>
                    <li class="list-inline-item">
                        @if($errors->any())
                            <p class="error-message">{{$errors->first('mensaje')}}</p>
                        @endif
                        <br>
                        
                        <button onclick="cambiaValores(`{{ route($route_name.'.update', $data->id) }}`, {{ json_encode($data) }})" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="modal" data-target="#register_userModal" data-placement="top" title="Edit">
                            <i class="fa fa-edit"></i>
                        </button>                                                        
                    </li>
                    <li class="list-inline-item">
                        <form action="{{ route('empleado_destroysent', $data->id) }}" method ="POST" >                                                    
                            @csrf
                            <!-- @method('DELETE') -->
                            {{ method_field('DELETE') }}
                            <!-- <button type="submit">Eliminar</button> -->
                            <button type="submit" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach