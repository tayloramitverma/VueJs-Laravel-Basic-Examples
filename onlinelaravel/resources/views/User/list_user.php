						<div class="page-header">
							<h1>Users</h1>
						</div>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="row">
			<div class="col-xs-12">
				<table id="simple-table" class="table  table-bordered table-hover">
					<thead>
						<tr>
							<th>Username</th>
							<th>Status</th>
							<th>Created On</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					foreach($users as $user)
					{
						?>
						<tr>
							<td><?php echo $user->uname; ?></td>
							<td><?php echo $user->status; ?></td>
							<td><?php echo date("d-m-Y",strtotime($user->created)); ?></td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="green" href="{{ url('/User/edit_user/'.$user->umid) }}">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>
									<a class="red" href="{{ url('/User/delete_user/'.$user->umid) }}">
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