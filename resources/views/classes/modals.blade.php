<div class="modal fade" id="modalAnim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
			</div>
			<div class="modal-body">
				 <p>Are you sure that you want to remove this guardian's record?</p>
				 <input type="hidden" id="id" value="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm-delete">Confirm</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalAddClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabelClass" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabelClass">Add New Class</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-bordered" method="post" id="FormAddClass" action="{{ route('levels.store') }}">
					
					{{ csrf_field() }}

					<input type="hidden" id="classId">

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					    <label for="name" class="col-md-4 control-label">Class Name</label>

					    <div class="col-md-6">
					        {{-- <select class="form-control populate" selectTwo  required name="name" id="className">
					        	<option value="">Select Name</option>
					        	<option value="jss1">JSS 1</option>
					        	<option value="jss2">JSS 2</option>
					        	<option value="jss3">JSS 3</option>
					        	<option value="sss1">SSS 1</option>
					        	<option value="sss2">SSS 2</option>
					        	<option value="sss3">SSS 3</option>
					        </select> --}}
					        <input type="text" name="name" id="className" class="form-control" />

					        @if ($errors->has('name'))
					            <span class="help-block">
					                <strong>{{ $errors->first('name') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
					    <label for="tag" class="col-md-4 control-label">Sub Class</label>

					    <div class="col-md-6">
					        <select class="form-control populate" selectTwo name="tag" id="classTag">
					        	<option value="">Select Sub Class</option>
					        	<option value="a">A</option>
					        	<option value="b">B</option>
					        	<option value="c">C</option>
					        	<option value="d">D</option>
					        	<option value="e">E</option>
					        	<option value="f">F</option>
					        </select>

					        @if ($errors->has('tag'))
					            <span class="help-block">
					                <strong>{{ $errors->first('tag') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>
				                  
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="createClass">Create Class</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveChanges" style="display: none;">Save Changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
		</div>
	</div>
</div>