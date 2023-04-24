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
						<h4 class="page-title">Source Category</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<form method="post" id="store-sourcat" action="<?php echo base_url() . 'admin/sourcecategory/store'; ?>">

								<div class="row">
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="name" class="form-label">Name</label>
											<input type="text" class="form-control" name="name" id="name" placeholder="Enter Source name">
											<?= form_error('name')  ?>
										</div>
									</div>
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

								<div class="row">
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="procat_status" class="form-label">Status</label>
											<select class="form-select" name="status" id="sourcat_status">
												<option selected="">Select Status</option>
												<option value="1" selected>Active</option>
												<option value="0">Inactive</option>
											</select>
											<span style="color: red;"><?= form_error('status') ?></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="text">
											<button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
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
