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
								<a href="<?= base_url('admin/Agentmaster/add') ?>" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle me-1"></i> Add New</a>
							</ol>
						</div>
						<h4 class="page-title">Agent Master</h4>
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
										<th>Phone</th>
										<th>Email</th>
										<th>Company</th>
										<th>Source</th>
										<th>Position</th>
										<th>Staff Name</th>
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
<!--Add Modal -->
<div class="modal fade" id="agent-master-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add New</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-masters" action="<?php echo base_url() . 'admin/masters/store'; ?>">
					<div class="mb-3" style="display: inline-flex;">
						<div class="col-md-4" style="margin-right: 142px;">
							<label for="source" class="form-label">Source</label>
							<div class="select2" style="margin-bottom: 60px;">
								<select class="js-example-basic-single" name="source">
									<option value="">Nothing Selected</option>
									<?php foreach ($sourcemaster as $item){?>
										<option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
									<?php }
									?>
<!--									<option value="AL">Alabama</option>-->
<!--									<option value="WY">Wyoming</option>-->
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<label for="source" class="form-label">Assigned</label>
							<div class="select2" style="margin-bottom: 60px;">
								<select class="js-example-basic-single" name="source">
									<option value="">Nothing Selected</option>
									<option value="AL">Alabama</option>
									<option value="WY">Wyoming</option>
								</select>
							</div>
						</div>
					</div>
					<div class="mb-3" style="margin-top: -22px;">
						<label for="firstname" class="form-label">First Name</label>
						<input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name">
					</div>
					<div class="mb-3">
						<label for="lastname" class="form-label">Last Name</label>
						<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name">
					</div>
					<div class="mb-3">
						<label for="phone" class="form-label">Phone</label>
						<input type="text" maxlength="14" class="form-control" name="phone" id="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter Phone">
					</div>
					<div class="mb-3">
						<label for="company" class="form-label">Company Name</label>
						<input type="text" maxlength="14" class="form-control" name="company" id="company" placeholder="Enter Company Name">
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
					</div>
					<div class="mb-3">
						<label for="description" class="form-label">Description</label>
						<textarea class="form-control" name="description" id="description"></textarea>
					</div>
					<div class="text-end">
						<button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	var table = $('#formmaster_datatable').DataTable({
		responsive: true,
		ajax: "<?php echo base_url('admin/Agentmaster/all'); ?>",
		"columnDefs": [
			{
				"targets": 7,
				"createdCell": function(td, cellData, rowData, row, col) {
					if (rowData[7] == '1') {							
						$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
					} else if (rowData[7] == '0') {
						$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
					}
				}
			},
		]
	});

</script>
