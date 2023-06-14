	<!--Add Thums Down reason Modal -->
	<div class="modal fade" id="thumbsdown_reason-modal" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header bg-light">
	                <h4 class="modal-title" id="myCenterModalLabel">Add Reason for Thumbs-down</h4>
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
	            </div>
	            <div class="modal-body p-4">
	                <form method="post" class="store-reason" id="thumbsdown_reason_form" action="#">
	                    <div class="mb-3">
	                        <label for="thumbsdown_reason" class="form-label">Reason</label>
	                        <input type="hidden" value="1" name="thumbs_down">
	                        <input type="text" class="form-control" name="thumbsdown_reason" id="thumbsdown_reason" placeholder="Enter Reason" required>
	                    </div>
	                    <div class="text-end">
	                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
	                    </div>
	                </form>
	            </div>
	        </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!--Add Not Match reason Modal -->
	<div class="modal fade" id="notmatch_reason-modal" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header bg-light">
	                <h4 class="modal-title" id="myCenterModalLabel">Add Reason for Not-match</h4>
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
	            </div>
	            <div class="modal-body p-4">
	                <form method="post" class="store-notmatchreason" id="notmatch_reason_form" action="#">
	                    <div class="mb-3">
	                        <label for="notmatch_reason" class="form-label">Reason</label>
	                        <input type="hidden" value="1" name="not_match">
	                        <input type="text" class="form-control" name="notmatch_reason" id="notmatch_reason" placeholder="Enter Reason" required>
	                    </div>
	                    <div class="text-end">
	                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
	                    </div>
	                </form>
	            </div>
	        </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
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
	                                <a href="<?= base_url('admin/propertymaster/add') ?>" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle me-1"></i> Add New</a>

								</ol>
							</div>
							<h4 class="page-title">Property Master</h4>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                        <form id="search_form" method="post">
                                            <div class="row" style="margin-bottom: 10px;">
                                                <label class="col-4 col-xl-1 col-form-label">Start Date :</label>
                                                <div class="col-8 col-xl-2">
                                                    <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date">
                                                </div>
                                                <label class="col-4 col-xl-1 col-form-label">End Date :</label>
                                                <div class="col-8 col-xl-2">
                                                    <input type="date" class="form-control" name="end_date" id="end_date" placeholder="End Date">
                                                </div>
                                                <label class="col-4 col-xl-1 col-form-label">Budget :</label>
                                                <div class="col-8 col-xl-2">
                                                    <input type="text" class="form-control" name="budget" id="budget" placeholder="Budget">
                                                </div>
                                                <label class="col-4 col-xl-1">Property Stage :</label>
                                                <div class="col-8 col-xl-2">





												
                                                    <select class="js-example-basic-multiple stage" name="stage" id="stage">
                                                        <option value="">Select Stage</option>
                                                        <?php foreach ($stage as $row) { ?>
                                                            <option value="<?= $row['id'] ?>" <?php echo set_select('category', $row['name']); ?>><?= $row['name'] ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-4 col-xl-1 col-form-label">Master :</label>
                                                <div class="col-8 col-xl-2">
                                                    <select class="js-example-basic-multiple master" name="master" id="master">
                                                        <option value="">Select Master</option>
                                                        <?php foreach ($master as $row) { ?>
                                                            <option value="<?= $row['id'] ?>" <?php echo set_select('master', $row['name']); ?>><?= $row['name'] ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-4 col-xl-1 col-form-label">Category :</label>
                                                <div class="col-8 col-xl-2">
                                                    <select class="js-example-basic-multiple category" name="category" id="property_category">
                                                        <option value="">Select Category</option>
                                                        <?php foreach ($category as $row) { ?>
                                                            <option value="<?= $row['id'] ?>" <?php echo set_select('category', $row['name']); ?>><?= $row['name'] ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-4 col-xl-1">Sub Category :</label>
                                                <div class="col-8 col-xl-2">
                                                    <select class="js-example-basic-multiple subcategory" name="subcategory" id="property_subcategory">
                                                        <option value="">Select Sub Category</option>
                                                    </select>
                                                </div>
                                                <label class="col-4 col-xl-1 col-form-label">Moje / Area :</label>
                                                <div class="col-8 col-xl-2">
                                                    <select class="js-example-basic-multiple area" name="area" id="area">
                                                        <option value="">Select Area</option>
                                                        <?php foreach ($area as $row) { ?>
                                                            <option value="<?= $row['id'] ?>" <?php echo set_select('area', $row['name']); ?>><?= $row['name'] ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-8 col-xl-3" style="margin: 10px;">
                                                    <input type="submit" class="btn btn-success waves-effect waves-light me-1" value="SEARCH">
                                                    <input type="reset" class="btn btn-danger waves-effect waves-light" value="RESET" id="reset_btn">
                                                </div>
                                            </div>
                                        </form>
                                </div>

                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                    <!-- end card -->
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
								<div class="table-responsive" style="margin-top: 20px">
									<table class="table table-centered table-nowrap table-striped" id="promaster_datatable">
										<thead>
											<tr>
												<th>#</th>
                                                <th>Customer / Channel Partner</th>
												<th>Master Name</th>
												<th>Category</th>
												<th>Sub Category</th>
												<th>Property Stage</th>
												<th>Budget</th>
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
				<!-- end row -->
			</div> <!-- container -->
		</div> <!-- content -->
	</div>
    <style>
        .filter-box{
            border:1px solid #aaa;
            padding: 10px;
            border-radius: 5px;
        }
        .filter span{
            width:190px;
        }
        .filter option{
            width:174px;
        }
        .select2-container .select2-selection--multiple .select2-selection__choice{
            color:black;
        }
        .filter label{
            display: inherit;
        }
        .filterTable td{
            padding:10px;
        }
        span.label.label-info {
            border: 1px solid #6c757d;
            padding: 3px;
            font-size: 12px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.master').select2({
                placeholder: "Select Master",
                width:'100%',
                theme: "bootstrap-5"
            });
            $('.area').select2({
                placeholder: "Select Area",
                width:'100%',
                theme: "bootstrap-5"
            });
            $('.stage').select2({
                placeholder: "Select Stage",
                width:'100%',
                theme: "bootstrap-5"
            });
            $('.category').select2({
                placeholder: "Select Category",
                width:'100%',
                theme: "bootstrap-5"
            });
            $('.subcategory').select2({
                placeholder: "Select Sub Category",
                width:'100%',
                theme: "bootstrap-5"
            });
            $('#property_category').change(function() {
                var categoryId = $(this).val();
                if (categoryId != '') {
                    $.ajax({
                        url: '<?php echo base_url() . "admin/propertymaster/getSubcategoryByCategory"; ?>',
                        type: 'post',
                        data: {
                            property_category_id: categoryId
                        },
                        dataType: 'json',
                        success: function(response) {
                            var len = response.length;
                            // debugger;
                            $("#property_subcategory").empty();
                            for (var i = 0; i < len; i++) {
                                var id = response[i]['id'];
                                var name = response[i]['name'];
                                $("#property_subcategory").append("<option value='" + id + "'>" + name + "</option>");
                            }
                        }
                    });
                } else {
                    $("#property_subcategory").empty();
                }
            });
        });
    </script>
	<script>
		var table = $('#promaster_datatable').DataTable({
			responsive: true,
			ajax: "<?php echo base_url('admin/Propertymaster/all'); ?>",
			"columnDefs": [{
				"targets": 9,
				"createdCell": function(td, cellData, rowData, row, col) {
					if (rowData[8] == '1') {
						$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
					} else if (rowData[8] == '0') {
						$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
					}
				}
			}, ]
		});
        $('#search_form').submit(function(e) {
            e.preventDefault();
            var filterData = {
                "start_date": $('#start_date').val(),
                "end_date": $('#end_date').val(),
                "property_category": $('#property_category').val(),
                "budget": $('#budget').val(),
                "stage": $('#stage').val(),
                "area": $('#area').val(),
                "master": $('#master').val(),
            };
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Propertymaster/set_filter'); ?>",
                data: filterData,
                success: function(response) {
                    table.ajax.reload();
                }
            });
        });
        $('#reset_btn').click(function() {
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Propertymaster/reset_filter'); ?>",
                success: function(response) {
                    $("#property_category").val('').trigger('change');
                    $("#property_subcategory").val('').trigger('change');
                    $("#master").val('').trigger('change');
                    $("#area").val('').trigger('change');
                    $("#stage").val('').trigger('change');
                    table.ajax.reload();
                }
            });
        });
		$(document).on('click', ".thumbs-up-btn", function(e) {
	        e.preventDefault();
	        var url = e.currentTarget.getAttribute('href');

	        Swal.fire({
	            title: 'Are you sure ?',
	            html: '<input type="checkbox" id="redirectCheckbox" /> Are you want to add Reminder ? ',
	            icon: 'warning',
	            showCancelButton: true,
	            confirmButtonColor: '#3085d6',
	            cancelButtonColor: '#d33',
	            confirmButtonText: 'Yes, hide it!'
	        }).then((response) => {
	            if (response.isConfirmed) {
	                // Check if the checkbox is checked
	                if ($('#redirectCheckbox').is(':checked')) {
	                    window.location.href = '<?php echo base_url('admin/Propertymaster/addreminder/id'); ?>';
	                } else {
	                    $.ajax({
	                        type: "post",
	                        url: url,
	                        data: {
	                            thumbs_up: 1
	                        },
	                        success: function(response) {
	                            table.ajax.reload();
	                        }
	                    });
	                }
	            }
	        });
	    });
	    $(document).on('click', ".thumbs-down-btn", function(e) {
	        e.preventDefault();
	        $('#thumbsdown_reason-modal').modal('show');
	        var url = e.currentTarget.getAttribute('href');
	        $('#thumbsdown_reason_form').attr('action', url);

	    });
	    $(document).on('submit', "#thumbsdown_reason_form", function(e) {
	        e.preventDefault();
	        var url = e.currentTarget.getAttribute('action');
	        debugger;
	        $.ajax({
	            type: "post",
	            url: url,
	            data: $(this).serialize(),
	            success: function(response) {
	                $('#thumbsdown_reason-modal').modal('hide');
	                table.ajax.reload();
	            }
	        });
	    });
	    $(document).on('click', ".not-match-btn", function(e) {
	        e.preventDefault();
	        $('#notmatch_reason-modal').modal('show');
	        var url = e.currentTarget.getAttribute('href');
	        $('#notmatch_reason_form').attr('action', url);

	    });
	    $(document).on('submit', "#notmatch_reason_form", function(e) {
	        e.preventDefault();
	        var url = e.currentTarget.getAttribute('action');
	        $.ajax({
	            type: "post",
	            url: url,
	            data: $(this).serialize(),
	            success: function(response) {
	                $('#notmatch_reason-modal').modal('hide');
	                table.ajax.reload();
	            }
	        });
	    });
	</script>