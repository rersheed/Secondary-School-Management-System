<div class="modal fade" id="modalAnim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
			</div>
			<div class="modal-body">
				 <p>Are you sure that you want to remove this Teacher's record?</p>
				 <input type="hidden" id="id" value="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm-delete">Confirm</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalAddTeacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabelTeacher" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabelTeacher">Add New Teacher</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-bordered" method="post" id="FormAddTeacher" action="{{ route('teachers.store') }}">
					
					{{ csrf_field() }}

					<input type="hidden" id="teacherId">

					<div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
					    <label for="surname" class="col-md-4 control-label">Surname</label>

					    <div class="col-md-6">
					        <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus placeholder="e.g. Ahmad">

					        @if ($errors->has('surname'))
					            <span class="help-block">
					                <strong>{{ $errors->first('surname') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('othernames') ? ' has-error' : '' }}">
					    <label for="othernames" class="col-md-4 control-label">Other Names</label>

					    <div class="col-md-6">
					        <input id="othernames" type="text" class="form-control" name="othernames" value="{{ old('othernames') }}" required autofocus placeholder="e.g. Haruna">

					        @if ($errors->has('othernames'))
					            <span class="help-block">
					                <strong>{{ $errors->first('othernames') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>

					<div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
					    <label for="sex" class="col-md-4 control-label">Gender</label>

					    <div class="col-md-6">
					        <select name="sex" id="sex" required autofocus class="form-control">
					        	<option value="1">Male</option>
					        	<option value="0">Female</option>
					        </select>

					        @if ($errors->has('sex'))
					            <span class="help-block">
					                <strong>{{ $errors->first('sex') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>

					<div class="form-group{{ $errors->has('dateOfBirth') ? ' has-error' : '' }}">
					    <label for="dateOfBirth" class="col-md-4 control-label">Date of Birth</label>

					    <div class="col-md-6">
					        <input id="dateOfBirth" type="date" class="form-control" name="dateOfBirth" value="{{ old('dateOfBirth') }}" required autofocus placeholder="e.g. 27/11/1992">

					        @if ($errors->has('dateOfBirth'))
					            <span class="help-block">
					                <strong>{{ $errors->first('dateOfBirth') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>


					<div class="form-group{{ $errors->has('placeOfBirth') ? ' has-error' : '' }}">
					    <label for="placeOfBirth" class="col-md-4 control-label">Place of Birth</label>

					    <div class="col-md-6">
					        <input id="placeOfBirth" type="text" class="form-control" name="placeOfBirth" value="{{ old('placeOfBirth') }}" required autofocus placeholder="e.g. Unguwan Dosa">

					        @if ($errors->has('placeOfBirth'))
					            <span class="help-block">
					                <strong>{{ $errors->first('placeOfBirth') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>

					<div class="form-group{{ $errors->has('stateOfOrigin') ? ' has-error' : '' }}">
					    <label for="stateOfOrigin" class="col-md-4 control-label">State of Origin</label>

					    <div class="col-md-6">
					        <input id="stateOfOrigin" type="text" class="form-control" name="stateOfOrigin" value="{{ old('stateOfOrigin') }}" required autofocus placeholder="e.g. Kaduna State">

					        @if ($errors->has('stateOfOrigin'))
					            <span class="help-block">
					                <strong>{{ $errors->first('stateOfOrigin') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>


					<div class="form-group{{ $errors->has('lga') ? ' has-error' : '' }}">
					    <label for="lga" class="col-md-4 control-label">Local Gov't Area</label>

					    <div class="col-md-6">
					        <input id="lga" type="text" class="form-control" name="lga" value="{{ old('lga') }}" required autofocus placeholder="e.g. Kaduna North">

					        @if ($errors->has('lga'))
					            <span class="help-block">
					                <strong>{{ $errors->first('lga') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>
					
					<div class="form-group{{ $errors->has('dateOfHiring') ? ' has-error' : '' }}">
					    <label for="dateOfHiring" class="col-md-4 control-label">Date of Hiring</label>

					    <div class="col-md-6">
					        <input id="dateOfHiring" type="date" class="form-control" name="dateOfHiring" value="{{ old('dateOfHiring') }}" required autofocus placeholder="e.g. 11/02/2018">

					        @if ($errors->has('dateOfHiring'))
					            <span class="help-block">
					                <strong>{{ $errors->first('dateOfHiring') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>

					<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
					    <label for="phone" class="col-md-4 control-label">Phone Number</label>

					    <div class="col-md-6">
					    	<div class="input-group">
						    	<span class="input-group-addon">
						    		<i class="fa fa-phone"></i>
						    	</span>
					        	<input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
					        </div>

					        @if ($errors->has('phone'))
					            <span class="help-block">
					                <strong>{{ $errors->first('phone') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

				  	<div class="form-group{{ $errors->has('specialty') ? ' has-error' : '' }}">
					    <label for="specialty" class="col-md-4 control-label">Specialty</label>

					    <div class="col-md-6">
				        	<input id="specialty" type="text" class="form-control" name="specialty" value="{{ old('specialty') }}" required autofocus>

					        @if ($errors->has('specialty'))
					            <span class="help-block">
					                <strong>{{ $errors->first('specialty') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

				  	<div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
					    <label for="salary" class="col-md-4 control-label">Salary</label>

					    <div class="col-md-6">
				        	<input id="salary" type="number" class="form-control" name="salary" value="{{ old('salary') }}" required autofocus>

					        @if ($errors->has('salary'))
					            <span class="help-block">
					                <strong>{{ $errors->first('salary') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
					    <label for="address" class="col-md-4 control-label">Address</label>

					    <div class="col-md-6">
					        	<textarea id="address" data-plugin-maxlength maxlength="140" rows="3" class="form-control" name="address" required autofocus>{{ old('address') }}</textarea>

					        @if ($errors->has('address'))
					            <span class="help-block">
					                <strong>{{ $errors->first('address') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

				                  
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="createTeacher">Create Teacher</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveChanges">Save Changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
		</div>
	</div>
</div>

