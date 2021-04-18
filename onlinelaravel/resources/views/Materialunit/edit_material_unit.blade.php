<div class="page-header">
	<h1>
		Edit Material Unit
	</h1>
</div>
<div class="row">
@include("message")
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="{{ url('/Materialunit/update_material_unit') }}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="update_id" value="{{ $material_unit_data->muid }}">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> MU Name </label>
				<div class="col-sm-9">
					<input type="text" name="muname" value="{{ $material_unit_data->muname }}" class="col-xs-10 col-sm-5">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> MU Full Name </label>
				<div class="col-sm-9">
					<input type="text" name="mufullname" value="{{ $material_unit_data->mufullname }}" class="col-xs-10 col-sm-5">
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<input type="submit" class="btn btn-info" value="Submit">
					&nbsp; &nbsp; &nbsp;
					<a class="btn" href="{{ url('/Materialunit/list_material_unit') }}">
						Cancel
					</a>
				</div>
			</div>
		</form>
	</div><!-- /.col -->
</div>