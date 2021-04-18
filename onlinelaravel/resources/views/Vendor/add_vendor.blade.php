<div class="page-header">
	<h1>
		Add Vendor
	</h1>
</div>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="{{ url('/Vendor/add_vendor') }}" method="POST">
		{{ csrf_field() }}
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vendor Name </label>
				<div class="col-sm-9">
					<input type="text" name="vname" class="col-xs-10 col-sm-5">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vendor Address </label>
				<div class="col-sm-9">
					<input type="text" name="vaddress" class="col-xs-10 col-sm-5">
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<input type="submit" class="btn btn-info" value="Submit">
					&nbsp; &nbsp; &nbsp;
					<a class="btn" href="{{ url('/Vendor/list_vendor') }}">
						Cancel
					</a>
				</div>
			</div>
		</form>
	</div><!-- /.col -->
</div>