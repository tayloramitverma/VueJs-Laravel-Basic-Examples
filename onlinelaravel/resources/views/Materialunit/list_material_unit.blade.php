						<div class="page-header">
							<h1>Material Unit List</h1>
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
													<th>MU Name</th>
													<th>MU Full Name</th>
													<th>Created On</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
foreach($list_material_unit as $material_unit)
{
	?>
	<tr>
		<td><?php echo $material_unit->muid; ?></td>
		<td><?php echo $material_unit->muname; ?></td>
		<td><?php echo $material_unit->mufullname; ?></td>
		<td><?php echo date("d-m-Y",strtotime($material_unit->created)); ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				<a class="green" href="{{ url('/Materialunit/edit_material_unit/'.$material_unit->muid) }}">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>
				<a class="red" href="{{ url('/Materialunit/delete_material_unit/'.$material_unit->muid) }}">
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