<!-- contact add -->
<div class="modal fade" id="agent-contact-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add Contacts</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-contact" action="<?php echo base_url() . 'admin/Agentmaster/store_contact'; ?>">
					<input type="hidden" name="agent_id" value="<?= $agent->id ?>">
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
								<select data-toggle="select2" title="Position" class="form-control select2" name="position_id" data-width="100%">
									<option value="">Select Position</option>
									<?php 
									foreach ($position as $pos) { ?>
										<option value="<?= $pos['id'] ?>"><?= $pos['name'] ?></option>
									<?php }
									?>
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
								<label for="billing-phone" class="form-label">Mobile <span class="text-danger">*</span></label>
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
						<div class="col-lg-12">
							<div class="text-end">
								<button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
								<button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="edit-agent-contact-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Edit Contacts</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="update-contact" action="<?php echo base_url() . 'admin/Agentmaster/update_contact'; ?>">
					<input type="hidden" name="agent_id" value="<?= $agent->id ?>">
					<input type="hidden" name="contact_id" id="contact_id">
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="billing-first-name" class="form-label">First Name</label>
								<input class="form-control" type="text" placeholder="Enter your first name" name="first_name" id="first_name" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="billing-last-name" class="form-label">Last Name</label>
								<input class="form-control" type="text" placeholder="Enter your last name" name="last_name" id="last_name" />
							</div>
						</div>
					</div> <!-- end row -->
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Position</label>
								<select data-toggle="select2" title="Position" class="form-control select2" name="position_id" id="position_id" data-width="100%">
									<option>Select Position</option>
									<?php foreach ($position as $pos) { ?>
										<option value="<?= $pos['id'] ?>"><?= $pos['name'] ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="company" class="form-label">Company Name</label>
								<input type="text" maxlength="14" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name">
							</div>
						</div>
					</div> <!-- end row -->
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="billing-email-address" class="form-label">Email Address <span class="text-danger"></span></label>
								<input class="form-control" type="email" name="email" placeholder="Enter your email" id="email" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="billing-phone" class="form-label">Phone <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="phone" placeholder="(xx) xxx xxxx xxx" id="phone" />
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
						<label for="contact_status" class="form-label">Status</label>
						<select class="form-select" name="status" id="contact_status">
							<option selected="">Select Status</option>
							<option value="1" selected>Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="text-end">
								<button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
								<button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- notes add -->
<div class="content-page">
	<div class="modal fade" id="agent-notes-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-light">
					<h4 class="modal-title" id="myCenterModalLabel">Add Notes</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body p-4">
					<form method="post" id="store-notes" action="<?php echo base_url() . 'admin/Agentmaster/store_note'; ?>">
						<input type="hidden" name="agent_id" value="<?= $agent->id ?>">

						<div class="row">
							<div class="col-12">
								<div class="mb-3">
									<label for="name" class="form-label">Note</label>
									<textarea class="form-control" name="name" id="name"></textarea>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label for="city_status" class="form-label">Status</label>
							<select class="form-select" name="status" id="city_status">
								<option selected="">Select Status</option>
								<option value="1" selected>Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="text-end">
									<button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
									<button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<div class="modal fade" id="edit-agent-notes-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-light">
					<h4 class="modal-title" id="myCenterModalLabel">Edit Notes</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body p-4">
					<form method="post" id="update-note" action="<?php echo base_url() . 'admin/Agentmaster/update_note'; ?>">
						<input type="hidden" name="agent_id" value="<?= $agent->id ?>">
						<input type="hidden" name="note_id" id="note_id">
						<div class="row">
							<div class="col-12">
								<div class="mb-3">
									<label for="name" class="form-label">Note</label>
									<textarea class="form-control" name="name" id="name"></textarea>
								</div>
							</div>
						</div>

						<div class="mb-3">
							<label for="note_status" class="form-label">Status</label>
							<select class="form-select" name="status" id="note_status">
								<option selected="">Select Status</option>
								<option value="1" selected>Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="text-end">
									<button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
									<button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<div class="content">
		<!-- Start Content-->
		<div class="container-fluid">
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<a type="button" href="<?= base_url('admin/Agentmaster') ?>" class="btn btn-success" style="float:right;">Back</a>
							</ol>
						</div>
						<h4 class="page-title">Channel Partner</h4>
					</div>
				</div>
			</div>

			<!-- end page title -->

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<!-- start due date -->
								<p class="mt-2 mb-1 text-muted">Name</p>
								<div class="d-flex align-items-start">
									<i class="mdi mdi-account font-18 text-success me-1"></i>
									<div class="w-100">
										<h5 class="mt-1 font-size-14">
										
										<?= $agent->first_name . ' ' . $agent->last_name.' '.(($agent->nick_name=="") ? '' : '('.$agent->nick_name.')')?>
										</h5>
									</div>
								</div>
								<!-- end due date -->
							</div>
							<div class="col-md-4">
								<!-- start due date -->
								<p class="mt-2 mb-1 text-muted">Mobile</p>
								<div class="d-flex align-items-start">
									<i class="mdi mdi-phone font-18 text-success me-1"></i>
									<div class="w-100">
										<h5 class="mt-1 font-size-14">
											<?= $agent->phone ?>
										</h5>
									</div>
								</div>
								<!-- end due date -->
							</div>
							<!-- end col -->

							<div class="col-md-4">
								<!-- start due date -->
								<p class="mt-2 mb-1 text-muted">Email</p>
								<div class="d-flex align-items-start">
									<i class="mdi mdi-gmail font-18 text-success me-1"></i>
									<div class="w-100">
										<h5 class="mt-1 font-size-14">
											<?= $agent->email ?>
										</h5>
									</div>
								</div>
								<!-- end due date -->
							</div>
							<div class="col-md-4">
								<!-- start due date -->
								<p class="mt-2 mb-1 text-muted">Company</p>
								<div class="d-flex align-items-start">
									<i class="mdi mdi-office-building font-18 text-success me-1"></i>
									<div class="w-100">
										<h5 class="mt-1 font-size-14">
											<?= $agent->company_name ?>
										</h5>
									</div>
								</div>
								<!-- end due date -->
							</div>
							<div class="col-md-4">
								<!-- start due date -->
								<p class="mt-2 mb-1 text-muted">Source</p>
								<div class="d-flex align-items-start">
									<i class="mdi mdi-newspaper font-18 text-success me-1"></i>
									<div class="w-100">
										<h5 class="mt-1 font-size-14">
											<?= $source->name ?>
										</h5>
									</div>
								</div>
								<!-- end due date -->
							</div>
							<div class="col-md-4">
								<!-- start due date -->
								<p class="mt-2 mb-1 text-muted">Position</p>
								<div class="d-flex align-items-start">
									<i class="mdi mdi-badge-account font-18 text-success me-1"></i>
									<div class="w-100">
										<h5 class="mt-1 font-size-14">
											<?= $position_data->name ?>
										</h5>
									</div>
								</div>
								<!-- end due date -->
							</div>
							<div class="col-md-4">
								<!-- start due date -->
								<p class="mt-2 mb-1 text-muted">Team Name</p>
								<div class="d-flex align-items-start">
									<i class="mdi mdi-account-group font-18 text-success me-1"></i>
									<div class="w-100">
										<h5 class="mt-1 font-size-14">
										<?= ($staff != null)?$staff->first_name.' '.$staff->last_name:' - '?>
								


										</h5>
									</div>
								</div>
								<!-- end due date -->
							</div>
						</div>
							<div class="row">
								<div class="col-lg-4">
									<div class="nav nav-pills flex-column navtab-bg nav-pills-tab text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
										<!-- <a class="nav-link py-2" id="agent-tab" data-bs-toggle="pill" href="#agent" role="tab" aria-controls="agent" aria-selected="false">
											<i class="mdi mdi-account-circle d-block font-24"></i>
											Channel Partner
										</a> -->
										<a class="nav-link mt-2 py-2" id="agent-contacts-tab" data-bs-toggle="pill" href="#agent-contacts" role="tab" aria-controls="agent-contacts" aria-selected="false">
											<i class="mdi mdi-contacts d-block font-24"></i>
											Contact</a>
										<a class="nav-link mt-2 py-2" id="agent-notes-tab" data-bs-toggle="pill" href="#agent-notes" role="tab" aria-controls="agent-notes" aria-selected="false">
											<i class="mdi mdi-note d-block font-24"></i>
											Note
										</a>
										<a class="nav-link mt-2 py-2" id="agent-property-tab" data-bs-toggle="pill" href="#agent-property" role="tab" aria-controls="agent-property" aria-selected="false">
											<i class="mdi mdi-office-building d-block font-24"></i>
											Property
										</a>
									</div>


								</div> <!-- end col-->
								<div class="col-lg-8">
									<div class="tab-content p-3">
										<div class="tab-pane fade" id="agent" role="tabpanel" aria-labelledby="agent-tab">
											<div>
												<h4 class="header-title">Channel Partner Information</h4><br>

												
											</div>
										</div>
										<div class="tab-pane fade" id="agent-contacts" role="tabpanel" aria-labelledby="agent-contacts-tab">
											<div>
												<div class="row justify-content-between mb-2">
													<div class="col-auto">
														<h4 class="header-title">Contact</h4>
													</div>
													<div class="col-sm-6">
														<div class="text-sm-end">
															<button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#agent-contact-modal">Add Contact</button>
														</div>
													</div>
												</div>
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
																	<table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="agent_contact_datatable">
																		<thead>
																			<tr>
																				<th>#</th>
																				<th>Name</th>
																				<th>Position</th>
																				<th>Company Name</th>
																				<th>Email</th>
																				<th>Mobile</th>
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
										<div class="tab-pane fade" id="agent-notes" role="tabpanel" aria-labelledby="agent-notes-tab">
											<div>
												<div class="row justify-content-between mb-2">
													<div class="col-auto">
														<h4 class="header-title">Note</h4>
													</div>
													<div class="col-sm-6">
														<div class="text-sm-end">
															<button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#agent-notes-modal">Add Note</button>
														</div>
													</div>
												</div>
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
																	<table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="agent_notes_datatable">
																		<thead>
																			<tr>
																				<th>#</th>
																				<th>Note</th>
																				<th>Crate</th>
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
										<div class="tab-pane fade" id="agent-property" role="tabpanel" aria-labelledby="agent-property-tab">
											<div>
												<div class="row justify-content-between mb-2">
													<div class="col-auto">
														<h4 class="header-title">Property</h4>
													</div>
													<div class="col-sm-6">
														<div class="text-sm-end">
														<!-- <a href="<?= base_url('admin/Agentmaster/add') ?>" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle me-1"></i> Add New</a> -->
														
															<a href="<?= base_url('admin/Propertymaster/add') ?>?agent_id=<?=$agent->id?>&page=agentDetails" class="btn btn-danger waves-effect waves-light mb-2">Add Property</a>
														</div>

													</div>
												</div>
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
																	<table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="agent_property_datatable">
																		<thead>
																			<tr>
																				<th>#</th>
																				<th>Master Name</th>
																				<th>Category</th>
																				<th>Sub Category</th>
																				<th>Create Date</th>
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
<script>
	$(document).ready(function() {
		$('.js-example-basic-single').select2({
			theme: "bootstrap"
		});
	});
	$(function(){
		var hash = window.location.hash;
		hash && $('ul.nav a[href="' + hash + '"]').tab('show');
		
		var triggerTabList = [].slice.call(document.querySelectorAll('#v-pills-tab a'))
			triggerTabList.forEach(function (triggerEl) {
			var tabTrigger = new bootstrap.Tab(triggerEl)

			triggerEl.addEventListener('click', function (event) {
				event.preventDefault()
				tabTrigger.show()
			})
		});
		var triggerFirstTabEl = document.querySelector('#v-pills-tab a:first-child')
		bootstrap.Tab.getInstance(triggerFirstTabEl).show() // Select first tab

		var triggerEl = document.querySelector('#v-pills-tab a[href="'+hash+'"]')
		bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
		
	});
	
	//all contact
	var contact_table = $('#agent_contact_datatable').DataTable({
		responsive: true,
		ajax: "<?php echo base_url('admin/Agentmaster/all_contact/'.$agent->id); ?>",
		columnDefs: [
		{ responsivePriority: 1, targets: 0 },
		{ responsivePriority: 2, targets: 1},
		{ responsivePriority: 3, targets: 6},
		{ responsivePriority: 4, targets: 7},
		{
			"targets": 6,
			"createdCell": function(td, cellData, rowData, row, col) {
				if (rowData[6] == '1') {
					$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
				} else if (rowData[6] == '0') {
					$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
				}
			}
		}, ]
	});
	//add contact 
	$("#store-contact").validate({
		rules: {
			first_name: "required",
			last_name: "required",
			position_id: "required",
			// company_name: "required",
			email: "required",
			phone: "required",
			description: "required",
			status: "required"
		},
		submitHandler: function(form,e) {
			e.preventDefault();
			var url = $(form).attr("action");
			$.ajax({
				url: url,
				type: "POST",
				data: $(form).serialize(),
				dataType: "json",
				success: function(response) {
					$('.btn-close').trigger('click');
					$("#store-contact").trigger("reset");
					success_message('', response.message);
					contact_table.ajax.reload(null, false);
				}
			});
		}
	});
	//edit contact
	$(document).on('click', ".edit-btn", function() {
		var id = $(this).attr('data-id');
		$.ajax({
			url: '<?php echo base_url() ?>admin/Agentmaster/edit_contact/' + id,
			type: "POST",
			dataType: "json",
			success: function(data) {
				$("#edit-agent-contact-modal #contact_id").val(data.id);
				$('#edit-agent-contact-modal #first_name').val(data.first_name);
				$('#edit-agent-contact-modal #last_name').val(data.last_name);
				$('#edit-agent-contact-modal #position_id').val(data.position_id).trigger('change');
				$('#edit-agent-contact-modal #company_name').val(data.company_name);
				$('#edit-agent-contact-modal #email').val(data.email);
				$('#edit-agent-contact-modal #phone').val(data.phone);
				$('#edit-agent-contact-modal #description').val(data.description);
				$("#edit-agent-contact-modal #contact_status").val(data.status);
			}
		});
	});
	//update contact
	$("#update-contact").validate({
		rules: {
			first_name: "required",
			last_name: "required",
			position_id: "required",
			// company_name: "required",
			email: "required",
			phone: "required",
			description: "required",
			status: "required"
		},
		submitHandler: function(form, e) {
			e.preventDefault();
			var url = $(form).attr("action");
			var id = $('#edit-agent-contact-modal #contact_id').val();
			$.ajax({
				url: url + '/' + id,
				type: "POST",
				data: $(form).serialize(),
				dataType: "json",
				success: function(response) {
					$('.btn-close').trigger('click');
					success_message('', response.message);
					contact_table.ajax.reload(null, false);
				}
			});
		}
	});
	//all Notes
	var note_table = $('#agent_notes_datatable').DataTable({
		responsive: true,
		ajax: "<?php echo base_url('admin/Agentmaster/all_note/' . $agent->id); ?>",
		"columnDefs": [
		{ responsivePriority: 1, targets: 0 },
		{ responsivePriority: 2, targets: 1},
		{ responsivePriority: 3, targets: 3},
		{ responsivePriority: 4, targets: 4},
		{
			"targets": 3,
			"createdCell": function(td, cellData, rowData, row, col) {
				if (rowData[3] == '1') {
					$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
				} else if (rowData[3] == '0') {
					$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
				}
			}
		}, ]
	});
	//add Notes 
	$("#store-notes").validate({
		rules: {
			name: "required",

			status: "required"
		},
		submitHandler: function(form, e) {
			e.preventDefault();
			var url = $(form).attr("action");
			$.ajax({
				url: url,
				type: "POST",
				data: $(form).serialize(),
				dataType: "json",
				success: function(response) {
					$('.btn-close').trigger('click');
					$("#store-notes").trigger("reset");
					success_message('', response.message);
					note_table.ajax.reload(null, false);
				}
			});
		}
	});
	//edit Notes
	$(document).on('click', ".edit-btn", function() {
		var id = $(this).attr('data-id');
		$.ajax({
			url: '<?php echo base_url() ?>admin/Agentmaster/edit_note/' + id,
			type: "POST",
			dataType: "json",
			success: function(data) {
				$("#edit-agent-notes-modal #note_id").val(data.id);
				$('#edit-agent-notes-modal #name').val(data.name);
				$("#edit-agent-notes-modal #contact_status").val(data.status);
			}
		});
	});
	//update Notes
	$("#update-note").validate({
		rules: {
			name: "required",
			status: "required"
		},
		submitHandler: function(form, e) {
			e.preventDefault();
			var url = $(form).attr("action");
			var id = $('#edit-agent-notes-modal #note_id').val();
			$.ajax({
				url: url + '/' + id,
				type: "POST",
				data: $(form).serialize(),
				dataType: "json",
				success: function(response) {
					$('.btn-close').trigger('click');
					success_message('', response.message);
					contact_table.ajax.reload(null, false);
				}
			});
		}
	});


	//all property
	var property_table = $('#agent_property_datatable').DataTable({
		responsive: true,
		ajax: "<?php echo base_url('admin/Agentmaster/all_property/' . $agent->id.'/agentDetails'); ?>",
		columnDefs: [
		{ responsivePriority: 1, targets: 0 },
		{ responsivePriority: 2, targets: 1},
		{ responsivePriority: 3, targets: 5},
		{ responsivePriority: 4, targets: 6},
		{
			"targets": 5,
			"createdCell": function(td, cellData, rowData, row, col) {
				if (rowData[5] == '1') {
					$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
				} else if (rowData[5] == '0') {
					$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
				}
			}
		}, ]
	});
	$(document).ready(function () {				
		$("#agent-contacts-tab").on('click',function(){
			contact_table.ajax.reload(null, false);
		});
		$("#agent-notes-tab").on('click',function(){
			note_table.ajax.reload(null, false);
		});
		$("#agent-property-tab").on('click',function(){
			property_table.ajax.reload(null, false);
		});

		var hash = window.location.hash;
		$(hash+"-tab").trigger('click');
	});

	$('input[name=inquiry_type]').click(function() {
		if (this.id == "agent") {
			$("#agent_div").show('slow');			
		} else {
			$("#agent_div").hide('slow');			
		}
		
	});	
	$('input[name=inquiry_type]').trigger('click');	
</script>
