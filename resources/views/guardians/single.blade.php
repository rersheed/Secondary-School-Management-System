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

@section('title', 'Shabab Student Guardian')

@section('content')
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Guardian Information</h2>
		
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Guardian</span></li>
					<li><span>Info</span></li>
				</ol>
		
				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
		
		<section class="panel panel-featured panel-featured-dark">
			<header class="panel-heading">
				<h2 class="panel-title center">List of Students Under {{ $guardian->surname.' '.$guardian->othernames }}</h2> 
			</header>
			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable">
				    <thead>
				        <tr>
				            <th>S/N</th>
				            <th>Surname</th>
				            <th>Othernames</th>
				            <th>Gender</th>
				            <th>Phone Number</th>
				            <th>Current Class</th>
				        </tr>
				    </thead>
				    <tfoot>
				        <tr>
				            <th>S/N</th>
				            <th>Surname</th>
				            <th>Othernames</th>
				            <th>Gender</th>
				            <th>Phone Number</th>
				            <th>Current Class</th>
				        </tr>
				    </tfoot>
				    <tbody>
				    	@forelse ($students as $student)
					    	<tr>
					            <td>{{ $loop->index + 1 }}</td>
					            <td>{{ $student->surname }}</td>
					            <td>{{ $student->othernames }}</td>
					            <td>{{ $student->sex == 1 ? 'Male': 'Female' }}</td>
					            <td>{{ $student->phone }}</td>
					            <td>{{ $currentClasses[$student->id] }}</td>
					        </tr>
					        @empty
					        <tr><td>No Students Found</td></tr>
				    	@endforelse
				    </tbody>
			</div>
		</section>
	</section>

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
			});
		</script>
@endsection
