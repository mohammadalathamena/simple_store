<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/crud.css">

<script type="text/javascript">


$(document).ready(function(){
    $("#home-tab").attr("aria-expanded","true");
    $("#home-tab").attr("aria-selected","true");
	$("#home_li").addClass("active");

    
    $("#home-tab").click(function(){
        $("#home_section").css("display","block");
        $("#employe_section").css("display","none");
        $("#home-tab").attr("aria-expanded","true");
    $("#home-tab").attr("aria-selected","true");
    $("#home_li").addClass("active");
    $("#emp-tab").attr("aria-expanded","false");
    $("#emp-tab").attr("aria-selected","false");
    $("#employe_li").removeClass("active");

    });
    $("#emp-tab").click(function(){
        $("#employe_section").css("display","block");
        $("#home_section").css("display","none");
        $("#emp-tab").attr("aria-expanded","true");
    $("#emp-tab").attr("aria-selected","true");
    $("#employe_li").addClass("active");
    $("#home-tab").attr("aria-expanded","false");
    $("#home-tab").attr("aria-selected","false");
    $("#home_li").removeClass("active");

    }); 
	var getData = (id) => {
		console.log('get the data to id : ', id);
		
	}
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
  
  	// Filter table rows based on searched term
	  $("#search_medicine").on("keyup", function() {
        var term = $(this).val().toLowerCase();
        $("table tbody tr").each(function(){
            $row = $(this);
            var name = $row.find("td:nth-child(2)").text().toLowerCase();
            if(name.search(term) < 0){                
                $row.hide();
            } else{
                $row.show();
            }
        });
    });
  
  	// Filter table rows based on searched term
	  $("#search_employee").on("keyup", function() {
        var term = $(this).val().toLowerCase();
        $("table tbody tr").each(function(){
            $row = $(this);
            var name = $row.find("td:nth-child(2)").text().toLowerCase();
            if(name.search(term) < 0){                
                $row.hide();
            } else{
                $row.show();
            }
        });
    });
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[name="options[]"]');
	$("#selectAllMedicine").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;    
			});
			
		} else{
			checkbox.each(function(){
				this.checked = false;    
			});
		} 
		checkbox_med();	
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAllMedicine").prop("checked", false);
		}
	});

	
	// Select/Deselect checkboxes
	var checkboxemp = $('table tbody input[name="options_emp[]"]');
	$("#selectAllEmployee").click(function(){
		if(this.checked){
			checkboxemp.each(function(){
				this.checked = true;   
			});
		} else{
			checkboxemp.each(function(){
				this.checked = false; 
			});
		} 
		checkbox_emp();
	});
	checkboxemp.click(function(){
		if(!this.checked){
			$("#selectAllEmployee").prop("checked", false);
		}
	});
});

	const byId = (id) => document.getElementById(id);
	var getData = (data) => {
		console.log('get the data to id : ', data);
		byId('editName').value = data.name;
		byId('editproduction').value = data.production_date;
		byId('editexpiry').value = data.expiry_date;
		byId('editpic').src = data.pic;
		byId('edittype').value = data.type;
		byId('input_id').value = data.id;
	}
	var getData_emp = (data) => {
		console.log('get the data to id : ', data.id);
		console.log('get the data to id : ', data);

		byId('editEmployeeName').value = data.username;
		byId('editEmployeeEmail').value = data.email;
		byId('editEmployeeAddress').value = data.address;
		byId('editEmployeePhone').value = data.phone;
		byId('editEmployeeImage').src = data.pic;
		console.log(byId('input_id_emp'), data.id);
		
		byId('input_id_emp').value = data.id;
		console.log(byId('input_id_emp'), byId('input_id_emp').value);

		
	}
	var checkbox_med = (data) =>{
		let a = document.getElementsByClassName('checkbox-select');
		console.log(a);

		a = [...a].filter(d => !!d.checked).map(d =>d.id.split('-')[1]);
		document.selected = a;
		console.log("this is a :",a);
		byId('selectedItem').value = a;
		
	}
	var checkbox_emp = (data) =>{
		let a = document.getElementsByClassName('checkbox-select-emp');
		a = [...a].filter(d => !!d.checked).map(d =>d.id.split('-')[1]);
		document.selected = a;
		console.log(a);
		byId('selectedItem_emp').value = a;
		
	}

</script>
</head>
<body>
<ul class="nav nav-tabs" id="myTab" role="tablist">

  <li class="nav-item" id="home_li">
    <a class="nav-link active" id="home-tab" selected="selected" data-toggle="tab" href="#home_section" role="tab" aria-controls="home" aria-selected="true">medicine</a>
  </li>
  <li class="nav-item" id="employe_li">
    <a class="nav-link" id="emp-tab" data-toggle="tab" href="#employe_section" role="tab" aria-controls="emp" aria-selected="false">Employees</a>
  </li>
  <li class="nav-item" id="user_li">
	<a class="nav-link " id="user-tab"   href="store" role="tab"  aria-selected="false">Store</a>
  </li>
  <li style="float: right;">
	<a href="{{ route('logout') }}"
	onclick="event.preventDefault();
				  document.getElementById('logout-form').submit();">
	 {{ __('Logout') }}
 </a>

 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	 @csrf
 </form>
     
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><h1>home</h1></div>
  <div class="tab-pane fade" id="emp" role="tabpanel" aria-labelledby="emp-tab">Employees</div>
</div>
<section id="home_section">
    <div class="container">
		@if(Session::get('mid_erorr'))
		<div id="erorr" >
			@foreach($errors->get('name') as  $error)
			<li class="alert alert-danger">{{ $error }}</li>
			@endforeach
			@foreach($errors->get('images') as  $error)
			<li class="alert alert-danger">{{ $error }}</li>
			@endforeach
			@foreach($errors->get('expiry_date') as  $error)
			<li class="alert alert-danger">{{ $error }}</li>
			@endforeach
		</div>
		@endif
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
						<h2>Manage <b>Medicine</b></h2>
					</div>
					<div class="col-sm-4">
                        <div class="search-box">
							<div class="input-group">								
								<input type="text" id="search_medicine" class="form-control" placeholder="Search by Name">
                                <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
							</div>
                        </div>
                    </div>
					<div class="col-sm-4">
						<a href="#addMedicineModal" id="add" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Medicine</span></a>
						<a href="#deleteMedicineeModal" id="del" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input onclick="" type="checkbox" id="selectAllMedicine">
								<label for="selectAllMedicine"></label>
							</span>
						</th>
                        <th>Name</th>
						<th>Production Date</th>
						<th>Expiry Date</th>
                        <th>Pic</th>
						<th>Type</th>
                    </tr>
                </thead>
                <tbody>	
				@foreach($medicine as $med)
				<tr>
						<td>
							<span class="custom-checkbox">
								<input class="checkbox-select"  onclick='checkbox_med()'  type="checkbox" id="checkbox-{{$med->id}}" name="options[]" value="1">
								<label for="checkbox5"></label>
							</span>
							<input type="hidden" value='' name="hidden_input" id="{{$med->id}}">
						</td>
                        <td>{{$med->name}}</td>
                        <td>{{$med->production_date}}</td>
						<td>{{$med->expiry_date}}</td>
						<td><img src="{{$med->pic}}" alt="" width="50px" height="50px"></td>
						<td>{{$med->type}}</td>

                        <td>
                            <a onclick='getData(@json($med))' data-target="#editMedicineModal" href="javascript:void(0)"  id="{{$med->id}}"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a onclick='deleteItem({{ $med->id }})' href="#deleteMedicineeModal" id="del" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr> 
				@endforeach

			
                </tbody>
			</table>
        </div>
    </div>
	<!-- Add Modal HTML -->
	
	<div id="addMedicineModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="add-medicine" enctype="multipart/form-data">
					@csrf

					<div class="modal-header">						
						<h4 class="modal-title">Add Medicine</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Production Date</label>
							<input type="date" name="production_date" class="form-control" >
						</div>
						<div class="form-group">
							<label>Expiry Date</label>
							<input type="date" name="expiry_date" class="form-control" >
						</div>
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="images" class="form-control" >
						</div>	
						<div class="form-group">
							<label>Type</label>
							<input type="text" name="type" class="form-control" >
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	
	<div id="editMedicineModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="save-medicine" enctype="multipart/form-data">
					@csrf
					<input type="hidden" value="" name="id" id="input_id">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input id="editName" name="name" type="text" class="form-control" >
						</div>
						<div class="form-group">
							<label>Production Date</label>
							<input id="editproduction" name="production_date" type="date" class="form-control" >
						</div>
						<div class="form-group">
							<label>Expiry Date</label>
							<input id="editexpiry" name="expiry_date" type="date" class="form-control" >
						</div>
						<div class="form-group">
							<label>Image</label>
							<input id="editpic" name="images" type="file" class="form-control" >
						</div>	
						<div class="form-group">
							<label>Type</label>
							<input id="edittype" name="type" type="text" class="form-control" >
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteMedicineeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" id="delForm_med" action="{{ route('delete-all') }}">
					@csrf
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="selectedItem" id="selectedItem">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<section id="employe_section">
<div class="container">
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
	
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-4">
                        <div class="search-box">
							<div class="input-group">								
								<input type="text" id="search_employee" class="form-control" placeholder="Search by Name">
                                <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
							</div>
                        </div>
                    </div>
					<div class="col-sm-4">
						<a href="#addEmployeeModal" id="add_emp" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
						<a href="#deleteEmployeeModal" id="del_emp" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input onclick="checkall_emp()" type="checkbox" id="selectAllEmployee">
								<label for="selectAllEmployee"></label>
							</span>
						</th>
                        <th>Name</th>
						<th>Email</th>
						<th>Address</th>
                        <th>Phone</th>
						<th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>	
				@foreach($user as $use)
				<tr>
					<td>
						<span class="custom-checkbox">
							<input class="checkbox-select-emp"  onclick=''  type="checkbox" id="checkbox_emp-{{$use->id}}" name="options_emp[]" value="1">
							<label for="checkbox5"></label>
						</span>
						<input type="hidden" value='' name="hidden_input_emp" id="{{$use->id}}">
					</td>
					<td>{{$use->username}}</td>
					<td>{{$use->email}}</td>
					<td>{{$use->address}}</td>
					<td>{{$use->phone}}</td>
					<!-- <td><img src="{{ asset($use->pic) }}" alt="" width="50px" height="50px" ></td> -->
					<td><img src="{{$use->pic}}" alt="" width="50px" height="50px"></td>


					<td>
						<a onclick='getData_emp(@json($use))' data-target="#editEmployeeModal" href="javascript:void(0)"  id="{{$use->id}}"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
						<a onclick='deleteItem_emp({{ $use->id }})' href="#deleteEmployeeModal" id="del_emp" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
					</td>
				</tr> 
			

				@endforeach

			
                </tbody>
			</table>
        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="add-employee" enctype="multipart/form-data">
					@csrf
					<div class="modal-header">						
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="username" class="form-control" value="{{old('username')}}" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" value="{{old('email')}}"  class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="address" value="{{old('address')}}" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" name="phone" value="{{old('phone')}}" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Permission</label>
							<input type="text" name="permission" value="{{old('permission')}}" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="pic" value="{{old('pic')}}" class="form-control" >
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->

	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="edit-employee" enctype="multipart/form-data">
					@csrf
					<input type="hidden" value="" name="id_emp" id="input_id_emp">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input id="editEmployeeName" type="text" name="username" class="form-control" >
						</div>
						<div class="form-group">
							<label>Email</label>
							<input id="editEmployeeEmail" type="email" name="email"  class="form-control" >
						</div>
						<div class="form-group">
							<label>Address</label>
							<input id="editEmployeeAddress" type="text" name="address" class="form-control" >
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input id="editEmployeePhone" type="text" name="phone" class="form-control" >
						</div>
						<div class="form-group">
							<label>Image</label>
							<input id="editEmployeeImage" type="file" name="pic" class="form-control" >
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" id="delForm_emp" action="{{ route('delete-all-emp') }}">
					@csrf
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="selectedItem_emp" id="selectedItem_emp">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

  
</body>
</html>                                		                            