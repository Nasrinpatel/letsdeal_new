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

										<form method="post" action="<?php echo base_url('admin/Propertymaster/update/' . $property->id); ?>" enctype="multipart/form-data">
											<input type="hidden" name="page" value="<?= @$_GET['page'] ?>">
											<?php if (isset($_GET['customer_id']) && $_GET['customer_id'] != '') { ?>
												<input type="hidden" name="customer_id" value="<?= $_GET['customer_id'] ?>" />
												<input type="hidden" name="redirect_to" value="customer">
											<?php } elseif (isset($_GET['agent_id']) && $_GET['agent_id'] != '') { ?>
												<input type="hidden" name="agent_id" value="<?= $_GET['agent_id'] ?>" />
												<input type="hidden" name="redirect_to" value="agent">
											<?php } else { ?>
												<input type="hidden" name="id" id="edit_propertymaster_id" />
												<div class="row">
													<div class="col-md-3">
														<div class="mb-3">
															<input class="form-check-input" type="radio" id="customer" name="customeragent" <?= $property->customer_id != '' ? 'checked' : ''; ?> value="customer">
															<label class="form-check-label" for="customer">Customer</label>
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<input class="form-check-input" type="radio" id="agent" name="customeragent" <?= $property->agent_id != '' ? 'checked' : ''; ?> value="agent">
															<label class="form-check-label" for="agent">Channel Partner </label>
														</div>
													</div>
												</div>
												<div id='customer_div' style='display:none'>
													<div class="col-md-5">
														<div class="mb-3">
															<label class="form-label">Customers<span class="text-danger">*</span></label>
															<select data-toggle="select2" class="form-control select2 customer" name="customer_id[]" data-width="100%" multiple>
																<!--															<option value="">Select Customer</option>-->
																<?php foreach ($customers as $cust) { ?>
																	<option value="<?= $cust['id'] ?>" <?php for ($i = 0; $i < count($customer_id); $i++) {
																											if ($cust['id'] == $customer_id[$i]) { ?>selected<?php }
																																						} ?>><?= $cust['first_name'] ?> <?= $cust['last_name'] ?> <?= $cust['phone'] ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
												</div>
												<div id='agent_div' style='display:none'>
													<div class="col-md-5">
														<div class="mb-3">
															<label class="form-label">Channel Partner <span class="text-danger">*</span></label>
															<select data-toggle="select2" class="form-control select2 channel_partner" name="agent_id[]" data-width="100%" multiple>
																<!--															<option value="">Select Channel Partner </option>-->
																<?php foreach ($agents as $ag) { ?>
																	<option value="<?= $ag['id'] ?>" <?php for ($i = 0; $i < count($agent_id); $i++) {
																											if ($ag['id'] == $agent_id[$i]) { ?>selected<?php }
																																				} ?>><?= $ag['first_name'] ?> <?= $ag['last_name'] ?> <?= $ag['phone'] ?></option>
																<?php } ?>
															</select>
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
															<?php foreach ($master as $mas) : ?>

																<option value="<?php echo $mas['id']; ?>" <?= ($property->pro_master_id == $mas['id']) ? 'selected' : '' ?>><?php echo $mas['name']; ?></option>
															<?php endforeach; ?>
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
															<?php foreach ($category as $cat) : ?>

																<option value="<?php echo $cat['id']; ?>" <?= ($property->pro_category_id == $cat['id']) ? 'selected' : '' ?>><?php echo $cat['name']; ?></option>
															<?php endforeach; ?>
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
															<?php foreach ($subcategory as $scat) : ?>

																<option value="<?php echo $scat['id']; ?>" <?= ($property->pro_subcategory_id == $scat['id']) ? 'selected' : '' ?>><?php echo $scat['name']; ?></option>
															<?php endforeach; ?>


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
													<div class="card">
														<div class="card-body">
															<div id="progressbarwizard">
																<ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
																	<?php
																	$i = 0;
																	foreach ($phases as $phase) {
																		echo '<li class="nav-item">
																			<a href="#tab-' . $phase['id'] . '" data-bs-toggle="tab" data-toggle="tab" class="nav-link ' . (($i == 0) ? 'active' : '') . ' rounded-0 pt-2 pb-2">
																				<span class="d-none d-sm-inline">' . $phase['name'] . '</span>
																			</a>
																			</li>';
																		$i++;
																	}
																	?>
																</ul>
																<div class="tab-content b-0 mb-0 pt-0">
																	<div id="bar" class="progress mb-3" style="height: 7px;">
																		<div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
																	</div>
																	<?php
																	$i = 0;
																	foreach ($phases as $phase) {
																		$data['questions'] = $this->promast->fetchQuestions($property->id, $phase['id']); ?>
																		<div class="tab-pane <?= (($i == 0) ? 'active' : '') ?>" id="tab-<?= $phase['id'] ?>">
																			<input type="hidden" name="phase_ids[]" value="<?= $phase['id'] ?>">
																			<div class="row">
																				<div class="col-12">
																					<div class="sequence_box">
																						<?php
																						if (!empty($data['questions'])) {
																							foreach ($data['questions'] as $que) {
																								$answers = json_decode($que['answers'], true);
																								$answer_ids = json_decode($que['answer_ids'], true);
																								$que['question_answer_inputtype'] = $answers['answer_type']; ?>
																								<div class="sequence">
																									<div class="row mb-3">
																										<label class="col-md-3 col-form-label" for="userName1"><?= $que['question'] ?></label>
																										<input type="hidden" name="question_<?= $phase['id'] ?>[]" value="<?= $que['question'] ?>">
																										<input type="hidden" name="question_id_<?= $phase['id'] ?>[]" value="<?= $que['question_id'] ?>">
																										<input type="hidden" name="answer_type_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= $que['question_answer_inputtype'] ?>">
																										<div class="col-md-9">
																											<?php
																											if ($que['question_answer_inputtype'] == 'Checkbox' || $que['question_answer_inputtype'] == 'Radio'	|| $que['question_answer_inputtype'] == 'Dropdown'	|| $que['question_answer_inputtype'] == 'Image Gallery') {
																												//'print_r($answers['options']);
																												foreach ($answers['options'] as $option) { ?>
																													<input type="hidden" name="answer_options_<?= $phase['id'] ?>_<?= $que['question_id'] ?>[]" value="<?= array_keys($option)[0] ?>">
																												<?php }
																												foreach ($answer_ids['options'] as $option) { ?>
																													<input type="hidden" name="answer_option_ids_<?= $phase['id'] ?>_<?= $que['question_id'] ?>[]" value="<?= array_keys($option)[0] ?>">
																												<?php }
																											}
																											if ($que['question_answer_inputtype'] == 'Textbox') { ?>
																												<input type="text" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="userName1" value="<?= array_keys($answers['options'][0])[0] ?>">
																											<?php } elseif ($que['question_answer_inputtype'] == 'Dropdown') { ?>
																												<select class="form-select" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>">
																													<option>Select Option</option>
																													<?php $i = 0;
																													foreach ($answers['options'] as $option) { ?>
																														<option value="<?= array_keys($answer_ids['options'][$i])[0] ?>" <?= ((array_values($answer_ids['options'][$i])[0] == 1) ? 'selected' : '') ?>><?= array_keys($option)[0] ?></option>
																													<?php $i++;
																													} ?>
																												</select>
																												<?php } elseif ($que['question_answer_inputtype'] == 'Checkbox') {
																												$i = 0;
																												foreach ($answers['options'] as $option) { ?>
																													<div class="form-check form-check-inline">
																														<input class="form-check-input" type="checkbox" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>[]" value="<?= array_keys($answer_ids['options'][$i])[0] ?>" <?= ((array_values($answer_ids['options'][$i])[0] == 1) ? 'checked' : '') ?>>
																														<label class="form-check-label" for="userName1"><?= array_keys($option)[0] ?></label><br>
																													</div>
																												<?php $i++;
																												}
																											} elseif ($que['question_answer_inputtype'] == 'Radio') {
																												$i = 0;
																												foreach ($answers['options'] as $option) { ?>
																													<div class="form-check form-check-inline">
																														<input class="form-check-input" type="radio" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answer_ids['options'][$i])[0] ?>" <?= ((array_values($answer_ids['options'][$i])[0] == 1) ? 'checked' : '') ?>>
																														<label class="form-check-label" for="userName1"><?= array_keys($option)[0] ?></label><br>
																													</div>
																												<?php $i++;
																												}
																											} elseif ($que['question_answer_inputtype'] == 'Date') { ?>
																												<input type="date" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																											<?php
																											} elseif ($que['question_answer_inputtype'] == 'Textarea') { ?>
																												<textarea class="form-control" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>"><?= ($answers['options']) ? array_keys($answers['options'][0])[0] : '' ?></textarea>
																											<?php } elseif ($que['question_answer_inputtype'] == 'Multitextbox') {
																												$i = 0; ?>
																												<div id="options">
																													<?php
																													foreach ($answers['options'] as $option) { ?>
																														<div class="row">
																															<div class="col-lg-6">
																																<div class="mb-3">
																																	<input type="text" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>[]" id="option" value="<?= array_keys($option)[0] ?>">
																																</div>
																															</div>

																															<div class="col-lg-2">
																																<?php if ($i == 0) { ?>
																																	<a class="btn btn-success waves-effect waves-light add-button-textbox" data-name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>[]">Add </a>
																																<?php } else { ?>
																																	<a class='btn btn-danger remove-button'><i class='fa fa-trash'></i></a>
																																<?php } ?>
																															</div>
																														</div>
																													<?php $i++;
																													} ?>
																												</div>
																											<?php } elseif ($que['question_answer_inputtype'] == 'File') { ?>
																												<input type="file" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																												<!-- <?php if (!empty($artist['artist']->press_kit)) { ?>
																												<a href="<?= base_url() . 'assets/images/' . $phase['id']->press_kit ?>" class="px-1 py-0 mb-4 color-pink-dark" target="_blank"><b>View File</b></a>
																											<?php } ?> -->
																											<?php } elseif ($que['question_answer_inputtype'] == 'Number') { ?>
																												<input type="number" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																											<?php } elseif ($que['question_answer_inputtype'] == 'Phone') { ?>
																												<input type="tel" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																											<?php } elseif ($que['question_answer_inputtype'] == 'Email') { ?>
																												<input type="email" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																											<?php } elseif ($que['question_answer_inputtype'] == 'Link') { ?>
																												<input type="url" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																											<?php } elseif ($que['question_answer_inputtype'] == 'Image') { ?>
																												<input type="file" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" accept="image/*">
																												<a class="btn btn-primary mt-1" href="<?= base_url('uploads/property/') . array_keys($answers['options'][0])[0] ?>" target="_blank">View Old File</a>
																												<input type="hidden" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																											<?php } elseif ($que['question_answer_inputtype'] == 'Video 360') { ?>
																												<input type="url" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" accept="video/*" value="<?= array_keys($answers['options'][0])[0] ?>">
																											<?php } elseif ($que['question_answer_inputtype'] == 'Google Map') { ?>
																												<div class="row">
																													<div class="col-md-6"><input type="text" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>[]" value="<?= array_keys($answers['options'][0])[0] ?>"></div>
																													<div class="col-md-6"><input type="text" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>[]" value="<?= array_keys($answers['options'][1])[0] ?>"></div>
																												</div>
																											<?php } elseif ($que['question_answer_inputtype'] == 'Image Gallery') { ?>
																												<input class="image_gallery" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>[]" type="file" multiple>
																												<div class="row mt-3">
																													<?php foreach ($answers['options'] as $option) { ?>
																														<div class="col-md-3">
																															<div class="image-area">
																																<a class="remove-image remove-button" href="#" onclick="return false;" style="display: inline;">&#215;</a>
																																<img src="<?= base_url('uploads/property/') . array_keys($option)[0] ?>" class="img-fluid">
																																<input type="hidden" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>[]" value="<?= array_keys($option)[0] ?>">
																															</div>
																														</div>
																													<?php } ?>
																												</div>
																											<?php } elseif ($que['question_answer_inputtype'] == 'Video Gallery') { ?>
																												<div id="videogallery">
																													<?php $i = 0;
																													foreach ($answers['options'] as $option) {  ?>
																														<div class="row">
																															<div class="col-lg-10">
																																<div class="mb-3">
																																	<input type="url" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($option)[0] ?>" id="videogallery">
																																</div>
																															</div>
																															<div class="col-lg-2">
																																<?php if ($i == 0) { ?>
																																	<a class="btn btn-success waves-effect waves-light edit-button">Add </a>
																																<?php } else { ?>
																																	<a class='btn btn-danger remove-button'><i class='fa fa-trash'></i></a>
																																<?php } ?>
																															</div>
																														</div>
																													<?php $i++;
																													} ?>
																												</div>
																											<?php } ?>
																										</div>
																									</div>
																								</div>
																							<?php }
																						} else { ?>
																							<p class="text-center">No Questions</p>
																						<?php } ?>
																					</div>
																				</div>
																			</div>
																		</div>
																	<?php $i++;
																	}
																	?>
																	<ul class="list-inline mb-0 wizard">
																		<li class="previous list-inline-item">
																			<a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
																		</li>
																		<li class="next list-inline-item float-end">
																			<a href="javascript: void(0);" class="btn btn-secondary">Next</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

                                            <div class="row" style="margin-top: 10px;">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Property Stage<span class="text-danger"> *</span></label>
                                                        <select data-toggle="select2" class="form-control select2" name="property_stage_id" data-width="100%">
                                                            <option value="">Select Stage</option>
                                                            <?php foreach ($all_propertystage as $stage) { ?>
                                                                <option value="<?= $stage['id'] ?>" <?= ($property->property_stage_id == $stage['id']) ? 'selected' : '' ?>><?= $stage['name'] ?></option>
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
                                                        <input type="text" class="form-control" name="from_budget" placeholder="From" value="<?= $property->from_budget ?>">
                                                    </div>
                                                    <span style="color: red;"><?= form_error('from_budget') ?></span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3" style="margin-top: 8px;">
                                                        <label class="form-label"> </label>
                                                        <input type="text" class="form-control" name="to_budget" placeholder="To" value="<?= $property->to_budget ?>">
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
                                                                <option value="<?= $sta['id'] ?>" <?= ($sta['id'] == $property->state_id) ? 'selected' : '' ?>><?= $sta['name'] ?></option>
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
															<option value="1" <?= ($property->status == 1) ? 'selected' : '' ?>>Active</option>
															<option value="0" <?= ($property->status == 0) ? 'selected' : '' ?>>Inactive</option>
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

					$(".sequence_box").sortable({
						tolerance: "pointer"
					});
					$(".sequence").css("cursor", "move");
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
					$(".image_gallery").fileinput();
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
								}
							}
						});
					});
					$(document).on('click', '.edit-button', function() {
						// create a new select element
						var newSelect = $("<div id='videogallery'>" +
							"<div class='row'>" +
							"<div class='col-lg-10'>" +
							"<div class='mb-3'>" +
							"<input type='text' class='form-control' name='videogallery[]' id='videogallery' placeholder='Enter Video Link'>" +
							"</div>" +
							"</div>" +
							"<div class='col-lg-1'>" +
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
					$('input[name=customeragent]').on('change', function() {
						if ($('#customer').prop('checked')) {
							$("#customer_div").show('slow');
							$("#agent_div").hide('slow');
						} else if ($('#agent').prop('checked')) {
							$("#agent_div").show('slow');
							$("#customer_div").hide('slow');
						}
					});

					$('input[name=customeragent]').trigger('change');
				});
				// $('#store-promas').validate({
				// 	rules: {
				// 		property_category_id: "required",
				// 		name: "required",
				// 		status: "required"
				// 	},
				// 	message: {
				// 		name: "Please Enter Name"
				// 	}
				// });
                $(document).ready(function() {
                    $('#state_id').change(function() {
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
                                        $("#district_id").append("<option value='" + id + "'>" + name + "</option>");
                                    }
                                }
                            });
                        } else {
                            $("#district_id").html("<option value=''>Select District</option>");
                        }
                    });
                });

                $(document).ready(function() {
                    $('#edit-area-modal #district_id').change(function() {
                        debugger;
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
                                    $("#edit-area-modal #sub_district_id").empty();
                                    $("#edit-area-modal #sub_district_id").append("<option value=''>Select Sub District</option>");
                                    for (var i = 0; i < len; i++) {
                                        var id = response[i]['id'];
                                        var name = response[i]['name'];
                                        $("#edit-area-modal #sub_district_id").append("<option value='" + id + "'>" + name + "</option>");
                                    }
                                }
                            });
                        } else {
                            $("#edit-area-modal #sub_district_id").html("<option value=''>Select Sub District</option>");
                        }
                    });
                });

                $(document).ready(function() {
                    $('#edit-area-modal #sub_district_id').change(function() {
                        debugger;
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
                                    $("#edit-area-modal #area_id").empty();
                                    $("#edit-area-modal #area_id").append("<option value=''>Select Moje / Area</option>");
                                    for (var i = 0; i < len; i++) {
                                        var id = response[i]['id'];
                                        var name = response[i]['name'];
                                        $("#edit-area-modal #area_id").append("<option value='" + id + "'>" + name + "</option>");
                                    }
                                }
                            });
                        } else {
                            $("#edit-area-modal #area_id").html("<option value=''>Select Moje / Area</option>");
                        }
                    });
                });
			</script>