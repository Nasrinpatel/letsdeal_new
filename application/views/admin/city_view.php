<!-- Import excel City modal -->
<div class="modal fade" id="cityimport-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add New</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-procat" action="<?php echo base_url() . 'admin/City/city_spreadsheet_import'; ?>" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="state" class="form-label">Select State</label>
						<select class="form-select" name="state_id" id="state">
							<option value="">Select State</option>
							<?php foreach ($states as $sta) { ?>
								<option value="<?= $sta['id'] ?>"><?= $sta['name'] ?></option>
							<?php } ?>
						</select>
						<span style="color: red;"><?= form_error('state_id') ?></span>

					</div>
					<div class="mb-3">
						<!-- <input type="hidden" name="id" value="<?= $this->uri->segment(3) ?>"> -->
						<label for="name" class="form-label">Import Sub-District/City</label>
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
<div class="modal fade" id="city-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add New</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-ci" action="<?php echo base_url() . 'admin/city/store'; ?>">
					<div class="mb-3">
						<label for="state" class="form-label">Select State</label>
						<select class="form-select" name="state_id" id="state">
							<option value="">Select State</option>
							<?php foreach ($states as $sta) { ?>
								<option value="<?= $sta['id'] ?>"><?= $sta['name'] ?></option>
							<?php } ?>
						</select>
						<span style="color: red;"><?= form_error('state_id') ?></span>

					</div>
					<div class="mb-3">
						<label for="name" class="form-label">Sub-District/City Name</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter city name">
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
						<label for="city_status" class="form-label">Status</label>
						<select class="form-select" name="status" id="city_status">
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
<div class="modal fade" id="cityedit-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel2">Edit Sub-District/City</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="update_city" action="#">
					<input type="hidden" name="id" id="edit_city_id" />
					<div class="mb-3">
						<label for="state" class="form-label">Select State</label>
						<select class="form-select" name="state_id" id="state">
							<option value="">Select State</option>
							<?php foreach ($states as $sta) { ?>
								<option value="<?= $sta['id'] ?>"><?= $sta['name'] ?></option>
							<?php } ?>
						</select>
						<span style="color: red;"><?= form_error('state_id') ?></span>

					</div>
					<div class="mb-3">
						<label for="name" class="form-label">Sub-District/City Name</label>
						<input type="text" class="form-control" name="name" id="name" value="" placeholder="Enter city name">
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
						<label for="city_status" class="form-label">Status</label>
						<select class="form-select" name="status" id="city_status">
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
								<!-- <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
									<li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li> -->
								<button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#city-modal"><i class="mdi mdi-plus-circle me-1"></i> Add New</button>
								<button type="button" class="btn btn-info waves-effect waves-light import-excel-button" data-bs-toggle="modal" data-bs-target="#cityimport-modal">Import Sub-District/City</button>

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
										<button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#city-modal"><i class="mdi mdi-plus-circle me-1"></i> Add New</button>
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
								<table class="table table-centered table-nowrap table-striped" id="city_datatable">
									<thead>
										<tr>

											<th>#</th>
											<th>Sub-District/City Name</th>
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
	// var table = $('#city_datatable').DataTable({
	// 	responsive: true,
	// 	ajax: "<?php echo base_url('admin/City/all'); ?>",
	// 	"columnDefs": [{
	// 		"targets": 4,
	// 		"createdCell": function(td, cellData, rowData, row, col) {
	// 			if (rowData[4] == '1') {
	// 				// $(td).css('background-color', 'green')
	// 				$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
	// 			} else if (rowData[4] == '0') {
	// 				$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
	// 			}
	// 		}
	// 	}, ]
	// });
	var table = $('#city_datatable').DataTable({
		responsive: true,
		ajax: "<?php echo base_url('admin/City/all'); ?>",
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
			url: '<?php echo base_url() ?>admin/City/edit/' + id,
			type: "POST",
			dataType: "json",
			success: function(data) {
				$("#cityedit-modal #edit_city_id").val(data.id);
				$('#cityedit-modal #state').val(data.state_id);
				$('#cityedit-modal #name').val(data.name);
				$('#cityedit-modal #is_default').val(data.is_default);
				$("#cityedit-modal #city_status").val(data.status);
			}
		});
	});
	$("#update_city").submit(function(o) {
		o.preventDefault();
		var id = $('#edit_city_id').val();
		$.ajax({
			url: '<?php echo base_url() ?>admin/City/update/' + id,
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
	$('#store-ci').validate({
		rules: {
			name: "required",
			is_default: "required",
			status: "required"
		},
		message: {

		}
	});
</script>