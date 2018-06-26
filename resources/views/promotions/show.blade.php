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

@section('title', 'Shabab Promotions')

@section('content')
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>All Prmotions</h2>
		
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Promotions</span></li>
					<li><span>All</span></li>
				</ol>
		
				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
		
		<section class="panel panel-transparent">
			<div class="panel-body">
	            <div class="pull-left">
	            	@include('includes.errorSuccess')
	            </div>

				<div class="pull-right">
					<button id="addPromotion" type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAddPromotion">
						<i class="fa fa-paper-plane text-dark"></i>
						Promote a Student
					</button>


				</div>
			</div>
		</section>

		<section class="panel panel-featured panel-featured-dark">
			<header class="panel-heading">
				<h2 class="panel-title">All Promotions</h2>
			</header>
			<div class="panel-body">
				<div class="col-md-offset-3">
						<div class="form-group">
							<label for=""><b>Select Class to Promote</b></label>
						</div>
					<form class="form-inline">
						<div class="form-group">
							<div class="input-group">
								<select name="level" id="level" class="form-control populate" required autofocus data-plugin-selectTwo>
									<option value="">Select a Class </option>
									@foreach ($classes as $class)
										<option value="{{ $class->id }}">{{ strtoupper($class->name.' - '.$class->tag) }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="visible-sm clearfix mt-sm mb-sm"></div>
						<div class="form-group">
							<div class="input-group">
								<select name="yeargroup" id="yeargroup" class="form-control"  required autofocus data-plugin-selectTwo>
									<option value="">Select a Session </option>
									@foreach ($yeargroups as $yeargroup)
										<option value="{{ $yeargroup->name }}">{{ $yeargroup->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="clearfix visible-xs mb-sm"></div>
						<button type="submit" id="viewStudent" class="btn btn-primary">View Students</button>
					</form>
				</div>

				<table class="table table-bordered mb-none table-striped" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
					<thead>
						<tr>
							<th>Select All <input type="checkbox" class="selectAll"></th>
							<th>Registration Number</th>
							<th>Student Name</th>
							<th>Session</th>
							<th>Class</th>
							<th>Remark</th>
							<th>Promoted By</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Select All <input type="checkbox" class="selectAll"></th>
							<th>Registration Number</th>
							<th>Student Name</th>
							<th>Session</th>
							<th>Class</th>
							<th>Remark</th>
							<th>Promoted By</th>
							<th>Actions</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach ($promotedStudents as $promotedStudent)
							@continue(!isset($regNumbers[$promotedStudent->student_id]))
							<tr>
								<td>
									<input type="checkbox" class="students_id" value="{{ $promotedStudent->student_id }}">
								</td>
								<td>{{$regNumbers[$promotedStudent->student_id]}}
								</td>
								<td>{{ $students->find($promotedStudent->student_id)->othernames.' '.$students->find($promotedStudent->student_id)->surname }}</td>
								<td>{{ $sesions[$promotedStudent->year_group_id] }}</td>
								<td>{{ $levels[$promotedStudent->level_id] }}</td>
								<td>{{ $promotedStudent->remark }}</td>
								<td>{{ $users[$promotedStudent->user_id] }}</td>
								<td>
									<a class="btn-warning btn-xs" data-toggle="modal" data-target="#modalAddPromotion" id="editPromotion" data-id="{{ $promotedStudent->id }}">
										<i class="fa fa-edit"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</section>
		<section class="panel panel-default">
			<div class="panel-body">
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<div class="col-sm-3">
							<label for="academic-year"><strong>Promote To: </strong></label>
						</div>
						<div class="col-sm-3">
							<label for="class_id">Select Class</label>
							<select name="class_id" id="class_id" required data-plugin-selectTwo class="form-control populate">
								<option value="">Choose</option>
								@foreach ($classes as $class)
									<option value="{{ $class->id }}">{{ strtoupper($class->name.' - '.$class->tag) }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-sm-3">
							<label for="sesion_id">In (session) </label>
							<select name="sesion_id" id="sesion_id" required data-plugin-selectTwo class="form-control populate">
								@foreach ($yeargroups as $yeargroup)
									<option value="{{ $yeargroup->id }}">{{ $yeargroup->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-sm-3">
							<label for="program"></label>
							<div class="input-group">
								<input type="submit" class="form-control" id="promote" value="Promote Selected">
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</section>
@include('promotions.modals')
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

				$(".selectAll").change(function () {
				    $("input:checkbox").prop('checked', $(this).prop("checked"));
				});

				$(document).on('click', '#promote', function(event) {
					event.preventDefault();
					var level_id = $('#class_id').val();
					var year_group_id = $('#sesion_id').val();

					var ids = [];
					$('.students_id').each(function(el) {
						if ($(this).is(":checked")) {
							ids.push($(this).val());
						}
					});

					if (level_id != "" && ids.length != 0) {
						var url = '{{ route('promotions.bulkPromote') }}';
						$.ajaxSetup({
						    headers: {
						        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						    }
						});
						$.post(url, {
							student_ids: ids,
							level_id: level_id,
							year_group_id: year_group_id
						}, function(data) {
							console.log(data);
						});
					}else{
						alert('Select a class you want to promote the students to Or Select Some Students')
					}
				});

				$(document).on('click', '#viewStudent', function(event) {
					event.preventDefault();
					var level = $('#level').val();
					var yeargroup = $('#yeargroup').val();
					yeargroup = yeargroup.replace('/', '_')

					var url = '{{ url('/promotions/level/yeargroup') }}';
					url = url.replace('level', level);
					url = url.replace('yeargroup', yeargroup);

					console.log(url);

					 $('<form action="'+url+'"></form>').appendTo('body').submit();
				});

				$('#modalAddPromotion').on('show.bs.modal', function (event) {
				  var button = $(event.relatedTarget) 
				  var id = button.data('id') 
				  $('#promotionId').val(id);
				  // $('#FormAddEmp').reset();
				});

				$(document).on('click', '#saveChanges', function(event) {
					event.preventDefault();
					var id = $('#promotionId').val();
					var url = '{{ route('promotions.update', @id) }}';
					url = url.replace('id', id);

					var student_id = $('#student_id').val();
					var year_group_id = $('#year_group_id').val();
					var level_id = $('#level_id').val();
					var remark = $('#remark').val();

					$.post(url, {
						'student_id': student_id,
						'year_group_id': year_group_id,
						'level_id': level_id,
						'remark': remark,
						'_method': 'put',
						'_token': $('input[name=_token]').val()
					}, function(data) {
						$('#datatable-tabletools').load(location.href + ' #datatable-tabletools');
						console.log(data);
					});
				});

				$(document).on('click', '#editPromotion', function(event) {
					event.preventDefault();
					var id = $('#promotionId').val();
					var url = '{{ route('promotions.show', @id) }}';
					url = url.replace('id', id);

					{{-- hiding buttons --}}
					$('#myModalLabelPromotion').text('Edit Promotion Record');
					$('#createPromotion').hide('400');
					$('#saveChanges').show('400');

					$.get(url, function(data) {
						console.log(data)
						$('#student_id').val(data.student_id);
						$('#year_group_id').val(data.year_group_id);
						$('#level_id').val(data.level_id);
						$('#remark').val(data.remark);
					});
				});

				$(document).on('click', '#addPromotion', function(event) {
					event.preventDefault();
					$('#createPromotion').show('400');
					$('#saveChanges').hide('400');
					$('#myModalLabelPromotion').text('Add New Promotion');
					$('#FormAddPromotion').trigger('reset');
				});
			});
		</script>
@endsection
