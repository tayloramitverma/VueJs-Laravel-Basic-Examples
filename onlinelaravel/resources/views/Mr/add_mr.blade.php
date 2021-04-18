<div class="page-header">
	<h1>
		Add MR
	</h1>
</div>
<div class="row">
@include("message")
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="{{ url('/Mr/add_mr') }}" method="POST">
				{{ csrf_field() }}
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right">Site</label>
				<div class="col-xs-12 col-sm-9">
					<select style="width:100%;" name="site_id" class="allsitemultiselect makefullwidth"></select>
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
							<tr id="row_1">
								<td><select style="width:100%;" name="item_name[]" class="allmaterialmultiselect"></select></td>
								<td><select style="width:100%;" name="material_unit[]" class="allmaterialunitmultiselect"></select></td>
								<td><input type="number" min="0" step="0.01" name="unit_price[]"></td>
								<td><input type="number" min="0" step="0.01" name="quantity[]"></td>
								<td><input type="text" name="remarks[]"></td>
							</tr>
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