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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
								<li class="breadcrumb-item active">Property Details</li> -->
								<a type="button" href="<?= base_url('admin/Propertymaster') ?>" class="btn btn-success" style="float:right;">Back</a>
							</ol>
						</div>
						<h4 class="page-title">Property Details</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">

				<div class="col-xl-12 col-lg-12">
					<!-- project card -->
					<div class="card d-block">
						<div class="card-body">
							<?php if ($property->customer_id != '') { ?>
								<div class="col-md-4">
									<!-- start due date -->
									<p class="mt-2 mb-1 text-muted">Customer Name</p>
									<div class="d-flex align-items-start">
										<i class="mdi mdi-account font-18 text-success me-1"></i>
										<div class="w-100">
											<h5 class="mt-1 font-size-14">
												<?= $customer ?>
											</h5>
										</div>
									</div>
									<!-- end due date -->
								</div>
							<?php } elseif ($property->agent_id != '') { ?>
								<div class="col-md-4">
									<!-- start due date -->
									<p class="mt-2 mb-1 text-muted">Agent Name</p>
									<div class="d-flex align-items-start">
										<i class="mdi mdi-account font-18 text-success me-1"></i>
										<div class="w-100">
											<h5 class="mt-1 font-size-14">

												<?= $agent ?>
											</h5>
										</div>
									</div>
									<!-- end due date -->
								</div>
							<?php } ?>

							<!-- end form-check-->


							<!-- <h4>Simple Admin Dashboard Template Design</h4> -->

							<div class="row">
								<div class="col-md-3">
									<!-- start due date -->
									<p class="mt-2 mb-1 text-muted">Master</p>
									<div class="d-flex align-items-start">
										<i class="mdi mdi-check font-18 text-success me-1"></i>
										<div class="w-100">
											<h5 class="mt-1 font-size-14">
												<?= $property->master_name ?>
											</h5>
										</div>
									</div>
									<!-- end due date -->
								</div>
								<div class="col-md-3">
									<!-- start due date -->
									<p class="mt-2 mb-1 text-muted">Category</p>
									<div class="d-flex align-items-start">
										<i class="mdi mdi-menu font-18 text-success me-1"></i>
										<div class="w-100">
											<h5 class="mt-1 font-size-14">
												<?= $property->property_category_name ?>
											</h5>
										</div>
									</div>
									<!-- end due date -->
								</div>
								<!-- end col -->

								<div class="col-md-4">
									<!-- start due date -->
									<p class="mt-2 mb-1 text-muted">Sub Category</p>
									<div class="d-flex align-items-start">
										<i class="mdi mdi-home-variant font-18 text-success me-1"></i>
										<div class="w-100">
											<h5 class="mt-1 font-size-14">
												<?= $property->property_subcategory_name ?>
											</h5>
										</div>
									</div>
									<!-- end due date -->
								</div>


							</div>
							<!-- end row -->

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
																						<input type="text" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" class="form-control" id="userName1" name="userName1" value="<?= array_keys($answers['options'][0])[0] ?>">
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
																						<input type="date" class="form-control" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																					<?php } elseif ($que['question_answer_inputtype'] == 'Textarea') { ?>
																						<textarea class="form-control" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>"><?= ($answers['options']) ? array_keys($answers['options'][0])[0] : '' ?></textarea>
																					<?php } elseif ($que['question_answer_inputtype'] == 'File') { ?>
																						<input type="file" class="form-control" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																						<!-- <?php if (!empty($artist['artist']->press_kit)) { ?>
																								<a href="<?= base_url() . 'assets/images/' . $phase['id']->press_kit ?>" class="px-1 py-0 mb-4 color-pink-dark" target="_blank"><b>View File</b></a>
																							<?php } ?> -->
																					<?php } elseif ($que['question_answer_inputtype'] == 'Number') { ?>
																						<input type="number" class="form-control" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																					<?php } elseif ($que['question_answer_inputtype'] == 'Phone') { ?>
																						<input type="tel" class="form-control" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																					<?php } elseif ($que['question_answer_inputtype'] == 'Email') { ?>
																						<input type="email" class="form-control" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																					<?php } elseif ($que['question_answer_inputtype'] == 'Link') { ?>
																						<input type="url" class="form-control" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																					<?php } elseif ($que['question_answer_inputtype'] == 'Image') { ?>
																						<input type="file" class="form-control" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" accept="image/*">
																						<a class="btn btn-primary mt-1" href="<?= base_url('uploads/property/') . array_keys($answers['options'][0])[0] ?>" target="_blank">View Old File</a>
																						<input type="hidden" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
																					<?php } elseif ($que['question_answer_inputtype'] == 'Video 360') { ?>
																						<input type="url" class="form-control" id="userName1" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" accept="video/*" value="<?= array_keys($answers['options'][0])[0] ?>">
																					<?php } elseif ($que['question_answer_inputtype'] == 'Google Map') { ?>
																						<div class="row">
																							<div class="col-md-6"><input type="text" class="form-control" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>"></div>
																							<div class="col-md-6"><input type="text" class="form-control" name="answer_'.$phase['id'].'_'.$que['id'].'[]" value="<?= array_keys($answers['options'][1])[0] ?>"></div>
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
																											<input type="url" class="form-control" name="answer_<?= $phase['id'] ?>_<?= $que['question_id'] ?>" value="<?= array_keys($option)[0] ?>" id="videogallery">
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

							<!-- end sub tasks/checklists -->
						</div>
						<!-- end card-body-->
					</div>
					<!-- end card-->


				</div>
				<!-- end col -->


			</div>
			<!-- end row -->

		</div> <!-- container -->

	</div> <!-- content -->


</div>
<script>
    $(document).ready(function() {
        $(".sequence_box").sortable({ tolerance: "pointer" });
        $(".sequence").css("cursor","move");
    });
</script>