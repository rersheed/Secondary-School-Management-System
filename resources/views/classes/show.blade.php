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

@section('title', 'Shabab Classes')

@section('content')
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>All Classes</h2>
		
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Classes</span></li>
					<li><span>All</span></li>
				</ol>
		
				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
		<section class="panel panel-transparent">
			<div class="panel-body">
				<div class="pull-right">
					<button id="AddClass" type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAddClass">
						<i class="fa fa-user-plus text-dark"></i>
						Class
					</button>
				</div>
		</div>
	</section>
		<section class="panel panel-featured panel-featured-dark">
			<header class="panel-heading">
		
				<h2 class="panel-title">All Classes</h2>

			</header>
			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
					<thead>
						<tr>
							<th>S/N</th>
							<th>Class Names</th>
							<th>Class Tags</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>S/N</th>
							<th>Class Names</th>
							<th>Class Tags</th>
							<th>Actions</th>
						</tr>
					</tfoot>
					<tbody id="shopList">
						@foreach ($levels as $level)
						<tr class="gradeX">
							<td>{{ $loop->index + 1 }}</td>
							<td>{{ strtoupper($level->name) }}</td>
							<td>{{ strtoupper($level->tag) }}</td>
							<td>
								
								<a class="btn-warning btn-xs" href="" data-toggle="modal" data-target="#modalAddClass" id="editClass" data-id="{{ $level->id }}">
									<i class="fa fa-edit"></i>
								</a>
								
								&nbsp;
								<a class="btn-danger btn-xs" href="#modalAnim" id="deleteClass" data-toggle="modal" data-id="{{ $level->id }}">
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

@include('Classes.modals');

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
				
				$('#modalAddClass').on('show.bs.modal', function (event) {
				  var button = $(event.relatedTarget) 
				  var id = button.data('id') 
				  $('#classId').val(id);
				  // $('#FormAddEmp').reset();
				});

				$(document).on('click', '#confirm-delete', function(event) {
					event.preventDefault();
					var id = $('#id').val();
					var url = '{{ route('levels.destroy', @id) }}';
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
										text: 'Class Record Deleted Successfully...',
										type: 'success'
									});
					});

				});

				$(document).on('click', '#editClass', function(event) {
					event.preventDefault();
					var id = $('#classId').val();
					var url = '{{ route('levels.edit', @id) }}';
					url = url.replace('id', id);

					{{-- hiding buttons --}}
					$('#myModalLabelClass').text('Edit Class Record');
					$('#createClass').hide('400');
					$('#saveChanges').show('400');
					
					$.get(url, function(data) {
						 console.log(data);
						$('#className').val(data.name);
						$('#classTag').val(data.tag);
					});
				});

				$(document).on('click', '#AddClass', function(event) {
					$('#createClass').show('400');
					$('#saveChanges').hide('400');

					$('#FormAddClass').trigger('reset');
					$('#myModalLabelClass').text('Add New Class');
				});

				$(document).on('click', '#saveChanges', function(event) {
					event.preventDefault();
					var id = $('#classId').val();
					var name = $('#className').val();
					var tag = $('#classTag').val();
		      		var url = '{{ route('levels.update', @id) }}';
		      		url = url.replace('id', id);

		      		$.ajaxSetup({
		      		    headers: {
		      		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      		    }
		      		});
		      		$.post(url, {
		      			'id': id, 
		      			'name': name,
		      			'tag': tag,
		      			'_method': 'put', 
		      			'_token': $('input[name=_token]').val()
		      		}, function(data) {
		      			$('#datatable-tabletools').load(location.href + ' #datatable-tabletools');
		      				console.log(data);
		      				new PNotify({
		      							title: 'Alert!',
		      							text: 'Class Record Updated Successfully...',
		      							type: 'success'
		      						});
		      		});
				});

				
			});
			
		</script>
@endsection
