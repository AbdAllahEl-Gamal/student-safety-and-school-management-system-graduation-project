<html>
<head>
	<?php include 'import/Imports.php'; ?>
	<title>Subject management</title>
</head>
<body background="assets/img/backgrounds/1.jpg">
	@include('import/navbarAdmin')
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading"><h3><B>Subject Management</B></h3></div>
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
						<li class={{Request::is('subject')?"active":""}}><a data-toggle="pill" href="#add"><B>Add</B></a></li> 
						<li class={{Request::is('subjectview')?"active":""}}><a data-toggle="pill" href="#view"><B>Delete</B></a></li>
					</ul>
				</div>
				<div class="col-lg-4"></div>
			</div>

			<div class="tab-content">

				<div id="add" class="tab-pane fade in {{Request::is('subject')?"active":""}}">
					<div class="panel-body">
						<div class="py-5">
							<div class="container">
								<div class="row">
									<div class="col-md-11">

										<form action="{{ url('addSubject') }} " method="post" enctype="multipart/form-data" files="true">
											{{ csrf_field() }}

											<div class="form-group {{ $errors->has('subjectname') ? 'has-error' : '' }}">
												<B><label>Subject</label></B> 
												<input type="text" name="subjectname" id="Subjectname" pattern="[A-Z\sa-z]+" value="{{ old('subjectname') }}" class="form-control" placeholder="English">
											</div>
											<button type="submit" class="btn btn-primary"><B>Submit</B></button>
										</form>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="view" class="tab-pane fade in {{Request::is('subjectview')?"active":""}}">

					<div class="container">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-11">
										<div class="row">
								<div class="col-lg-6">
									<label><B><U>Subjects</U></B></label>
								</div>
								<div class="col-lg-6">
									<label><B><U>Delete</U></B></label>
								</div>
							</div>
							<div class="row">
								@foreach($subjectss as $key => $subjectValue)
								<form action="{{url('subjectDelete')}}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$key}}">
								<div class="col-lg-6">
									<label><B>{{$subjectValue['subject']}}</B></label>
								</div>
								<div class="col-lg-6">
									<button type="submit" class="btn btn-primary"><B>Delete</B></button>
								</div>
								@endforeach
							</div>
							</form>
							</div>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</body>
</html>