<!--Add Modal -->
<div class="modal fade" id="sourcecategory-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add New</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-sourcat" action="<?php echo base_url() . 'admin/sourcecategory/store'; ?>">

					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter Source name">
						<?= form_error('name')  ?>
					</div>


					<div id="options">
						<div class="row">
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="option" class="form-label">Option</label>
									<input type="text" class="form-control" name="option[]" id="option" placeholder="Enter Option">
								</div>
							</div>
							<div class="col-lg-1">
								<label class="form-label" style='width:100%'>&nbsp;</label>
								<a class="btn btn-success waves-effect waves-light add-button">Add </a>
							</div>
						</div>
					</div>


					<div class="mb-3">
						<label for="procat_status" class="form-label">Status</label>
						<select class="form-select" name="status" id="sourcat_status">
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
<div class="modal fade" id="sourcecategoryedit-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel2">Edit Source Category</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="update_sourcecategory" action="#">
					<input type="hidden" name="id" id="edit_sourcat_id" />
					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control" name="name" id="name" value="" placeholder="Enter Source name">
						<!-- <?= form_error('name')  ?> -->
					</div>
					<div id="editoptions">
						<div class="row">
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="name" class="form-label">Option</label>
									<input type="text" class="form-control" name="option[]" id="option" placeholder="Enter Option">
								</div>
							</div>
							<div class="col-lg-1">
								<label class="form-label" style='width:100%'>&nbsp;</label>
								<a class="btn btn-success waves-effect waves-light edit-button">Add </a>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="sourcat_status" class="form-label">Status</label>
						<select class="form-select" name="status" id="sourcat_status">
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
								<a href="<?= base_url('admin/Sourcecategory/add') ?>" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle me-1"></i> Add New</a>

							</ol>
						</div>
						<h4 class="page-title">Source Category</h4>
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
										<button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#sourcecategory-modal"><i class="mdi mdi-plus-circle me-1"></i> Add New</button>
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
								<table class="table table-centered table-nowrap table-striped" id="source_datatable">
									<thead>
										<tr>

											<th>#</th>
											<th>Source Category Name</th>
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
	var table = $('#source_datatable').DataTable({
		responsive: true,
		ajax: "<?php echo base_url('admin/sourcecategory/all'); ?>",
		"columnDefs": [{
			"targets": 3,
			"createdCell": function(td, cellData, rowData, row, col) {
				if (rowData[3] == '1') {
					// $(td).css('background-color', 'green')
					$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
				} else if (rowData[3] == '0') {
					$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
				}
			}
		}, ]
	});

	$(document).on('click', ".edit-btn", function() {
		var id = $(this).attr('data-id');
		$.ajax({
			url: '<?php echo base_url() ?>admin/sourcecategory/edit/' + id,
			type: "POST",
			dataType: "json",
			success: function(data) {
				// debugger;
				var options = data.option_data;
				debugger;
				$("#sourcecategoryedit-modal #edit_sourcat_id").val(data.id);
				$('#sourcecategoryedit-modal #name').val(data.name);
				$("#sourcecategoryedit-modal #sourcat_status").val(data.status);
				$('#editoptions').html('');
				options.forEach(function(option, index) {
					if (index == 0) {
						var optionRow = '<div class="row">' +
							'<div class="col-lg-6">' +
							'<div class="mb-3">' +
							'<label for="name" class="form-label">Option</label>' +
							'<input type="text" class="form-control" name="option[]" value="' + option.name + '" id="option" placeholder="Enter Option">' +
							'</div>' +
							'</div>' +
							'<div class="col-lg-1">' +
							'<label class="form-label" style="width:100%">&nbsp;</label>' +
							'<a class="btn btn-success waves-effect waves-light edit-button">Add </a>' +
							'</div>' +
							'</div>';
					} else {
						var optionRow = '<div class="row">' +
							'<div class="col-lg-6">' +
							'<div class="mb-3">' +
							'<label for="name" class="form-label">Option</label>' +
							'<input type="text" class="form-control" name="option[]" value="' + option.name + '" id="option" placeholder="Enter Option">' +
							'</div>' +
							'</div>' +
							'<div class="col-lg-1">' +
							"<label class='form-label' style='width:100%'>&nbsp;</label>" +
							"<a class='btn btn-danger remove-button'><i class='fa fa-trash'></i></a>" + "</div>" +
							'</div>' +
							'</div>';
					}
					$('#editoptions').append(optionRow);
				});
				if (options.length == 0) {
					var optionRow = '<div class="row">' +
						'<div class="col-lg-6">' +
						'<div class="mb-3">' +
						'<label for="name" class="form-label">Option</label>' +
						'<input type="text" class="form-control" name="option[]" id="option" placeholder="Enter Option">' +
						'</div>' +
						'</div>' +
						'<div class="col-lg-1">' +
						'<label class="form-label" style="width:100%">&nbsp;</label>' +
						'<a class="btn btn-success waves-effect waves-light edit-button">Add </a>' +
						'</div>' +
						'</div>';
					$('#editoptions').append(optionRow);
				}
			}
		});
	});
	$("#update_sourcecategory").submit(function(o) {
		o.preventDefault();
		var id = $('#edit_sourcat_id').val();
		$.ajax({
			url: '<?php echo base_url() ?>admin/sourcecategory/update/' + id,
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
	$('#store-sourcat').validate({
		rules: {
			name: "required",
			status: "required"
		},
		message: {

		}
	});


	$(document).on('click', '.add-button', function() {
		// create a new select element
		var newSelect = $("<div id='options'>" +
			"<div class='row'>" +
			"<div class='col-lg-6'>" +
			"<div class='mb-3'>" +
			"<label for='option' class='form-label'>Option</label>" +
			"<input type='text' class='form-control' name='option[]' id='option' placeholder='Enter Option'>" +
			"</div>" +
			"</div>" +
			"<div class='col-lg-1'>" +
			"<label class='form-label' style='width:100%'>&nbsp;</label>" +
			"<a class='btn btn-danger remove-button'><i class='fa fa-trash'></i></a>" + "</div>" +
			"</div>" +
			"</div>");
		$("#options").append(newSelect);
	});
	$(document).on('click', '.remove-button', function() {
		// remove the select element with the id 'question'
		$(this).parent().parent('div').remove();
	});
	$(document).on('click', '.edit-button', function() {
		// create a new select element
		var newSelect = $("<div id='editoptions'>" +
			"<div class='row'>" +
			"<div class='col-lg-6'>" +
			"<div class='mb-3'>" +
			"<label for='option' class='form-label'>Option</label>" +
			"<input type='text' class='form-control' name='option[]' id='option' placeholder='Enter Option'>" +
			"</div>" +
			"</div>" +
			"<div class='col-lg-1'>" +
			"<label class='form-label' style='width:100%'>&nbsp;</label>" +
			"<a class='btn btn-danger remove-button'><i class='fa fa-trash'></i></a>" + "</div>" +
			"</div>" +
			"</div>");
		$("#editoptions").append(newSelect);
	});
	$(document).on('click', '.remove-button', function() {
		// remove the select element with the id 'question'
		$(this).parent().parent('div').remove();
	});
</script>