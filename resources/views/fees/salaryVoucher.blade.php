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

@section('title', 'Shabab Create Fees')

@section('content')
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Create Voucher</h2>
		
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Voucher</span></li>
					<li><span>Create</span></li>
				</ol>
		
				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>

		{{-- start: page --}}
		<div class="row">
			
			<div class="col-sm-4">

				{{-- Controls Panel --}}
				<section class="panel panel-transparent">
					<div class="panel-body">
						<div class="pull-right">
							<button id="addFeeType" type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAddFeeType">
								<i class="fa fa-plus"></i>
								Voucher
							</button>
						</div>
					</div>
				</section>
				{{-- End Controls Panel 
					Single Voucher (for each)
					the voucher for all
					--}}

				<section class="panel panel-featured panel-featured-dark">
					<header class="panel-heading">
						<h2 class="panel-title">Fee Types</h2>
						<p class="panel-subtitle">List of All Types of Fees</p>
					</header>
					<div class="panel-body">
						<table class="table table-bordered table-striped mb-none" id="datatable-default" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
							<thead>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>Actions</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach ($feetypes as $feetype)	
									<tr>
										<td>{{ $feetype->name }}</td>
										<td>{{ $feetype->description }}</td>
										<td>
											<a class="btn-warning btn-xs" href="" data-toggle="modal" data-target="#modalAddFeeType" id="editFeeType" data-id="{{ $feetype->id }}">
												<i class="fa fa-edit"></i>
											</a>
											
											&nbsp;
											<a class="btn-danger btn-xs" href="" id="deleteFeeType" data-target="#modalAnim" data-toggle="modal" data-id="{{ $feetype->id }}">
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

			<div class="col-sm-8">

				{{-- Controls Panel --}}
				<section class="panel panel-transparent">
					<div class="panel-body">
						<div class="pull-right">
							<button id="addFee" type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAddFee">
								<i class="fa fa-plus"></i>
								Set Fee
							</button>
						</div>
					</div>
				</section>
				{{-- End Controls Panel --}}

				<section class="panel panel-featured panel-featured-dark">
					<header class="panel-heading">
						<h2 class="panel-title">Fees</h2>
						<p class="panel-subtitle">List of all Fees</p>
					</header>
					<div class="panel-body">
						<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
							<thead>
								<tr>
									<th>Name</th>
									<th>Amount (₦)</th>
									<th>Session</th>
									<th>Term</th>
									<th>Payment Start Date</th>
									<th>Payment End Date</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Name</th>
									<th>Amount (₦)</th>
									<th>Session</th>
									<th>Term</th>
									<th>Payment Start Date</th>
									<th>Payment End Date</th>
									<th>Actions</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach ($fees as $fee)
									<tr>
										<td>{{ $feestype[$fee->fee_type_id] }}</td>
										<td>{{ $fee->amount }}</td>
										<td>{{ $sesions[$fee->year_group_id] }}</td>
										<td>{{ $termx[$fee->term_id] }}</td>
										<td>{{ $fee->start_date }}</td>
										<td>{{ $fee->end_date }}</td>
										<td>
											<a class="btn-warning btn-xs" href="" data-target="#modalAddFee" data-toggle="modal"  id="editFee" data-id="{{ $fee->id }}">
												<i class="fa fa-edit"></i>
											</a>
											
											&nbsp;
											<a class="btn-danger btn-xs" href="" data-target="#modalAnim" href="" id="deleteFee" data-toggle="modal" data-id="{{ $fee->id }}">
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
		</div>
	</section>


{{-- MODALS --}}
<div class="modal fade" id="modalAnim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
			</div>
			<div class="modal-body">
				 <p>Are you sure that you want to remove this record?</p>
				 <input type="hidden" id="id" value="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm-delete-fee_type">Confirm</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm-delete-fee">Confirm</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


{{-- add fee Type --}}
<div class="modal fade" id="modalAddFeeType" tabindex="-1" role="dialog" aria-labelledby="myModalLabelFeeType" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabelFeeType">Add New Fee Type</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-bordered" method="post" id="FormAddFeeType" action="{{ route('feetypes.store') }}">
					
					{{ csrf_field() }}

					<input type="hidden" id="feetypeId">

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					    <label for="name" class="col-md-4 control-label">Fee Name</label>

					    <div class="col-md-6">
					        <input type="text" name="name" id="name" required autofocus class="form-control">

					        @if ($errors->has('name'))
					            <span class="help-block">
					                <strong>{{ $errors->first('name') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>

					<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
					    <label for="description" class="col-md-4 control-label">Description</label>

					    <div class="col-md-6">
					        <input type="text" name="description" id="description" required autofocus class="form-control">

					        @if ($errors->has('description'))
					            <span class="help-block">
					                <strong>{{ $errors->first('description') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>   
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="createFeeType">Save Record</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveFeeTypeChanges">Save Changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
		</div>
	</div>
</div>

{{-- add fee --}}
<div class="modal fade" id="modalAddFee" tabindex="-1" role="dialog" aria-labelledby="myModalLabelFee" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabelFee">Add New Fee Type</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-bordered" method="post" id="FormAddFee" action="{{ route('fees.store') }}">
					
					{{ csrf_field() }}

					<input type="hidden" id="feeId">

					<div class="form-group{{ $errors->has('fee_type_id') ? ' has-error' : '' }}">
					    <label for="fee_type_id" class="col-md-4 control-label">Fee Name</label>

					    <div class="col-md-6">
					        <select name="fee_type_id" id="fee_type_id" required autofocus class="form-control">
								@foreach ($feetypes as $feetype)
									<option value="{{ $feetype->id }}">{{ $feetype->name}}</option>
								@endforeach
					        </select>

					        @if ($errors->has('fee_type_id'))
					            <span class="help-block">
					                <strong>{{ $errors->first('fee_type_id') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>

					<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
					    <label for="amount" class="col-md-4 control-label">Amount</label>

					    <div class="col-md-6">
					        <input type="number" name="amount" id="amount" required autofocus class="form-control">

					        @if ($errors->has('amount'))
					            <span class="help-block">
					                <strong>{{ $errors->first('amount') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>  

					<div class="form-group{{ $errors->has('year_group_id') ? ' has-error' : '' }}">
					    <label for="year_group_id" class="col-md-4 control-label">Session</label>

					    <div class="col-md-6">
					        <select name="year_group_id" id="year_group_id" required autofocus class="form-control">
								@foreach ($yeargroups as $yeargroup)
									<option value="{{ $yeargroup->id }}">{{ $yeargroup->name}}</option>
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
					    <label for="term_id" class="col-md-4 control-label">Term</label>

					    <div class="col-md-6">
					        <select name="term_id" id="term_id" required autofocus class="form-control">
								@foreach ($terms as $term)
									<option value="{{ $term->id }}">{{ $term->name}}</option>
								@endforeach
					        </select>

					        @if ($errors->has('term_id'))
					            <span class="help-block">
					                <strong>{{ $errors->first('term_id') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>

					<div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
					    <label for="start_date" class="col-md-4 control-label">Payment Start Date</label>

					    <div class="col-md-6">
					        <input type="date" name="start_date" id="start_date" required autofocus class="form-control">
					        

					        @if ($errors->has('start_date'))
					            <span class="help-block">
					                <strong>{{ $errors->first('start_date') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>

					<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
					    <label for="end_date" class="col-md-4 control-label">Payment End Date</label>

					    <div class="col-md-6">
					        <input type="date" name="end_date" id="end_date" required autofocus class="form-control">
					       
					        @if ($errors->has('end_date'))
					            <span class="help-block">
					                <strong>{{ $errors->first('end_date') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div> 
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="createFee">Save Record</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveFeeChanges">Save Changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
		</div>
	</div>
</div>
@endsection

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
			$('#modalAnim').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) 
			  var id = button.data('id') 
			  $('#id').val(id);

			});
			
			$('#modalAddFee').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) 
			  var id = button.data('id') 
			  $('#feeId').val(id);
			  console.log(id)
			});

			$('#modalAddFeeType').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) 
			  var id = button.data('id') 
			  $('#feetypeId').val(id);
			});

			$(document).on('click', '#deleteFee', function(event) {
				event.preventDefault();
				$('#confirm-delete-fee').show('400');
				$('#confirm-delete-fee_type').hide('400');
			});

			$(document).on('click', '#deleteFeeType', function(event) {
				event.preventDefault();
				$('#confirm-delete-fee').hide('400');
				$('#confirm-delete-fee_type').show('400');


			});

			$(document).on('click', '#addFee', function(event) {
				event.preventDefault();
				$('#createFee').show('400');
				$('#FormAddFee').trigger('reset')
				$('#saveFeeChanges').hide('400');
				$('#myModalLabelFee').text('Create New Fee');
			});

			$(document).on('click', '#addFeeType', function(event) {
				event.preventDefault();
				$('#createFeeType').show('400');
				$('#FormAddFeeType').trigger('reset')
				$('#saveFeeTypeChanges').hide('400');
				$('#myModalLabelFeeType').text('Create New Fee Type');
			});

			$(document).on('click', '#editFeeType', function(event) {
				event.preventDefault();
				$('#createFeeType').hide('400');
				$('#saveFeeTypeChanges').show('400');
				$('#myModalLabelFeeType').text('Edit Fee Type Record');

				var id = $('#feetypeId').val();
				var url = '{{ route('feetypes.edit', @id) }}';
				url = url.replace('id', id);

				console.log(url)

				$.get(url, function(data) {
					$('#name').val(data.name);
					$('#description').val(data.description);
				});
			});

			$(document).on('click', '#editFee', function(event) {
				event.preventDefault();
				$('#createFee').hide('400');
				$('#saveFeeChanges').show('400');
				$('#myModalLabelFee').text('Edit Fee Record');

				var id = $('#feeId').val();
				var url = '{{ route('fees.edit', @id) }}';
				url = url.replace('id', id);

				console.log(id)

				$.get(url, function(data) {
					$('#fee_type_id').val(data.fee_type_id);
					$('#amount').val(data.amount);
					$('#year_group_id').val(data.year_group_id);
					$('#term_id').val(data.term_id);
					$('#start_date').val(data.start_date);
					$('#end_date').val(data.end_date);
				});
			});

			$(document).on('click', '#confirm-delete-fee_type', function(event) {
				event.preventDefault();
				var id = $('#id').val();

				var url = '{{ route('feetypes.destroy', @id) }}';
				url = url.replace('id', id);
				console.log(id)

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

			$(document).on('click', '#confirm-delete-fee', function(event) {
				event.preventDefault();
				var id = $('#id').val();

				var url = '{{ route('fees.destroy', @id) }}';
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
				});
			});

			$(document).on('click', '#saveFeeTypeChanges', function(event) {
				// session update
				event.preventDefault();
				var id = $('#feetypeId').val();
				var url = '{{ route('feetypes.update', @id) }}';
				url = url.replace('id', id);

				var name = $('#name').val();
				var description = $('#description').val();

				if (name != "" && description != "" ) {
					$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});
					$.post(url, {
						'name': name,
						'description': description,
						'_method': 'put', 
						'_token': $('input[name=_token]').val()
					}, function(data) {
						console.log(data);
						$('#datatable-default').load(location.href + ' #datatable-default');
					});
				}
			});
		
			$(document).on('click', '#saveFeeChanges', function(event) {
				// session update
				event.preventDefault();
				var id = $('#feeId').val();
				var url = '{{ route('fees.update', @id) }}';
				url = url.replace('id', id);

				var fee_type_id = $('#fee_type_id').val();
				var amount = $('#amount').val();
				var year_group_id = $('#year_group_id').val();
				var term_id = $('#term_id').val();
				var start_date = $('#start_date').val();
				var end_date = $('#end_date').val();

				if (
					fee_type_id != "" &&
					amount != "" &&
					year_group_id != "" &&
					term_id != "" &&
					start_date != "" &&
					end_date != "" 
					) {
					$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});
					$.post(url, {
						'id': id,
						'fee_type_id': fee_type_id,
						'amount': amount,
						'year_group_id': year_group_id,
						'term_id': term_id,
						'start_date': start_date,
						'end_date': end_date,
						'_method': 'put', 
						'_token': $('input[name=_token]').val()
					}, function(data) {
						console.log(data);
						$('#datatable-tabletools').load(location.href + ' #datatable-tabletools');
					});
				}
			});
		
		});
	</script>
@endsection
