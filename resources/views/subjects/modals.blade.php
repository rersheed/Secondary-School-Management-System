<div class="modal fade" id="modalAnim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
			</div>
			<div class="modal-body">
				 <p>Are you sure that you want to remove this Subject's record?</p>
				 <input type="hidden" id="id" value="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm-delete">Confirm</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalAddSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabelSubject" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabelSubject">Add New Subject</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-bordered" method="post" id="FormAddSubject" action="{{ route('subjects.store') }}">
					
					{{ csrf_field() }}

					<input type="hidden" id="subjectId">

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					    <label for="name" class="col-md-4 control-label">Subject Title</label>

					    <div class="col-md-6">
					        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="e.g. Nahwu JIS1">

					        @if ($errors->has('name'))
					            <span class="help-block">
					                <strong>{{ $errors->first('name') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
					    <label for="code" class="col-md-4 control-label">Subject Code</label>

					    <div class="col-md-6">
					        <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus placeholder="e.g. NHW 101">

					        @if ($errors->has('code'))
					            <span class="help-block">
					                <strong>{{ $errors->first('code') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>

					<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
					    <label for="description" class="col-md-4 control-label">Description</label>

					    <div class="col-md-6">
					        <textarea name="description" class="form-control" id="description" rows="3" placeholder="e.g. Nahwu for JIS1 first term">{{ old('description') }}</textarea>

					        @if ($errors->has('description'))
					            <span class="help-block">
					                <strong>{{ $errors->first('description') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>            
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="createSubject">Create Subject</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveChanges">Save Changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
		</div>
	</div>
</div>