@extends('masters.master')

@section('css')
	<meta name="csrf-token" content="{{ csrf_token()}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/magnific-popup.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/pnotify/pnotify.custom.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/stylesheets/theme.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">
	<script src="{{asset('assets/vendor/modernizr/modernizr.js')}}"></script>
@endsection

@section('title', 'Shabab Sessions & Terms')

@section('content')
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Sessions &amp; Terms</h2>
		
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>School</span></li>
					<li><span>Sessions</span></li>
				</ol>
		
				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>

		{{-- start: page --}}
		<div class="row">
			{{-- categories table col --}}
			<div class="col-sm-6">

				{{-- Controls Panel --}}
				<section class="panel panel-transparent">
					<div class="panel-body">
						<div class="pull-right">
							<button id="addSession" type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAddSession">
								<i class="fa fa-plus"></i>
								Session
							</button>
						</div>
					</div>
				</section>
				{{-- End Controls Panel --}}

				<section class="panel panel-featured panel-featured-dark">
					<header class="panel-heading">
						<h2 class="panel-title">Sessions</h2>
						<p class="panel-subtitle">List of all Sessions</p>
					</header>
					<div class="panel-body">
						<table class="table table-bordered table-striped mb-none" id="datatable-tabletool" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
							<thead>
								<tr>
									<th>S/No</th>
									<th>Name</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>S/No</th>
									<th>Name</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Actions</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach ($yeargroups as $yeargroup)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td>{{ $yeargroup->name }}</td>
										<td>{{ $yeargroup->start_date }}</td>
										<td>{{ $yeargroup->end_date }}</td>
										<td>
											<a class="btn-warning btn-xs" href="" data-target="#modalAddSession" data-toggle="modal"  id="editSession" data-id="{{ $yeargroup->id }}">
												<i class="fa fa-edit"></i>
											</a>
											
											&nbsp;
											<a class="btn-danger btn-xs" href="" data-target="#modalSessionAnim" href="" id="deleteSession" data-toggle="modal" data-id="{{ $yeargroup->id }}">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</section>
			</div>
			{{-- end: categories table col --}}

			{{-- brands table col --}}
			<div class="col-sm-6">

				{{-- Controls Panel --}}
				<section class="panel panel-transparent">
					<div class="panel-body">
						<div class="pull-right">
							<button id="addTerm" type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAddTerm">
								<i class="fa fa-plus"></i>
								Term
							</button>
						</div>
					</div>
				</section>
				{{-- End Controls Panel --}}

				<section class="panel panel-featured panel-featured-dark">
					<header class="panel-heading">
						<h2 class="panel-title">Terms</h2>
						<p class="panel-subtitle">List of all Terms</p>
					</header>
					<div class="panel-body">
						<table class="table table-bordered table-striped mb-none" id="datatable-default" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
							<thead>
								<tr>
									<th>Name</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Sessions</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Name</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Sessions</th>
									<th>Actions</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach ($terms as $term)	
									<tr>
										<td>{{ $term->name }}</td>
										<td>{{ $term->start_date }}</td>
										<td>{{ $term->end_date }}</td>
										<td>{{ $sesions[$term->year_group_id] }}</td>
										<td>
											<a class="btn-warning btn-xs" href="" data-toggle="modal" data-target="#modalAddTerm" id="editTerm" data-id="{{ $term->id }}">
												<i class="fa fa-edit"></i>
											</a>
											
											&nbsp;
											<a class="btn-danger btn-xs" href="" id="deleteTerm" data-target="#modaTermAnim" data-toggle="modal" data-id="{{ $term->id }}">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>	
								@endforeach
							</tbody>
						</table>
					</div>
				</section>
			</div>
			{{-- end: brands table col --}}
		</div>
	</section>
@endsection
@include('sessionsTerms.modals')

@section('js')
{{-- Javascript Files --}}
	<!-- Vendor -->
	<script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
	
	<!-- Specific Page Vendor -->
	<script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
	<script src="{{asset('assets/vendor/pnotify/pnotify.custom.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
	
	<!-- Theme Base, Components and Settings -->
	<script src="{{asset('assets/javascripts/theme.js')}}"></script>
	
	<!-- Theme Custom -->
	<script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>
	
	<!-- Theme Initialization Files -->
	<script src="{{asset('assets/javascripts/theme.init.js')}}"></script>

	<!-- Examples -->
	<script src="{{asset('assets/javascripts/ui-elements/examples.modals.js')}}"></script>
	<script src="{{asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>
	<script src="{{asset('assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
	<script src="{{asset('assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#modalSessionAnim').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) 
			  var id = button.data('id') 
			  $('#session_id').val(id);
			});
			
			$('#modalAddSession').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) 
			  var id = button.data('id') 
			  $('#sessionId').val(id);
			});

			$(document).on('click', '#addSession', function(event) {
				event.preventDefault();
				$('#createSession').show('400');
				$('#FormAddSession').trigger('reset')
				$('#saveChanges').hide('400');
				$('#myModalLabelSession').text('Create New Session');
			});

			$(document).on('click', '#editSession', function(event) {
				event.preventDefault();
				$('#createSession').hide('400');
				$('#saveChanges').show('400');
				$('#myModalLabelSession').text('Edit Session Record');

				var id = $('#sessionId').val();
				var url = '{{ route('yeargroups.edit', @id) }}';
				url = url.replace('id', id);

				$.get(url, function(data) {
					$('#name').val(data.name);
					$('#start_date').val(data.start_date);
					$('#end_date').val(data.end_date);
				});
			});

			$(document).on('click', '#confirm-delete-session', function(event) {
				event.preventDefault();
				var id = $('#session_id').val();

				var url = '{{ route('yeargroups.destroy', @id) }}';
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
					$('#datatable-tabletool').load(location.href + ' #datatable-tabletool');
				});
			});

			$(document).on('click', '#saveChanges', function(event) {
				// session update
				event.preventDefault();
				var id = $('#sessionId').val();
				var url = '{{ route('yeargroups.update', @id) }}';
				url = url.replace('id', id);

				var name = $('#name').val();
				var start_date = $('#start_date').val();
				var end_date = $('#end_date').val();

				if (name != "" && start_date != "" && end_date != "") {
					$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});
					$.post(url, {
						'name': name,
						'start_date': start_date,
						'end_date': end_date,
						'_method': 'put', 
						'_token': $('input[name=_token]').val()
					}, function(data) {
						console.log(data);
						$('#datatable-tabletool').load(location.href + ' #datatable-tabletool');
					});
				}
			});
/*===================================================================================*/
//			END OF SESSIONS			
/*================================== TERMS BEGINNING ================================*/

		$('#modaTermAnim').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) 
			  var id = button.data('id') 
			  $('#term_id').val(id);
			});
			
			$('#modalAddTerm').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) 
			  var id = button.data('id') 
			  $('#termId').val(id);
			});

			$(document).on('click', '#addTerm', function(event) {
				event.preventDefault();
				$('#FormAddTerm').trigger('reset')
				$('#createTerm').show('400');
				$('#saveTermChanges').hide('400');
				$('#myModalLabelTerm').text('Create New Term');
			});

			$(document).on('click', '#editTerm', function(event) {
				event.preventDefault();
				$('#createTerm').hide('400');
				$('#saveTermChanges').show('400');
				$('#myModalLabelTerm').text('Edit Term Record');

				var id = $('#termId').val();
				var url = '{{ route('terms.edit', @id) }}';
				url = url.replace('id', id);

				$.get(url, function(data) {
					$('#termName').val(data.name);
					$('#sessionName').val(data.year_group_id);
					$('#term_start_date').val(data.start_date);
					$('#term_end_date').val(data.end_date);
				});
			});

			$(document).on('click', '#confirm-delete-term', function(event) {
				event.preventDefault();
				var id = $('#term_id').val();

				var url = '{{ route('terms.destroy', @id) }}';
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
					$('#datatable-default').load(location.href + ' #datatable-default');
				});
			});

			$(document).on('click', '#saveTermChanges', function(event) {
				// session update
				event.preventDefault();
				var id = $('#termId').val();
				var url = '{{ route('terms.update', @id) }}';
				url = url.replace('id', id);

				var name = $('#termName').val();
				var sessionName = $('#sessionName').val();
				var start_date = $('#term_start_date').val();
				var end_date = $('#term_end_date').val();

				if (name != "" && start_date != "" && end_date != "") {
					$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});
					$.post(url, {
						'name': name,
						'year_group_id': sessionName,
						'start_date': start_date,
						'end_date': end_date,
						'_method': 'put', 
						'_token': $('input[name=_token]').val()
					}, function(data) {
						console.log(data);
						$('#datatable-default').load(location.href + ' #datatable-default');
					});
				}
			});
		});
	</script>
@endsection
