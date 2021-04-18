<div class="page-header">
	<h1>
		Edit MR
	</h1>
</div>
<div class="row">
@include("message")
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="{{ url('/Mr/update_mr') }}" method="POST">
		<input type="hidden" name="update_id" value="{{ $mr_data->mrmid }}">
				{{ csrf_field() }}
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right">Site</label>
				<div class="col-xs-12 col-sm-9">{{ $mr_data->sites->sitemaster }}
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
				<a href="javascript:void(0);" class="btn btn-default" onclick="addmore();">Add More</a>
					<table id="add_mr_table" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Item</th>
								<th>Item Unit</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Remarks</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$i = 0;
							foreach($mr_data->materialrequestdetails as $mr_detail)
							{
								?>
								<tr id="row_1">
									<input type="hidden" name="mr_detail_id[]" value="{{ $mr_detail->mrdid }}">
									<td><select style="width:100%;" name="item_name[]" class="allmaterialmultiselect"><option value="{{ $mr_data->items[$i]->imid }}">{{ $mr_data->items[$i]->item_category." ".$mr_data->items[$i]->itemname }}</option></select></td>
									<td><select style="width:100%;" name="material_unit[]" class="allmaterialunitmultiselect"><option value="{{ $mr_data->material_units[$i]->muid }}">{{ $mr_data->material_units[$i]->mufullname." (".$mr_data->material_units[$i]->muname.")" }}</option></select></td>
									<td><input value="{{ $mr_detail->unit_price }}" type="number" min="0" step="0.01" name="unit_price[]"></td>
									<td><input value="{{ $mr_detail->qty }}" type="number" min="0" step="0.01" name="quantity[]"></td>
									<td><input value="{{ $mr_detail->remarks }}" type="text" name="remarks[]"></td>
								</tr>	
								<?php
								$i++;
							}
						?>

						</tbody>
					</table>
				</div><!-- /.span -->
			</div><!-- /.row -->
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<input type="submit" class="btn btn-info" value="Submit">
					&nbsp; &nbsp; &nbsp;
					<a class="btn" href="{{ url('/Mr/list_mr') }}">
						Cancel
					</a>
				</div>
			</div>
		</form>
	</div><!-- /.col -->
</div>
<script type="text/javascript">
function addmore()
{
	var rowId = $("#add_mr_table tbody tr").last().attr("id").split("_")[1];
	rowId++;

	$("#add_mr_table tbody").append("<tr id='row_"+rowId+"'><td><select style='width:100%;' name='item_name[]' class='allmaterialmultiselect'></select></td><td><select style='width:100%;' name='material_unit[]' class='allmaterialunitmultiselect'></select></td><td><input type='number' min='0' step='0.01' name='unit_price[]'></td><td><input type='number' min='0' step='0.01' name='quantity[]'></td><td><input type='text' name='remarks[]'></td></tr>");

	initAllSiteMultiselect();
	initAllMaterialMultiselect();
	initAllMaterialUnitMultiselect();
}
</script>