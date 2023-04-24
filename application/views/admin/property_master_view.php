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
								<div class="row mb-2">
									<!-- <div class="col-sm-8">
										<button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#propertysubcategory-modal"><i class="mdi mdi-plus-circle me-1"></i> Add New</button>
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
