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
var id_array = [];
var rowCount=0 ;

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

	var checkbox_med = (data) =>{
		let a = document.getElementsByClassName('checkbox-select');
		a = [...a].filter(d => !!d.checked).map(d =>d.id.split('-')[1]);
		document.selected = a;
		console.log(a);
		byId('selectedItem').value = a;
		
	}

	var deleteItem = (id) =>{
		byId('selectedItem').value = id;
		
	}

	
	var checkall = ()=>{
		var allbox = document.getElementById('selectAllMedicine');
		if (allbox.checked == true ) {
			for ( index = 1; index < rowCount+1; index++) {
				byId('checkbox'+index).checked = true ;
				id_array.push(index);
				// console.log(id_array);
			}
		}else{
			console.log(id_array);
			id_array.forEach((item,index)=>{
				id_array.splice(index)
			});
		}


	}

$(document).ready(function(){
    $("#home-tab").attr("aria-expanded","true");
    $("#home-tab").attr("aria-selected","true");
    $("#home_li").addClass("active");
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
  

	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
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
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAllMedicine").prop("checked", false);
		}
	});


});
</script>
</head>
<body>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" id="home_li">
    <a class="nav-link active" id="home-tab" selected="selected" data-toggle="tab" href="#home_section" role="tab" aria-controls="home" aria-selected="true">Home</a>
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
								<input onclick="checkall()" type="checkbox" id="selectAllMedicine">
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
								<input class="checkbox-select"  onclick='checkbox_med("{{$med->id}}")'  type="checkbox" id="checkbox-{{$med->id}}" name="options[]" value="1">
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
				<form method="POST" id="delForm" action="{{ route('delete-all') }}">
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
</body>
</html>                                		                            