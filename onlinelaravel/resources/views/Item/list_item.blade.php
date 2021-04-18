						<div class="page-header">
							<h1>Item List</h1>
						</div>
						<div class="row">
@include("message")
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													<th>Item category</th>
													<th>Item Name</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
foreach($list_item as $item)
{
	?>
	<tr>
		<td><?php echo $item->item_category; ?></td>
		<td><?php echo $item->itemname; ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				<a class="green" href="{{ url('/Item/edit_item/'.$item->imid) }}">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>
				<a class="red" href="{{ url('/Item/delete_item/'.$item->imid) }}">
					<i class="ace-icon fa fa-trash-o bigger-130"></i>
				</a>
			</div>
		</td>
	</tr>	
	<?php
}
											?>

											</tbody>
										</table>
									</div><!-- /.span -->
								</div><!-- /.row -->
							</div><!-- /.col -->
							{{ $list_item->links() }}
						</div>