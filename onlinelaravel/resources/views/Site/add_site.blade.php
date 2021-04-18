<div class="page-header">
	<h1>
		Add Site
	</h1>
</div>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="{{ url('/Site/add_site') }}" method="POST">
		{{ csrf_field() }}
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Site Name </label>
				<div class="col-sm-9">
					<input type="text" name="site_name" class="col-xs-10 col-sm-5">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Site Address </label>
				<div class="col-sm-9">
					<input type="text" name="site_address" class="col-xs-10 col-sm-5">
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<input type="submit" class="btn btn-info" value="Submit">
					&nbsp; &nbsp; &nbsp;
					<a class="btn" href="{{ url('/Site/') }}">
						Cancel
					</a>
				</div>
			</div>
		</form>
	</div><!-- /.col -->
</div>