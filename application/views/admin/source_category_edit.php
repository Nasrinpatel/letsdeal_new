<!-- Import excel source options modal -->
<div class="modal fade" id="sourceoptionimport-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h4 class="modal-title" id="myCenterModalLabel">Add New</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body p-4">
				<form method="post" id="store-procat" action="<?php echo base_url() . 'admin/Sourcecategory/spreadsheet_import'; ?>" enctype="multipart/form-data">
					<div class="mb-3">
						<input type="hidden" name="source_cat_id" value="<?= $this->uri->segment(4) ?>">
						<label for="name" class="form-label">Import Options</label>
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

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->



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
								<!-- <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#masters-modal"><i class="mdi mdi-plus-circle me-1"></i> Add New</button> -->

							</ol>
						</div>
						<h4 class="page-title">Source category</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row">
				<div class="col-12">
					<div class="card">

						<div class="card-body">

							<form method="post" action="<?php echo base_url('admin/Sourcecategory/update/' . $soucat->id); ?>">
								<input type="hidden" name="id" id="edit_sourcat_id" />

								<div class="col-lg-6">
									<div class="mb-3">
										<label for="name" class="form-label">Name</label>
										<input type="text" class="form-control" name="name" id="name" value="<?= $soucat->name ?>">
										<!-- <?= form_error('name')  ?> -->
									</div>
								</div>
								<div id="editoptions">
									<?php
									$i = 0;
									foreach ($souoption as $so) : ?>
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label for="name" class="form-label">Option</label>
													<input type="text" class="form-control" name="option[]" id="option" value="<?= $so['name'] ?>">
												</div>
											</div>
											<div class="col-lg-3">
												<label class="form-label" style='width:100%'>&nbsp;</label>
												<?php if ($i == 0) { ?>
													<a class="btn btn-success waves-effect waves-light edit-button">Add </a>
													<!-- <a class="btn btn-info waves-effect waves-light import-excel-button">Import Excel</a> -->
													<button type="button" class="btn btn-info waves-effect waves-light import-excel-button" data-bs-toggle="modal" data-bs-target="#sourceoptionimport-modal">Import Excel</button>

												<?php } else { ?>
													<a class='btn btn-danger remove-button'><i class='fa fa-trash'></i></a>
												<?php } ?>
											</div>
										</div>
									<?php $i++;
									endforeach; ?>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="sourcat_status" class="form-label">Status</label>
										<select class="form-select" name="status" id="sourcat_status">
											<option selected="">Select Status</option>
											<option value="1" <?= ($soucat->status == '1') ? 'selected' : '' ?>>Active</option>
											<option value="0" <?= ($soucat->status == '0') ? 'selected' : '' ?>>Inactive</option>
										</select>
									</div>
								</div>
								<div class="text-end">
									<button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
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