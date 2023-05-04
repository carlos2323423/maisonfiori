@extends('layouts.mainusuarios')
@section('Page Heading')
<h1 class="h3 mb-2 text-gray-800">Empleados</h1>
@endsection
@section('boton_agragar')
<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#" data-toggle="modal" data-target="#register_userModal" onclick="resturar_modal('{{ route($route_name.'_registersent') }}')">
    <i class="fas fa-user fa-sm text-white-50"></i> 
    Agregar Empleado
</a>
@endsection

@section('edit_modal')
<!-- USERS EDIT Modal-->
<div class="modal fade" id="edit_userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">ESTE ES EL USER MODAL?</h5> -->
                <h1 class="h4 text-gray-900 mb-4">Edit an Account!</h1>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.                    
                <form id="edit_list_form" class="user" method="POST" action="">
                @csrf
                <!-- @method('DELETE') -->
                {{ method_field('PUT') }}
                    <div class="form-group row">

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="firstname" type="text" class="form-control form-control-user" id="editFirstName"
                                placeholder="First Name" value="">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <input name="lastname" type="text" class="form-control form-control-user" id="editLastName"
                                placeholder="Last Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="ci" type="text" class="form-control form-control-user" id="editCI"
                                placeholder="CI">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <input name="email" type="email" class="form-control form-control-user" id="editInputEmail"
                            placeholder="Email Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="password" type="password" class="form-control form-control-user" id="editInputPassword" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="editRepeatPassword" placeholder="Repeat Password">
                        </div>

                    </div>

                    <a href="login.html" class="btn btn-primary btn-user btn-block">
                        Register Account
                    </a>
                    <hr>

                    <a href="index.html" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Register with Google
                    </a>

                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                    </a>

                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </form>

                <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>

                <div class="text-center">
                    <a class="small" href="login.html">Already have an account? Login!</a>                
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                    <!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
                </div>

            </div>
        </div>        
    </div>
</div>
<!-- END USERS EDIT Modal-->
@endsection

@section('table_head_foot')    
    <thead>
        <tr>
            @foreach ($spaces as $name)  
                <th>{{ $name }}</th>
            @endforeach
            <th>Action</th>
            <!-- <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Action</th> -->
        </tr>
    </thead>                                    
    <tfoot>
        <tr>
            @foreach ($spaces as $name)  
                <th>{{ $name }}</th>
            @endforeach
            <th>Action</th>
            <!-- <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th> -->
        </tr>
    </tfoot> 
@endsection
@section('table_row_list')
    @foreach ($list as $data)  
        <script>
            // var entidades = @json($data);
            var spaces = @json($spaces);
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
                        
                        <button onclick="cambiaValores(`{{ route('empleado.update', $data->id) }}`, {{ json_encode($data) }})" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="modal" data-target="#register_userModal" data-placement="top" title="Edit">
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
@endsection
