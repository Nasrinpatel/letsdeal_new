<div class="content-page">
	<div class="content">
		<!-- Start Content-->
		<div class="container-fluid">
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<a type="button" href="<?= base_url('admin/Customermaster') ?>" class="btn btn-success" style="float:right;">Back</a>
							</ol>
						</div>
						<h4 class="page-title">Customer Master</h4>
					</div>
				</div>
			</div>

			<!-- end page title -->

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-4">
									<div class="nav nav-pills flex-column navtab-bg nav-pills-tab text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
										<a class="nav-link active show py-2" id="custom-v-pills-billing-tab" data-bs-toggle="pill" href="#custom-v-pills-billing" role="tab" aria-controls="custom-v-pills-billing" aria-selected="true">
											<i class="mdi mdi-account-circle d-block font-24"></i>
											Customer Master
										</a>
										<a class="nav-link mt-2 py-2" id="custom-v-pills-shipping-tab" data-bs-toggle="pill" href="#custom-v-pills-shipping" role="tab" aria-controls="custom-v-pills-shipping" aria-selected="false">
											<i class="mdi mdi-contacts d-block font-24"></i>
											Contact</a>
										<a class="nav-link mt-2 py-2" id="custom-v-pills-payment-tab" data-bs-toggle="pill" href="#custom-v-pills-payment" role="tab" aria-controls="custom-v-pills-payment" aria-selected="false">
											<i class="mdi mdi-note d-block font-24"></i>
											Note</a>
									</div>


								</div> <!-- end col-->
								<div class="col-lg-8">
									<div class="tab-content p-3">
										<div class="tab-pane fade active show" id="custom-v-pills-billing" role="tabpanel" aria-labelledby="custom-v-pills-billing-tab">
											<div>
												<h4 class="header-title">Customer Information</h4>

												<!-- <p class="sub-header">Fill the form below in order to
                                                                send you the order's invoice.</p> -->
												<form method="post" id="store-promas" action="<?php echo base_url() . 'admin/Customermaster/store'; ?>">

													<div class="row">
														<div class="col-md-4">
															<!-- <div class="mb-3">
																<label for="source" class="form-label">Source</label>
																<select data-toggle="select2" class="form-control" name="source_id" data-width="100%">
																	<?php foreach ($sourcemaster as $item) { ?>
																		<option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
																	<?php }
																	?>
																</select>
															</div> -->
															<label class="form-label">Source<span class="text-danger">*</span></label>
															<select data-toggle="select2" class="form-control" name="source_id" data-width="100%">
																<option selected="">Select Source</option>
																<option value="Facebook">Facebook</option>
																<option value="Linkedin">Linkedin</option>
															</select>
														</div>
														<div class="col-md-4">
															<div class="mb-3">
																<label class="form-label">Assigned<span class="text-danger">*</span></label>
																<select data-toggle="select2" title="Assigned" class="form-control" name="assigned_id" data-width="100%">
																	<option selected="">Select Assigned</option>
																	<option value="Mohit soni">Mohit soni</option>
																	<option value="Nihar soni">Nihar soni</option>
																	<option value="Nasrin Patel">Nasrin Patel</option>
																</select>
															</div>
														</div>
														<div class="col-md-4">
															<div class="mb-3">
																<label class="form-label">Position<span class="text-danger">*</span></label>
																<!-- <select data-toggle="select2" title="Position" class="form-control" name="position_id" data-width="100%">
																	<?php foreach ($position as $pos) { ?>
																		<option value="<?= $pos['name'] ?>"><?= $pos['name'] ?></option>
																	<?php }
																	?>
																</select> -->
																<select data-toggle="select2" title="Position" class="form-control" name="position_id" data-width="100%">
																	<option selected="">Select Position</option>
																	<option value="Manager">Manager</option>
																	<option value="Admin">Admin</option>
																	<option value="Family">Family</option>
																</select>
															</div>
														</div> <!-- end row -->
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="mb-3">
																<label for="billing-first-name" class="form-label">First Name<span class="text-danger">*</span></label>
																<input class="form-control" type="text" placeholder="Enter your first name" name="first_name" id="billing-first-name" />
															</div>
														</div>
														<div class="col-md-6">
															<div class="mb-3">
																<label for="billing-last-name" class="form-label">Last Name<span class="text-danger">*</span></label>
																<input class="form-control" type="text" placeholder="Enter your last name" name="last_name" id="billing-last-name" />
															</div>
														</div>
													</div> <!-- end row -->
													<div class="row">

														<div class="col-md-6">
															<div class="mb-3">
																<label for="billing-phone" class="form-label">Phone <span class="text-danger">*</span></label>
																<input class="form-control" type="text" name="phone" placeholder="(xx) xxx xxxx xxx" id="billing-phone" />
															</div>
														</div>
														<div class="col-md-6">
															<div class="mb-3">
																<label for="billing-email-address" class="form-label">Email Address <span class="text-danger">*</span></label>
																<input class="form-control" type="email" name="email" placeholder="Enter your email" id="billing-email-address" />
															</div>
														</div>
													</div> <!-- end row -->
													<div class="row">
														<div class="col-12">
															<div class="mb-3">
																<label for="company" class="form-label">Company Name</label>
																<input type="text" maxlength="14" class="form-control" name="company_name" id="company" placeholder="Enter Company Name">
															</div>
														</div>
													</div> <!-- end row -->


													<div class="row">
														<div class="col-12">
															<div class="mb-3">
																<label for="description" class="form-label">Description<span class="text-danger">*</span></label>
																<textarea class="form-control" name="description" id="description"></textarea>
															</div>
														</div>
													</div> <!-- end row -->
													<div class="mb-3">
														<label for="city_status" class="form-label">Status</label>
														<select class="form-select" name="status" id="city_status">
															<option selected="">Select Status</option>
															<option value="1" selected>Active</option>
															<option value="0">Inactive</option>
														</select>
													</div>
													<div class="row">
														<div class="col-lg-6">
															<div class="text">
																<button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
										<div class="tab-pane fade" id="custom-v-pills-shipping" role="tabpanel" aria-labelledby="custom-v-pills-shipping-tab">

											<div>
												<h4 class="header-title">Contact</h4>

												<!-- <p class="sub-header">Fill the form below in order to
													send you the order's invoice.</p> -->

												<form method="post" id="store-promas" action="<?php echo base_url() . 'admin/Customermaster/store_contact'; ?>">
													<div class="row">
														<div class="col-md-6">
															<div class="mb-3">
																<label for="billing-first-name" class="form-label">First Name</label>
																<input class="form-control" type="text" placeholder="Enter your first name" name="first_name" id="billing-first-name" />
															</div>
														</div>
														<div class="col-md-6">
															<div class="mb-3">
																<label for="billing-last-name" class="form-label">Last Name</label>
																<input class="form-control" type="text" placeholder="Enter your last name" name="last_name" id="billing-last-name" />
															</div>
														</div>
													</div> <!-- end row -->
													<div class="row">
														<div class="col-md-6">
															<div class="mb-3">
																<label class="form-label">Position</label>
																<!-- <select data-toggle="select2" title="Position" class="form-control" name="position_id" data-width="100%">
																	<?php foreach ($position as $pos) { ?>
																		<option value="<?= $pos['name'] ?>"><?= $pos['name'] ?></option>
																	<?php }
																	?>
																</select> -->
																<select data-toggle="select2" title="Position" class="form-control" name="position_id" data-width="100%">
																	<option value="Manager">Manager</option>
																	<option value="Admin">Admin</option>
																	<option value="Family">Family</option>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="mb-3">
																<label for="company" class="form-label">Company Name</label>
																<input type="text" maxlength="14" class="form-control" name="company_name" id="company" placeholder="Enter Company Name">
															</div>
														</div>
													</div> <!-- end row -->
													<div class="row">
														<div class="col-md-6">
															<div class="mb-3">
																<label for="billing-email-address" class="form-label">Email Address <span class="text-danger"></span></label>
																<input class="form-control" type="email" name="email" placeholder="Enter your email" id="billing-email-address" />
															</div>
														</div>
														<div class="col-md-6">
															<div class="mb-3">
																<label for="billing-phone" class="form-label">Phone <span class="text-danger">*</span></label>
																<input class="form-control" type="text" name="phone" placeholder="(xx) xxx xxxx xxx" id="billing-phone" />
															</div>
														</div>
													</div> <!-- end row -->



													<div class="row">
														<div class="col-12">
															<div class="mb-3">
																<label for="description" class="form-label">Description</label>
																<textarea class="form-control" name="description" id="description"></textarea>
															</div>
														</div>
													</div> <!-- end row -->
													<div class="mb-3">
														<label for="city_status" class="form-label">Status</label>
														<select class="form-select" name="status" id="city_status">
															<option selected="">Select Status</option>
															<option value="1" selected>Active</option>
															<option value="0">Inactive</option>
														</select>
													</div>
													<div class="row">
														<div class="col-lg-6">
															<div class="text">
																<button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
															</div>
														</div>
													</div>
												</form>
												<!-- end row-->
												<div class="row my-4">
													<div class="col-12">
														<div class="card">
															<div class="card-body">
																<div class="row">
																	<div class="col-sm-12">
																		<?php if ($this->session->flashdata('success')) { ?>
																			<div class="alert alert-success" role="alert">
																				<?php
																				echo $this->session->flashdata('success');
																				?>
																			</div>
																		<?php } ?>
																		<?php if ($this->session->flashdata('error')) { ?>
																			<div class="alert alert-danger" role="alert">
																				<?php
																				echo $this->session->flashdata('error');
																				?>
																			</div>
																		<?php } ?>
																	</div>
																</div>

																<div class="table-responsive">
																	<table class="table table-centered table-nowrap table-striped" id="formmaster_datatable">
																		<thead>
																			<tr>
																				<th>#</th>
																				<th>First Name</th>
																				<th>Last Name</th>
																				<th>Position</th>
																				<th>Company Name</th>
																				<th>Email</th>
																				<th>Phone</th>
																				<th>Status</th>
																				<th style="width: 85px;">Action</th>
																			</tr>
																		</thead>							
																	</table>
																</div>
															</div> <!-- end card-body-->
														</div> <!-- end card-->
													</div> <!-- end col -->
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="custom-v-pills-payment" role="tabpanel" aria-labelledby="custom-v-pills-payment-tab">
											<div>
											<h4 class="header-title">Note</h4>

											<form method="post" id="store-promas" action="<?php echo base_url() . 'admin/Customermaster/store'; ?>">

												<div class="row">


													<div class="row">
														<div class="col-12">
															<div class="mb-3">
																<label for="description" class="form-label">Description</label>
																<textarea class="form-control" name="description" id="description"></textarea>
															</div>
														</div>
													</div> <!-- end row -->
													<div class="mb-3">
														<label for="city_status" class="form-label">Status</label>
														<select class="form-select" name="status" id="city_status">
															<option selected="">Select Status</option>
															<option value="1" selected>Active</option>
															<option value="0">Inactive</option>
														</select>
													</div>
													<div class="row">
														<div class="col-lg-6">
															<div class="text">
																<button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
															</div>
														</div>
													</div>
											</form>
												<div class="content-page">
													<div class="container-fluid">
														<!-- start page title -->
														<div class="row">
															<div class="col-12">
																<div class="page-title-box">
																	<div class="page-title-right">
																		<ol class="breadcrumb m-0">
																			<a href="<?= base_url('admin/Customermaster/add') ?>" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle me-1"></i> Add New</a>
																		</ol>
																	</div>
																	<h4 class="page-title">Note Master</h4>
																</div>
															</div>
														</div>
														<!-- end page title -->
														<div class="row">
															<div class="col-12">
																<div class="card">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-sm-12">
																				<?php if ($this->session->flashdata('success')) { ?>
																					<div class="alert alert-success" role="alert">
																						<?php
																						echo $this->session->flashdata('success');
																						?>
																					</div>
																				<?php } ?>
																				<?php if ($this->session->flashdata('error')) { ?>
																					<div class="alert alert-danger" role="alert">
																						<?php
																						echo $this->session->flashdata('error');
																						?>
																					</div>
																				<?php } ?>
																			</div>
																		</div>

																		<div class="table-responsive">
																			<table class="table table-centered table-nowrap table-striped" id="formmaster_datatable">
																				<thead>
																					<tr>
																						<th>#</th>
																						<th>Name</th>
																						<th>Category</th>
																						<th>Phone</th>
																						<th>Company</th>
																						<th>Email</th>
																						<th style="width: 85px;">Action</th>
																					</tr>
																				</thead>
																			</table>
																		</div>
																	</div> <!-- end card-body-->
																</div> <!-- end card-->
															</div> <!-- end col -->
														</div>
														<!-- end row -->
													</div> <!-- container -->
													

												</div>
											</div>
										</div>
									</div> <!-- end col-->
								</div> <!-- end row-->

							</div>
						</div>
					</div>
				</div>
				<!-- end row -->

			</div> <!-- container -->
		</div> <!-- content -->
	</div>
	<!-- <script type="text/javascript">
	$(document).ready(function() {
		$('#firstname').bind('keyup blur', function() {
			var node = $(this);
			node.val(node.val().replace(/[^a-zA-Z ]/g, ''));
		});
		$('#lastname').bind('keyup blur', function() {
			var node 
= $(this);
			node.val(node.val().replace(/[^a-zA-Z ]/g, ''));
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('.js-example-basic-single').select2({
			theme: "bootstrap"
		});
	});
</script>
<style>
	.select2 .selection .select2-selection--single .select2-selection__rendered {
		line-height: 1.5rem;
	}

</style> -->
