<div class="page-header">
	<h1>
		Edit Vendor
	</h1>
</div>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="{{ url('/Vendor/update_vendor') }}" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="update_id" value="{{ $vendor_data->vid }}">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vendor Name </label>
				<div class="col-sm-9">
					<input type="text" name="vname" value="{{ $vendor_data->vname }}" class="col-xs-10 col-sm-5">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vendor Address </label>
				<div class="col-sm-9">
					<input type="text" name="vaddress" value="{{ $vendor_data->vaddress }}" class="col-xs-10 col-sm-5">
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<input type="submit" class="btn btn-info" value="Submit">
					&nbsp; &nbsp; &nbsp;
					<a class="btn" href="{{ url('/Vendor/') }}">
						Cancel
					</a>
				</div>
			</div>
		</form>
	</div><!-- /.col -->
</div>