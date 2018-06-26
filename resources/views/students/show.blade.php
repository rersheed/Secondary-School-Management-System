@extends('masters.master')

@section('css')
	<!-- Vendor CSS -->
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/magnific-popup.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/pnotify/pnotify.custom.css') }}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/stylesheets/theme.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">
	<script src="{{asset('assets/vendor/modernizr/modernizr.js')}}"></script>
@endsection

@section('title', 'Shabab Students List')

@section('content')
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>All Students</h2>
		
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Students</span></li>
					<li><span>All</span></li>
				</ol>
		
				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
		<section class="panel panel-transparent">
			<div class="panel-body">
					<a href="{{ route('pdf.allStudent') }}" class="btn btn-default pull-left">
						<i class="fa fa-download text-dark"></i>
						Download Student List
					</a>
				<div class="pull-right">
					<button id="addStudent" type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAddStudent">
						<i class="fa fa-user-plus text-dark"></i>
						Student
					</button>
					<a id="importStudent" href="{{ url('/importStudents') }}" class="btn btn-default">
						<i class="fa fa-plus text-dark"></i>
						Import Students
					</a>
				</div>
			</div>
		</section>
		<section class="panel panel-featured panel-featured-dark">
			<header class="panel-heading">
		
				<h2 class="panel-title">All Students</h2>

			</header>
			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
					<thead>
						<tr>
							<th>S/N</th>
							<th>Registration Number</th>
							<th>Surname</th>
							<th>Othernames</th>
							<th>Gender</th>
							<th>Admission Class</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>S/N</th>
							<th>Registration Number</th>
							<th>Surname</th>
							<th>Othernames</th>
							<th>Gender</th>
							<th>Admission Class</th>
							<th>Actions</th>
						</tr>
					</tfoot>
					<tbody id="shopList">
						@foreach ($students as $student)
						<tr class="gradeX">
							<td>{{ $loop->index + 1 }}</td>
							<td>{{ $student->regNumber }}</td>
							<td>{{ $student->surname }}</td>
							<td>{{ $student->othernames }}</td>
							<td>{{ $student->sex == 1 ? 'Male' : 'Female' }}</td>
							<td>{{ $levels[$student->level_id] }}</td>
							<td>
								
								<a class="btn-warning btn-xs" href="" data-toggle="modal" data-target="#modalAddStudent" id="editStudent" data-id="{{ $student->id }}">
									<i class="fa fa-edit"></i>
								</a>
								
								&nbsp;
								<a class="btn-danger btn-xs" href="#modalAnim" id="deleteStudent" data-toggle="modal" data-id="{{ $student->id }}">
									<i class="fa fa-trash"></i>
								</a>

							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</section>
	</section>

@include('students.modals');

@endsection

@section('js')
	<!-- Vendor -->
		<script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
		<script src="{{asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
		<script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
		<script src="{{ asset('assets/vendor/pnotify/pnotify.custom.js') }}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
		<script src="{{asset('assets/javascripts/theme.js')}}"></script>
		<script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>
		<script src="{{asset('assets/javascripts/theme.init.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/examples.datatables.ajax.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/examples.datatables.editable.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>
		<script src="{{ asset('assets/javascripts/ui-elements/examples.modals.js') }}"></script>
		<script src="{{ asset('assets/vendor/jquery-autosize/jquery.autosize.js') }}"></script>
		<script src="{{ asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>


		<script>
			$(document).ready(function() {
				
				$('#modalAnim').on('show.bs.modal', function (event) {
				  var button = $(event.relatedTarget) 
				  var id = button.data('id') 
				  $('#id').val(id);
				  // $('#FormAddEmp').reset();
				});
				
				$('#modalAddStudent').on('show.bs.modal', function (event) {
				  var button = $(event.relatedTarget) 
				  var id = button.data('id') 
				  $('#studentId').val(id);
				  // $('#FormAddEmp').reset();
				});

				$(document).on('click', '#confirm-delete', function(event) {
					event.preventDefault();
					var id = $('#id').val();
					var url = '{{ route('students.destroy', @id) }}';
					url = url.replace('id', id);

					$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});
					$.post(url, {
						'id': id, 
						'_method': 'delete', 
						'_token': $('input[name=_token]').val()
					}, function(data) {
						$('#datatable-tabletools').load(location.href + ' #datatable-tabletools');
							console.log(data);
							new PNotify({
										title: 'Alert!',
										text: 'Student Record Deleted Successfully...',
										type: 'success'
									});
					});

				});

				$(document).on('click', '#editStudent', function(event) {
					event.preventDefault();
					var id = $('#studentId').val();
					var url = '{{ route('students.edit', @id) }}';
					url = url.replace('id', id);

					{{-- hiding buttons --}}
					$('#myModalLabelStudent').text('Edit Student Record');
					$('#createStudent').hide('400');
					$('#saveChanges').show('400');
					
					$.get(url, function(data) {
						// console.log(data);
						$('#regNumber').val(data.regNumber);
						$('#surname').val(data.surname);
						$('#othernames').val(data.othernames);
						$('#sex').val(data.sex);
						$('#dateOfBirth').val(data.dateOfBirth);
						$('#phone').val(data.phone);
						$('#lastSchool').val(data.lastSchool);
						$('#level_id').val(data.level_id);
						$('#guardian_id').val(data.guardian_id);
						$('#address').val(data.address);
						$('#admissionDate').val(data.admissionDate);
			      		$('#showImage').attr('src', '{{ asset('assets/images/students/') }}/'+ data.image);
					});
				});

				$(document).on('click', '#addStudent', function(event) {
					$('#createStudent').show('400');
					$('#saveChanges').hide('400');

					$('#FormAddStudent').trigger('reset');
					$('#showImage').attr('src', '');
					$('#myModalLabelStudent').text('Add New Student Record');
				});

				$(document).on('click', '#saveChanges', function(event) {
					event.preventDefault();
					var id = $('#studentId').val();
					var regNumber = $('#regNumber').val();
					var surname = $('#surname').val();
					var othernames = $('#othernames').val();
					var sex = $('#sex').val();
					var dateOfBirth = $('#dateOfBirth').val();
					var phone = $('#phone').val();
					var lastSchool = $('#lastSchool').val();
					var level_id = $('#level_id').val();
					var guardian_id = $('#guardian_id').val();
					var address = $('#address').val();
					var admissionDate = $('#admissionDate').val();
		      		var image = $('#image').val();
		      		var url = '{{ route('students.update', @id) }}';
		      		url = url.replace('id', id);

		      		$.ajaxSetup({
		      		    headers: {
		      		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      		    }
		      		});
		      		$.post(url, {
		      			'id': id, 
		      			'regNumber': regNumber,
		      			'surname': surname,
		      			'othernames': othernames,
		      			'sex': sex,
		      			'dateOfBirth': dateOfBirth,
		      			'phone': phone,
		      			'lastSchool': lastSchool,
		      			'level_id': level_id,
		      			'guardian_id': guardian_id,
		      			'address': address,
		      			'admissionDate': admissionDate,
		      			'image': image,
		      			'_method': 'put', 
		      			'_token': $('input[name=_token]').val()
		      		}, function(data) {
		      			$('#datatable-tabletools').load(location.href + ' #datatable-tabletools');
		      				console.log(data);
		      				new PNotify({
		      							title: 'Alert!',
		      							text: 'Student Record Updated Successfully...',
		      							type: 'success'
		      						});
		      		});
				});

				$(document).on('click', '#createGuardian', function(event) {
					event.preventDefault();
					var surname = $('#surnameG').val();
					var othernames = $('#othernamesG').val();
					var phone = $('#phoneG').val();
					var email = $('#email').val();
					var countryOfOrigin = $('#countryOfOrigin').val();
					var stateOfOrigin = $('#stateOfOrigin').val();
					var lga = $('#lga').val();
					var address = $('#addressG').val();

					$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});

					$.post('{{ route('guardians.store') }}', {
						'surname': surname,
						'othernames': othernames,
						'phone': phone,
						'email': email,
						'countryOfOrigin': countryOfOrigin,
						'stateOfOrigin': stateOfOrigin,
						'lga': lga,
						'address': address,
		      			'_token': $('input[name=_token]').val()
					}, function(data) {
						$('.a').load(location.href + ' .a');
					});		
				});
			});
			function readURL(input) {

			  if (input.files && input.files[0]) {
			    var reader = new FileReader();

			    reader.onload = function(e) {
			      $('#showImage').attr('src', e.target.result);
			    }

			    reader.readAsDataURL(input.files[0]);
			  }
			}

			$("#image").change(function() {
			  readURL(this);
			});
		</script>
@endsection
