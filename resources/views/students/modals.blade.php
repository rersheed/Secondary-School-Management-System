<div class="modal fade" id="modalAnim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
			</div>
			<div class="modal-body">
				 <p>Are you sure that you want to remove this student's record?</p>
				 <input type="hidden" id="id" value="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm-delete">Confirm</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalAddStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabelStudent" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabelStudent">Add New Student</h4>
			</div>
			<div class="modal-body">
				 <input type="hidden" id="studentId" value="">
				<form class="form-horizontal form-bordered" action="{{ route('students.store') }}" method="post" id="FormAddStudent" enctype="multipart/form-data" >

					{{ csrf_field() }}

					
					<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
					    <label for="image" class="col-md-3 control-label">Picture</label>

					    <div class="col-md-9">
					    	<img src="#" alt="" id="showImage" width="150px" height="150px" class="img-rounded">
					    	<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input">
									<i class="fa fa-file fileupload-exists"></i>
									<span class="fileupload-preview"></span>
								</div>
								<span class="btn btn-default btn-file">
									<span class="fileupload-exists">Change</span>
									<span class="fileupload-new">Select Picture</span>
									<input type="file" name="image" id="image" required />
								</span>
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>

					        @if ($errors->has('image'))
					            <span class="help-block">
					                <strong>{{ $errors->first('image') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('regNumber') ? ' has-error' : '' }}">
					    <label for="regNumber" class="col-md-4 control-label">Admission Number</label>

					    <div class="col-md-6">
					    	<div class="input-group">
						    	<span class="input-group-addon">
						    		<i class="fa fa-tag"></i>
						    	</span>
					        	<input id="regNumber" type="text" class="form-control" name="regNumber" value="{{ old('regNumber') }}" required autofocus placeholder="e.g. SHB/06/1007">
					        </div>

					        @if ($errors->has('regNumber'))
					            <span class="help-block">
					                <strong>{{ $errors->first('regNumber') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>


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
					    	<div class="input-group">
						    	<span class="input-group-addon">
						    		<i class="fa fa-calendar"></i>
						    	</span>
					       	 	<input id="dateOfBirth" type="date" class="form-control" name="dateOfBirth" value="{{ old('dateOfBirth') }}" required autofocus>
					    	</div>

					        @if ($errors->has('dateOfBirth'))
					            <span class="help-block">
					                <strong>{{ $errors->first('dateOfBirth') }}</strong>
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


					<div class="form-group{{ $errors->has('lastSchool') ? ' has-error' : '' }}">
					    <label for="lastSchool" class="col-md-4 control-label">Last School Attended</label>

					    <div class="col-md-6">
					    	<div class="input-group">
						    	<span class="input-group-addon">
						    		<i class="fa fa-university"></i>
						    	</span>
					        	<input id="lastSchool" type="text" class="form-control" name="lastSchool" value="{{ old('lastSchool') }}" required autofocus>
					        </div>

					        @if ($errors->has('lastSchool'))
					            <span class="help-block">
					                <strong>{{ $errors->first('lastSchool') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>



					<div class="form-group{{ $errors->has('admissionDate') ? ' has-error' : '' }}">
					    <label for="admissionDate" class="col-md-4 control-label">Date of Admission</label>

					    <div class="col-md-6">
					    	<div class="input-group">
						    	<span class="input-group-addon">
						    		<i class="fa fa-calendar"></i>
						    	</span>
					        	<input id="admissionDate" type="date" class="form-control" name="admissionDate" value="{{ old('admissionDate') }}" required autofocus>
					        </div>

					        @if ($errors->has('admissionDate'))
					            <span class="help-block">
					                <strong>{{ $errors->first('admissionDate') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>


					<div class="form-group{{ $errors->has('class_id') ? ' has-error' : '' }}">
					    <label for="class_id" class="col-md-4 control-label">Class Admitted</label>

					    <div class="col-md-6">
					        <select data-plugin-selectTwo name="level_id" id="level_id" class="form-control populate">
					            @forelse($classes as $class)
					            <option value="{{$class->id}}">{{ $class->name ." - ". $class->tag }}</option>
					            @empty
					                <b><i>Add a class first</i></b>
					            @endforelse
					        </select>


					        @if ($errors->has('class_id'))
					            <span class="help-block">
					                <strong>{{ $errors->first('class_id') }}</strong>
					            </span>
					        @endif
					    </div>
					</div> 

					<div class="a form-group{{ $errors->has('guardian_id') ? ' has-error' : '' }}">
					    <label for="guardian_id" class="col-md-4 control-label">Guardian </label>

					    <div class="col-md-6">
					    	<div class="input-group">
						    	<span class="input-group-addon">
						    		<a href="" data-toggle="modal" data-target="#modalAddGuardian"><i class="fa fa-plus"></i></a>
						    	</span>

						        <select data-plugin-selectTwo name="guardian_id" id="guardian_id" class="form-control populate">
						            @forelse($guardians as $guardian)
						            <option value="{{$guardian->id}}">{{ $guardian->surname ." - ". $guardian->phone }}</option>
						            @empty
						                <b><i>Add a class first</i></b>
						            @endforelse
						        </select>
							</div>

					        @if ($errors->has('guardian_id'))
					            <span class="help-block">
					                <strong>{{ $errors->first('guardian_id') }}</strong>
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
				<button type="submit" class="btn btn-primary" id="createStudent">Save Record</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveChanges" style="display: none">Save Changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
				</form>
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
				<form class="form-horizontal form-bordered" method="post" id="FormAddGuardian" >
					
					{{ csrf_field() }}

					<input type="hidden" id="guardianId">

					<div class="form-group{{ $errors->has('surnameG') ? ' has-error' : '' }}">
					    <label for="surnameG" class="col-md-4 control-label">Surname</label>

					    <div class="col-md-6">
					        <input id="surnameG" type="text" class="form-control" name="surname" value="{{ old('surnameG') }}" required autofocus placeholder="e.g. Ahmad">

					        @if ($errors->has('surnameG'))
					            <span class="help-block">
					                <strong>{{ $errors->first('surnameG') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('othernamesG') ? ' has-error' : '' }}">
					    <label for="othernamesG" class="col-md-4 control-label">Other Names</label>

					    <div class="col-md-6">
					        <input id="othernamesG" type="text" class="form-control" name="othernames" value="{{ old('othernamesG') }}" required autofocus placeholder="e.g. Haruna">

					        @if ($errors->has('othernamesG'))
					            <span class="help-block">
					                <strong>{{ $errors->first('othernamesG') }}</strong>
					            </span>
					        @endif 
					    </div>
					</div>

					<div class="form-group{{ $errors->has('phoneG') ? ' has-error' : '' }}">
					    <label for="phone" class="col-md-4 control-label">Phone Number</label>

					    <div class="col-md-6">
					    	<div class="input-group">
						    	<span class="input-group-addon">
						    		<i class="fa fa-phone"></i>
						    	</span>
					        	<input id="phoneG" type="text" class="form-control" name="phone" value="{{ old('phoneG') }}" required autofocus>
					        </div>

					        @if ($errors->has('phoneG'))
					            <span class="help-block">
					                <strong>{{ $errors->first('phoneG') }}</strong>
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

				<div class="form-group{{ $errors->has('addressG') ? ' has-error' : '' }}">
				    <label for="address" class="col-md-4 control-label">Address</label>

				    <div class="col-md-6">
				        	<textarea id="addressG" data-plugin-maxlength maxlength="140" rows="3" class="form-control" name="address" required autofocus>{{ old('addressG') }}</textarea>

				        @if ($errors->has('addressG'))
				            <span class="help-block">
				                <strong>{{ $errors->first('addressG') }}</strong>
				            </span>
				        @endif
				    </div>
				</div>

				                  
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="createGuardian" data-dismiss="modal">Create Guardian</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
		</div>
	</div>
</div>