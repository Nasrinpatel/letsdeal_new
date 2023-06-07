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
                                <div class="filter-box">
                                    <form id="filter_property" method="post" action="<?= base_url('admin/Propertymaster/all') ?>">
                                        <div class="row" style="margin-bottom: 10px;">
                                            <label class="col-4 col-xl-1 col-form-label">From Date :</label>
                                            <div class="col-8 col-xl-3">
                                                <input type="date" class="form-control" name="from_date" id="from_date" placeholder="From Date">
                                            </div>
                                            <label class="col-4 col-xl-1 col-form-label">To Date :</label>
                                            <div class="col-8 col-xl-3">
                                                <input type="date" class="form-control" name="to_date" id="to_date" placeholder="To Date">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-4 col-xl-1 col-form-label">Category :</label>
                                            <div class="col-8 col-xl-3">
                                                <select class="js-example-basic-multiple category" name="category" id="property_category">
                                                    <option value="">Select Category</option>
                                                    <?php foreach ($category as $row) { ?>
                                                        <option value="<?= $row['id'] ?>" <?php echo set_select('category', $row['name']); ?>><?= $row['name'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label class="col-4 col-xl-1">Sub Category :</label>
                                            <div class="col-8 col-xl-3">
                                                <select class="js-example-basic-multiple subcategory" name="subcategory" id="property_subcategory">
                                                    <option value="">Select Sub Category</option>
                                                </select>
                                            </div>
                                            <div class="col-8 col-xl-3">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Filter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
								<div class="table-responsive" style="margin-top: 20px">
									<table class="table table-centered table-nowrap table-striped" id="promaster_datatable">
										<thead>
											<tr>
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
				"targets": 5,
				"createdCell": function(td, cellData, rowData, row, col) {
					if (rowData[5] == '1') {

						$(td).html('<span class="badge bg-soft-success text-success">Active</span>');
					} else if (rowData[5] == '0') {
						$(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
					}
				}
			}, ]
		});

	</script>