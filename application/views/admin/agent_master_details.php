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
<!-- Specialistfor add -->
<div class="modal fade" id="agent-specialistfor-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add Specialist</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-specialistfor" action="<?php echo base_url() . 'admin/Agentmaster/store_specialistfor'; ?>">
					<input type="hidden" name="agent_id" value="<?= $agent->id ?>">
					<div class="row">

						<div class="mb-3">
							<label for="pro_category_id" class="form-label">Select Category</label>
							<select class="form-select" name="pro_category_id" id="pro_category_id">
								<option value="">Select Category</option>
								<?php foreach ($category as $cat) { ?>
									<option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
								<?php } ?>
							</select>
							<span style="color: red;"><?= form_error('pro_category_id') ?></span>

						</div>
					</div>

					<div class="row">

						<div class="mb-3">
							<label for="pro_subcategory_id" class="form-label">Select Sub Category</label>
							<select class="form-select" name="pro_subcategory_id" id="pro_subcategory_id">
								<option value="">Select Sub Category</option>
							</select>
							<span style="color: red;"><?= form_error('pro_subcategory_id') ?></span>

						</div>

					</div>
					<div class="mb-3">
						<label for="city_status" class="form-label">Status</label>
						<select class="form-select" name="status" id="specialistfor_status">
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
<div class="modal fade" id="edit-agent-specialistfor-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Edit Specialist For</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="update-specialistfor" action="<?php echo base_url() . 'admin/Agentmaster/update_specialistfor'; ?>">
					<input type="hidden" name="agent_id" value="<?= $agent->id ?>">
					<input type="hidden" name="specialistfor_id" id="specialistfor_id">
					<div class="row">
						<div class="mb-3">
							<label for="pro_category_id" class="form-label">Select Category</label>
							<select class="form-select" name="pro_category_id" id="pro_category_id">
								<option value="">Select Category</option>
								<?php foreach ($category as $cat) { ?>
									<option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
								<?php } ?>
							</select>
							<span style="color: red;"><?= form_error('pro_category_id') ?></span>

						</div>
					</div>

					<div class="row">

						<div class="mb-3">
							<label for="pro_subcategory_id" class="form-label">Select Sub Category</label>
							<select class="form-select" name="pro_subcategory_id" id="pro_subcategory_id">
								<option value="">Select Sub Category</option>
							</select>
							<span style="color: red;"><?= form_error('pro_subcategory_id') ?></span>

						</div>

					</div>
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
<div class="modal fade" id="agent-reminders-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add Reminder</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-reminders" action="<?php echo base_url() . 'admin/Agentmaster/store_reminders'; ?>">
					<input type="hidden" name="agent_id" value="<?= $agent->id ?>">
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
								<label class="form-label">Rreminder Type </label>
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
<div class="modal fade" id="edit-agent-reminders-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Edit Reminders</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="update-reminders" action="<?php echo base_url() . 'admin/Agentmaster/update_reminders'; ?>">
					<input type="hidden" name="agent_id" value="<?= $agent->id ?>">
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


<!-- Specialistarea add -->
<div class="modal fade" id="agent-specialistarea-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-specialistarea" action="<?php echo base_url() . 'admin/Agentmaster/store_specialistarea'; ?>">
					<input type="hidden" name="agent_id" value="<?= $agent->id ?>">
					<div class="row">
						<div class="mb-3">
							<label for="state_id" class="form-label">Select State</label>
							<select class="form-select" name="state_id" id="state_id">
								<option value="">Select State</option>
								<?php foreach ($states as $sta) { ?>
									<option value="<?= $sta['id'] ?>" <?= ($sta['is_default'] == 1) ? 'selected' : '' ?>><?= $sta['name'] ?></option>
								<?php } ?>
							</select>
							<span style="color: red;"><?= form_error('state_id') ?></span>


						</div>
					</div>

					<div class="row">

						<div class="mb-3">
							<label for="city_id" class="form-label">Select City</label>
							<select class="form-select" name="city_id" id="city_id">
								<option value="">Select City</option>
							</select>
							<span style="color: red;"><?= form_error('city_id') ?></span>

						</div>

					</div>
					<div class="row">

						<div class="mb-3">
							<label for="area_id" class="form-label">Select Area</label>
							<select class="form-select" name="area_id" id="area_id">
								<option value="">Select Area</option>
							</select>
							<span style="color: red;"><?= form_error('area_id') ?></span>

						</div>

					</div>
					<div class="mb-3">
						<label for="city_status" class="form-label">Status</label>
						<select class="form-select" name="status" id="specialistarea_status">
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
<div class="modal fade" id="edit-agent-specialistarea-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Edit Specialist Area</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="update-specialistarea" action="<?php echo base_url() . 'admin/Agentmaster/update_specialistarea'; ?>">
					<input type="hidden" name="agent_id" value="<?= $agent->id ?>">
					<input type="hidden" name="specialistarea_id" id="specialistarea_id">
					<div class="row">
						<div class="mb-3">
							<label for="state_id" class="form-label">Select State</label>
							<select class="form-select" name="state_id" id="state_id">
								<option value="">Select State</option>
								<?php foreach ($states as $sta) { ?>
									<option value="<?= $sta['id'] ?>"><?= $sta['name'] ?></option>
								<?php } ?>
							</select>
							<span style="color: red;"><?= form_error('state_id') ?></span>


						</div>
					</div>

					<div class="row">

						<div class="mb-3">
							<label for="city_id" class="form-label">Select City</label>
							<select class="form-select" name="city_id" id="city_id">
								<option value="">Select City</option>
							</select>
							<span style="color: red;"><?= form_error('city_id') ?></span>

						</div>

					</div>
					<div class="row">

						<div class="mb-3">
							<label for="area_id" class="form-label">Select Area</label>
							<select class="form-select" name="area_id" id="area_id">
								<option value="">Select Area</option>
							</select>
							<span style="color: red;"><?= form_error('area_id') ?></span>

						</div>

					</div>
					<div class="mb-3">
						<label for="city_status" class="form-label">Status</label>
						<select class="form-select" name="status" id="specialistarea_status">
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

												<?= $agent->first_name . ' ' . $agent->last_name . ' ' . (($agent->nick_name == "") ? '' : '(' . $agent->nick_name . ')') ?>
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
												<?= ($staff != null) ? $staff->first_name . ' ' . $staff->last_name : ' - ' ?>



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
										<a class="nav-link mt-2 py-2" id="agent-specialist-for-tab" data-bs-toggle="pill" href="#agent-specialist-for" role="tab" aria-controls="agent-specialist-for" aria-selected="false">
											<i class="mdi mdi-office-building d-block font-24"></i>
											Specialist For
										</a>
										<a class="nav-link mt-2 py-2" id="agent-specialist-area-tab" data-bs-toggle="pill" href="#agent-specialist-area" role="tab" aria-controls="agent-specialist-area" aria-selected="false">
											<i class="mdi mdi-office-building d-block font-24"></i>
											Specialist Area
										</a>
										<a class="nav-link mt-2 py-2" id="agent-reminders-tab" data-bs-toggle="pill" href="#agent-reminders" role="tab" aria-controls="agent-reminders" aria-selected="false">
											<i class="mdi mdi-office-building d-block font-24"></i>
											Reminders
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

																<a href="<?= base_url('admin/Propertymaster/add') ?>?agent_id=<?= $agent->id ?>&page=edit" class="btn btn-danger waves-effect waves-light mb-2">Add Property</a>
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
											<div class="tab-pane fade" id="agent-specialist-for" role="tabpanel" aria-labelledby="agent-specialist-for-tab">
												<div>
													<div class="row justify-content-between mb-2">
														<div class="col-auto">
															<h4 class="header-title">Specialist For</h4>
														</div>
														<div class="col-sm-6">
															<div class="text-sm-end">
																<button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#agent-specialistfor-modal">Add New</button>
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
																		<table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="agent_specialistfor_datatable">
																			<thead>
																				<tr>

																					<th>#</th>
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
											<div class="tab-pane fade" id="agent-specialist-area" role="tabpanel" aria-labelledby="agent-specialist-area-tab">
												<div>
													<div class="row justify-content-between mb-2">
														<div class="col-auto">
															<h4 class="header-title">Specialist Area</h4>
														</div>
														<div class="col-sm-6">
															<div class="text-sm-end">
																<button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#agent-specialistarea-modal">Add New</button>
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
																		<table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="agent_specialistarea_datatable">
																			<thead>
																				<tr>
																					<th>#</th>
																					<th>State</th>
																					<th>City</th>
																					<th>Area</th>
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
											<div class="tab-pane fade" id="agent-reminders" role="tabpanel" aria-labelledby="agent-reminders-tab">

												<div>
													<div class="row justify-content-between mb-2">
														<div class="col-auto">
															<h4 class="header-title">Reminders</h4>
														</div>
														<div class="col-sm-6">
															<div class="text-sm-end">
																<button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#agent-reminders-modal">Add Reminder</button>

																<!-- <a href="<?= base_url('admin/Propertymaster/add') ?>?agent_id=<?= $agent->id ?>&page=edit" class="btn btn-danger waves-effect waves-light mb-2">Add Property</a> -->
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
																		<table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="agent_reminders_datatable">
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
		var contact_table = $('#agent_contact_datatable').DataTable({
			responsive: true,
			ajax: "<?php echo base_url('admin/Agentmaster/all_contact/' . $agent->id); ?>",
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
				//email: "required",
				phone: "required",
				//	description: "required",
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
		//all specialistfor property
		$(document).on('change', '#store-specialistfor #pro_category_id', function() {
			var categoryId = $(this).val();
			if (categoryId != '') {
				$.ajax({
					url: '<?php echo base_url() . "admin/Agentmaster/getSubcategoryByCategory"; ?>',
					type: 'post',
					data: {
						property_category_id: categoryId
					},
					dataType: 'json',
					success: function(response) {
						var len = response.length;
						$("#store-specialistfor #pro_subcategory_id").empty();
						for (var i = 0; i < len; i++) {
							var id = response[i]['id'];
							var name = response[i]['name'];
							$("#store-specialistfor #pro_subcategory_id").append("<option value='" + id + "'>" + name + "</option>");
						}
					}
				});
			} else {
				$("#store-specialistfor #pro_subcategory_id").empty();
			}
		});
		$(document).ready(function() {
			$('#edit-agent-specialistfor-modal #pro_category_id').change(function() {
				var categoryId = $(this).val();
				if (categoryId != '') {
					$.ajax({
						url: '<?php echo base_url() . "admin/Agentmaster/getSubcategoryByCategory"; ?>',
						type: 'post',
						data: {
							property_category_id: categoryId
						},
						dataType: 'json',
						success: function(response) {
							var len = response.length;
							$("#edit-agent-specialistfor-modal #pro_subcategory_id").empty();
							for (var i = 0; i < len; i++) {
								var id = response[i]['id'];
								var name = response[i]['name'];
								$("#edit-agent-specialistfor-modal #pro_subcategory_id").append("<option value='" + id + "'>" + name + "</option>");
							}
						}
					});
				} else {
					$("#edit-agent-specialistfor-modal #pro_subcategory_id").empty();
				}
			});
		});
		//all specialist for
		var specialistfor_table = $('#agent_specialistfor_datatable').DataTable({
			responsive: true,
			ajax: "<?php echo base_url('admin/Agentmaster/all_specialistfor/' . $agent->id); ?>",
			"columnDefs": [{
					responsivePriority: 1,
					targets: 0
				},
				{
					responsivePriority: 2,
					targets: 1
				},
				{
					responsivePriority: 2,
					targets: 2
				},
				{
					responsivePriority: 3,
					targets: 4
				},
				{
					responsivePriority: 4,
					targets: 5
				},
				{
					"targets": 4,
					"createdCell": function(td, cellData, rowData, row, col) {
						if (rowData[4] == '1') {
							$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
						} else if (rowData[4] == '0') {
							$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
						}
					}
				},
			]
		});
		//add specialist for
		$("#store-specialistfor").validate({
			rules: {
				// first_name: "required",
				// last_name: "required",

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
						$("#store-specialistfor").trigger("reset");
						success_message('', response.message);
						specialistfor_table.ajax.reload(null, false);
					}
				});
			}
		});
		$(document).ready(function() {
			//edit specialist for
			$(document).on('click', "#agent_specialistfor_datatable .edit-btn", function() {
				var id = $(this).attr('data-id');
				$.ajax({
					url: '<?php echo base_url() ?>admin/Agentmaster/edit_specialistfor/' + id,
					type: "POST",
					dataType: "json",
					success: function(data) {
						$("#edit-agent-specialistfor-modal #specialistfor_id").val(data.id);
						$('#edit-agent-specialistfor-modal #pro_category_id').val(data.pro_category_id).trigger('change');
						setTimeout(function() {
							$('#edit-agent-specialistfor-modal #pro_subcategory_id').val(data.pro_subcategory_id);
						}, 250);
						$("#edit-agent-specialistfor-modal #specialistfor_status").val(data.status);
					}
				});
			});
		});
		//update specialist for
		$("#update-specialistfor").validate({
			rules: {

				status: "required"
			},
			submitHandler: function(form, e) {
				e.preventDefault();
				var url = $(form).attr("action");
				var id = $('#edit-agent-specialistfor-modal #specialistfor_id').val();
				$.ajax({
					url: url + '/' + id,
					type: "POST",
					data: $(form).serialize(),
					dataType: "json",
					success: function(response) {
						$('.btn-close').trigger('click');
						success_message('', response.message);
						specialistfor_table.ajax.reload(null, false);
					}
				});
			}
		});

		
				//all specialist Area
			//on state change fetch city	
			$(document).ready(function() {
				$(document).on('change', '#agent-specialistarea-modal #state_id', function() {
					var state_id = $(this).val();
					if (state_id != '') {
						$.ajax({
							url: '<?php echo base_url() . "admin/Agentmaster/getCityByState"; ?>',
							type: 'post',
							data: {
								state_id: state_id
							},
							dataType: 'json',
							success: function(response) {
								var len = response.length;
								$("#store-specialistarea #city_id").empty();
								$("#store-specialistarea #city_id").append("<option value=''>Select City</option>");
								for (var i = 0; i < len; i++) {
									var id = response[i]['id'];
									var name = response[i]['name'];
									var is_default = response[i]['is_default'];
									$("#store-specialistarea #city_id").append("<option value='" + id + "' " + ((is_default == 1) ? 'selected' : '') + ">" + name + "</option>");

								}
							}
						});
					} else {
						$("#store-specialistarea #city_id").empty();
					}
				});
				$('#agent-specialistarea-modal').on('shown.bs.modal', function(e) {
					$('#agent-specialistarea-modal #state_id').trigger('change');
					setTimeout(function() {
						$('#agent-specialistarea-modal #city_id').trigger('change');
					}, 250);
				});
			});
			$(document).ready(function() {
				$('#edit-agent-specialistarea-modal #state_id').change(function() {
					debugger;
					var state_id = $(this).val();
					if (state_id != '') {
						$.ajax({
							url: '<?php echo base_url() . "admin/Agentmaster/getCityByState"; ?>',
							type: 'post',
							data: {
								state_id: state_id
							},
							dataType: 'json',
							success: function(response) {
								var len = response.length;
								$("#edit-agent-specialistarea-modal #city_id").empty();
								$("#store-specialistarea #city_id").append("<option value=''>Select City</option>");
								for (var i = 0; i < len; i++) {
									var id = response[i]['id'];
									var name = response[i]['name'];
									$("#edit-agent-specialistarea-modal #city_id").append("<option value='" + id + "'>" + name + "</option>");
								}
							}
						});
					} else {
						$("#edit-agent-specialistarea-modal #city_id").empty();
					}
				});
			});
			//on city change fetch area
			$(document).on('change', '#agent-specialistarea-modal #city_id', function() {
				var city_id = $(this).val();
				if (city_id != '') {
					$.ajax({
						url: '<?php echo base_url() . "admin/Agentmaster/getAreaByCity"; ?>',
						type: 'post',
						data: {
							city_id: city_id
						},
						dataType: 'json',
						success: function(response) {
							var len = response.length;
							$("#store-specialistarea #area_id").empty();
							$("#store-specialistarea #area_id").append("<option value=''>Select Area</option>");
							for (var i = 0; i < len; i++) {
								var id = response[i]['id'];
								var name = response[i]['name'];
								$("#store-specialistarea #area_id").append("<option value='" + id + "'>" + name + "</option>");
							}
						}
					});
				} else {
					$("#store-specialistarea #area_id").empty();
				}
			});
			$(document).ready(function() {
				$('#edit-agent-specialistarea-modal #city_id').change(function() {
					debugger;
					var city_id = $(this).val();
					if (city_id != '') {
						$.ajax({
							url: '<?php echo base_url() . "admin/Agentmaster/getAreaByCity"; ?>',
							type: 'post',
							data: {
								city_id: city_id
							},
							dataType: 'json',
							success: function(response) {
								var len = response.length;
								$("#edit-agent-specialistarea-modal #area_id").empty();
								$("#edit-agent-specialistarea-modal #area_id").append("<option value=''>Select Area</option>");
								for (var i = 0; i < len; i++) {
									var id = response[i]['id'];
									var name = response[i]['name'];
									$("#edit-agent-specialistarea-modal #area_id").append("<option value='" + id + "'>" + name + "</option>");
								}
							}
						});
					} else {
						$("#edit-agent-specialistarea-modal #area_id").empty();
					}
				});
			});
			var specialistarea_table = $('#agent_specialistarea_datatable').DataTable({
				responsive: true,
				ajax: "<?php echo base_url('admin/Agentmaster/all_specialistarea/' . $agent->id); ?>",
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
						targets: 2
					},
					{
						responsivePriority: 3,
						targets: 3
					},
					{
						responsivePriority: 2,
						targets: 5
					},
					{
						responsivePriority: 2,
						targets: 6
					},
					{
						"targets": 5,
						"createdCell": function(td, cellData, rowData, row, col) {
							if (rowData[5] == '1') {
								$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
							} else if (rowData[5] == '0') {
								$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
							}
						}
					},
				]
			});
			//add specialist Area
			$("#store-specialistarea").validate({
				rules: {
					// first_name: "required",
					// last_name: "required",

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
							$("#store-specialistarea").trigger("reset");
							success_message('', response.message);
							specialistarea_table.ajax.reload(null, false);
						}
					});
				}
			});
			$(document).ready(function() {
				//edit specialist Area
				$(document).on('click', "#agent_specialistarea_datatable .edit-btn", function() {
					var id = $(this).attr('data-id');
					$.ajax({
						url: '<?php echo base_url() ?>admin/Agentmaster/edit_specialistarea/' + id,
						type: "POST",
						dataType: "json",
						success: function(data) {
							$("#edit-agent-specialistarea-modal #specialistarea_id").val(data.id);
							$('#edit-agent-specialistarea-modal #state_id').val(data.state_id).trigger('change');
							setTimeout(function() {
								$('#edit-agent-specialistarea-modal #city_id').val(data.city_id).trigger('change');
								setTimeout(function() {
									$('#edit-agent-specialistarea-modal #area_id').val(data.area_id).trigger('change');
								}, 250);
							}, 250);
							$("#edit-agent-specialistarea-modal #specialistarea_status").val(data.status);
						}
					});
				});
			});
			//update specialist Area
			$("#update-specialistarea").validate({
				rules: {

					status: "required"
				},
				submitHandler: function(form, e) {
					e.preventDefault();
					var url = $(form).attr("action");
					var id = $('#edit-agent-specialistarea-modal #specialistarea_id').val();
					$.ajax({
						url: url + '/' + id,
						type: "POST",
						data: $(form).serialize(),
						dataType: "json",
						success: function(response) {
							$('.btn-close').trigger('click');
							success_message('', response.message);
							specialistarea_table.ajax.reload(null, false);
						}
					});
				}
			});

			//all reminder
			var reminders_table = $('#agent_reminders_datatable').DataTable({
				responsive: true,
				ajax: "<?php echo base_url('admin/Agentmaster/all_reminders/' . $agent->id); ?>",
				columnDefs: [{
						responsivePriority: 1,
						targets: 0
					},
					{
						responsivePriority: 2,
						targets: 3
					},
					{
						responsivePriority: 9,
						targets: 10
					},
					{
						responsivePriority: 6,
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
			$(document).on('click', "#agent_reminders_datatable .edit-btn", function() {
				var id = $(this).attr('data-id');
				$.ajax({
					url: '<?php echo base_url() ?>admin/Agentmaster/edit_reminders/' + id,
					type: "POST",
					dataType: "json",
					success: function(data) {
						debugger;
						$("#edit-agent-reminders-modal #reminder_id").val(data.id);
						$('#edit-agent-reminders-modal #name').val(data.name);
						$('#edit-agent-reminders-modal #type').val(data.type).trigger('change');
						$('#edit-agent-reminders-modal #date_time').val(data.date_time);
						$('#edit-agent-reminders-modal #priority').val(data.priority).trigger('change');
						if (data.custom_recurring == 1) {
							$('#edit-agent-reminders-modal #repeat_every').val('custom').trigger('change');
							$('#edit-agent-reminders-modal #repeat_every_custom').val(data.repeat_every).trigger('change');
							$('#edit-agent-reminders-modal #repeat_type_custom').val(data.recurring_type).trigger('change');
						} else {
							$('#edit-agent-reminders-modal #repeat_every').val(data.repeat_every + '-' + data.recurring_type).trigger('change');
						}
						if (data.cycles == 0) {
							$('#edit-agent-reminders-modal #unlimited_cycles').prop('checked', true).trigger('change');
						} else {
							$('#edit-agent-reminders-modal #unlimited_cycles').prop('checked', false).trigger('change');
						}
						$('#edit-agent-reminders-modal #cycles').val(data.cycles);
						$('#edit-agent-reminders-modal #beforeday').val(data.beforeday);
						$('#edit-agent-reminders-modal #description').val(data.description);
						$("#edit-agent-reminders-modal #reminders_status").val(data.status);
					}
				});
			});



			$(document).ready(function() {
				// Hide the Total Cycles and Custom fields by default
				$('#agent-reminders-modal #cycles').parent().parent().hide();
				$('#agent-reminders-modal #custom_cycle_row').hide();

				// Show/hide the Total Cycles field based on the selected Repeat value
				$('#agent-reminders-modal #repeat_every').on('change', function() {
					var selectedValue = $(this).val();
					if (selectedValue === '1-week' || selectedValue === '2-week' || selectedValue === '1-month' || selectedValue === '2-month' || selectedValue === '3-month' || selectedValue === '6-month' || selectedValue === '1-year') {
						$('#agent-reminders-modal #cycles').parent().parent().show();
						$('#agent-reminders-modal #custom_cycle_row').hide();
					} else if (selectedValue === 'custom') {
						//$('#agent-reminders-modal #cycles').parent().parent().hide();
						$('#agent-reminders-modal #cycles').parent().parent().show();
						$('#agent-reminders-modal #custom_cycle_row').show();
					} else {
						$('#agent-reminders-modal #cycles').parent().parent().hide();
						$('#agent-reminders-modal #custom_cycle_row').hide();
					}
				});

				// spacing between the Infinity checkbox and label
				$('#agent-reminders-modal #default_total_cycles').on('change', function() {
					var checkbox = $(this);
					var label = checkbox.next('label');
					if (checkbox.is(':checked')) {
						label.css('margin-left', '5px');
					} else {
						label.css('margin-left', '15px');
					}
				});

				// Disable the Total Cycles field when Infinity is checked
				$('#agent-reminders-modal #unlimited_cycles').on('change', function() {
					var checkbox = $(this);
					var totalCycles = $('#agent-reminders-modal #cycles');
					if (checkbox.is(':checked')) {
						totalCycles.attr('disabled', true);
					} else {
						totalCycles.attr('disabled', false);
					}
				});

				//for edit model
				// Hide the Total Cycles and Custom fields by default
				$('#edit-agent-reminders-modal #cycles').parent().parent().hide();
				$('#edit-agent-reminders-modal #custom_cycle_row').hide();

				// Show/hide the Total Cycles field based on the selected Repeat value
				$('#edit-agent-reminders-modal #repeat_every').on('change', function() {
					var selectedValue = $(this).val();
					if (selectedValue === '1-week' || selectedValue === '2-week' || selectedValue === '1-month' || selectedValue === '2-month' || selectedValue === '3-month' || selectedValue === '6-month' || selectedValue === '1-year') {
						$('#edit-agent-reminders-modal #cycles').parent().parent().show();
						$('#edit-agent-reminders-modal #custom_cycle_row').hide();
					} else if (selectedValue === 'custom') {
						//$('#edit-agent-reminders-modal #cycles').parent().parent().hide();
						$('#edit-agent-reminders-modal #cycles').parent().parent().show();
						$('#edit-agent-reminders-modal #custom_cycle_row').show();
					} else {
						$('#edit-agent-reminders-modal #cycles').parent().parent().hide();
						$('#edit-agent-reminders-modal #custom_cycle_row').hide();
					}
				});

				// spacing between the Infinity checkbox and label
				$('#edit-agent-reminders-modal #default_total_cycles').on('change', function() {
					var checkbox = $(this);
					var label = checkbox.next('label');
					if (checkbox.is(':checked')) {
						label.css('margin-left', '5px');
					} else {
						label.css('margin-left', '15px');
					}
				});

				// Disable the Total Cycles field when Infinity is checked
				$('#edit-agent-reminders-modal #unlimited_cycles').on('change', function() {
					var checkbox = $(this);
					var totalCycles = $('#edit-agent-reminders-modal #cycles');
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
					beforeday: "required",
					//description: "required",
					status: "required"
				},
				submitHandler: function(form, e) {
					e.preventDefault();
					var url = $(form).attr("action");
					var id = $('#edit-agent-reminders-modal #reminder_id').val();
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
		var property_table = $('#agent_property_datatable').DataTable({
			responsive: true,
			ajax: "<?php echo base_url('admin/Agentmaster/all_property/' . $agent->id . '/view'); ?>",
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
			$("#agent-contacts-tab").on('click', function() {
				contact_table.ajax.reload(null, false);
			});
			$("#agent-notes-tab").on('click', function() {
				note_table.ajax.reload(null, false);
			});
			$("#agent-property-tab").on('click', function() {
				property_table.ajax.reload(null, false);
			});
			$("#agent-reminders-tab").on('click', function() {
				reminders_table.ajax.reload(null, false);
			});

			var hash = window.location.hash;
			$(hash + "-tab").trigger('click');
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