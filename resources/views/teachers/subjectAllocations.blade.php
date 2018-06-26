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

@section('title', 'Shabab Subject Allocations')

@section('content')
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>All Subject Teachers</h2>
		
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Teachers</span></li>
					<li><span>Subject</span></li>
				</ol>
		
				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
		<section class="panel panel-transparent">
			<div class="panel-body">
				<div class="pull-right">
					<button id="addST" type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAddST">
						<i class="fa fa-plus text-dark"></i>
							Allocate
					</button>	
				</div>
		</div>
	</section>
		<section class="panel panel-featured panel-featured-dark">
			<header class="panel-heading">
				<h2 class="panel-title">All Subject Teachers</h2>
			</header>
			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
					<thead>
						<tr>
							<th>S/N</th>
							<th>Teacher</th>
							<th>Subject</th>
							<th>Class</th>
							<th>Session</th>
							<th>Term</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>S/N</th>
							<th>Teacher</th>
							<th>Subject</th>
							<th>Class</th>
							<th>Session</th>
							<th>Term</th>
							<th>Actions</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach ($subjectTeachers as $st)
							<tr>
								<td>{{ $loop->index + 1 }}</td>
								<td>{{ $teachers[$st->teacher_id] }}</td>
								<td>{{ $subjects[$st->subject_id] }}</td>
								<td>{{ $levels[$st->level_id] }}</td>
								<td>{{ $sesions[$st->year_group_id] }}</td>
								<td>{{ $terms[$st->term_id] }}</td>
								<td>
									<a class="btn-warning btn-xs" href="" data-toggle="modal" data-target="#modalAddST" id="editST" data-id="{{ $st->id }}">
										<i class="fa fa-edit"></i>
									</a>
									
									&nbsp;
									<a class="btn-danger btn-xs" href="#modalAnim" id="deleteST" data-toggle="modal" data-id="{{ $st->id }}">
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

	<div class="modal fade" id="modalAnim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
				</div>
				<div class="modal-body">
					 <p>Are you sure that you want to remove this Teacher's record?</p>
					 <input type="hidden" id="id" value="">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm-delete">Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalAddST" tabindex="-1" role="dialog" aria-labelledby="myModalLabelST" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabelST">Add New Allocation</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal form-bordered" method="post" id="FormAddST" action="{{ route('subjectTeachers.store') }}">
						
						{{ csrf_field() }}

						<input type="hidden" id="stId">

						<div class="form-group{{ $errors->has('teacher_id') ? ' has-error' : '' }}">
						    <label for="st_teacher_id" class="col-md-4 control-label">Teacher</label>

						    <div class="col-md-6">
						        <select name="teacher_id" id="st_teacher_id" required autofocus class="form-control">
									@foreach ($instructors as $teacher)
										<option value="{{ $teacher->id }}">{{ $teacher->surname.' '.$teacher->othernames }}</option>
									@endforeach
						        </select>

						        @if ($errors->has('teacher_id'))
						            <span class="help-block">
						                <strong>{{ $errors->first('sssteacher_id') }}</strong>
						            </span>
						        @endif 
						    </div>
						</div>

						<div class="form-group{{ $errors->has('level_id') ? ' has-error' : '' }}">
						    <label for="st_level_id" class="col-md-4 control-label">Class</label>

						    <div class="col-md-6">
						        <select name="level_id" id="st_level_id" required autofocus class="form-control">
									@foreach ($classes as $class)
										<option value="{{ $class->id }}">{{ $class->name.' '.$class->tag }}</option>
									@endforeach
						        </select>

						        @if ($errors->has('level_id'))
						            <span class="help-block">
						                <strong>{{ $errors->first('level_id') }}</strong>
						            </span>
						        @endif 
						    </div>
						</div>

						<div class="form-group{{ $errors->has('subject_id') ? ' has-error' : '' }}">
						    <label for="st_subject_id" class="col-md-4 control-label">Subject</label>

						    <div class="col-md-6">
						        <select name="subject_id" id="st_subject_id" required autofocus class="form-control">
									@foreach ($courses as $course)
										<option value="{{ $course->id }}">{{ $course->name.' ('.$course->code }})</option>
									@endforeach
						        </select>

						        @if ($errors->has('subject_id'))
						            <span class="help-block">
						                <strong>{{ $errors->first('subject_id') }}</strong>
						            </span>
						        @endif 
						    </div>
						</div>

						<div class="form-group{{ $errors->has('year_group_id') ? ' has-error' : '' }}">
						    <label for="st_year_group_id" class="col-md-4 control-label">Academic Session</label>

						    <div class="col-md-6">
						        <select name="year_group_id" id="st_year_group_id" required autofocus class="form-control">
									@foreach ($yeargroups as $session)
										<option value="{{ $session->id }}">{{ $session->name}}</option>
									@endforeach
						        </select>

						        @if ($errors->has('year_group_id'))
						            <span class="help-block">
						                <strong>{{ $errors->first('year_group_id') }}</strong>
						            </span>
						        @endif 
						    </div>
						</div>

						<div class="form-group{{ $errors->has('term_id') ? ' has-error' : '' }}">
						    <label for="st_term_id" class="col-md-4 control-label">Term</label>

						    <div class="col-md-6">
						        <select name="term_id" id="st_term_id" required autofocus class="form-control">
									@foreach ($termx as $term)
										<option value="{{ $term->id }}">{{ $term->name}} Term</option>
									@endforeach
						        </select>

						        @if ($errors->has('term_id'))
						            <span class="help-block">
						                <strong>{{ $errors->first('term_id') }}</strong>
						            </span>
						        @endif 
						    </div>
						</div>

					                  
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="createST">Save Allocation</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveSTChanges">Save Changes</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalAnim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
				</div>
				<div class="modal-body">
					 <p>Are you sure that you want to remove this Teacher's record?</p>
					 <input type="hidden" id="id" value="">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm-delete">Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalAddST" tabindex="-1" role="dialog" aria-labelledby="myModalLabelST" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabelST">Add New Allocation</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal form-bordered" method="post" id="FormAddST" action="{{ route('subjectTeachers.store') }}">
						
						{{ csrf_field() }}

						<input type="hidden" id="stId">

						<div class="form-group{{ $errors->has('teacher_id') ? ' has-error' : '' }}">
						    <label for="st_teacher_id" class="col-md-4 control-label">Teacher</label>

						    <div class="col-md-6">
						        <select name="teacher_id" id="st_teacher_id" required autofocus class="form-control">
									@foreach ($instructors as $teacher)
										<option value="{{ $teacher->id }}">{{ $teacher->surname.' '.$teacher->othernames }}</option>
									@endforeach
						        </select>

						        @if ($errors->has('teacher_id'))
						            <span class="help-block">
						                <strong>{{ $errors->first('sssteacher_id') }}</strong>
						            </span>
						        @endif 
						    </div>
						</div>

						<div class="form-group{{ $errors->has('level_id') ? ' has-error' : '' }}">
						    <label for="st_level_id" class="col-md-4 control-label">Class</label>

						    <div class="col-md-6">
						        <select name="level_id" id="st_level_id" required autofocus class="form-control">
									@foreach ($classes as $class)
										<option value="{{ $class->id }}">{{ $class->name.' '.$class->tag }}</option>
									@endforeach
						        </select>

						        @if ($errors->has('level_id'))
						            <span class="help-block">
						                <strong>{{ $errors->first('level_id') }}</strong>
						            </span>
						        @endif 
						    </div>
						</div>

						<div class="form-group{{ $errors->has('subject_id') ? ' has-error' : '' }}">
						    <label for="st_subject_id" class="col-md-4 control-label">Subject</label>

						    <div class="col-md-6">
						        <select name="subject_id" id="st_subject_id" required autofocus class="form-control">
									@foreach ($courses as $course)
										<option value="{{ $course->id }}">{{ $course->name.' ('.$course->code }})</option>
									@endforeach
						        </select>

						        @if ($errors->has('subject_id'))
						            <span class="help-block">
						                <strong>{{ $errors->first('subject_id') }}</strong>
						            </span>
						        @endif 
						    </div>
						</div>

						<div class="form-group{{ $errors->has('year_group_id') ? ' has-error' : '' }}">
						    <label for="st_year_group_id" class="col-md-4 control-label">Academic Session</label>

						    <div class="col-md-6">
						        <select name="year_group_id" id="st_year_group_id" required autofocus class="form-control">
									@foreach ($yeargroups as $session)
										<option value="{{ $session->id }}">{{ $session->name}}</option>
									@endforeach
						        </select>

						        @if ($errors->has('year_group_id'))
						            <span class="help-block">
						                <strong>{{ $errors->first('year_group_id') }}</strong>
						            </span>
						        @endif 
						    </div>
						</div>

						<div class="form-group{{ $errors->has('term_id') ? ' has-error' : '' }}">
						    <label for="st_term_id" class="col-md-4 control-label">Term</label>

						    <div class="col-md-6">
						        <select name="term_id" id="st_term_id" required autofocus class="form-control">
									@foreach ($termx as $term)
										<option value="{{ $term->id }}">{{ $term->name}} Term</option>
									@endforeach
						        </select>

						        @if ($errors->has('term_id'))
						            <span class="help-block">
						                <strong>{{ $errors->first('term_id') }}</strong>
						            </span>
						        @endif 
						    </div>
						</div>

					                  
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="createST">Save Allocation</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveSTChanges">Save Changes</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
			</div>
		</div>
	</div>


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
				
				$('#modalAddST').on('show.bs.modal', function (event) {

				  var button = $(event.relatedTarget) 
				  var id = button.data('id') 
				  $('#stId').val(id);
				  // $('#FormAddEmp').reset();
				});

				$(document).on('click', '#confirm-delete', function(event) {

					event.preventDefault();
					var id = $('#id').val();
					var url = '{{ route('subjectTeachers.destroy', @id) }}';
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
										text: 'Allocation Record Deleted Successfully...',
										type: 'success'
									});
					});
				});

				$(document).on('click', '#editST', function(event) {

					event.preventDefault();
					var id = $('#stId').val();
					var url = '{{ route('subjectTeachers.edit', @id) }}';
					url = url.replace('id', id);

					{{-- hiding buttons --}}
					$('#myModalLabelST').text('Edit Allocation Record');
					$('#createST').hide('400');
					$('#saveSTChanges').show('400');
					
					$.get(url, function(data) {
						// console.log(data);
						$('#st_teacher_id').val(data.teacher_id);
						$('#st_subject_id').val(data.subject_id);
						$('#st_level_id').val(data.level_id);
						$('#st_year_group_id').val(data.year_group_id);
						$('#st_term_id').val(data.term_id);
					});
				});

				$(document).on('click', '#addST', function(event) {

					$('#createST').show('400');
					$('#saveSTChanges').hide('400');

					$('#FormAddST').trigger('reset');
					$('#myModalLabelST').text('Add New Allocation');
				});

				$(document).on('click', '#saveSTChanges', function(event) {

					event.preventDefault();
					var id = $('#stId').val();
					var teacher_id = $('#st_teacher_id').val();
					var subject_id = $('#st_subject_id').val();
					var level_id = $('#st_level_id').val();
					var year_group_id = $('#st_year_group_id').val();
					var term_id = $('#st_term_id').val();
					
		      		var url = '{{ route('subjectTeachers.update', @id) }}';
		      		url = url.replace('id', id);

		      		$.ajaxSetup({
		      		    headers: {
		      		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      		    }
		      		});
		      		$.post(url, {
		      			'id': id, 
		      			'teacher_id': teacher_id,
		      			'subject_id': subject_id,
		      			'level_id': level_id,
		      			'year_group_id': year_group_id,
		      			'term_id': term_id,
		      			'_method': 'put', 
		      			'_token': $('input[name=_token]').val()
		      		}, function(data) {
		      			$('#datatable-tabletools').load(location.href + ' #datatable-tabletools');
		      				console.log(data);
		      				new PNotify({
		      							title: 'Alert!',
		      							text: 'Allocation Record Updated Successfully...',
		      							type: 'success'
		      						});
		      		});
				});
			});
		</script>
@endsection
