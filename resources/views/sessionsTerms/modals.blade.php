<div class="modal fade" id="modalSessionAnim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
			</div>
			<div class="modal-body">
				 <p>Are you sure that you want to remove this session's record?</p>
				 <input type="hidden" id="session_id" value="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm-delete-session">Confirm</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalAddSession" tabindex="-1" role="dialog" aria-labelledby="myModalLabelSession" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabelSession">Add New Session</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-bordered" method="post" id="FormAddSession" action="{{ route('yeargroups.store') }}">
					
					{{ csrf_field() }}

					<input type="hidden" id="sessionId">

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					    <label for="name" class="col-md-4 control-label">Session Name</label>

					    <div class="col-md-6">
					        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="e.g. 2017/2018">

					        @if ($errors->has('name'))
					            <span class="help-block">
					                <strong>{{ $errors->first('name') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
					    <label for="start_date" class="col-md-4 control-label">Start Date</label>

					    <div class="col-md-6">
					        <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required autofocus placeholder="e.g. 2017/2018">

					        @if ($errors->has('start_date'))
					            <span class="help-block">
					                <strong>{{ $errors->first('start_date') }}</strong>
					            </span>
					        @endif
					    </div>
					</div> 

					<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
					    <label for="end_date" class="col-md-4 control-label">End Date</label>

					    <div class="col-md-6">
					        <input id="end_date" type="date" class="form-control" name="end_date" value="{{ old('term_end_date') }}" required autofocus placeholder="e.g. 2017/2018">

					        @if ($errors->has('end_date'))
					            <span class="help-block">
					                <strong>{{ $errors->first('end_date') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>    
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="createSession">Create Session</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveChanges">Save Changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
		</div>
	</div>
</div>


<div class="modal fade" id="modaTermAnim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
			</div>
			<div class="modal-body">
				 <p>Are you sure that you want to remove this term's record?</p>
				 <input type="hidden" id="term_id" value="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm-delete-term">Confirm</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalAddTerm" tabindex="-1" role="dialog" aria-labelledby="myModalLabelTerm" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabelTerm">Add New Term</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-bordered" method="post" id="FormAddTerm" action="{{ route('terms.store') }}">
					
					{{ csrf_field() }}

					<input type="hidden" id="termId">

					<div class="form-group{{ $errors->has('termName') ? ' has-error' : '' }}">
					    <label for="termName" class="col-md-4 control-label">Term Name</label>

					    <div class="col-md-6">
					        <input id="termName" type="text" class="form-control" name="termName" value="{{ old('termName') }}" required autofocus placeholder="e.g. 1st">

					        @if ($errors->has('termName'))
					            <span class="help-block">
					                <strong>{{ $errors->first('termName') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('sessionName') ? ' has-error' : '' }}">
					    <label for="sessionName" class="col-md-4 control-label">Session Name</label>

					    <div class="col-md-6">
					        <select id="sessionName" data-plugin-selectTwo class="form-control populate" name="sessionName" required autofocus>
					        	@foreach ($yeargroups as $yeargroup)
					        		<option value="{{ $yeargroup->id }}">{{ $yeargroup->name }}</option>
					        	@endforeach
					        </select>
					        @if ($errors->has('sessionName'))
					            <span class="help-block">
					                <strong>{{ $errors->first('sessionName') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('term_start_date') ? ' has-error' : '' }}">
					    <label for="term_start_date" class="col-md-4 control-label">Start Date</label>

					    <div class="col-md-6">
					        <input id="term_start_date" type="date" class="form-control" name="term_start_date" value="{{ old('term_start_date') }}" required autofocus placeholder="e.g. 2017/2018">

					        @if ($errors->has('term_start_date'))
					            <span class="help-block">
					                <strong>{{ $errors->first('term_start_date') }}</strong>
					            </span>
					        @endif
					    </div>
					</div> 

					<div class="form-group{{ $errors->has('term_end_date') ? ' has-error' : '' }}">
					    <label for="term_end_date" class="col-md-4 control-label">End Date</label>

					    <div class="col-md-6">
					        <input id="term_end_date" type="date" class="form-control" name="term_end_date" value="{{ old('term_end_date') }}" required autofocus placeholder="e.g. 2017/2018">

					        @if ($errors->has('term_end_date'))
					            <span class="help-block">
					                <strong>{{ $errors->first('term_end_date') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>    
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="createTerm">Create Term</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveTermChanges">Save Changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
		</div>
	</div>
</div>