@extends('layouts.mainusuarios')

@section('modal')
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
<!-- END Logout Modal-->
<!-- USERS Modal-->
<div class="modal fade" id="register_userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">ESTE ES EL USER MODAL?</h5> -->
                <h1 class="h4 text-gray-900 mb-4">Crear un empleado</h1>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.                    
                <form class="user" method="POST" action="{{ route('empleados_registersent') }}">
                @csrf
                @foreach ($spaces as $space)
                <div class="form-group">
                    <input name="$space" type="" class="form-control form-control-user" id="exampleInputEmail"
                        placeholder="{{ $space }}">                    
                </div>
                @endforeach
                <div class="form-group">
                    <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                        placeholder="Email Address">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input name="ingrese" type="date" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="ingreso">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">                        
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Genero
                            </button>
                            <!-- <select name="genero" id="genero" class="dropdown-menu">
                                <option value="Masculino" class="dropdown-item">Masculino</option>                                
                                <option value="Femenino" class="dropdown-item">Femenino</option>
                                <div class="dropdown-divider"></div>
                                <option value="Otros" class="dropdown-item">Otros</option>                                
                            </select>  -->
                            <div name="genero" class="dropdown-menu">
                                <a value="Masculino" class="dropdown-item" href="#">Masculino</a>
                                <a value="Femenino" class="dropdown-item" href="#">Femenino</a>                                
                                <div class="dropdown-divider"></div>
                                <a value="Otros" class="dropdown-item" href="#">Otros</a>
                            </div>
                        </div>
                    </div>

                </div>                                                   
                
                <div class="form-group">                    
                    <!--Avatar-->
                    <div>
                        <div class="d-flex justify-content-center mb-4">
                            <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                            class="rounded-circle" alt="example placeholder" style="width: 200px;" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-primary btn-rounded">
                                <label class="form-label text-white m-1" for="customFile2">Choose file</label>
                                <input type="file" class="form-control d-none" id="customFile2" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input name="password" type="password" class="form-control form-control-user" id="InputPassword" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="RepeatPassword" placeholder="Repeat Password">
                    </div>

                </div>                    
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Register Account') }}
                    </button>
                    <hr>

                    <a href="index.html" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Register with Google
                    </a>

                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                    </a>                    
                </form>

                <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>

                <div class="text-center">
                    <a class="small" href="login.html">Already have an account? Login!</a>                
                </div>                

            </div>
        </div>        
    </div>
</div>
<!-- END USERS Modal-->
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
