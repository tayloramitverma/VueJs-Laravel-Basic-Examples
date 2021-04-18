						<div class="page-header">
							<h1>Site List</h1>
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
													<th>Site Name</th>
													<th>Site Address</th>
													<th>Created On</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
foreach($list_site as $site)
{
	?>
	<tr>
		<td><?php echo $site->sitemaster; ?></td>
		<td><?php echo $site->address; ?></td>
		<td><?php echo date("d-m-Y",strtotime($site->created)); ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				<a class="green" href="{{ url('/Site/edit_site/'.$site->smid) }}">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>
				<a class="red" href="{{ url('/Site/delete_site/'.$site->smid) }}">
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
						</div>