<!-- Import excel district modal -->
<div class="modal fade" id="subdistrictimport-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add New</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-procat" action="<?php echo base_url() . 'admin/Subdistrict/subdistrict_spreadsheet_import'; ?>" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="district" class="form-label">Select District</label>
						<select class="form-select" name="district_id" id="district">

							<option value="">Select District</option>
							<?php foreach ($district as $dist) { ?>
								<option value="<?= $dist['id'] ?>"><?= $dist['name'] ?></option>
							<?php } ?>
						</select>
						<span style="color: red;"><?= form_error('district_id') ?></span>

					</div>
					<div class="mb-3">
						<!-- <input type="hidden" name="id" value="<?= $this->uri->segment(3) ?>"> -->
						<label for="name" class="form-label">Import subdistrict</label>
						<input type="file" name="upload_file" class="form-control" id="upload_file" required="">
					</div>

					<div class="text-end">
						<button type="submit" class="btn btn-success waves-effect waves-light">Import</button>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>


<!--Add Modal -->
<div class="modal fade" id="subdistrict-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add New</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-dist" action="<?php echo base_url() . 'admin/Subdistrict/store'; ?>">


					<div class="mb-3">
						<label for="district" class="form-label">Select District</label>
						<select class="form-select" name="district_id" id="district">

							<option value="">Select district</option>
							<?php foreach ($district as $dist) { ?>
								<option value="<?= $dist['id'] ?>"><?= $dist['name'] ?></option>
							<?php } ?>
						</select>
						<span style="color: red;"><?= form_error('district_id') ?></span>

					</div>
					<div class="mb-3">
						<label for="name" class="form-label">Sub-District/City Name</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter Subdistrict name">
						<?= form_error('name')  ?>	
					</div>
					<div class="mb-3">
						<label for="is_default" class="form-label">Is Default</label>
						<select class="form-select" name="is_default" id="is_default">
							<option selected="">Select Is default</option>
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="posi_status" class="form-label">Status</label>
						<select class="form-select" name="status" id="posi_status">
							<option selected="">Select Status</option>
							<option value="1" selected>Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>

					<div class="text-end">
						<button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Edit Modal -->
<div class="modal fade" id="subdistrictedit-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel2">Edit Sub-District/City</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="update_subdistrict" action="#">
					<input type="hidden" name="id" id="edit_dist_id" />
					<div class="mb-3">
						<label for="district" class="form-label">Select District</label>
						<select class="form-select" name="district_id" id="district">
							<?php
							foreach ($district as $dist) { ?>
								<option value="<?= $dist['id'] ?>"><?= $dist['name'] ?></option>
							<?php }
							?>
						</select>
					</div>

					<div class="mb-3">
						<label for="name" class="form-label">Sub-District/City Name</label>
						<input type="text" class="form-control" name="name" id="name" value="" placeholder="Enter Sub-District/City name">
						<?= form_error('name')  ?>
					</div>
					<div class="mb-3">
						<label for="is_default" class="form-label">Is Default</label>
						<select class="form-select" name="is_default" id="is_default">
							<option selected="">Select Is default</option>
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="subdistrict_status" class="form-label">Status</label>
						<select class="form-select" name="status" id="subdistrict_status">
							<option selected="">Select Status</option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
					<div class="text-end">
						<button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#subdistrict-modal" style="margin-right: 10px;"><i class="mdi mdi-plus-circle me-1"></i> Add New</button>
								<button type="button" class="btn btn-info waves-effect waves-light import-excel-button" data-bs-toggle="modal" data-bs-target="#subdistrictimport-modal">Import subdistrict</button>
							</ol>
						</div>
						<h4 class="page-title">Sub-District/City Master</h4>
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
							<div class="row mb-2">
								<!-- <div class="col-sm-8">
										<button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#subdistrict-modal"><i class="mdi mdi-plus-circle me-1"></i> Add New</button>
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
								<table class="table table-centered table-nowrap table-striped" id="subdistrict_datatable">
									<thead>
										<tr>

											<th>#</th>
											<!-- <th>subdistrict Name</th> -->
											<th>subdistrict Name</th>
											<th>Is Default</th>
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
	var table = $('#subdistrict_datatable').DataTable({
		responsive: true,
		ajax: "<?php echo base_url('admin/Subdistrict/all'); ?>",
		"columnDefs": [{
				"targets": 2,
				"createdCell": function(td, cellData, rowData, row, col) {
					if (rowData[2] == '1') {
						$(td).html('<span class="badge bg-soft-success text-success">Yes</span>');
					} else if (rowData[2] == '0') {
						$(td).html('<span class="badge bg-soft-danger text-danger">No</span>');
					}
				}
			},
			{
				"targets": 4,
				"createdCell": function(td, cellData, rowData, row, col) {
					if (rowData[4] == '1') {
						// $(td).css('background-color', 'green')
						$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
					} else if (rowData[4] == '0') {
						$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
					}
				}
			},
		]
	});

	$(document).on('click', ".edit-btn", function() {
		var id = $(this).attr('data-id');
		$.ajax({
			url: '<?php echo base_url() ?>admin/Subdistrict/edit/' + id,
			type: "POST",
			dataType: "json",
			success: function(data) {
				$("#subdistrictedit-modal #edit_dist_id").val(data.id);
				$('#subdistrictedit-modal #name').val(data.name);
				$('#subdistrictedit-modal #subdistrict').val(data.district_id);
				$('#subdistrictedit-modal #is_default').val(data.is_default);
				$("#subdistrictedit-modal #subdistrict_status").val(data.status);




				
			}
		});
	});
	$("#update_subdistrict").submit(function(o) {
		o.preventDefault();
		var id = $('#edit_dist_id').val();
		$.ajax({
			url: '<?php echo base_url() ?>admin/Subdistrict/update/' + id,
			type: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function(response) {
				$('.btn-close').trigger('click');
				success_message('', response.message);
				table.ajax.reload(null, false);
			}
		});

	});
	$('#store-dist').validate({
		rules: {
			name: "required",
			is_default: "required",
			status: "required"
		},
		message: {

		}
	});
</script>