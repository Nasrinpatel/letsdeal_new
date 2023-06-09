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
								<a type="button" href="<?= base_url('admin/Propertymaster') ?>" class="btn btn-success" style="float:right;">Back</a>
							</ol>
						</div>
						<h4 class="page-title">Property Master</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<form method="post" id="store-promas" enctype="multipart/form-data" action="<?php echo base_url() . 'admin/propertymaster/store'; ?>">
								<input type="hidden" name="page" value="<?= @$_GET['page'] ?>">
								<?php if (isset($_GET['customer_id']) && $_GET['customer_id'] != '') { ?>
									<input type="hidden" name="customer_id" value="<?= $_GET['customer_id'] ?>" />
									<input type="hidden" name="redirect_to" value="customer">
								<?php } elseif (isset($_GET['agent_id']) && $_GET['agent_id'] != '') { ?>
									<input type="hidden" name="agent_id" value="<?= $_GET['agent_id'] ?>" />
									<input type="hidden" name="redirect_to" value="agent">
								<?php } else { ?>
									<div class="row">
										<div class="col-md-3">
											<div class="mb-3">

												<input class="form-check-input" type="radio" id="customer" name="customeragent" checked value="customer">
												<label class="form-check-label" for="customer">Customer</label>
											</div>

										</div>
										<div class="col-md-4">
											<div class="mb-3">
												<input class="form-check-input" type="radio" id="agent" name="customeragent" value="agent">
												<label class="form-check-label" for="agent">Channel Partner</label>
											</div>

										</div>
									</div>
									<div class="row" id='customer_div'>
										<div class="col-lg-5">
											<div class="mb-3">
												<label class="form-label">Customers<span class="text-danger">*</span></label>
												<select data-toggle="select2" class="form-control select2 customer" name="customer_id[]" data-width="100%" multiple>
													<!--                                                    <option value="">Select Customer</option>-->
													<?php foreach ($customers as $cust) { ?>
														<option value="<?= $cust['id'] ?>"><?= $cust['first_name'] ?> <?= $cust['last_name'] ?> <?= $cust['phone'] ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="mb-3">
												<label class="form-label" style='width:100%'>&nbsp;</label>
												<!--                                                <a class="btn btn-success waves-effect waves-light add-button">Add </a>-->
												<button type="button" class="btn btn-success waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#add-customer-modal">Add</button>
											</div>
										</div>
									</div>
									<div class="row" id='agent_div' style='display:none'>
										<div class="col-lg-5">
											<div class="mb-3">
												<label class="form-label">Channel Partner <span class="text-danger">*</span></label>
												<select data-toggle="select2" class="form-control select2 channel_partner" name="agent_id[]" data-width="100%" multiple>
													<!--                                                    <option value="">Select Channel Partner</option>-->
													<?php foreach ($agents as $ag) { ?>
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
								<?php } ?>
								<div class="row">
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="property_master" class="form-label">Select Master</label>
											<select class="form-select select2" name="pro_master_id" id="property_master">
												<option value="">Select Master</option>
												<?php
												foreach ($master as $mas) { ?>
													<option value="<?= $mas['id'] ?>"><?= $mas['name'] ?></option>
												<?php }
												?>
											</select>

											<span style="color: red;"><?= form_error('pro_master_id') ?></span>
										</div>

									</div>

								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="property_category" class="form-label">Select Category</label>
											<select class="form-select" name="pro_category_id" id="property_category">
												<option value="">Select Category</option>
												<?php foreach ($category as $cat) { ?>
													<option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
												<?php } ?>
											</select>
											<span style="color: red;"><?= form_error('pro_category_id') ?></span>

										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="property_subcategory" class="form-label">Select Sub Category</label>
											<select class="form-select" name="pro_subcategory_id" id="property_subcategory">
												<option value="">Select Sub Category</option>
											</select>
											<span style="color: red;"><?= form_error('pro_subcategory_id') ?></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="text">
											<a id="fetch_question" class="btn btn-info waves-effect waves-light">Fetch Questions</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12" id="form_genrator">

									</div>
								</div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Property Stage<span class="text-danger"> *</span></label>
                                            <select data-toggle="select2" class="form-control select2" name="property_stage_id" data-width="100%">
                                                <option value="">Select Stage</option>
                                                <?php foreach ($propertystage as $stage) { ?>
                                                    <option value="<?= $stage['id'] ?>"><?= $stage['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <span style="color: red;"><?= form_error('property_stage_id') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Budget <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="from_budget" placeholder="From">
                                        </div>
                                        <span style="color: red;"><?= form_error('from_budget') ?></span>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3" style="margin-top: 8px;">
                                            <label class="form-label"> </label>
                                            <input type="text" class="form-control" name="to_budget" placeholder="To">
                                        </div>
                                        <span style="color: red;"><?= form_error('to_budget') ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">State <span class="text-danger"> *</span></label>
                                            <select class="form-select" name="state_id" id="state_id">
                                                <option value="">Select State</option>
                                                <?php foreach ($states as $sta) { ?>
                                                    <option value="<?= $sta['id'] ?>" <?= ($sta['is_default'] == 1) ? 'selected' : '' ?>><?= $sta['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <span style="color: red;"><?= form_error('state_id') ?></span>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">District <span class="text-danger"> *</span></label>
                                            <select class="form-select" name="district_id" id="district_id">
                                                <option value="">Select District</option>
                                            </select>
                                        </div>
                                        <span style="color: red;"><?= form_error('district_id') ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Sub District <span class="text-danger"> *</span></label>
                                            <select class="form-select" name="sub_district_id" id="sub_district_id">
                                                <option value="">Select Sub District</option>
                                            </select>
                                        </div>
                                        <span style="color: red;"><?= form_error('sub_district_id') ?></span>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Moje / Area <span class="text-danger"> *</span></label>
                                            <select class="form-select" name="area_id" id="area_id">
                                                <option value="">Select Moje / Area</option>
                                            </select>
                                        </div>
                                        <span style="color: red;"><?= form_error('area_id') ?></span>
                                    </div>
                                </div>
								<div class="row">
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="form_status" class="form-label">Status</label>
											<select class="form-select" name="status" id="form_status">
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

<script>
	$(document).ready(function() {
		$('.js-example-basic-single').select2({
			theme: "bootstrap"
		});
		$('.customer').select2({
			multiple: true,
			placeholder: "Select Customer",
			theme: "bootstrap-5"
		});
		$('.channel_partner').select2({
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

<script>
	$(document).ready(function() {
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
		$('#fetch_question').click(function() {
			var master_id = $('#property_master').val();
			var category_id = $('#property_category').val();
			var subcategory_id = $('#property_subcategory').val();
			if (master_id == '') {
				error_message('', 'Please Select Master');
			} else if (category_id == '') {
				error_message('', 'Please Select Category');
			} else if (subcategory_id == '') {
				error_message('', 'Please Select Subcategory');
			}
			//alert(master_id + ' '+category_id+' ' + subcategory_id);
			$.ajax({
				// type: 'POST',
				url: '<?php echo base_url('admin/Propertymaster/get_questions'); ?>',
				type: 'POST',
				data: {
					master_id: master_id,
					category_id: category_id,
					subcategory_id: subcategory_id
				},
				dataType: 'json',
				success: function(data) {
					debugger;
					if (data.success == true) {
						$('#form_genrator').html(data.html);
						form_init();
						$(".image_gallery").fileinput();
					}
				}
			});
		});
		$(document).on('click', '.add-button', function() {
			// create a new select element
			var name = $(this).attr('data-name');
			var newSelect = $("<div id='videogallery'>" +
				"<div class='row'>" +
				"<div class='col-lg-10'>" +
				"<div class='mb-3'>" +
				"<input type='text' class='form-control' name='" + name + "' id='videogallery' placeholder='Enter Video Link'>" +
				"</div>" +
				"</div>" +
				"<div class='col-lg-2'>" +
				"<a class='btn btn-danger remove-button'><i class='fa fa-trash'></i></a>" + "</div>" +
				"</div>" +
				"</div>");
			$("#videogallery").append(newSelect);
		});
		$(document).on('click', '.remove-button', function() {
			// remove the select element with the id 'question'
			$(this).parent().parent('div').remove();
		});
		$(document).on("click", ".add-button-textbox", function() {
			var name = $(this).attr('data-name');
			var newSelect = $("<div class='row'>" +
				"<div class='col-lg-6'>" +
				"<div class='mb-3'>" +
				"<input type='text' class='form-control' name='" + name + "' id='option'>" +
				"</div>" +
				"</div>" +
				"<div class='col-lg-1'>" +
				"<a class='btn btn-danger remove-button'><i class='fa fa-trash'></i></a>" +
				"</div>" +
				"</div>");
			$("#options").append(newSelect);
		});
		//customer
		$('input[name=customeragent]').click(function() {

			if (this.id == "customer") {
				$("#customer_div").show('slow');

			} else {
				$("#customer_div").hide('slow');

			}
		});
		//agent
		$('input[name=customeragent]').click(function() {

			if (this.id == "agent") {
				$("#agent_div").show('slow');

			} else {
				$("#agent_div").hide('slow');

			}
		});
	});

    //on state change fetch district
    $(document).on('change','#state_id',function() {
        var state_id = $(this).val();
        if (state_id != '') {
            $.ajax({
                url: '<?php echo base_url() . "admin/Propertymaster/getDistrictByState"; ?>',
                type: 'post',
                data: {
                    state_id: state_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $("#district_id").empty();
                    $("#district_id").append("<option value=''>Select District</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        var is_default = response[i]['is_default'];
                        $("#district_id").append("<option value='" + id + "' " + ((is_default == 1) ? 'selected' : '') + ">" + name + "</option>");
                    }
                }
            });
        } else {
            $("#district_id").html("<option value=''>Select District</option>");
        }
    });

    //on district change fetch sub district
    $(document).on('change','#district_id',function() {
        var district_id = $(this).val();
        if (district_id != '') {
            $.ajax({
                url: '<?php echo base_url() . "admin/Propertymaster/getSubDistrictByDistrict"; ?>',
                type: 'post',
                data: {
                    district_id: district_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $("#sub_district_id").empty();
                    $("#sub_district_id").append("<option value=''>Select Sub District</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#sub_district_id").append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        } else {
            $("#sub_district_id").html("<option value=''>Select Sub District</option>");
        }
    });

    //on sub district change fetch area
    $(document).on('change','#sub_district_id',function() {
        var sub_district_id = $(this).val();
        if (sub_district_id != '') {
            $.ajax({
                url: '<?php echo base_url() . "admin/Propertymaster/getAreaBySubDistrict"; ?>',
                type: 'post',
                data: {
                    sub_district_id: sub_district_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $("#area_id").empty();
                    $("#area_id").append("<option value=''>Select Moje / Area</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#area_id").append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        } else {
            $("#area_id").html("<option value=''>Select Moje / Area</option>");
        }
    });
</script>