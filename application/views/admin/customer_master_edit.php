<!-- contact add -->
<div class="modal fade" id="customer-contact-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add Contacts</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-contact" action="<?php echo base_url() . 'admin/Customermaster/store_contact'; ?>">
					<input type="hidden" name="customer_id" value="<?= $customer->id ?>">
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
								<input type="text" maxlength="14" class="form-control" name="company_name" id="company" placeholder="Enter Company Name">
							</div>
						</div>
					</div> <!-- end row -->
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="billing-email-address" class="form-label">Email Address </label>
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
<div class="modal fade" id="edit-customer-contact-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Edit Contacts</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="update-contact" action="<?php echo base_url() . 'admin/Customermaster/update_contact'; ?>">
					<input type="hidden" name="customer_id" value="<?= $customer->id ?>">
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
<!-- reminders add -->
<div class="modal fade" id="customer-reminders-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add Reminder</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-reminders" action="<?php echo base_url() . 'admin/Customermaster/store_reminders'; ?>">
					<input type="hidden" name="customer_id" value="<?= $customer->id ?>">
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
									<option value="day" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'day'){echo 'selected';} ?>>Days(s)</option>
									<option value="week" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'week'){echo 'selected';} ?>>Week(s)</option>
									<option value="month" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'month'){echo 'selected';} ?>>Month(s)</option>
									<option value="year" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'year'){echo 'selected';} ?>>Year(s)</option>
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
<div class="modal fade" id="edit-customer-reminders-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Edit Reminders</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="update-reminders" action="<?php echo base_url() . 'admin/Customermaster/update_reminders'; ?>">
					<input type="hidden" name="customer_id" value="<?= $customer->id ?>">
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
								<label class="form-label">Reminder Type </label>
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
									<option value="day" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'day'){echo 'selected';} ?>>Days(s)</option>
									<option value="week" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'week'){echo 'selected';} ?>>Week(s)</option>
									<option value="month" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'month'){echo 'selected';} ?>>Month(s)</option>
									<option value="year" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'year'){echo 'selected';} ?>>Year(s)</option>
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

<!-- notes add -->
<div class="content-page">
	<div class="modal fade" id="customer-notes-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-light">
					<h4 class="modal-title" id="myCenterModalLabel">Add Notes</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body p-4">
					<form method="post" id="store-notes" action="<?php echo base_url() . 'admin/Customermaster/store_note'; ?>">
						<input type="hidden" name="customer_id" value="<?= $customer->id ?>">

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
	<div class="modal fade" id="edit-customer-notes-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-light">
					<h4 class="modal-title" id="myCenterModalLabel">Edit Notes</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body p-4">
					<form method="post" id="update-note" action="<?php echo base_url() . 'admin/Customermaster/update_note'; ?>">
						<input type="hidden" name="customer_id" value="<?= $customer->id ?>">
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
								<a type="button" href="<?= base_url('admin/Customermaster') ?>" class="btn btn-success" style="float:right;">Back</a>
							</ol>

						</div>

						<h4 class="page-title">Customer Master</h4>
						<div class="row">
							<div class="col-md-4">

								<!-- <p class="mt-2 mb-1 text-muted">Name</p> -->
								<!-- <div class="d-flex align-items-start">
									<i class="mdi mdi-account font-18 text-success me-1"></i>
									<div class="w-100">
										<h5 class="mt-1 font-size-10">
											<?= $customer->first_name . ' ' . $customer->last_name ?>
										</h5>
									</div>
									<i class="mdi mdi-phone font-18 text-success me-1"></i>
									<div class="w-100">
										<h5 class="mt-1 font-size-10">
										<?= $customer->phone ?>	</h5>
									</div>
								</div> -->
								<!-- end col -->
							</div>
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
													<?= $customer->first_name . ' ' . $customer->last_name ?>
												</h5>
											</div>
										</div>
										<!-- end due date -->
									</div>
									<div class="col-md-4">
										<!-- start due date -->
										<p class="mt-2 mb-1 text-muted">Phone</p>
										<div class="d-flex align-items-start">
											<i class="mdi mdi-phone font-18 text-success me-1"></i>
											<div class="w-100">
												<h5 class="mt-1 font-size-14">
													<?= $customer->phone ?>
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
													<?= $customer->email ?>
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
													<?= $customer->company_name ?>
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
													<?= $source_data->name ?>
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
										<p class="mt-2 mb-1 text-muted">Staff Name</p>
										<div class="d-flex align-items-start">
											<i class="mdi mdi-account-group font-18 text-success me-1"></i>
											<div class="w-100">
												<h5 class="mt-1 font-size-14">
													<?= ($staff_data != null) ? $staff_data->first_name . ' ' . $staff_data->last_name : ' - ' ?>



												</h5>
											</div>
										</div>
										<!-- end due date -->
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-4">
										<div class="nav nav-pills flex-column navtab-bg nav-pills-tab text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
											<a class="nav-link py-2" id="customer-tab" data-bs-toggle="pill" href="#customer" role="tab" aria-controls="customer" aria-selected="false">
												<i class="mdi mdi-account-circle d-block font-24"></i>
												Customer Master
											</a>
											<a class="nav-link mt-2 py-2" id="customer-contacts-tab" data-bs-toggle="pill" href="#customer-contacts" role="tab" aria-controls="customer-contacts" aria-selected="false">
												<i class="mdi mdi-contacts d-block font-24"></i>
												Contact</a>
											<a class="nav-link mt-2 py-2" id="customer-notes-tab" data-bs-toggle="pill" href="#customer-notes" role="tab" aria-controls="customer-notes" aria-selected="false">
												<i class="mdi mdi-note d-block font-24"></i>
												Note
											</a>
											<a class="nav-link mt-2 py-2" id="customer-property-tab" data-bs-toggle="pill" href="#customer-property" role="tab" aria-controls="customer-property" aria-selected="false">
												<i class="mdi mdi-office-building d-block font-24"></i>
												Property
											</a>
											<a class="nav-link mt-2 py-2" id="customer-reminders-tab" data-bs-toggle="pill" href="#customer-reminders" role="tab" aria-controls="customer-reminders" aria-selected="false">
												<i class="mdi mdi-office-building d-block font-24"></i>
												Reminders
											</a>
										</div>


									</div> <!-- end col-->
									<div class="col-lg-8">
										<div class="tab-content p-3">
											<div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="customer-tab">

												<!-- <div class="row">
													<div class="col-md-4">
													
														<div class="d-flex align-items-start">
															<i class="mdi mdi-account font-18 text-success me-1"></i>
															<div class="w-100">
																<h5 class="mt-1 font-size-12">
																	<?= $customer->first_name . ' ' . $customer->last_name ?>
																</h5>
															</div>
														</div>
														
													</div>
													<div class="col-md-4">
													
														<div class="d-flex align-items-start">
															<i class="mdi mdi-phone font-18 text-success me-1"></i>
															<div class="w-100">
																<h5 class="mt-1 font-size-12">
																	<?= $customer->phone ?>
																</h5>
															</div>
														</div>
														
													</div>
													
										    	</div> -->
												<div>
													<h4 class="header-title">Customer Information</h4><br>

													<!-- <p class="sub-header">Fill the form below in order to
                                                                send you the order's invoice.</p> -->
													<form method="post" id="store-promas" action="<?php echo base_url() . 'admin/Customermaster/update/' . $customer->id; ?>">

														<div class="row">
															<div class="col-md-5">
																<div class="mb-3">

																	<input class="form-check-input" type="radio" id="direct" name="inquiry_type" <?= $customer->inquiry_type == 'direct' ? 'checked' : ''; ?> value="direct">
																	<label class="form-check-label" for="direct">Direct</label>
																</div>

															</div>
															<div class="col-md-5">
																<div class="mb-3">
																	<input class="form-check-input" type="radio" id="agent" name="inquiry_type" <?= $customer->inquiry_type == 'agent' ? 'checked' : ''; ?> value="agent">
																	<label class="form-check-label" for="agent">Via Channel Partner </label>
																</div>

															</div>
														</div>
														<div id='agent_div' style='display:none'>
															<div class="col-md-5">
																<div class="mb-3">
																	<label class="form-label">Channel Partner <span class="text-danger">*</span></label>
																	<select data-toggle="select2" title="Assigned" class="form-control select2" name="agent_id" data-width="100%">
																		<?php foreach ($agent as $ag) { ?>
																			<!-- <option value="<?= $ag['id'] ?>"><?= $ag['first_name'] ?><?= $ag['last_name'] ?>  <?= $ag['phone'] ?></option> -->
																			<option value="<?= $ag['id'] ?>"><?= $ag['first_name'] ?> <?= $ag['last_name'] ?><?= $ag['nick_name'] ? ' (' . $ag['nick_name'] . ')' : '' ?> <?= $ag['phone'] ?></option>
																		<?php } ?>
																	</select>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-4">
																<label class="form-label">Inquiry Source<span class="text-danger">*</span></label>
																<select data-toggle="select2" class="form-control select2" name="source_id" data-width="100%">
																	<option value=''>Select Source</option>
																	<?php foreach ($source as $sou) { ?>
																		<option value="<?= $sou['id'] ?>" <?= ($sou['id'] == $customer->source_id) ? 'selected' : '' ?>><?= $sou['name'] ?></option>
																	<?php } ?>
																</select>
																<!-- <span style="color: red;"><?= form_error('source_id') ?></span> -->

															</div>
															<div class="col-md-4">
																<div class="mb-3">
																	<label for="billing-first-name" class="form-label">First Name<span class="text-danger">*</span></label>
																	<input class="form-control" type="text" placeholder="Enter your first name" name="first_name" id="billing-first-name" value="<?= $customer->first_name ?>" />
																</div>
																<span style="color: red;"><?= form_error('first_name') ?></span>

															</div>
															<div class="col-md-4">
																<div class="mb-3">
																	<label for="billing-last-name" class="form-label">Last Name<span class="text-danger">*</span></label>
																	<input class="form-control" type="text" placeholder="Enter your last name" name="last_name" id="billing-last-name" value="<?= $customer->last_name ?>" />
																</div>
																<span style="color: red;"><?= form_error('last_name') ?></span>
															</div> <!-- end row -->
														</div>
														<div class="row">

															<!-- <div class="col-md-4">
															<div class="mb-3">
																<label for="billing-nick-name" class="form-label">Nick Name<span class="text-danger">*</span></label>
																<input class="form-control" type="text" placeholder="Enter your Nick name" name="nick_name" id="billing-nick-name" />
															</div>
															<span style="color: red;"><?= form_error('nick_name') ?></span>
														</div> -->
														</div> <!-- end row -->
														<div class="row">

															<div class="col-md-6">
																<div class="mb-3">
																	<label for="billing-phone" class="form-label">Phone <span class="text-danger">*</span></label>
																	<input class="form-control" type="text" name="phone" placeholder="(xx) xxx xxxx xxx" id="billing-phone" value="<?= $customer->phone ?>" />
																</div>
																<span style="color: red;"><?= form_error('phone') ?></span>

															</div>
															<div class="col-md-6">
																<div class="mb-3">
																	<label for="billing-email-address" class="form-label">Email Address </label>
																	<input class="form-control" type="email" name="email" placeholder="Enter your email" id="billing-email-address" value="<?= $customer->email ?>" />
																</div>
																<!-- <span style="color: red;"><?= form_error('email') ?></span> -->

															</div>
														</div> <!-- end row -->
														<div class="row">
															<div class="col-12">
																<div class="mb-3">
																	<label for="company" class="form-label">Company Name</label>
																	<input type="text" maxlength="14" class="form-control" name="company_name" id="company" placeholder="Enter Company Name" value="<?= $customer->company_name ?>">
																</div>
																<!-- <span style="color: red;"><?= form_error('company_name') ?></span> -->

															</div>
														</div> <!-- end row -->


														<div class="row">
															<div class="col-12">
																<div class="mb-3">
																	<label for="description" class="form-label">Description</label>
																	<textarea class="form-control" name="description" id="description"><?= $customer->description ?></textarea>
																</div>
																<!-- <span style="color: red;"><?= form_error('description') ?></span> -->

															</div>
														</div> <!-- end row -->

														<div class="row">

															<div class="col-md-6">
																<div class="mb-3">
																	<label class="form-label">Assigned</label>
                                                                    <select data-toggle="select2" title="Assigned" class="form-control select2 assigned" name="assigned_id[]" data-width="100%" multiple>
                                                                        <?php foreach ($staff as $sta) { ?>
                                                                            <option value="<?= $sta['id'] ?>" <?php for($i=0;$i<count($assigned_id);$i++) { if($sta['id'] == $assigned_id[$i]) { ?>selected<?php } } ?>><?= $sta['first_name'] ?> <?= $sta['last_name'] ?></option>
                                                                        <?php }
                                                                        ?>
                                                                    </select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="mb-3">
																	<label class="form-label">Position</label>
																	<select data-toggle="select2" title="Position" class="form-control select2" name="position_id" data-width="100%">
																		<option value=''>Select Position</option>
																		<?php foreach ($position as $pos) { ?>
																			<option value="<?= $pos['id'] ?>" <?= ($pos['id'] == $customer->position_id) ? 'selected' : '' ?>><?= $pos['name'] ?></option>
																		<?php }
																		?>
																	</select>
																	<!-- <span style="color: red;"><?= form_error('position_id') ?></span> -->
																</div>
															</div>
														</div> <!-- end row -->


														<div class="mb-3">
															<label for="city_status" class="form-label">Status</label>
															<select class="form-select" name="status" id="city_status">
																<option selected="">Select Status</option>
																<option value="1" <?= ($customer->status == 1) ? 'selected' : '' ?>>Active</option>
																<option value="0" <?= ($customer->status == 0) ? 'selected' : '' ?>>Inactive</option>
															</select>
															<span style="color: red;"><?= form_error('status') ?></span>

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
											<div class="tab-pane fade" id="customer-contacts" role="tabpanel" aria-labelledby="customer-contacts-tab">
												<div>
													<div class="row justify-content-between mb-2">
														<div class="col-auto">
															<h4 class="header-title">Contact</h4>
														</div>
														<div class="col-sm-6">
															<div class="text-sm-end">
																<button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#customer-contact-modal">Add Contact</button>
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
																		<table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="customer_contact_datatable">
																			<thead>
																				<tr>
																					<th>#</th>
																					<th>Name</th>
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
											<div class="tab-pane fade" id="customer-notes" role="tabpanel" aria-labelledby="customer-notes-tab">
												<div>
													<div class="row justify-content-between mb-2">
														<div class="col-auto">
															<h4 class="header-title">Note</h4>
														</div>
														<div class="col-sm-6">
															<div class="text-sm-end">
																<button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#customer-notes-modal">Add Note</button>
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
																		<table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="customer_notes_datatable">
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
											<div class="tab-pane fade" id="customer-property" role="tabpanel" aria-labelledby="customer-property-tab">
												<div>
													<div class="row justify-content-between mb-2">
														<div class="col-auto">
															<h4 class="header-title">Property</h4>
														</div>
														<div class="col-sm-6">
															<div class="text-sm-end">
																<!-- <a href="<?= base_url('admin/Customermaster/add') ?>" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle me-1"></i> Add New</a> -->

																<a href="<?= base_url('admin/Propertymaster/add') ?>?customer_id=<?= $customer->id ?>&page=edit" class="btn btn-danger waves-effect waves-light mb-2">Add Property</a>
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
																		<table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="customer_property_datatable">
																			<thead>
																				<tr>
																					<th></th>
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

											<div class="tab-pane fade" id="customer-reminders" role="tabpanel" aria-labelledby="customer-reminders-tab">
												<div>
													<div class="row justify-content-between mb-2">
														<div class="col-auto">
															<h4 class="header-title">Reminders</h4>
														</div>
														<div class="col-sm-6">
															<div class="text-sm-end">
																<button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#customer-reminders-modal">Add Reminder</button>

																<!-- <a href="<?= base_url('admin/Propertymaster/add') ?>?customer_id=<?= $customer->id ?>&page=edit" class="btn btn-danger waves-effect waves-light mb-2">Add Property</a> -->
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
																		<table class="table table-centered table-nowrap table
																		-striped dt-responsive nowrap" style="width:100%" id="customer_reminders_datatable">
																			<thead>
																				<tr>																					
																					<th>#</th>
																					<!-- <th>Name</th> -->
																					<th>Type</th>
																					<th>Date</th>
																					<th>Priority</th>																					
																					<th>Repeat Every</th>
																					<th>Total Cycle</th>
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
        <style>
            .select2-container .select2-selection--multiple .select2-selection__choice{
                background-color: #eceef0;
            }
        </style>
		<script>
			$(document).ready(function() {
				$('.js-example-basic-single').select2({
					theme: "bootstrap"
				});
                $('.assigned').select2({
                    multiple:true,
                    placeholder: "Select Assigned",
                    theme: "bootstrap-5"
                });
			});
			$(function() {
				var hash = window.location.hash;
				hash && $('ul.nav a[href="' + hash + '"]').tab('show');

				var triggerTabList = [].slice.call(document.querySelectorAll('#v-pills-tab a'))
				triggerTabList.forEach(function(triggerEl) {
					var tabTrigger = new bootstrap.Tab(triggerEl)

					triggerEl.addEventListener('click', function(event) {
						event.preventDefault()
						tabTrigger.show()
					})
				});
				var triggerFirstTabEl = document.querySelector('#v-pills-tab a:first-child')
				bootstrap.Tab.getInstance(triggerFirstTabEl).show() // Select first tab

				var triggerEl = document.querySelector('#v-pills-tab a[href="' + hash + '"]')
				bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name

			});

			//all contact
			var contact_table = $('#customer_contact_datatable').DataTable({
				responsive: true,
				ajax: "<?php echo base_url('admin/Customermaster/all_contact/' . $customer->id); ?>",
				columnDefs: [{
						responsivePriority: 1,
						targets: 0
					},
					{
						responsivePriority: 2,
						targets: 1
					},
					{
						responsivePriority: 3,
						targets: 6
					},
					{
						responsivePriority: 4,
						targets: 7
					},
					{
						"targets": 6,
						"createdCell": function(td, cellData, rowData, row, col) {
							if (rowData[6] == '1') {
								$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
							} else if (rowData[6] == '0') {
								$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
							}
						}
					},
				]
			});
			//add contact 
			$("#store-contact").validate({
				rules: {
					first_name: "required",
					last_name: "required",
					position_id: "required",
					// company_name: "required",
					//email: "required",
					phone: "required",
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
							$("#store-contact").trigger("reset");
							success_message('', response.message);
							contact_table.ajax.reload(null, false);
						}
					});
				}
			});
			//edit contact
			$(document).on('click', "#customer_contact_datatable .edit-btn", function() {
				var id = $(this).attr('data-id');
				$.ajax({
					url: '<?php echo base_url() ?>admin/Customermaster/edit_contact/' + id,
					type: "POST",
					dataType: "json",
					success: function(data) {
						$("#edit-customer-contact-modal #contact_id").val(data.id);
						$('#edit-customer-contact-modal #first_name').val(data.first_name);
						$('#edit-customer-contact-modal #last_name').val(data.last_name);
						$('#edit-customer-contact-modal #position_id').val(data.position_id).trigger('change');
						$('#edit-customer-contact-modal #company_name').val(data.company_name);
						$('#edit-customer-contact-modal #email').val(data.email);
						$('#edit-customer-contact-modal #phone').val(data.phone);
						$('#edit-customer-contact-modal #description').val(data.description);
						$("#edit-customer-contact-modal #contact_status").val(data.status);
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
					//email: "required",
					phone: "required",
					//description: "required",
					status: "required"
				},
				submitHandler: function(form, e) {
					e.preventDefault();
					var url = $(form).attr("action");
					var id = $('#edit-customer-contact-modal #contact_id').val();
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
			var note_table = $('#customer_notes_datatable').DataTable({
				responsive: true,
				ajax: "<?php echo base_url('admin/Customermaster/all_note/' . $customer->id); ?>",
				"columnDefs": [{
						responsivePriority: 1,
						targets: 0
					},
					{
						responsivePriority: 2,
						targets: 1
					},
					{
						responsivePriority: 3,
						targets: 3
					},
					{
						responsivePriority: 4,
						targets: 4
					},
					{
						"targets": 3,
						"createdCell": function(td, cellData, rowData, row, col) {
							if (rowData[3] == '1') {
								$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
							} else if (rowData[3] == '0') {
								$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
							}
						}
					},
				]
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
			$(document).on('click', "#customer_notes_datatable .edit-btn", function() {
				var id = $(this).attr('data-id');
				$.ajax({
					url: '<?php echo base_url() ?>admin/Customermaster/edit_note/' + id,
					type: "POST",
					dataType: "json",
					success: function(data) {
						$("#edit-customer-notes-modal #note_id").val(data.id);
						$('#edit-customer-notes-modal #name').val(data.name);
						$("#edit-customer-notes-modal #contact_status").val(data.status);
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
					var id = $('#edit-customer-notes-modal #note_id').val();
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


			//all reminder
			var reminders_table = $('#customer_reminders_datatable').DataTable({
				responsive: true,
				ajax: "<?php echo base_url('admin/Customermaster/all_reminders/' . $customer->id); ?>",
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
			$(document).on('click', "#customer_reminders_datatable .edit-btn", function() {
				var id = $(this).attr('data-id');
				$.ajax({
					url: '<?php echo base_url() ?>admin/Customermaster/edit_reminders/' + id,
					type: "POST",
					dataType: "json",
					success: function(data) {
						debugger;
						$("#edit-customer-reminders-modal #reminder_id").val(data.id);
						$('#edit-customer-reminders-modal #name').val(data.name);
						$('#edit-customer-reminders-modal #type').val(data.type).trigger('change');
						$('#edit-customer-reminders-modal #date_time').val(data.date_time);
						$('#edit-customer-reminders-modal #priority').val(data.priority).trigger('change');
						if(data.custom_recurring == 1){
							$('#edit-customer-reminders-modal #repeat_every').val('custom').trigger('change');
							$('#edit-customer-reminders-modal #repeat_every_custom').val(data.repeat_every).trigger('change');
							$('#edit-customer-reminders-modal #repeat_type_custom').val(data.recurring_type).trigger('change');
						}else{
							$('#edit-customer-reminders-modal #repeat_every').val(data.repeat_every+'-'+data.recurring_type).trigger('change');
						}
						if(data.cycles == 0){
							$('#edit-customer-reminders-modal #unlimited_cycles').prop('checked', true).trigger('change');
						}else{
							$('#edit-customer-reminders-modal #unlimited_cycles').prop('checked', false).trigger('change');
						}
						$('#edit-customer-reminders-modal #cycles').val(data.cycles);
						$('#edit-customer-reminders-modal #description').val(data.description);
						$("#edit-customer-reminders-modal #reminders_status").val(data.status);
					}
				});
			});
			


			$(document).ready(function() {
				// Hide the Total Cycles and Custom fields by default
				$('#customer-reminders-modal #cycles').parent().parent().hide();
				$('#customer-reminders-modal #custom_cycle_row').hide();

				// Show/hide the Total Cycles field based on the selected Repeat value
				$('#customer-reminders-modal #repeat_every').on('change', function() {
					var selectedValue = $(this).val();
					if (selectedValue === '1-week' || selectedValue === '2-week' || selectedValue === '1-month' || selectedValue === '2-month' || selectedValue === '3-month' || selectedValue === '6-month' || selectedValue === '1-year') {
						$('#customer-reminders-modal #cycles').parent().parent().show();
						$('#customer-reminders-modal #custom_cycle_row').hide();
					} else if (selectedValue === 'custom') {
						//$('#customer-reminders-modal #cycles').parent().parent().hide();
						$('#customer-reminders-modal #cycles').parent().parent().show();
						$('#customer-reminders-modal #custom_cycle_row').show();
					} else {
						$('#customer-reminders-modal #cycles').parent().parent().hide();
						$('#customer-reminders-modal #custom_cycle_row').hide();
					}
				});

				// spacing between the Infinity checkbox and label
				$('#customer-reminders-modal #default_total_cycles').on('change', function() {
					var checkbox = $(this);
					var label = checkbox.next('label');
					if (checkbox.is(':checked')) {
						label.css('margin-left', '5px');
					} else {
						label.css('margin-left', '15px');
					}
				});

				// Disable the Total Cycles field when Infinity is checked
				$('#customer-reminders-modal #unlimited_cycles').on('change', function() {
					var checkbox = $(this);
					var totalCycles = $('#customer-reminders-modal #cycles');
					if (checkbox.is(':checked')) {
						totalCycles.attr('disabled', true);
					} else {
						totalCycles.attr('disabled', false);
					}
				});

				//for edit model
				// Hide the Total Cycles and Custom fields by default
				$('#edit-customer-reminders-modal #cycles').parent().parent().hide();
				$('#edit-customer-reminders-modal #custom_cycle_row').hide();

				// Show/hide the Total Cycles field based on the selected Repeat value
				$('#edit-customer-reminders-modal #repeat_every').on('change', function() {
					var selectedValue = $(this).val();
					if (selectedValue === '1-week' || selectedValue === '2-week' || selectedValue === '1-month' || selectedValue === '2-month' || selectedValue === '3-month' || selectedValue === '6-month' || selectedValue === '1-year') {
						$('#edit-customer-reminders-modal #cycles').parent().parent().show();
						$('#edit-customer-reminders-modal #custom_cycle_row').hide();
					} else if (selectedValue === 'custom') {
						//$('#edit-customer-reminders-modal #cycles').parent().parent().hide();
						$('#edit-customer-reminders-modal #cycles').parent().parent().show();
						$('#edit-customer-reminders-modal #custom_cycle_row').show();
					} else {
						$('#edit-customer-reminders-modal #cycles').parent().parent().hide();
						$('#edit-customer-reminders-modal #custom_cycle_row').hide();
					}
				});

				// spacing between the Infinity checkbox and label
				$('#edit-customer-reminders-modal #default_total_cycles').on('change', function() {
					var checkbox = $(this);
					var label = checkbox.next('label');
					if (checkbox.is(':checked')) {
						label.css('margin-left', '5px');
					} else {
						label.css('margin-left', '15px');
					}
				});

				// Disable the Total Cycles field when Infinity is checked
				$('#edit-customer-reminders-modal #unlimited_cycles').on('change', function() {
					var checkbox = $(this);
					var totalCycles = $('#edit-customer-reminders-modal #cycles');
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
					var id = $('#edit-customer-reminders-modal #reminder_id').val();
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

			//all property
			var property_table = $('#customer_property_datatable').DataTable({
				responsive: true,
				ajax: "<?php echo base_url('admin/Customermaster/all_property/' . $customer->id . '/edit'); ?>",
				columnDefs: [{
						target: 0,
						visible: false,
					},
					{
						responsivePriority: 1,
						targets: 1
					},
					{
						responsivePriority: 2,
						targets: 2
					},
					{
						responsivePriority: 3,
						targets: 6
					},
					{
						responsivePriority: 4,
						targets: 7
					},
					{
						"targets": 6,
						"createdCell": function(td, cellData, rowData, row, col) {
							$(td).html('<div class="form-check form-switch"><input class="form-check-input property_status" data-proid="' + rowData[0] + '" name="property_status" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" ' + ((rowData[6] == '1') ? "checked" : "") + ' ></div>');
						}
					},
				]
			});
			$(document).ready(function() {
				$("#contact-tab").on('click', function() {
					reminders_table.ajax.reload(null, false);
				});
				$("#customer-notes-tab").on('click', function() {
					note_table.ajax.reload(null, false);
				});
				$("#customer-property-tab").on('click', function() {
					property_table.ajax.reload(null, false);
				});
				$("#customer-reminders-tab").on('click', function() {
					reminders_table.ajax.reload(null, false);
				});

				var hash = window.location.hash;
				$(hash + "-tab").trigger('click');
			});

			$('input[name=inquiry_type]').change(function() {
				if ($('#agent').prop('checked')) {
					$("#agent_div").show('slow');
				} else {
					$("#agent_div").hide('slow');
				}

			});
			$('input[name=inquiry_type]').trigger('change');
			//on switch change status
			$(document).on('change', '.property_status', function() {
				var id = $(this).attr('data-proid');
				var url = '<?php echo base_url() ?>admin/Propertymaster/update_status';
				var status = ($(this).prop('checked')) ? 1 : 0;

				$.ajax({
					url: url + '/' + id + '/' + status,
					type: "POST",
					dataType: "json",
					success: function(response) {
						$('.btn-close').trigger('click');
						success_message('', response.message);
						reminders_table.ajax.reload(null, false);
					}
				});
			});
		</script>