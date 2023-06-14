	<!-- ============================================================== -->
	<!-- Start Page Content here -->
	<!-- ============================================================== -->

	<!-- reminders add -->
	<div class="modal fade" id="property-reminders-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-light">
					<h4 class="modal-title" id="myCenterModalLabel">Add Reminder</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body p-4">
					<form method="post" id="store-reminders" action="<?php echo base_url() . 'admin/Propertymaster/store_reminders'; ?>">
						<input type="hidden" name="property_id" value="<?= $property->id ?>">
						<!-- <div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="billing-reminder-name" class="form-label">Rreminder Name</label>
								<input class="form-control" type="text" placeholder="Enter  name" name="name" id="billing-reminder-name" />
							</div>
						</div>

					</div>  -->
						<div class="row">
							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label">Reminder Type </label>
									<select data-toggle="select2" title="type" class="form-control select2" name="type" data-width="100%">
										<option value="">Select Rreminder Type</option>

										<?php foreach ($remtype as $rt) { ?>
											<option value="<?= $rt['id'] ?>"><?= $rt['name'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>


						</div> <!-- end row -->
						<div class="row">
							<div class="col-md-12">


								<div class="mb-3">
									<label for="date_time" class="form-label">Date </label>
									<input class="form-control" id="date_time" type="datetime-local" name="date_time">
								</div>
							</div>

						</div> <!-- end row -->

						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Priority </label>
									<select data-toggle="select2" class="form-control select2" name="priority" data-width="100%">
										<option value="">Select Priority</option>
										<option value="Low">Low</option>
										<option value="Medium">Medium</option>
										<option value="High">High</option>
										<option value="Urgent">Urgent</option>
										<!-- <?php foreach ($position as $pos) { ?>
										<option value="<?= $pos['id'] ?>"><?= $pos['name'] ?></option>
									<?php }
									?> -->
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Repeat every </label>
									<select data-toggle="select2" class="form-control select2" name="repeat_every" id="repeat_every" data-width="100%">
										<option value="">Select Repeat every</option>
										<option value="1-week">1 Week</option>
										<option value="2-week">2 Weeks</option>
										<option value="1-month">1 Month</option>
										<option value="2-month">2 Months</option>
										<option value="3-month">3 Months</option>
										<option value="6-month">6 Months</option>
										<option value="1-year">1 Year</option>
										<option value="custom">Custom</option>
									</select>
								</div>
							</div>
						</div> <!-- end row -->
						<div class="row" id="custom_cycle_row">
							<div class="col-6">
								<div class="mb-3">

									<div class="input-group">
										<input type="number" class="form-control" name="repeat_every_custom" id="repeat_every_custom" value="0" placeholder="">

									</div>
									<!-- <?= form_error('cycles') ?> -->
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<select class="form-select" name="repeat_type_custom" id="repeat_type_custom">
										<option value="day" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'day') {
																echo 'selected';
															} ?>>Days(s)</option>
										<option value="week" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'week') {
																	echo 'selected';
																} ?>>Week(s)</option>
										<option value="month" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'month') {
																	echo 'selected';
																} ?>>Month(s)</option>
										<option value="year" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'year') {
																	echo 'selected';
																} ?>>Year(s)</option>
									</select>
								</div>
							</div>
						</div> <!-- end row -->
						<div class="row">
							<div class="col-12">
								<div class="mb-3">
									<label for="cycles">Total Cycles</label>
									<div class="input-group">
										<input type="number" class="form-control" name="cycles" id="cycles" value="0" placeholder="Enter Total Cycles" disabled>
										<div class="input-group-append">
											<div class="input-group-text">
												<input type="checkbox" class="custom-control-input" id="unlimited_cycles" checked>
												<label class="custom-control-label" for="unlimited_cycles" style="padding-left: 5px;"> Infinity</label>
											</div>
										</div>
									</div>
									<?= form_error('cycles') ?>
								</div>
							</div>

						</div> <!-- end row -->

						<div class="row">
							<div class="col-12">
								<div class="mb-3">
									<label for="beforeday" class="form-label">Before Day</label>
									<input type="number" class="form-control" name="beforeday" id="beforeday" placeholder="Enter Before day">
								</div>
							</div>
						</div>



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
	<div class="modal fade" id="edit-property-reminders-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-light">
					<h4 class="modal-title" id="myCenterModalLabel">Edit Reminders</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body p-4">
					<form method="post" id="update-reminders" action="<?php echo base_url() . 'admin/Propertymaster/update_reminders'; ?>">
						<input type="hidden" name="property_id" value="<?= $property->id ?>">
						<input type="hidden" name="reminder_id" id="reminder_id">
						<!-- <div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="billing-reminder-name" class="form-label">Rreminder Name</label>
								<input class="form-control" type="text" placeholder="Enter name" name="name" id="name" />
							</div>
						</div>

					</div>  -->


						<div class="row">
							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label">Rreminder Type </label>
									<select data-toggle="select2" class="form-control select2" name="type" id="type" data-width="100%">
										<option value="">Select Reminder Type</option>
										<?php foreach ($remtype as $rt) { ?>
											<option value="<?= $rt['id'] ?>"><?= $rt['name'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
						</div> <!-- end row -->
						<div class="row">
							<div class="col-md-12">
								<div class="mb-3">
									<label for="date_time" class="form-label">Date </label>
									<input class="form-control" id="date_time" type="datetime-local" name="date_time">
								</div>
							</div>
						</div> <!-- end row -->

						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Priority </label>
									<select data-toggle="select2" title="Priority" class="form-control select2" name="priority" id="priority" data-width="100%">
										<option value="">Select Priority</option>
										<option value="Low">Low</option>
										<option value="Medium">Medium</option>
										<option value="High">High</option>
										<option value="Urgent">Urgent</option>
										<!-- <?php foreach ($position as $pos) { ?>
										<option value="<?= $pos['id'] ?>"><?= $pos['name'] ?></option>
									<?php }
									?> -->
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Repeat every </label>
									<select data-toggle="select2" title="Repeat" class="form-control select2" id="repeat_every" name="repeat_every" data-width="100%">
										<option value="">Select Repeat every</option>
										<option value="1-week">1 Week</option>
										<option value="2-week">2 Weeks</option>
										<option value="1-month">1 Month</option>
										<option value="2-month">2 Months</option>
										<option value="3-month">3 Months</option>
										<option value="6-month">6 Months</option>
										<option value="1-year">1 Year</option>
										<option value="custom">Custom</option>
									</select>
								</div>
							</div>
						</div> <!-- end row -->
						<div class="row" id="custom_cycle_row">
							<div class="col-6">
								<div class="mb-3">

									<div class="input-group">
										<input type="number" class="form-control" name="repeat_every_custom" id="repeat_every_custom" value="0" placeholder="">
									</div>
									<!-- <?= form_error('cycles') ?> -->
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<select class="form-select" name="repeat_type_custom" id="repeat_type_custom">
										<option value="day" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'day') {
																echo 'selected';
															} ?>>Days(s)</option>
										<option value="week" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'week') {
																	echo 'selected';
																} ?>>Week(s)</option>
										<option value="month" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'month') {
																	echo 'selected';
																} ?>>Month(s)</option>
										<option value="year" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'year') {
																	echo 'selected';
																} ?>>Year(s)</option>
									</select>
								</div>
							</div>
						</div> <!-- end row -->
						<div class="row">
							<div class="col-12">
								<div class="mb-3">
									<label for="cycles">Total Cycles</label>
									<div class="input-group">
										<input type="number" class="form-control" name="cycles" id="cycles" value="0" placeholder="Enter Total Cycles" disabled>
										<div class="input-group-append">
											<div class="input-group-text">
												<input type="checkbox" class="custom-control-input" id="unlimited_cycles" checked>
												<label class="custom-control-label" for="unlimited_cycles" style="padding-left: 5px;"> Infinity</label>
											</div>
										</div>
									</div>
									<?= form_error('cycles') ?>
								</div>
							</div>

						</div> <!-- end row -->
						<div class="row">
							<div class="col-12">
								<div class="mb-3">
									<label for="beforeday" class="form-label">Before Day</label>
									<input type="number" class="form-control" name="beforeday" id="beforeday" placeholder="Enter Before day">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="mb-3">
									<label for="description" class="form-label">Description</label>
									<textarea class="form-control" name="description" id="description"></textarea>
								</div>
							</div>
						</div> <!-- end row -->
						<div class="mb-3">
							<label for="reminders_status" class="form-label">Status</label>
							<select class="form-select" name="status" id="reminders_status">
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
									<!-- <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
									<li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li> -->
									<!-- <a href="<?= base_url('admin/propertymaster/addreminder') ?>" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle me-1"></i> Add New</a> -->

									<button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#property-reminders-modal" style="margin-right: 5px;">Add Reminder</button>
									<?php if (isset($_GET['customer_id'])) { ?>
										<a href="<?= base_url('admin/customermaster/' . $_GET['page'] . '/' . $_GET['customer_id'] . '#customer-property') ?>" class="btn btn-primary waves-effect waves-light mb-2">Back to Customer</a>
									<?php } elseif (isset($_GET['agent_id'])) { ?>
										<a href="<?= base_url('admin/agentmaster/' . $_GET['page'] . '/' . $_GET['agent_id'] . '#agent-property') ?>" class="btn btn-primary waves-effect waves-light mb-2">Back to Channel Partner</a>
									<?php } elseif (!isset($_GET['customer_id']) && !isset($_GET['agent_id'])) { ?>
										<a href="<?= base_url('admin/Propertymaster') ?>" class="btn btn-primary waves-effect waves-light mb-2">Back to Property</a>
									<?php } ?>
								</ol>
							</div>
							<h4 class="page-title">Property Reminder</h4>
						</div>
					</div>
				</div>
				<!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <?php if ($property->customer_id != '') { ?>
                                        <div class="col-md-3">
                                            <!-- start due date -->
                                            <p class="mt-2 mb-1 text-muted">Customer Name</p>
                                            <div class="d-flex align-items-start">
                                                <i class="mdi mdi-account font-18 text-success me-1"></i>
                                                <div class="w-100">
                                                    <h5 class="mt-1 font-size-14">
                                                        <?= $customer ?>
                                                    </h5>
                                                </div>
                                            </div>
                                            <!-- end due date -->
                                        </div>
                                    <?php } elseif ($property->agent_id != '') { ?>
                                        <div class="col-md-3">
                                            <!-- start due date -->
                                            <p class="mt-2 mb-1 text-muted">Agent Name</p>
                                            <div class="d-flex align-items-start">
                                                <i class="mdi mdi-account font-18 text-success me-1"></i>
                                                <div class="w-100">
                                                    <h5 class="mt-1 font-size-14">

                                                        <?= $agent ?>
                                                    </h5>
                                                </div>
                                            </div>
                                            <!-- end due date -->
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-3">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Master</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-check font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $property->master_name ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                    <div class="col-md-3">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Category</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-menu font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $property->property_category_name ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                    <!-- end col -->

                                    <div class="col-md-3">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Sub Category</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-home-variant font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $property->property_subcategory_name ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                </div>
                                <!-- end form-check-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Stage</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-bookmark font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $property_stage['name'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                    <div class="col-md-3">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Budget</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-home-variant font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $property->from_budget .'-'. $property->to_budget ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                    <div class="col-md-3">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">State</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-home-variant font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $state['name'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                    <div class="col-md-3">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">District</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-home-variant font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $district['name'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                    <div class="col-md-3">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Sub District</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-home-variant font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $subdistrict['name'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                    <div class="col-md-3">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Moje / Area</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-home-variant font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $area['name'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
								<div class="row mb-2">
									<!-- <div class="col-sm-8">
										<button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#propertysubcategory-modal"><i class="mdi mdi-plus-circle me-1"></i> Add New</button>
									</div> -->
									<div class="col-sm-4">
										<div class="text-sm-end mt-2 mt-sm-0">
											<!-- <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
											<button type="button" class="btn btn-light mb-2 me-1">Import</button>
											<button type="button" class="btn btn-light mb-2">Export</button> -->
										</div>
									</div><!-- end col-->
								</div>

								<div class="table-responsive">
									<table class="table table-centered table-nowrap table-striped" id="proreminder_datatable">
										<thead>
											<tr>
												<th>#</th>
												<!-- <th>Name</th> -->
												<th>Type</th>
												<th>Date</th>
												<th>Priority</th>
												<th>Repeat Every</th>
												<th>Total Cycle</th>
												<th>Before Day</th>
												<th>Description</th>
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
				<!-- end row -->

			</div> <!-- container -->

		</div> <!-- content -->
	</div>
	<script>
		// var reminders_table = $('#proreminder_datatable').DataTable({

		// 	responsive: true,
		// 	ajax: "<?php echo base_url('admin/Propertymaster/all_reminders'); ?>",

		// 	"columnDefs": [{
		// 		"targets": 10,
		// 		"createdCell": function(td, cellData, rowData, row, col) {
		// 			if (rowData[10] == '1') {

		// 				$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
		// 			} else if (rowData[10] == '0') {
		// 				$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
		// 			}

		// 		}

		// 	}, ]

		// });


		//all reminder
		var reminders_table = $('#proreminder_datatable').DataTable({
			responsive: true,
			ajax: "<?php echo base_url('admin/Propertymaster/all_reminders/' . $property->id); ?>",

			columnDefs: [{
					responsivePriority: 1,
					targets: 0
				},
				{
					responsivePriority: 2,
					targets: 3
				},
				{
					responsivePriority: 10,
					targets: 6
				},
				{
					responsivePriority: 4,
					targets: 9
				},
				{
					"targets": 9,
					"createdCell": function(td, cellData, rowData, row, col) {
						if (rowData[9] == '1') {
							$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
						} else if (rowData[9] == '0') {
							$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
						}
					}
				},
			]
		});
		//add reminders 
		$("#store-reminders").validate({
			rules: {
				name: "required",
				type: "required",
				date_time: "required",
				priority: "required",
				repeat_every: "required",
				beforeday: "required",
				//description: "required",
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
						$("#store-reminders").trigger("reset");
						success_message('', response.message);
						reminders_table.ajax.reload(null, false);
					}
				});
			}
		});
		//edit reminders
		$(document).on('click', "#proreminder_datatable .edit-btn", function() {
			var id = $(this).attr('data-id');
			$.ajax({
				url: '<?php echo base_url() ?>admin/Propertymaster/edit_reminders/' + id,
				type: "POST",
				dataType: "json",
				success: function(data) {
					debugger;
					$("#edit-property-reminders-modal #reminder_id").val(data.id);
					$('#edit-property-reminders-modal #name').val(data.name);
					$('#edit-property-reminders-modal #type').val(data.type).trigger('change');
					$('#edit-property-reminders-modal #date_time').val(data.date_time);
					$('#edit-property-reminders-modal #priority').val(data.priority).trigger('change');
					if (data.custom_recurring == 1) {
						$('#edit-property-reminders-modal #repeat_every').val('custom').trigger('change');
						$('#edit-property-reminders-modal #repeat_every_custom').val(data.repeat_every).trigger('change');
						$('#edit-property-reminders-modal #repeat_type_custom').val(data.recurring_type).trigger('change');
					} else {
						$('#edit-property-reminders-modal #repeat_every').val(data.repeat_every + '-' + data.recurring_type).trigger('change');
					}
					if (data.cycles == 0) {
						$('#edit-property-reminders-modal #unlimited_cycles').prop('checked', true).trigger('change');
					} else {
						$('#edit-property-reminders-modal #unlimited_cycles').prop('checked', false).trigger('change');
					}
					$('#edit-property-reminders-modal #cycles').val(data.cycles);
					$('#edit-property-reminders-modal #beforeday').val(data.beforeday);
					$('#edit-property-reminders-modal #description').val(data.description);
					$("#edit-property-reminders-modal #reminders_status").val(data.status);
				}
			});
		});



		$(document).ready(function() {
			// Hide the Total Cycles and Custom fields by default
			$('#property-reminders-modal #cycles').parent().parent().hide();
			$('#property-reminders-modal #custom_cycle_row').hide();

			// Show/hide the Total Cycles field based on the selected Repeat value
			$('#property-reminders-modal #repeat_every').on('change', function() {
				var selectedValue = $(this).val();
				if (selectedValue === '1-week' || selectedValue === '2-week' || selectedValue === '1-month' || selectedValue === '2-month' || selectedValue === '3-month' || selectedValue === '6-month' || selectedValue === '1-year') {
					$('#property-reminders-modal #cycles').parent().parent().show();
					$('#property-reminders-modal #custom_cycle_row').hide();
				} else if (selectedValue === 'custom') {
					//$('#property-reminders-modal #cycles').parent().parent().hide();
					$('#property-reminders-modal #cycles').parent().parent().show();
					$('#property-reminders-modal #custom_cycle_row').show();
				} else {
					$('#property-reminders-modal #cycles').parent().parent().hide();
					$('#property-reminders-modal #custom_cycle_row').hide();
				}
			});

			// spacing between the Infinity checkbox and label
			$('#property-reminders-modal #default_total_cycles').on('change', function() {
				var checkbox = $(this);
				var label = checkbox.next('label');
				if (checkbox.is(':checked')) {
					label.css('margin-left', '5px');
				} else {
					label.css('margin-left', '15px');
				}
			});

			// Disable the Total Cycles field when Infinity is checked
			$('#property-reminders-modal #unlimited_cycles').on('change', function() {
				var checkbox = $(this);
				var totalCycles = $('#property-reminders-modal #cycles');
				if (checkbox.is(':checked')) {
					totalCycles.attr('disabled', true);
				} else {
					totalCycles.attr('disabled', false);
				}
			});

			//for edit model
			// Hide the Total Cycles and Custom fields by default
			$('#edit-property-reminders-modal #cycles').parent().parent().hide();
			$('#edit-property-reminders-modal #custom_cycle_row').hide();

			// Show/hide the Total Cycles field based on the selected Repeat value
			$('#edit-property-reminders-modal #repeat_every').on('change', function() {
				var selectedValue = $(this).val();
				if (selectedValue === '1-week' || selectedValue === '2-week' || selectedValue === '1-month' || selectedValue === '2-month' || selectedValue === '3-month' || selectedValue === '6-month' || selectedValue === '1-year') {
					$('#edit-property-reminders-modal #cycles').parent().parent().show();
					$('#edit-property-reminders-modal #custom_cycle_row').hide();
				} else if (selectedValue === 'custom') {
					//$('#edit-property-reminders-modal #cycles').parent().parent().hide();
					$('#edit-property-reminders-modal #cycles').parent().parent().show();
					$('#edit-property-reminders-modal #custom_cycle_row').show();
				} else {
					$('#edit-property-reminders-modal #cycles').parent().parent().hide();
					$('#edit-property-reminders-modal #custom_cycle_row').hide();
				}
			});

			// spacing between the Infinity checkbox and label
			$('#edit-property-reminders-modal #default_total_cycles').on('change', function() {
				var checkbox = $(this);
				var label = checkbox.next('label');
				if (checkbox.is(':checked')) {
					label.css('margin-left', '5px');
				} else {
					label.css('margin-left', '15px');
				}
			});

			// Disable the Total Cycles field when Infinity is checked
			$('#edit-property-reminders-modal #unlimited_cycles').on('change', function() {
				var checkbox = $(this);
				var totalCycles = $('#edit-property-reminders-modal #cycles');
				if (checkbox.is(':checked')) {
					totalCycles.attr('disabled', true);
				} else {
					totalCycles.attr('disabled', false);
				}
			});
		});



		//update reminders
		$("#update-reminders").validate({
			rules: {
				name: "required",
				type: "required",
				date_time: "required",
				priority: "required",
				repeat_every: "required",
				//description: "required",
				status: "required"
			},
			submitHandler: function(form, e) {
				e.preventDefault();
				var url = $(form).attr("action");
				var id = $('#edit-property-reminders-modal #reminder_id').val();
				$.ajax({
					url: url + '/' + id,
					type: "POST",
					data: $(form).serialize(),
					dataType: "json",
					success: function(response) {
						$('.btn-close').trigger('click');
						success_message('', response.message);
						reminders_table.ajax.reload(null, false);
					}
				});
			}
		});
	</script>