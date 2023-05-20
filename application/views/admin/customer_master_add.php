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
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<form method="post" id="store-promas" action="<?php echo base_url() . 'admin/Customermaster/store'; ?>">
								<!-- <?php
										print_r($_POST);
										validation_errors(); ?> -->
								<div class="row">
									<div class="col-md-5">
										<div class="mb-3">
											<input class="form-check-input" type="radio" id="direct" name="inquiry_type" checked value="direct">
											<label class="form-check-label" for="direct">Direct</label>
										</div>
									</div>
									<div class="col-md-5">
										<div class="mb-3">
											<input class="form-check-input" type="radio" id="agent" name="inquiry_type" value="agent">
											<label class="form-check-label" for="agent">Via Channel Partner </label>
										</div>
									</div>
								</div>
								<div class="row" id='agent_div' style='display:none'>
									<div class="col-lg-5">
										<div class="mb-3">
											<label class="form-label">Channel Partner <span class="text-danger">*</span></label>
											<select data-toggle="select2" title="Partner" class="form-control select2 channelpartner" name="agent_id" data-width="100%" multiple>
												<?php foreach ($agent as $ag) { ?>
													<option value="<?= $ag['id'] ?>"><?= $ag['first_name'] ?> <?= $ag['last_name'] ?> <?= $ag['nick_name'] ? ' (' . $ag['nick_name'] . ')' : '' ?> <?= $ag['phone'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="mb-3">
											<label class="form-label" style='width:100%'>&nbsp;</label>
											<button type="button" class="btn btn-success waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#add-agent-modal">Add</button>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<label class="form-label">Inquiry Source<span class="text-danger">*</span></label>
										<select data-toggle="select2" class="form-control select2" name="source_id" data-width="100%">
											<option value=''>Select Source</option>
											<?php foreach ($source as $sou) { ?>
												<option value="<?= $sou['id'] ?>"><?= $sou['name'] ?></option>
											<?php } ?>
										</select>
										<!-- <span style="color: red;"><?= form_error('source_id') ?></span> -->
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<label for="billing-first-name" class="form-label">First Name<span class="text-danger">*</span></label>
											<input class="form-control" type="text" placeholder="Enter your first name" name="first_name" id="billing-first-name" />
										</div>
										<span style="color: red;"><?= form_error('first_name') ?></span>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<label for="billing-last-name" class="form-label">Last Name<span class="text-danger">*</span></label>
											<input class="form-control" type="text" placeholder="Enter your last name" name="last_name" id="billing-last-name" />
										</div>
										<span style="color: red;"><?= form_error('last_name') ?></span>
									</div>
								</div>

								<div class="row">

									<div class="col-md-6">
										<div class="mb-3">
											<label for="billing-phone" class="form-label">Mobile <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="phone" placeholder="(xx) xxx xxxx xxx" id="billing-phone" />
										</div>
										<span style="color: red;"><?= form_error('phone') ?></span>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="billing-email-address" class="form-label">Email Address </label>
											<input class="form-control" type="email" name="email" placeholder="Enter your email" id="billing-email-address" />
										</div>
										<!-- <span style="color: red;"><?= form_error('email') ?></span> -->
									</div>
								</div> <!-- end row -->
								<div class="row">
									<div class="col-12">
										<div class="mb-3">
											<label for="company" class="form-label">Company Name</label>
											<input type="text" maxlength="14" class="form-control" name="company_name" id="company" placeholder="Enter Company Name">
										</div>
										<!-- <span style="color: red;"><?= form_error('company_name') ?></span> -->
									</div>
								</div> <!-- end row -->
								<div class="row">
									<div class="col-12">
										<div class="mb-3">
											<label for="description" class="form-label">Description</label>
											<textarea class="form-control" name="description" id="description"></textarea>
										</div>
										<!-- <span style="color: red;"><?= form_error('description') ?></span> -->
									</div>
								</div> <!-- end row -->
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label class="form-label">Assigned</label>

											<select data-toggle="select2" title="Assigned" class="form-control select2 assigned" name="assigned_id[]" data-width="100%" multiple>
												<!--												<option value=''>Select Assigned</option>-->
												<?php foreach ($staff as $sta) { ?>
													<option value="<?= $sta['id'] ?>"><?= $sta['first_name'] ?> <?= $sta['last_name'] ?></option>
												<?php }
												?>
											</select>
											<!-- <span style="color: red;"><?= form_error('assigned_id') ?></span> -->
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label class="form-label">Position</label>
											<select data-toggle="select2" title="Position" class="form-control select2" name="position_id" data-width="100%">
												<option value=''>Select Position</option>
												<?php foreach ($position as $pos) { ?>
													<option value="<?= $pos['id'] ?>"><?= $pos['name'] ?></option>
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
										<option value="1" selected>Active</option>
										<option value="0">Inactive</option>
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
						</div> <!-- end card-body -->
					</div> <!-- end card-->
				</div> <!-- end col -->
			</div>
			<!-- end row -->
		</div> <!-- container -->
	</div> <!-- content -->
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#firstname').bind('keyup blur', function() {
			var node = $(this);
			node.val(node.val().replace(/[^a-zA-Z ]/g, ''));
		});
		$('#lastname').bind('keyup blur', function() {
			var node = $(this);
			node.val(node.val().replace(/[^a-zA-Z ]/g, ''));
		});
	});
	$('input[name=inquiry_type]').click(function() {

		if (this.id == "agent") {
			$("#agent_div").show('slow');

		} else {
			$("#agent_div").hide('slow');

		}
	});
</script>
<script>
	$(document).ready(function() {
		$('.js-example-basic-single').select2({
			theme: "bootstrap"
		});
		$('.assigned').select2({
			multiple: true,
			placeholder: "Select Assigned",
			theme: "bootstrap-5"
		});
		$('.channelpartner').select2({
			multiple: true,
			placeholder: "Select Channel Partner",
			theme: "bootstrap-5"
		});
	});
</script>
<style>
	.select2 .selection .select2-selection--single .select2-selection__rendered {
		line-height: 1.5rem;
	}

	.select2-container .select2-selection--multiple .select2-selection__choice {
		background-color: #eceef0;
	}
</style>