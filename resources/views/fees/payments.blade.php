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

@section('title', 'Shabab Student Payment')

@section('content')
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>All Fees Payments</h2>
		
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="{{ route('home') }}">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Fees</span></li>
					<li><span>Payments</span></li>
					<li><span>Records</span></li>
				</ol>
		
				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
		@include('includes.errorSuccess');

		<section class="panel panel-featured panel-featured-dark">
			<header class="panel-heading">		
				<h2 class="panel-title">Print Payments Records</h2>
			</header>
			<div class="panel-body">
				<div class="center-block">
					<div class="row">
						<form method="post" action="{{ route('pdf.paymentDetails') }}">
							{{ csrf_field() }}
						<div class="col-lg-3">
							<div class="form-group">
								<label class="col-form-label" for="formGroupExampleInput">Session</label>
								<select name="yeargroup" id="yeargroup" class="form-control" required>
									<option  value=""> Select Session...</option>
									@foreach ($sesions as $sesion)
										<option value="{{ $sesion->id }}">{{ $sesion->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="form-group">
								<label class="col-form-label" for="formGroupExampleInput">Term</label>
								<select name="term" id="term" class="form-control" required>
									<option  value=""> Select Term...</option>
									@foreach ($terms as $term)
										<option value="{{$term->id}}">{{ $term->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="form-group">
								<label class="col-form-label" for="formGroupExampleInput">Class</label>
								<select name="level" id="level" class="form-control" required>
									<option  value=""> Select Class...</option>
									@foreach ($levels as $level)
										<option value="{{$level->id}}">{{ $level->name." ".$level->tag }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="form-group">
								<label class="col-form-label" for="formGroupExampleInput">Payment Type</label>
								<select name="feetype" id="feetype" class="form-control" required>
									<option  value=""> Select Payment Type...</option>
									@foreach ($feetypes as $feetype)
										<option value="{{$feetype->id}}">{{ $feetype->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<br>
								<button type="submit" class="btn btn-default">
									<i class="fa fa-plus text-dark"></i>
									Download Payment
								</button>	
							</div>
						</div>
					</form>
					</div>
				</div>
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
