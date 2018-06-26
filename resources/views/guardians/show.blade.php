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

@section('title', 'Shabab Guradian List')

@section('content')
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>All Guardians</h2>
		
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Guardians</span></li>
					<li><span>All</span></li>
				</ol>
		
				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
		<section class="panel panel-transparent">
			<div class="panel-body">
				<div class="pull-right">
					<button id="addGuardian" type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAddGuardian">
						<i class="fa fa-user-plus text-dark"></i>
						Guradian
					</button>	
				</div>
		</div>
	</section>
		<section class="panel panel-featured panel-featured-dark">
			<header class="panel-heading">
		
				<h2 class="panel-title">All Guardians</h2>

			</header>
			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
					<thead>
						<tr>
							<th>S/N</th>
							<th>Surname</th>
							<th>Othernames</th>
							<th>Phone Number</th>
							<th>Address</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>S/N</th>
							<th>Surname</th>
							<th>Othernames</th>
							<th>Phone Number</th>
							<th>Address</th>
							<th>Actions</th>
						</tr>
					</tfoot>
					<tbody id="shopList">
						@foreach ($guardians as $guardian)
						<tr class="gradeX">
							<td>{{ $loop->index + 1 }}</td>
							<td><a href="{{ route('guardians.show', $guardian->id) }}">{{ $guardian->surname }} </a></td>
							<td>{{ $guardian->othernames }}</td>
							<td>{{ $guardian->phone }}</td>
							<td>{{ $guardian->address }}</td>
							<td>
								
								<a class="btn-warning btn-xs" href="" data-toggle="modal" data-target="#modalAddGuardian" id="editGuardian" data-id="{{ $guardian->id }}">
									<i class="fa fa-edit"></i>
								</a>
								
								&nbsp;
								<a class="btn-danger btn-xs" href="#modalAnim" id="deleteGuardian" data-toggle="modal" data-id="{{ $guardian->id }}">
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

@include('guardians.modals');

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
				
				$('#modalAddGuardian').on('show.bs.modal', function (event) {
				  var button = $(event.relatedTarget) 
				  var id = button.data('id') 
				  $('#guardianId').val(id);
				  // $('#FormAddEmp').reset();
				});

				$(document).on('click', '#confirm-delete', function(event) {
					event.preventDefault();
					var id = $('#id').val();
					var url = '{{ route('guardians.destroy', @id) }}';
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
										text: 'Guardian Record Deleted Successfully...',
										type: 'success'
									});
					});

				});

				$(document).on('click', '#editGuardian', function(event) {
					event.preventDefault();
					var id = $('#guardianId').val();
					var url = '{{ route('guardians.edit', @id) }}';
					url = url.replace('id', id);

					{{-- hiding buttons --}}
					$('#myModalLabelGuardian').text('Edit Guardian Record');
					$('#createGuardian').hide('400');
					$('#saveChanges').show('400');
					
					$.get(url, function(data) {
						// console.log(data);
						$('#surname').val(data.surname);
						$('#othernames').val(data.othernames);
						$('#phone').val(data.phone);
						$('#email').val(data.email);
						$('#countryOfOrigin').val(data.countryOfOrigin);
						$('#stateOfOrigin').val(data.stateOfOrigin);
						$('#lga').val(data.lga);
						$('#address').val(data.address);
					});
				});

				$(document).on('click', '#addGuardian', function(event) {
					$('#createGuardian').show('400');
					$('#saveChanges').hide('400');

					$('#FormAddGuardian').trigger('reset');
					$('#myModalLabelGuardian').text('Add New Guardian Record');
				});

				$(document).on('click', '#saveChanges', function(event) {
					event.preventDefault();
					var id = $('#guardianId').val();
					var surname = $('#surname').val();
					var othernames = $('#othernames').val();
					var phone = $('#phone').val();
					var email = $('#email').val();
					var countryOfOrigin = $('#countryOfOrigin').val();
					var stateOfOrigin = $('#stateOfOrigin').val();
					var lga = $('#lga').val();
					var address = $('#address').val();
					
		      		var url = '{{ route('guardians.update', @id) }}';
		      		url = url.replace('id', id);

		      		$.ajaxSetup({
		      		    headers: {
		      		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      		    }
		      		});
		      		$.post(url, {
		      			'id': id, 
		      			'surname': surname,
		      			'othernames': othernames,
		      			'phone': phone,
		      			'email': email,
		      			'countryOfOrigin': countryOfOrigin,
		      			'stateOfOrigin': stateOfOrigin,
		      			'lga': lga,
		      			'address': address,
		      			'_method': 'put', 
		      			'_token': $('input[name=_token]').val()
		      		}, function(data) {
		      			$('#datatable-tabletools').load(location.href + ' #datatable-tabletools');
		      				console.log(data);
		      				new PNotify({
		      							title: 'Alert!',
		      							text: 'Guardian Record Updated Successfully...',
		      							type: 'success'
		      						});
		      		});
				});
			});
		</script>
@endsection
