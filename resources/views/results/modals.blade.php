<div class="modal fade" id="modalEditScore" tabindex="-1" role="dialog" aria-labelledby="myModalLabelPromotion" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabelPromotion">Edit Student's Score</h4>
			</div>
			<div class="modal-body">
				 <input type="hidden" id="promotionId">
				<form class="form-horizontal form-bordered" action="" method="post" id="FormAddPromotion">

					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
					    <label for="student_id" class="col-md-4 control-label">Student</label>

					    <div class="col-md-6">
					        <input type="text" name="student_id" id="student_id" class="form-control" />

					        @if ($errors->has('student_id'))
					            <span class="help-block">
					                <strong>{{ $errors->first('student_id') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>
					
					<input type="hidden" id="scoreId" value="">
					<input type="hidden" name="yeargroup" value="{{ $year_group_id }}">
					<input type="hidden" name="term" value="{{ $term_id }}">
					<input type="hidden" name="subject" value="{{ $subject_id }}">

					<div class="form-group{{ $errors->has('test1') ? ' has-error' : '' }}">
					    <label for="test1" class="col-md-4 control-label">1st C.A Test</label>

					    <div class="col-md-6">
					        <input type="number" name="test1" id="test1" class="form-control" />

					        @if ($errors->has('test1'))
					            <span class="help-block">
					                <strong>{{ $errors->first('test1') }}</strong>
					            </span>
					        @endif
					    </div>
					</div> 

					<div class="form-group{{ $errors->has('test2') ? ' has-error' : '' }}">
					    <label for="test2" class="col-md-4 control-label">2nd C.A Test</label>

					    <div class="col-md-6">
					        <input type="number" name="test2" id="test2" class="form-control" />

					        @if ($errors->has('test2'))
					            <span class="help-block">
					                <strong>{{ $errors->first('test2') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('exam') ? ' has-error' : '' }}">
					    <label for="exam" class="col-md-4 control-label">Exam</label>

					    <div class="col-md-6">
					        <input type="number" name="exam" id="exam" class="form-control" />

					        @if ($errors->has('exam'))
					            <span class="help-block">
					                <strong>{{ $errors->first('exam') }}</strong>
					            </span>
					        @endif
					    </div>
					</div> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveChanges">Save Changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
				</form>
		</div>
	</div>
</div>