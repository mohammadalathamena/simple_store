@extends('layouts.app')

@section('content')
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
@if(Session::get('erorr'))
    <div id="erorr" >
		@foreach($errors->get('username') as  $error)
		<li class="alert alert-danger">{{ $error }}</li>
		@endforeach
		@foreach($errors->get('password') as  $error)
		<li class="alert alert-danger">{{ $error }}</li>
		@endforeach
		@foreach($errors->get('email') as  $error)
		<li class="alert alert-danger">{{ $error }}</li>
		@endforeach
		@foreach($errors->get('phone') as  $error)
		<li class="alert alert-danger">{{ $error }}</li>
		@endforeach
		@foreach($errors->get('pic') as  $error)
		<li class="alert alert-danger">{{ $error }}</li>
		@endforeach
		

    </div>
	@endif
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST" action="add-employee" enctype="multipart/form-data">
                    @csrf
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">name</label>
                                    <input class="input--style-4" type="text" name="username">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                    
                                <div class="col-6">
                                    <div class="input-group">
                                        <label class="label">password</label>
                                        <input class="input--style-4" type="password" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                        </div>   
              
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <input class="input--style-4" type="text" name="address">
                                </div>
                            </div>
                        
                        </div>
                        <div class="row row-space">
                        
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="pic" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
