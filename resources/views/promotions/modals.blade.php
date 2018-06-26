<div class="modal fade" id="modalAddPromotion" tabindex="-1" role="dialog" aria-labelledby="myModalLabelPromotion" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabelPromotion">Add New Promotion</h4>
			</div>
			<div class="modal-body">
				 <input type="hidden" id="promotionId">
				<form class="form-horizontal form-bordered" action="{{ url('/promotions') }}" method="post" id="FormAddPromotion" enctype="multipart/form-data" >

					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
					    <label for="student_id" class="col-md-4 control-label">Student</label>

					    <div class="col-md-6">
					        <select required name="student_id" id="student_id" class="form-control">
					            @forelse($students as $student)
					            <option value="{{$student->id}}">{{ $student->surname ." ". $student->othernames }}  ({{ $student->regNumber }})</option>
					            @empty
					                <b><i>Add a student first</i></b>
					            @endforelse
					        </select>

					        @if ($errors->has('student_id'))
					            <span class="help-block">
					                <strong>{{ $errors->first('student_id') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('year_group_id') ? ' has-error' : '' }}">
					    <label for="year_group_id" class="col-md-4 control-label">Session</label>

					    <div class="col-md-6">
					        <select  required name="year_group_id" id="year_group_id" class="form-control populate">
					            @forelse($yeargroups as $sesion)
					            <option value="{{$sesion->id}}">{{ $sesion->name}}</option>
					            @empty
					                <b><i>Add a session first</i></b>
					            @endforelse
					        </select>

					        @if ($errors->has('year_group_id'))
					            <span class="help-block">
					                <strong>{{ $errors->first('year_group_id') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('level_id') ? ' has-error' : '' }}">
					    <label for="level_id" class="col-md-4 control-label">Promote to</label>

					    <div class="col-md-6">
					        <select  required name="level_id" id="level_id" class="form-control populate">
					            @forelse($classes as $level)
					            <option value="{{$level->id}}">{{ $level->name ." - ". $level->tag }}</option>
					            @empty
					                <b><i>Add a class first</i></b>
					            @endforelse
					        </select>

					        @if ($errors->has('level_id'))
					            <span class="help-block">
					                <strong>{{ $errors->first('level_id') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
					    <label for="remark" class="col-md-4 control-label">Promote to</label>

					    <div class="col-md-6">
					        <textarea name="remark" id="remark" class="form-control" rows="3">{{ old('remark') }}</textarea>

					        @if ($errors->has('remark'))
					            <span class="help-block">
					                <strong>{{ $errors->first('remark') }}</strong>
					            </span>
					        @endif
					    </div>
					</div> 
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="createPromotion">Save Record</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveChanges" style="display: none">Save Changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
				</form>
		</div>
	</div>
</div>
