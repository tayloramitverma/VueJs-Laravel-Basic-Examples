<div class="page-header">
	<h1>
		Assign Site
	</h1>
</div>
<div class="row">
<?php
$vendor_site_arr = array_column(json_decode(json_encode($vendor->sites),TRUE),"smid");
?>
	<div class="col-xs-12">
		<form method="POST" action="/Vendor/do_site_assign">
		{{ csrf_field() }}
		<input type="hidden" name="vendor_id" value="{{ $vendor->vid }}">
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right">Sites</label>
				<div class="col-xs-12 col-sm-9">
					<select name="assigned_site[]" multiple="multiple">
					<?php
					foreach($sites as $site)
					{
						?>
						<option <?php if(in_array($site->smid,$vendor_site_arr)){ echo "selected"; }?> value="<?php echo $site->smid; ?>"><?php echo $site->sitemaster; ?></option>
						<?php
					}
					?>
					</select>
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<input type="submit" class="btn btn-info" value="Submit">
					&nbsp; &nbsp; &nbsp;
					<a class="btn" href="/Vendor/list_vendor"> Cancel </a>
				</div>
			</div>
		</form>
	</div>
</div>