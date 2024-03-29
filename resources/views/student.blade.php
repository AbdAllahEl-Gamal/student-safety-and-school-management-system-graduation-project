<html>
<head>
	<?php include 'import/Imports.php'; ?>
	<title>Student page</title>
</head>
<body background="assets/img/backgrounds/1.jpg">
	@include('import/navbarAdmin')
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading"><h3><b>Student</b></h3></div>
			@if(count($errors)>0)
			<ul>
				@foreach($errors->all() as $error)
				<li class="alert alert-danger">{{$error}}</li>
				@endforeach
			</ul>
			@endif
			<div class="row">
				<div class="col-lg-5"></div>
				<div class="col-lg-4">
					<ul class="nav nav-pills">
						<li class={{Request::is('student')?"active":""}}><a data-toggle="pill" href="#insert"><b>Insert</b></a></li>
						<li class={{Request::is('studentUpdate')?"active":""}}><a data-toggle="pill" href="#update"><b>Update</b></a></li>
						<li class={{Request::is('studentDelete')?"active":""}}><a data-toggle="pill" href="#delete"><b>Delete</b></a></li>
					</ul>
				</div>
				<div class="col-md-4"></div>
			</div>

			<div class="tab-content">

				<div id="insert" class="tab-pane fade in {{Request::is('student')?"active":""}}">
					<div class="panel-body">
						<div class="py-5">
							<div class="container">
								<div class="row">
									<div class="col-md-11">
										<form action="{{ url('insertStudent') }} " method="post" enctype="multipart/form-data" files="true">
											{{ csrf_field() }}
											@if(isset($studentId))
											<b><label>Student Id</label></b> 
											<input type="text" id="studentId" name="studentId" class="form-control" placeholder="18xxxx" value="{{$studentId}}" readonly>
											@endif
											<div class="row">
												<div class="col-md-4">
													<div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
														<b><label>Student name</label></b> 
														<input type="text" name="studentname" pattern="[A-Za-z]+" class="form-control" placeholder="Student name">
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
														<b><label>Parent name</label></b>
														<input type="text" name="parentname" pattern="[A-Z\sa-z]+"  class="form-control" placeholder="Parent name">
													</div>
												</div>
											</div>
											<div class="form-group {{ $errors->has('parentphonenumber') ? 'has-error' : '' }}">
												<b><label>Parent's phone number</label></b> 
												<input type="text" name="parentphonenumber" id="Stuparpn" pattern="[0-9]+"  class="form-control" placeholder="+20xxxxxxxxxx">
											</div>
											<div class="form-group {{ $errors->has('class') ? 'has-error' : '' }}">
												<b><label>Gender</label></b><br>
												<select class="form-control" name="gender">
													<option value="">None</option>
													<option value="Female">Female</option>
													<option value="Male">Male</option>
												</select>
											</div>
											<div class="form-group {{ $errors->has('class') ? 'has-error' : '' }}">
												<b><label>Class</label></b><br>
												<select class="form-control" name="class" required>
													<option value="">None</option>
													@foreach($classess as $key => $classValue)
													<option value="{{$classValue['class']}}">{{$classValue['class']}}({{$classValue['studentsNumber']}})</option>
													@endforeach
												</select>
											</div>
											<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
												<b><label>Password</label></b> 
												<input type="password" name="password" class="form-control" placeholder="**********">
											</div>
											<div class="form-group {{ $errors->has('studentphoto') ? 'has-error' : '' }}">
												<b><label>Upload student photo</label></b>
												<input type="file" name="studentphoto" id="file">
											</div>
											<input type="button" id="finger" value="Add Fingerprint">
											<button type="submit" name="submitBtn" value="submit" class="btn btn-primary"><b>Submit</b></button>
											<button type="submit" name="submitBtn" value="addNew" class="btn btn-primary"><b>Add new student</b></button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="update" class="tab-pane fade in {{Request::is('studentUpdate')?"active":""}}">

					<div class="container">
						<div class="panel-body">
							<form action="{{url('studentUpdate')}}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<b>Student ID:</b> <input type="text" name="studentid">
								<button type="submit" class="btn btn-primary"><b>Search</b></button>
							</form>
						</div>
					</div>

					@if(isset($name))
					<div class="panel panel-default">
						<div class="panel-heading"><h3><b>Student Information</b></h3></div> 
						<div class="panel-body">
							<div class="py-5">
								<div class="container">
									<div class="row">
										<div class="col-md-11">

											<form action="{{url('studentUpdate1')}}" method="post" enctype="multipart/form-data">
												{{ csrf_field() }}

												<input type="hidden" name="studentid2" value="{{$studentid}}">

												<div class="form-group">
													<b><label>Full name</label></b> 
													<input type="text" name="fullname" value="{{$name}}" pattern="[A-Z\sa-z]+" class="form-control">
												</div>

												<div class="form-group">
													<b><label>Class</label></b> 
													<input type="text" name="class" value="{{$class}}" class="form-control">
												</div>
												<button type="submit" class="btn btn-primary"><b>Update</b></button>
												<button type="submit" formaction="{{url('studentCUpdate1')}}" class="btn btn-primary"><b>Cancel</b></button>
											</form>
											<form action="{{url('studentCUpdate1')}}" method="post" enctype="multipart/form-data">
												{{ csrf_field() }}
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
				</div>

				<div id="delete" class="tab-pane fade in {{Request::is('studentDelete')?"active":""}}">

					<div class="container">
						<div class="panel-body">
							<form action="{{url('studentDelete')}}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<b>Student ID:</b> <input type="text" name="studentid">
								<button type="submit" class="btn btn-primary"><b>Search</b></button>
							</form>
						</div>
					</div>

					@if(isset($namee))
					<div class="panel panel-default">
						<div class="panel-heading"><h3><b>Student Information</b></h3></div> 
						<div class="panel-body">
							<div class="py-5">
								<div class="container">
									<div class="row">
										<div class="col-md-11">
											<form action="{{url('studentDelete1')}}" method="post" enctype="multipart/form-data">
												{{ csrf_field() }}
												<input type="hidden" name="studentid2" value="{{$studentid}}">

												<div class="form-group">
													<b><label>Full name:</label></b>
													<b><label>{{$namee}}</label></b>
												</div>

												<div class="form-group">
													<b><label>Class:</label></b> 
													<b><label>{{$class}}</label></b>
												</div>

												<button type="submit" class="btn btn-primary"><b>Delete</b></button>
												<button type="submit" formaction="{{url('studentCDelete1')}}" class="btn btn-primary"><b>Cancel</b></button>
											</form>
											<form action="{{url('studentCDelete1')}}" method="post" enctype="multipart/form-data">
												{{ csrf_field() }}
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
				</div>


			</div>
		</div>
	</div>

	<script type="text/javascript">
		$("#finger").click(function(event) {
			$.ajax({
				url: 'enrollFingerPrint',
				type: 'POST',
				data:{_token: '{{csrf_token()}}'},
				success:function (result) {
					alert(result);
				},error:function(result){ 
			        alert(result);
			    }
			});
	});
	</script>

</body>
</html>