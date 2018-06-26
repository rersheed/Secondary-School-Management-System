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

<div class="modal fade" id="modalAddGuardian" tabindex="-1" role="dialog" aria-labelledby="myModalLabelGuardian" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabelGuardian">Add New Guardian</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-bordered" method="post" id="FormAddGuardian" action="{{ route('guardians.store') }}">
					
					{{ csrf_field() }}

					<input type="hidden" id="guardianId">

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


					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					    <label for="email" class="col-md-4 control-label">Email (optional)</label>

					    <div class="col-md-6">
					    	<div class="input-group">
						    	<span class="input-group-addon">
						    		<i class="fa fa-envelope"></i>
						    	</span>
					        	<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
					        </div>

					        @if ($errors->has('email'))
					            <span class="help-block">
					                <strong>{{ $errors->first('email') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

				  <div class="form-group{{ $errors->has('countryOfOrigin') ? ' has-error' : '' }}">
				    <label for="countryOfOrigin" class="col-md-4 control-label">Country</label>

				    <div class="col-md-6">
				        	<input id="countryOfOrigin" type="text" class="form-control" name="countryOfOrigin" value="Nigeria" required autofocus>

				        @if ($errors->has('countryOfOrigin'))
				            <span class="help-block">
				                <strong>{{ $errors->first('countryOfOrigin') }}</strong>
				            </span>
				        @endif
				    </div>
				</div>

				  <div class="form-group{{ $errors->has('stateOfOrigin') ? ' has-error' : '' }}">
				    <label for="stateOfOrigin" class="col-md-4 control-label">State of Origin</label>

				    <div class="col-md-6">
				        	<input id="stateOfOrigin" type="text" class="form-control" name="stateOfOrigin" value="{{ old('stateOfOrigin') }}" required autofocus>

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
				        	<input id="lga" type="text" class="form-control" name="lga" value="{{ old('lga') }}" required autofocus>

				        @if ($errors->has('lga'))
				            <span class="help-block">
				                <strong>{{ $errors->first('lga') }}</strong>
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
				<button type="submit" class="btn btn-primary" id="createGuardian">Create Guardian</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveChanges">Save Changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
		</div>
	</div>
</div>