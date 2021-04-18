						<div class="page-header">
							<h1>Vendor List</h1>
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
													<th>#</th>
													<th>Vendor Name</th>
													<th>Vendor Address</th>
													<th>Created On</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
foreach($list_vendor as $vendor)
{
	?>
	<tr>
		<td><?php echo $vendor->vid; ?></td>
		<td><?php echo $vendor->vname; ?></td>
		<td><?php echo $vendor->vaddress; ?></td>
		<td><?php echo date("d-m-Y",strtotime($vendor->created)); ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				<a class="green" href="{{ url('/Vendor/edit_vendor/'.$vendor->vid) }}">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>
				<a class="red" href="{{ url('/Vendor/delete_vendor/'.$vendor->vid) }}">
					<i class="ace-icon fa fa-trash-o bigger-130"></i>
				</a>
				<a class="blue" href="{{ url('/Vendor/assign_site/'.$vendor->vid) }}">
					<i class="ace-icon fa fa-building-o bigger-130"></i>
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
						</div>