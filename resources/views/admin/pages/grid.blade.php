@extends('admin.master')
@section('content')
			<div id="page-wrapper">
				<div class="graphs">
					<div class="md">
						<h3 class="blank1">Grids</h3>
						<div class="form-group">
						  <div class="row">
							<div class="col-md-12">
								<input type="text" class="form-control1" placeholder=".col-md-12">
							</div>
							<div class="clearfix"> </div>
						   </div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2 grid_box1">
									<input type="text" class="form-control1" placeholder=".col-md-2">
								</div>
								<div class="col-md-10">
									<input type="text" class="form-control1" placeholder=".col-md-10">
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 grid_box1">
									<input type="text" class="form-control1" placeholder=".col-md-3">
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control1" placeholder=".col-md-9">
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4 grid_box1">
									<input type="text" class="form-control1" placeholder=".col-md-4">
								</div>
								<div class="col-md-8">
									<input type="text" class="form-control1" placeholder=".col-md-8">
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
						<div class="form-group">
							<div class="row">
								<div class="col-md-5 grid_box1">
									<input type="text" class="form-control1" placeholder=".col-md-5">
								</div>
								<div class="col-md-7">
									<input type="text" class="form-control1" placeholder=".col-md-7">
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6 grid_box1">
									<input type="text" class="form-control1" placeholder=".col-md-6">
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control1" placeholder=".col-md-6">
								</div>
								<div class="clearfix"> </div>
							</div>
						   </div>	
						   <div class="form-group">
						<div class="row">
							<div class="col-md-4 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-4">
							</div>
							<div class="col-md-4 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-4">
							</div>
							<div class="col-md-4">
								<input type="text" class="form-control1" placeholder=".col-md-4">
							</div>
							<div class="clearfix"> </div>
						</div>
						   </div>	
						   <div class="form-group">
						<div class="row">
							<div class="col-md-2 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-2">
							</div>
							<div class="col-md-8 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-8">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control1" placeholder=".col-md-2">
							</div>
							<div class="clearfix"> </div>
						</div>
						   </div>	
						   <div class="form-group">
						<div class="row">
							<div class="col-md-3 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-3">
							</div>
							<div class="col-md-3 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-3">
							</div>
							<div class="col-md-3 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-3">
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control1" placeholder=".col-md-3">
							</div>
							<div class="clearfix"> </div>
						</div>
						   </div>	
						   <div class="form-group mb-n">
						<div class="row">
								<div class="col-md-2 grid_box1">
									<input type="text" class="form-control1" placeholder=".col-md-2">
								</div>
								<div class="col-md-2 grid_box1">
									<input type="text" class="form-control1" placeholder=".col-md-2">
								</div>
								<div class="col-md-2 grid_box1">
									<input type="text" class="form-control1" placeholder=".col-md-2">
								</div>
								<div class="col-md-2 grid_box1">
									<input type="text" class="form-control1" placeholder=".col-md-2">
								</div>
								<div class="col-md-2 grid_box1">
									<input type="text" class="form-control1" placeholder=".col-md-2">
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control1" placeholder=".col-md-2">
								</div>
								<div class="clearfix"> </div>
						</div>
						   </div>	
					</div>
					<div class="col-md-12 grids_bottom">
						<h3 class="blank1">Bootstrap Grid Details</h3>
						<div class="panel panel-default">
							<div class="panel-body grid_table">
								<table class="table table-bordered table-striped no-margin grd_tble">
									<thead>
										<tr>
											<th></th>
											<th>
												Extra small devices
												<small>Phones (&lt;768px)</small>
											</th>
											<th>
												Small devices
												<small>Tablets (≥768px)</small>
											</th>
											<th>
												Medium devices
												<small>Desktops (≥992px)</small>
											</th>
											<th>
												Large devices
												<small>Desktops (≥1200px)</small>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>Max container width</th>
											<td>None (auto)</td>
											<td>750px</td>
											<td>970px</td>
											<td>1170px</td>
										</tr>
										<tr>
											<th>Class prefix</th>
											<td><code>.col-xs-</code></td>
											<td><code>.col-sm-</code></td>
											<td><code>.col-md-</code></td>
											<td><code>.col-lg-</code></td>
										</tr>
										<tr>
											<th># of columns</th>
											<td colspan="4">12</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection