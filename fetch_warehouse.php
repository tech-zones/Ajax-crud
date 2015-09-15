<?php

	include('connection.php');
	session_start();

?>
	<table class="table" id="warehouse">
										<thead> 
											<tr>
										
												<th>Warehouse Name</th>
												<th>Manager Name</th>
												<th>Phone Number</th>
												
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											
											<?php
											$brands = $connection->query("SELECT * FROM warehouse");

											while($row=$brands->fetch_array()){?>
											<tr>
												<td><?php echo $row['warehouse_name']?></td>
												<td><?php echo $row['manager_name']?></td>
												<td><?php echo $row['phone']?></td>
											
												<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_warehouse<?php echo $row['warehouse_id']?>"><span class="glyphicon glyphicon-trash"></span></button>
												<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_warehouse<?php echo $row['warehouse_id']?>"><span class="glyphicon glyphicon-edit"></span></button>
												</td>
											</tr>


											<?php }
											?>	
											
										</tbody>
										
									</table>

