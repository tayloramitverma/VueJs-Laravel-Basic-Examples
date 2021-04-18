<div class="page-header">
	<h1>
		Edit Category
	</h1>
</div>
<div class="row">
@include("message")
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="{{ url('/Category/update_category') }}" method="POST">
		{{ csrf_field() }}
			<input type="hidden" name="update_id" value="<?php echo $category_data->cmid; ?>">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category Name </label>
				<div class="col-sm-9">
					<input type="text" name="categoryname" value="<?php echo $category_data->categoryname; ?>" class="col-xs-10 col-sm-5">
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<input type="submit" class="btn btn-info" value="Submit">
					&nbsp; &nbsp; &nbsp;
					<a class="btn" href="{{ url('/Category/') }}">
						Cancel
					</a>
				</div>
			</div>
		</form>
	</div><!-- /.col -->
</div>