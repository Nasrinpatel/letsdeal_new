		<style>
			#questions{
				max-height: 300px;
				overflow-y: scroll;
				overflow-x: hidden;
			}
				
		</style>
		<!-- ============================================================== -->
			<!-- Start Page Content here -->
			<!-- ============================================================== -->
			<!--Add Modal -->
			<!-- <div class="modal fade" id="mastersadd-modal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-light">
							<h4 class="modal-title" id="myCenterModalLabel">Add New</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
						</div>
						<div class="modal-body p-4">
							<form method="post" id="store-masters" action="">
								<div class="mb-3">
									<label for="code" class="form-label">Code</label>
									<input type="text" class="form-control" name="code" id="code" placeholder="Enter Property Code">

								</div>
								<div class="mb-3">
									<label for="name" class="form-label">Name</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="Enter name">


								</div>
								<div class="mb-3">
									<label for="masters_status" class="form-label">Status</label>
									<select class="form-select" name="status" id="masters_status">
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
					</div>
				</div>
			</div> -->


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
											<a type="button" href="<?= base_url('admin/Formmaster') ?>" class="btn btn-success" style="float:right;">Back</a>
										</ol>
									</div>
									<h4 class="page-title">Form Master</h4>
								</div>
							</div>
						</div>
						<!-- end page title -->
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<form method="post" id="store-formmasters" action="<?php echo base_url() . 'admin/formmaster/store'; ?>">
											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="masters" class="form-label">Select Master</label>
														<select class="form-select select2" name="master_id" id="masters">
															<option value="">Select Master</option>
															<?php foreach ($master as $mas) : ?>

																<option value="<?php echo $mas['id']; ?>"><?php echo $mas['name']; ?></option>
															<?php endforeach; ?>

														</select>
														<!-- <?= form_error('master_id') ?> -->
														<span style="color: red;"><?= form_error('master_id') ?></span>
													</div>

												</div>

											</div>

											<div class="mb-3">
												<label class="form-label">Category:</label>
												<div class="form-check form-check-pink mb-1">
													<?php foreach ($categorychk as $catchk) { ?>
														<input type="checkbox" name="category_ids[]" value="<?php echo $catchk->id; ?>" class="form-check-input category" multiple><?php echo $catchk->name; ?><br>
														<!-- <input type="checkbox" name="checkbox[]" value="<?php echo $catchk->id; ?>" class="form-check-input category">  -->
													<?php } ?>
													<span style="color: red;"><?= form_error('category_ids[]') ?></span>
												</div>

											</div>

											<div class="row">
												<div class="col-lg-10">
													<div class="mb-3">
														<label class="form-label">Sub Category:</label>
														<div class="row">
															<?php foreach ($categorychk as $catchk) { ?>
																<div class="form-check-inline mb-1 subcategory-container" id="category-<?= $catchk->id ?>">
																	<label class="form-label me-3 text-decoration-underline text-blue" for="formControlReadonly"><?= $catchk->name ?></label>
																	<?php
																	$subcategorychk = $this->db->get_where('tb_property_subcategory', array('property_category_id' => $catchk->id, 'status' => '1'))->result();
																	foreach ($subcategorychk as $subcatchk) { ?>
																		<div class="form-check form-check-inline">
																			<input type="checkbox" name="sub_category_ids[]" value="<?php echo $subcatchk->id; ?>" class="form-check-input subcategory" data-category="<?php echo $subcatchk->property_category_id; ?>" multiple>
																			<!-- <input type="checkbox" name="checkbox[]" value="<?php echo $subcatchk->id; ?>" class="form-check-input subcategory" data-category="<?php echo $subcatchk->property_category_id; ?>"> -->

																			<label class="form-check-label" for="<?php echo $subcatchk->name; ?>"><?php echo $subcatchk->name; ?></label>
																		</div>
																	<?php } ?>
																</div>
															<?php } ?>
															<span style="color: red;"><?= form_error('sub_category_ids') ?></span>
															<div class="alert alert-danger" id="no-cat" style="display:none">Please Select Category</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="phase" class="form-label">Select Phase</label>

														<select class="form-select" name="phase_id" id="phase">
															<option value="">Select Phase</option>
															<?php foreach ($phase as $ph) : ?>

																<option value="<?php echo $ph['id']; ?>"><?php echo $ph['name']; ?></option>
															<?php endforeach; ?>
														</select>
														<span style="color: red;"><?= form_error('phase_id') ?></span>
													</div>

												</div>

											</div>
											<div id="questions">
												<div class="row">
													<div class="col-lg-6">
														<div class="mb-3">
															<label for="question" class="form-label">Select Question</label>
															<!-- <select class="form-select" name="id" id="question"> -->
															<select class="form-select select2" name="question_ids[]" id="question">
																<option value="">Select Question</option>
																<?php foreach ($question as $q) : ?>
																	<option value="<?php echo $q['id']; ?>"><?php echo $q['question']; ?></option>
																<?php endforeach; ?>
															</select>
															<span style="color: red;"><?= form_error('question_ids[]') ?></span>
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
					// Select the subcategory container
					var subcategoryContainer = $('.subcategory-container');

					$('.category').change(function() {
						// Get the ID of the checked category
						var id = $(this).val();
						// Show the selected subcategories and hide the others
						subcategoryContainer.hide();

						var checkedCategory = $('.category:checked');
						checkedCategory.each(function(index, item) {
							// Select the subcategories that belong to the checked category
							var subcategories = $('#category-' + item.value);
							subcategories.show();
						});

						if (checkedCategory.length == 0) {
							$('#no-cat').show();
						} else {
							$('#no-cat').hide();
						}

					});
					//triger change event on page load
					$('.category').trigger('change');


					$(".add-button").click(function() {
						// create a new select element
						var newSelect = $("<div class='row question'>" +
							"<div class='col-lg-6'>" +
							"<div class='mb-3'>" +
							"<label for='question' class='form-label'>Select Question</label>" +
							"<select class='form-select' name='question_ids[]' id='question'>" +
							"<option value=''>Select Question</option>" +
							"<?php foreach ($question as $q) : ?>" +
							"<option value='<?php echo $q['id']; ?>'><?php echo $q['question']; ?></option>" +
							"<?php endforeach; ?>" +
							"</select>" +
							"</div>" +
							"</div>" +
							"<div class='col-lg-1'>" +
							"<label class='form-label' style='width:100%'>&nbsp;</label>" +
							"<a class='btn btn-danger remove-button'><i class='fa fa-trash'></i></a>" +
							"</div>" +
							"</div>");
						$("#questions").append(newSelect);
					});
					$(document).on('click', '.remove-button', function() {
						// remove the select element with the id 'question'
						$(this).parent().parent('div').remove();
					});

				});
			</script>