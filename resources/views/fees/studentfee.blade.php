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
			<h2>All Fees Payment</h2>
		
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Fees</span></li>
					<li><span>Payment</span></li>
				</ol>
		
				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
		@include('includes.errorSuccess');
		<section class="panel panel-transparent">
			<div class="panel-body">
				<div class="pull-right">
					<button id="addPayFee" type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAddPayFee">
						<i class="fa fa-plus text-dark"></i>
						Pay Fee
					</button>	
				</div>
			</div>
		</section>
		<section class="panel panel-featured panel-featured-dark">
			<header class="panel-heading">
		
				<h2 class="panel-title">Fees Payments</h2>

			</header>
			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
					<thead>
						<tr>
							<th>S/N</th>
							<th>Reg Number</th>
							<th>Full Name</th>
							<th>Payment Type</th>
							<th>Amount</th>
							<th>Date Paid</th>
							<th>Session</th>
							<th>Term</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>S/N</th>
							<th>Reg Number</th>
							<th>Full Name</th>
							<th>Payment Type</th>
							<th>Amount</th>
							<th>Date Paid</th>
							<th>Session</th>
							<th>Term</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody id="shopList">
						@foreach ($payments as $payment)
						<tr class="gradeX">
							<td>{{ $loop->index + 1 }}</td>
							<td>{{ $students->find($payment->student_id)->regNumber }}</td>
							<td>{{ $students->find($payment->student_id)->surname .' '.$students->find($payment->student_id)->othernames }}</td>
							<td>{{ $feetypes[$tuitionfees->find($payment->tuition_fee_id)->fee_type_id] }}</td>
							<td>{{ number_format($payment->amount) }}</td>
							<td>{{ $payment->created_at }}</td>
							<td>{{ $sesions[$tuitionfees->find($payment->tuition_fee_id)->year_group_id] }}</td>
							<td>{{ $terms[$tuitionfees->find($payment->tuition_fee_id)->term_id] }}</td>
							<td>
								<a class="btn-warning btn-xs" href="" data-toggle="modal" data-target="#modalAddPayFee" id="editPayFee" data-id="{{ $payment->id }}">
									<i class="fa fa-edit"></i>
								</a>

							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</section>
	</section>

{{-- Modal --}}
<div class="modal fade" id="modalAddPayFee" tabindex="-1" role="dialog" aria-labelledby="myModalLabelPayFee" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabelPayFee">Add New Payment</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-bordered" method="post" id="FormAddPayFee" action="{{ route('payments.store') }}">
					
					{{ csrf_field() }}

					<input type="hidden" id="payfeeId" />

					<div class="form-group{{ $errors->has('tuition_fee_id') ? ' has-error' : '' }}">
					    <label for="tuition_fee_id" class="col-md-4 control-label">Payment Type</label>

					    <div class="col-md-6">
					        <select name="tuition_fee_id" id="tuition_fee_id" class="form-control populate" required autofocus>
					        	@foreach ($tuitionfees as $tuition)
					        		<option value="{{ $tuition->id }}">
					        			<span>
					        				<h2 class="title">{{ $feetypes[$tuition->fee_type_id] }}</h2>
					        				<h5 class="sub-title">({{ $sesions[$tuition->year_group_id] }} - {{ $terms[$tuition->term_id] }})</h5>
					        			</span>
					        		</option>
					        	@endforeach
					        </select>

					        @if ($errors->has('tuition_fee_id'))
					            <span class="help-block">
					                <strong>{{ $errors->first('tuition_fee_id') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					
					<div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
					    <label for="student_id" class="col-md-4 control-label">Student Name</label>

					    <div class="col-md-6">
					        <select name="student_id" id="student_id" class="form-control populate" required autofocus>
					        	@foreach ($students as $student)
					        		<option value="{{ $student->id }}">
					        			<span>
					        				<h2 class="form-control">{{ $student->surname }} {{ $student->othernames }}</h5>
					        				<h5 class="form-control">({{ $student->regNumber }})</h2>
					        			</span>
					        		</option>
					        	@endforeach
					        </select>

					        @if ($errors->has('student_id'))
					            <span class="help-block">
					                <strong>{{ $errors->first('student_id') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>


					<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
					    <label for="amount" class="col-md-4 control-label">Amount Paid</label>

					    <div class="col-md-6">
					        <div class="input-group mb-md">
								<span class="input-group-addon">₦</span>
									<input type="number" class="form-control" name="amount" id="amount">
								<span class="input-group-addon ">.00</span>
							</div>


					        @if ($errors->has('amount'))
					            <span class="help-block">
					                <strong>{{ $errors->first('amount') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

				                  
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="createPayFee">Pay</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="savePChanges">Save Changes</button>
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
		
				$('#modalAddPayFee').on('show.bs.modal', function (event) {
				  var button = $(event.relatedTarget) 
				  var id = button.data('id') 
				  $('#payfeeId').val(id);
				  // $('#FormAddEmp').reset();
				});

				$(document).on('click', '#addPayFee', function(event) {
					event.preventDefault();
					$('#createPayFee').show('400');
					$('#savePChanges').hide('400');

					$('#FormAddPayFee').trigger('reset');
					$('#myModalLabelPayFee').text('Add New Payment Record');
				});

				$(document).on('click', '#editPayFee', function(event) {
					event.preventDefault();
					var id = $('#payfeeId').val();
					var url = '{{ route('payments.edit', @id) }}';
					url = url.replace('id', id);

					{{-- hiding buttons --}}
					$('#myModalLabelPayFee').text('Edit Payment Record');
					$('#createPayFee').hide('400');
					$('#savePChanges').show('400');
					
					$.get(url, function(data) {
						// console.log(data);
						$('#tuition_fee_id').val(data.tuition_fee_id);
						$('#student_id').val(data.student_id);
						$('#amount').val(data.amount);
					});
				});

				$(document).on('click', '#savePChanges', function(event) {
					event.preventDefault();
					var id = $('#payfeeId').val();
					var tuition_fee_id = $('#tuition_fee_id').val();
					var student_id = $('#student_id').val();
					var amount = $('#amount').val();
					
		      		var url = '{{ route('payments.update', @id) }}';
		      		url = url.replace('id', id);

		      		$.ajaxSetup({
		      		    headers: {
		      		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      		    }
		      		});
		      		$.post(url, {
		      			'id': id, 
		      			'tuition_fee_id': tuition_fee_id,
		      			'student_id': student_id,
		      			'amount': amount,
		      			'_method': 'put', 
		      			'_token': $('input[name=_token]').val()
		      		}, function(data) {
		      			$('#datatable-tabletools').load(location.href + ' #datatable-tabletools');
		      				console.log(data);
		      				new PNotify({
		      							title: 'Alert!',
		      							text: 'Payment Record Updated Successfully...',
		      							type: 'success'
		      						});
		      		});
				});
			});
		</script>
@endsection
