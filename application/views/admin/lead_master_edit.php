<!-- notes add -->
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
                                <a type="button" href="<?= base_url('admin/Leadmaster') ?>" class="btn btn-success" style="float:right;">Back</a>
                            </ol>

                        </div>

                        <h4 class="page-title">Lead</h4>
                    </div>
                </div>

                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Customer</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-account font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $customer['first_name'] . ' ' . $customer['last_name'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Mobile</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-phone font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $customer['phone'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                    <!-- end col -->

                                    <div class="col-md-4">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Email</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-gmail font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $customer['email'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Company</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-office-building font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $customer['company_name'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Source</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-newspaper font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $source_data['name'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Position</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-badge-account font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $position_data['name'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Lead Stage</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-badge-account font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $lead_stage['name'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                    <!-- end col -->
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="nav nav-pills flex-column navtab-bg nav-pills-tab text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link py-2" id="lead-tab" data-bs-toggle="pill" href="#lead" role="tab" aria-controls="lead" aria-selected="false">
                                                <i class="mdi mdi-account-circle d-block font-24"></i>
                                                Lead
                                            </a>
                                            <a class="nav-link mt-2 py-2" id="agent-tab" data-bs-toggle="pill" href="#property" role="tab" aria-controls="agent" aria-selected="false">
                                                <i class="mdi mdi-office-building d-block font-24"></i>
                                                Property Interested
                                            </a>
                                            <a class="nav-link mt-2 py-2" id="agent-contacts-tab" data-bs-toggle="pill" href="#area" role="tab" aria-controls="agent-contacts" aria-selected="false">
                                                <i class="mdi mdi-office-building d-block font-24"></i>
                                                Area Interested
                                            </a>
                                            <a class="nav-link mt-2 py-2" id="customer-reminders-tab" data-bs-toggle="pill" href="#reminders" role="tab" aria-controls="customer-reminders" aria-selected="false">
                                                <i class="mdi mdi-alarm d-block font-24"></i>
                                                Reminder
                                            </a>
                                        </div>

                                    </div> <!-- end col-->
                                    <div class="col-lg-8">
                                        <div class="tab-content p-3">
                                            <div class="tab-pane fade" id="lead" role="tabpanel" aria-labelledby="lead-tab">
                                                <form method="post" action="<?php echo base_url('admin/Leadmaster/update/' . $lead_id); ?>" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Customers<span class="text-danger"> *</span></label>
                                                                <select data-toggle="select2" class="form-control select2" name="customer_id" data-width="100%">
                                                                    <option value="">Select Customer</option>
                                                                    <?php foreach ($all_customers as $cust) { ?>
                                                                        <option value="<?= $cust['id'] ?>" <?= ($lead['customer_id'] == $cust['id']) ? 'selected' : '' ?>><?= $cust['first_name'] ?> <?= $cust['last_name'] ?> <?= $cust['phone'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <span style="color: red;"><?= form_error('customer_id') ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Lead Stage<span class="text-danger"> *</span></label>
                                                                <select data-toggle="select2" class="form-control select2" name="lead_stage_id" data-width="100%">
                                                                    <option value="">Select Stage</option>
                                                                    <?php foreach ($all_leadstage as $stage) { ?>
                                                                        <option value="<?= $stage['id'] ?>" <?= ($lead['lead_stage_id'] == $stage['id']) ? 'selected' : '' ?>><?= $stage['name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <span style="color: red;"><?= form_error('lead_stage_id') ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="question" class="form-label">Questions</label>
                                                                <?php foreach($questions as $que){
                                                                    $answers = json_decode($que['answers'], true);
                                                                    $answer_ids = json_decode($que['answer_ids'], true);
                                                                    $que['question_answer_inputtype'] = $answers['answer_type']; ?>
                                                                    <h5><?= $que['question'] ?></h5>
                                                                    <input type="hidden" name="question[]" value="<?= $que['question'] ?>">
                                                                    <input type="hidden" name="question_id[]" value="<?= $que['question_id'] ?>">
                                                                    <input type="hidden" name="answer_type_<?= $que['question_id'] ?>" value="<?= $que['question_answer_inputtype'] ?>">
                                                                    <?php
                                                                    foreach ($answers['options'] as $option) { ?>
                                                                        <input type="hidden" name="answer_options_<?= $que['question_id'] ?>[]" value="<?= array_keys($option)[0] ?>">
                                                                    <?php }
                                                                    foreach ($answer_ids['options'] as $option) { ?>
                                                                        <input type="hidden" name="answer_option_ids_<?= $que['question_id'] ?>[]" value="<?= array_keys($option)[0] ?>">
                                                                    <?php } ?>
                                                                    <?php if ($que['question_answer_inputtype'] == 'Textbox') { ?>
                                                                        <input type="text" name="answer_<?= $que['question_id'] ?>" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" value="<?= array_keys($answers['options'][0])[0] ?>">
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'Dropdown') { ?>
                                                                        <select class="form-select" name="answer_<?= $que['question_id'] ?>">
                                                                            <option>Select Option</option>
                                                                            <?php $i = 0;
                                                                            foreach ($answers['options'] as $option) { ?>
                                                                                <option value="<?= array_keys($answer_ids['options'][$i])[0] ?>" <?= ((array_values($answer_ids['options'][$i])[0] == 1) ? 'selected' : '') ?>><?= array_keys($option)[0] ?></option>
                                                                                <?php $i++;
                                                                            } ?>
                                                                        </select>
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'Checkbox') {
                                                                        $i = 0;
                                                                        foreach ($answers['options'] as $option) { ?>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" id="userName1" name="answer_<?= $que['question_id'] ?>[]" value="<?= array_keys($answer_ids['options'][$i])[0] ?>" <?= ((array_values($answer_ids['options'][$i])[0] == 1) ? 'checked' : '') ?>>
                                                                                <label class="form-check-label" for="userName1"><?= array_keys($option)[0] ?></label><br>
                                                                            </div>
                                                                            <?php $i++;
                                                                        }
                                                                    }
                                                                    elseif ($que['question_answer_inputtype'] == 'Radio') {
                                                                        $i = 0;
                                                                        foreach ($answers['options'] as $option) { ?>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="radio" id="userName1" name="answer_<?= $que['question_id'] ?>" value="<?= array_keys($answer_ids['options'][$i])[0] ?>" <?= ((array_values($answer_ids['options'][$i])[0] == 1) ? 'checked' : '') ?>>
                                                                                <label class="form-check-label" for="userName1"><?= array_keys($option)[0] ?></label><br>
                                                                            </div>
                                                                            <?php $i++;
                                                                        }
                                                                    }
                                                                    elseif ($que['question_answer_inputtype'] == 'Date') { ?>
                                                                        <input type="date" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'Textarea') { ?>
                                                                        <textarea class="form-control" id="userName1" name="answer_<?= $que['question_id'] ?>"><?= ($answers['options']) ? array_keys($answers['options'][0])[0] : '' ?></textarea>
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'File') { ?>
                                                                        <input type="file" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'Number') { ?>
                                                                        <input type="number" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'Phone') { ?>
                                                                        <input type="tel" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'Email') { ?>
                                                                        <input type="email" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'Link') { ?>
                                                                        <input type="url" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'Image') { ?>
                                                                        <input type="file" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $que['question_id'] ?>" accept="image/*">
                                                                        <a class="btn btn-primary mt-1" href="<?= base_url('uploads/lead/') . array_keys($answers['options'][0])[0] ?>" target="_blank">View Old File</a>
                                                                        <input type="hidden" name="answer_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>">
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'Video 360') { ?>
                                                                        <input type="url" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" id="userName1" name="answer_<?= $que['question_id'] ?>" accept="video/*" value="<?= array_keys($answers['options'][0])[0] ?>">
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'Google Map') { ?>
                                                                        <div class="row">
                                                                            <div class="col-md-6"><input type="text" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" name="answer_<?= $que['question_id'] ?>" value="<?= array_keys($answers['options'][0])[0] ?>"></div>
                                                                            <div class="col-md-6"><input type="text" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" name="answer_'.$que['id'].'[]" value="<?= array_keys($answers['options'][1])[0] ?>"></div>
                                                                        </div>
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'Image Gallery') { ?>
                                                                        <input class="image_gallery" name="answer_<?= $que['question_id'] ?>[]" type="file" multiple>
                                                                        <div class="row mt-3">
                                                                            <?php foreach ($answers['options'] as $option) { ?>
                                                                                <div class="col-md-3">
                                                                                    <div class="image-area">
                                                                                        <a class="remove-image remove-button" href="#" onclick="return false;" style="display: inline;">&#215;</a>
                                                                                        <img src="<?= base_url('uploads/lead/') . array_keys($option)[0] ?>" class="img-fluid">
                                                                                        <input type="hidden" name="answer_<?= $que['question_id'] ?>[]" value="<?= array_keys($option)[0] ?>">
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    <?php }
                                                                    elseif ($que['question_answer_inputtype'] == 'Video Gallery') { ?>
                                                                        <div id="videogallery">
                                                                            <?php $i = 0;
                                                                            foreach ($answers['options'] as $option) {  ?>
                                                                                <div class="row">
                                                                                    <div class="col-lg-10">
                                                                                        <div class="mb-3">
                                                                                            <input type="url" class="form-control <?= ($que['is_require'] == 1) ? 'required' : '' ?>" name="answer_<?= $que['question_id'] ?>" value="<?= array_keys($option)[0] ?>" id="videogallery">
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

                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Status<span class="text-danger">*</span></label>
                                                                <select class="form-select" name="status" id="form_status">
                                                                    <option selected="">Select Status</option>
                                                                    <option value="1" <?= ($lead['status'] == 1) ? 'selected' : '' ?>>Active</option>
                                                                    <option value="0" <?= ($lead['status'] == 0) ? 'selected' : '' ?>>Inactive</option>
                                                                </select>
                                                                <span style="color: red;"><?= form_error('status') ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <div class="text">
                                                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="property" role="tabpanel" aria-labelledby="agent-contacts-tab">
                                                <div>
                                                    <div class="row justify-content-between mb-2">
                                                        <div class="col-auto">
                                                            <h4 class="header-title">Property Interested</h4>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="text-sm-end">
                                                                <button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#lead-property-modal">Add New</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row-->
                                                    <div class="row my-4">
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

                                                                    <div class="table-responsive">
                                                                        <table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="property_interested_datatable">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>#</th>
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
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="area" role="tabpanel" aria-labelledby="agent-notes-tab">
                                                <div>
                                                    <div class="row justify-content-between mb-2">
                                                        <div class="col-auto">
                                                            <h4 class="header-title">Area Interested</h4>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="text-sm-end">
                                                                <button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#add-area-modal">Add New</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row-->
                                                    <div class="row my-4">
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

                                                                    <div class="table-responsive">
                                                                        <table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="area_interested_datatable">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>State</th>
                                                                                <th>City</th>
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
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="reminders" role="tabpanel" aria-labelledby="customer-reminders-tab">
                                                <div>
                                                    <div class="row justify-content-between mb-2">
                                                        <div class="col-auto">
                                                            <h4 class="header-title">Reminder</h4>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="text-sm-end">
                                                                <button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#lead-reminder-modal">Add Reminder</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row-->
                                                    <div class="row my-4">
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

                                                                    <div class="table-responsive">
                                                                        <table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="lead_reminder_datatable">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Name</th>
                                                                                <th>Type</th>
                                                                                <th>Date</th>
                                                                                <th>Priority</th>
                                                                                <th>Repeat Every</th>
                                                                                <th>Total Cycle</th>
                                                                                <th>Description</th>
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
                                                </div>
                                            </div>
                                        </div> <!-- end col-->
                                    </div> <!-- end row-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container -->
            </div> <!-- content -->
        </div>

<!-- Add Property Interested modal -->
    <div class="modal fade" id="lead-property-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Add Property Interested</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form method="post" id="store-specialistfor" action="<?php echo base_url() . 'admin/Leadmaster/store_property_interested'; ?>">
                        <input type="hidden" name="lead_id" id="lead_id" value="<?= $lead_id ?>">
                        <div class="row">
                            <div class="mb-3">
                                <label for="pro_category_id" class="form-label">Select Category</label>
                                <select class="form-select" name="pro_category_id" id="pro_category_id">
                                    <option value="">Select Category</option>
                                    <?php foreach ($category as $cat) { ?>
                                        <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <span style="color: red;"><?= form_error('pro_category_id') ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label for="pro_subcategory_id" class="form-label">Select Sub Category</label>
                                <select class="form-select" name="pro_subcategory_id" id="pro_subcategory_id">
                                    <option value="">Select Sub Category</option>
                                </select>
                                <span style="color: red;"><?= form_error('pro_subcategory_id') ?></span>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="city_status" class="form-label">Status</label>
                            <select class="form-select" name="status" id="specialistfor_status">
                                <option selected="">Select Status</option>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
<!--                                    <button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>-->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

        <!-- Edit Property Interested modal -->
        <div class="modal fade" id="edit-property-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Edit Property Interested</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form method="post" id="update-specialistfor" action="<?php echo base_url() . 'admin/Leadmaster/update_property_interested'; ?>">
                            <input type="hidden" name="lead_id" id="lead_id" value="<?= $lead_id ?>">
                            <input type="hidden" name="specialistfor_id" id="specialistfor_id">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="pro_category_id" class="form-label">Select Category</label>
                                    <select class="form-select" name="pro_category_id" id="pro_category_id">
                                        <option value="">Select Category</option>
                                        <?php foreach ($category as $cat) { ?>
                                            <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span style="color: red;"><?= form_error('pro_category_id') ?></span>

                                </div>
                            </div>

                            <div class="row">

                                <div class="mb-3">
                                    <label for="pro_subcategory_id" class="form-label">Select Sub Category</label>
                                    <select class="form-select" name="pro_subcategory_id" id="pro_subcategory_id">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                    <span style="color: red;"><?= form_error('pro_subcategory_id') ?></span>

                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="contact_status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="contact_status">
                                    <option selected="">Select Status</option>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
<!--                                        <button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>-->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <!-- Add Area Interested modal -->
    <div class="modal fade" id="add-area-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Add Area Interested</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form method="post" id="store-specialistarea" action="<?php echo base_url() . 'admin/Leadmaster/store_area_interested'; ?>">
                        <input type="hidden" name="lead_id" id="lead_id" value="<?= $lead_id ?>">
                        <div class="row">
                            <div class="mb-3">
                                <label for="state_id" class="form-label">Select State</label>
                                <select class="form-select" name="state_id" id="state_id">
                                    <option value="">Select State</option>
                                    <?php foreach ($states as $sta) { ?>
                                        <option value="<?= $sta['id'] ?>"><?= $sta['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <span style="color: red;"><?= form_error('state_id') ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label for="city_id" class="form-label">Select City</label>
                                <select class="form-select" name="city_id" id="city_id">
                                    <option value="">Select City</option>
                                </select>
                                <span style="color: red;"><?= form_error('city_id') ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label for="area_id" class="form-label">Select Area</label>
                                <select class="form-select" name="area_id" id="area_id">
                                    <option value="">Select Area</option>
                                </select>
                                <span style="color: red;"><?= form_error('area_id') ?></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="city_status" class="form-label">Status</label>
                            <select class="form-select" name="status" id="specialistarea_status">
                                <option selected="">Select Status</option>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
<!--                                    <button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>-->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
        <!-- Edit Area Interested modal -->
        <div class="modal fade" id="edit-area-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Edit Area Interested</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form method="post" id="update-specialistarea" action="<?php echo base_url() . 'admin/Leadmaster/update_area_interested'; ?>">
                            <input type="hidden" name="lead_id" id="lead_id" value="<?= $lead_id ?>">
                            <input type="hidden" name="specialistarea_id" id="specialistarea_id">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="state_id" class="form-label">Select State</label>
                                    <select class="form-select" name="state_id" id="state_id">
                                        <option value="">Select State</option>
                                        <?php foreach ($states as $sta) { ?>
                                            <option value="<?= $sta['id'] ?>"><?= $sta['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span style="color: red;"><?= form_error('state_id') ?></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                    <label for="city_id" class="form-label">Select City</label>
                                    <select class="form-select" name="city_id" id="city_id">
                                        <option value="">Select City</option>
                                    </select>
                                    <span style="color: red;"><?= form_error('city_id') ?></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                    <label for="area_id" class="form-label">Select Area</label>
                                    <select class="form-select" name="area_id" id="area_id">
                                        <option value="">Select Area</option>
                                    </select>
                                    <span style="color: red;"><?= form_error('area_id') ?></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="city_status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="specialistarea_status">
                                    <option selected="">Select Status</option>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
<!--                                        <button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>-->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <!-- Add Reminder modal -->
        <div class="modal fade" id="lead-reminder-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Add Reminder</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form method="post" id="store-reminders" action="<?php echo base_url() . 'admin/Leadmaster/store_reminders'; ?>">

                            <input type="hidden" name="lead_id" value="<?= $lead_id ?>">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="billing-reminder-name" class="form-label">Reminder Name</label>
                                        <input class="form-control" type="text" placeholder="Enter name" name="name" id="billing-reminder-name" />
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Type </label>
                                        <select data-toggle="select2" title="type" class="form-control select2" name="type" data-width="100%">
                                            <option value="">Select Reminder Type</option>
                                            <?php foreach ($remtype as $rt) { ?>
                                                <option value="<?= $rt['id'] ?>"><?= $rt['name'] ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="date_time" class="form-label">Date </label>
                                        <input class="form-control" id="date_time" type="datetime-local" name="date_time">
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Priority </label>
                                        <select data-toggle="select2" class="form-control select2" name="priority" data-width="100%">
                                            <option value="">Select Priority</option>
                                            <option value="Low">Low</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                            <option value="Urgent">Urgent</option>
                                            <!-- <?php foreach ($position as $pos) { ?>
										<option value="<?= $pos['id'] ?>"><?= $pos['name'] ?></option>
									<?php }
                                            ?> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Repeat every </label>
                                        <select data-toggle="select2" class="form-control select2" name="repeat_every" id="repeat_every" data-width="100%">
                                            <option value="">Select Repeat every</option>
                                            <option value="1-week">1 Week</option>
                                            <option value="2-week">2 Weeks</option>
                                            <option value="1-month">1 Month</option>
                                            <option value="2-month">2 Months</option>
                                            <option value="3-month">3 Months</option>
                                            <option value="6-month">6 Months</option>
                                            <option value="1-year">1 Year</option>
                                            <option value="custom">Custom</option>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                            <div class="row" id="custom_cycle_row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="repeat_every_custom" id="repeat_every_custom" value="0" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <select class="form-select" name="repeat_type_custom" id="repeat_type_custom">
                                            <option value="day" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'day'){echo 'selected';} ?>>Days(s)</option>
                                            <option value="week" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'week'){echo 'selected';} ?>>Week(s)</option>
                                            <option value="month" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'month'){echo 'selected';} ?>>Month(s)</option>
                                            <option value="year" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'year'){echo 'selected';} ?>>Year(s)</option>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="cycles">Total Cycles</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="cycles" id="cycles" value="0" placeholder="Enter Total Cycles" disabled>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <input type="checkbox" class="custom-control-input" id="unlimited_cycles" checked>
                                                    <label class="custom-control-label" for="unlimited_cycles" style="padding-left: 5px;"> Infinity</label>
                                                </div>
                                            </div>
                                        </div>
                                        <?= form_error('cycles') ?>
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description"></textarea>
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <div class="mb-3">
                                <label for="city_status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="city_status">
                                    <option selected="">Select Status</option>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!-- Edit Reminder modal -->
        <div class="modal fade" id="edit-lead-reminders-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Edit Reminders</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form method="post" id="update-reminders" action="<?php echo base_url() . 'admin/Leadmaster/update_reminders'; ?>">
                            <input type="hidden" name="lead_id" value="<?= $lead_id ?>">
                            <input type="hidden" name="reminder_id" id="reminder_id">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="billing-reminder-name" class="form-label">Reminder Name</label>
                                        <input class="form-control" type="text" placeholder="Enter name" name="name" id="name" />
                                    </div>
                                </div>

                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Type </label>
                                        <select data-toggle="select2" class="form-control select2" name="type" id="type" data-width="100%">
                                            <option value="">Select Reminder Type</option>
                                            <?php foreach ($remtype as $rt) { ?>
                                                <option value="<?= $rt['id'] ?>"><?= $rt['name'] ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="date_time" class="form-label">Date </label>
                                        <input class="form-control" id="date_time" type="datetime-local" name="date_time">
                                    </div>
                                </div>

                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Priority </label>
                                        <select data-toggle="select2" title="Priority" class="form-control select2" name="priority" id="priority" data-width="100%">
                                            <option value="">Select Priority</option>
                                            <option value="Low">Low</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                            <option value="Urgent">Urgent</option>
                                            <!-- <?php foreach ($position as $pos) { ?>
										<option value="<?= $pos['id'] ?>"><?= $pos['name'] ?></option>
									<?php }
                                            ?> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Repeat every </label>
                                        <select data-toggle="select2" title="Repeat" class="form-control select2" id="repeat_every" name="repeat_every" data-width="100%">
                                            <option value="">Select Repeat every</option>
                                            <option value="1-week">1 Week</option>
                                            <option value="2-week">2 Weeks</option>
                                            <option value="1-month">1 Month</option>
                                            <option value="2-month">2 Months</option>
                                            <option value="3-month">3 Months</option>
                                            <option value="6-month">6 Months</option>
                                            <option value="1-year">1 Year</option>
                                            <option value="custom">Custom</option>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                            <div class="row" id="custom_cycle_row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="repeat_every_custom" id="repeat_every_custom" value="0" placeholder="">
                                        </div>
                                        <!-- <?= form_error('cycles') ?> -->
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <select class="form-select" name="repeat_type_custom" id="repeat_type_custom">
                                            <option value="day" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'day'){echo 'selected';} ?>>Days(s)</option>
                                            <option value="week" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'week'){echo 'selected';} ?>>Week(s)</option>
                                            <option value="month" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'month'){echo 'selected';} ?>>Month(s)</option>
                                            <option value="year" <?php if(isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'year'){echo 'selected';} ?>>Year(s)</option>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="cycles">Total Cycles</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="cycles" id="cycles" value="0" placeholder="Enter Total Cycles" disabled>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <input type="checkbox" class="custom-control-input" id="unlimited_cycles" checked>
                                                    <label class="custom-control-label" for="unlimited_cycles" style="padding-left: 5px;"> Infinity</label>
                                                </div>
                                            </div>
                                        </div>
                                        <?= form_error('cycles') ?>
                                    </div>
                                </div>

                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description"></textarea>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                            <div class="mb-3">
                                <label for="reminders_status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="reminders_status">
                                    <option selected="">Select Status</option>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

    <style>
            .select2-container .select2-selection--multiple .select2-selection__choice{
                background-color: #eceef0;
            }
        </style>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2({
                    theme: "bootstrap"
                });
                $('.assigned').select2({
                    multiple:true,
                    placeholder: "Select Assigned",
                    theme: "bootstrap-5"
                });
            });
            $(function() {
                var hash = window.location.hash;
                hash && $('ul.nav a[href="' + hash + '"]').tab('show');

                var triggerTabList = [].slice.call(document.querySelectorAll('#v-pills-tab a'))
                triggerTabList.forEach(function(triggerEl) {
                    var tabTrigger = new bootstrap.Tab(triggerEl)

                    triggerEl.addEventListener('click', function(event) {
                        event.preventDefault()
                        tabTrigger.show()
                    })
                });
                var triggerFirstTabEl = document.querySelector('#v-pills-tab a:first-child')
                bootstrap.Tab.getInstance(triggerFirstTabEl).show() // Select first tab

                var triggerEl = document.querySelector('#v-pills-tab a[href="' + hash + '"]')
                bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name

            });

            //all specialist for
            var specialistfor_table = $('#property_interested_datatable').DataTable({
                responsive: true,
                ajax: "<?php echo base_url('admin/Leadmaster/all_property_interested/' . $lead_id); ?>",
                "columnDefs": [{
                    responsivePriority: 1,
                    targets: 0
                },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 2,
                        targets: 2
                    },
                    {
                        responsivePriority: 3,
                        targets: 4
                    },
                    {
                        responsivePriority: 4,
                        targets: 5
                    },
                    {
                        "targets": 4,
                        "createdCell": function(td, cellData, rowData, row, col) {
                            if (rowData[4] == '1') {
                                $(td).html('<span class="badge bg-soft-success text-success">Active</span>');
                            } else if (rowData[4] == '0') {
                                $(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
                            }
                        }
                    },
                ]
            });

            //all specialistfor property
            $(document).on('change','#store-specialistfor #pro_category_id',function() {
                var categoryId = $(this).val();
                if (categoryId != '') {
                    $.ajax({
                        url: '<?php echo base_url() . "admin/Leadmaster/getSubcategoryByCategory"; ?>',
                        type: 'post',
                        data: {
                            property_category_id: categoryId
                        },
                        dataType: 'json',
                        success: function(response) {
                            var len = response.length;
                            $("#store-specialistfor #pro_subcategory_id").empty();
                            for (var i = 0; i < len; i++) {
                                var id = response[i]['id'];
                                var name = response[i]['name'];
                                $("#store-specialistfor #pro_subcategory_id").append("<option value='" + id + "'>" + name + "</option>");
                            }
                        }
                    });
                } else {
                    $("#store-specialistfor #pro_subcategory_id").empty();
                }
            });
            $(document).ready(function() {
                $('#edit-property-modal #pro_category_id').change(function() {
                    var categoryId = $(this).val();
                    if (categoryId != '') {
                        $.ajax({
                            url: '<?php echo base_url() . "admin/Leadmaster/getSubcategoryByCategory"; ?>',
                            type: 'post',
                            data: {
                                property_category_id: categoryId
                            },
                            dataType: 'json',
                            success: function(response) {
                                var len = response.length;
                                $("#edit-property-modal #pro_subcategory_id").empty();
                                for (var i = 0; i < len; i++) {
                                    var id = response[i]['id'];
                                    var name = response[i]['name'];
                                    $("#edit-property-modal #pro_subcategory_id").append("<option value='" + id + "'>" + name + "</option>");
                                }
                            }
                        });
                    } else {
                        $("#edit-property-modal #pro_subcategory_id").empty();
                    }
                });
            });

            //add specialist for
            $("#store-specialistfor").validate({
                rules: {
                    pro_category_id: "required",
                    // last_name: "required",

                    status: "required"
                },
                submitHandler: function(form, e) {
                    e.preventDefault();
                    var url = $(form).attr("action");
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('.btn-close').trigger('click');
                            $("#store-specialistfor").trigger("reset");
                            success_message('', response.message);
                            specialistfor_table.ajax.reload(null, false);
                        }
                    });
                }
            });
            $(document).ready(function() {
                //edit specialist for
                $(document).on('click', "#property_interested_datatable .edit-btn", function() {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: '<?php echo base_url() ?>admin/Leadmaster/edit_property/' + id,
                        type: "POST",
                        dataType: "json",
                        success: function(data) {
                            $("#edit-property-modal #specialistfor_id").val(data.id);
                            $('#edit-property-modal #pro_category_id').val(data.pro_category_id).trigger('change');
                            setTimeout(function () {
                                $('#edit-property-modal #pro_subcategory_id').val(data.pro_subcategory_id);
                            },250);
                            $("#edit-property-modal #specialistfor_status").val(data.status);
                        }
                    });
                });
            });
            //update specialist for
            $("#update-specialistfor").validate({
                rules: {
                    pro_category_id: "required",
                    status: "required"
                },
                submitHandler: function(form, e) {
                    e.preventDefault();
                    var url = $(form).attr("action");
                    var id = $('#edit-property-modal #specialistfor_id').val();
                    $.ajax({
                        url: url + '/' + id,
                        type: "POST",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('.btn-close').trigger('click');
                            success_message('', response.message);
                            specialistfor_table.ajax.reload(null, false);
                        }
                    });
                }
            });

            //all specialist Area
            var specialistarea_table = $('#area_interested_datatable').DataTable({
                responsive: true,
                ajax: "<?php echo base_url('admin/Leadmaster/all_area_interested/' . $lead_id); ?>",
                "columnDefs": [{
                    responsivePriority: 1,
                    targets: 0
                },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 2
                    },
                    {
                        responsivePriority: 3,
                        targets: 3
                    },
                    {
                        responsivePriority: 2,
                        targets: 5
                    },
                    {
                        responsivePriority: 2,
                        targets: 6
                    },
                    {
                        "targets": 5,
                        "createdCell": function(td, cellData, rowData, row, col) {
                            if (rowData[5] == '1') {
                                $(td).html('<span class="badge bg-soft-success text-success">Active</span>');
                            } else if (rowData[5] == '0') {
                                $(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
                            }
                        }
                    },
                ]
            });
            //on state change fetch city
            $(document).on('change','#add-area-modal #state_id',function() {
                var state_id = $(this).val();
                if (state_id != '') {
                    $.ajax({
                        url: '<?php echo base_url() . "admin/Leadmaster/getCityByState"; ?>',
                        type: 'post',
                        data: {
                            state_id: state_id
                        },
                        dataType: 'json',
                        success: function(response) {
                            var len = response.length;
                            $("#store-specialistarea #city_id").empty();
                            $("#store-specialistarea #city_id").append("<option value=''>Select City</option>");
                            for (var i = 0; i < len; i++) {
                                var id = response[i]['id'];
                                var name = response[i]['name'];
                                $("#store-specialistarea #city_id").append("<option value='" + id + "'>" + name + "</option>");
                            }
                        }
                    });
                } else {
                    $("#store-specialistarea #city_id").empty();
                }
            });
            $(document).ready(function() {
                $('#edit-area-modal #state_id').change(function() {
                    debugger;
                    var state_id = $(this).val();
                    if (state_id != '') {
                        $.ajax({
                            url: '<?php echo base_url() . "admin/Leadmaster/getCityByState"; ?>',
                            type: 'post',
                            data: {
                                state_id: state_id
                            },
                            dataType: 'json',
                            success: function(response) {
                                var len = response.length;
                                $("#edit-area-modal #city_id").empty();
                                $("#store-specialistarea #city_id").append("<option value=''>Select City</option>");
                                for (var i = 0; i < len; i++) {
                                    var id = response[i]['id'];
                                    var name = response[i]['name'];
                                    $("#edit-area-modal #city_id").append("<option value='" + id + "'>" + name + "</option>");
                                }
                            }
                        });
                    } else {
                        $("#edit-area-modal #city_id").empty();
                    }
                });
            });
            //on city change fetch area
            $(document).on('change','#add-area-modal #city_id',function() {
                var city_id = $(this).val();
                if (city_id != '') {
                    $.ajax({
                        url: '<?php echo base_url() . "admin/Leadmaster/getAreaByCity"; ?>',
                        type: 'post',
                        data: {
                            city_id: city_id
                        },
                        dataType: 'json',
                        success: function(response) {
                            var len = response.length;
                            $("#store-specialistarea #area_id").empty();
                            $("#store-specialistarea #area_id").append("<option value=''>Select Area</option>");
                            for (var i = 0; i < len; i++) {
                                var id = response[i]['id'];
                                var name = response[i]['name'];
                                $("#store-specialistarea #area_id").append("<option value='" + id + "'>" + name + "</option>");
                            }
                        }
                    });
                } else {
                    $("#store-specialistarea #area_id").empty();
                }
            });
            $(document).ready(function() {
                $('#edit-area-modal #city_id').change(function() {
                    debugger;
                    var city_id = $(this).val();
                    if (city_id != '') {
                        $.ajax({
                            url: '<?php echo base_url() . "admin/Leadmaster/getAreaByCity"; ?>',
                            type: 'post',
                            data: {
                                city_id: city_id
                            },
                            dataType: 'json',
                            success: function(response) {
                                var len = response.length;
                                $("#edit-area-modal #area_id").empty();
                                $("#edit-area-modal #area_id").append("<option value=''>Select Area</option>");
                                for (var i = 0; i < len; i++) {
                                    var id = response[i]['id'];
                                    var name = response[i]['name'];
                                    $("#edit-area-modal #area_id").append("<option value='" + id + "'>" + name + "</option>");
                                }
                            }
                        });
                    } else {
                        $("#edit-area-modal #area_id").empty();
                    }
                });
            });

            //add specialist Area
            $("#store-specialistarea").validate({
                rules: {
                    state_id: "required",
                    city_id: "required",
                    area_id: "required",
                    // last_name: "required",

                    status: "required"
                },
                submitHandler: function(form, e) {
                    e.preventDefault();
                    var url = $(form).attr("action");
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('.btn-close').trigger('click');
                            $("#store-specialistarea").trigger("reset");
                            success_message('', response.message);
                            specialistarea_table.ajax.reload(null, false);
                        }
                    });
                }
            });
            $(document).ready(function() {
                //edit specialist Area
                $(document).on('click', "#area_interested_datatable .edit-btn", function() {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: '<?php echo base_url() ?>admin/Leadmaster/edit_area/' + id,
                        type: "POST",
                        dataType: "json",
                        success: function(data) {
                            $("#edit-area-modal #specialistarea_id").val(data.id);
                            $('#edit-area-modal #state_id').val(data.state_id).trigger('change');
                            setTimeout(function () {
                                $('#edit-area-modal #city_id').val(data.city_id).trigger('change');
                                setTimeout(function () {
                                    $('#edit-area-modal #area_id').val(data.area_id).trigger('change');
                                },250);
                            },250);
                            $("#edit-area-modal #specialistarea_status").val(data.status);
                        }
                    });
                });
            });
            //update specialist Area
            $("#update-specialistarea").validate({
                rules: {
                    state_id: "required",
                    city_id: "required",
                    area_id: "required",
                    status: "required"
                },
                submitHandler: function(form, e) {
                    e.preventDefault();
                    var url = $(form).attr("action");
                    var id = $('#edit-area-modal #specialistarea_id').val();
                    $.ajax({
                        url: url + '/' + id,
                        type: "POST",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('.btn-close').trigger('click');
                            success_message('', response.message);
                            specialistarea_table.ajax.reload(null, false);
                        }
                    });
                }
            });


            $(document).ready(function() {
                $("#agent-contacts-tab").on('click', function() {
                    contact_table.ajax.reload(null, false);
                });
                $("#agent-notes-tab").on('click', function() {
                    note_table.ajax.reload(null, false);
                });

                var hash = window.location.hash;
                $(hash + "-tab").trigger('click');
            });

            $('input[name=inquiry_type]').click(function() {
                if (this.id == "agent") {
                    $("#agent_div").show('slow');
                } else {
                    $("#agent_div").hide('slow');
                }

            });
            $('input[name=inquiry_type]').trigger('click');

            //on switch change status
            $(document).on('change', '.property_status', function() {
                var id = $(this).attr('data-proid');
                var url = '<?php echo base_url() ?>admin/Propertymaster/update_status';
                var status = ($(this).prop('checked')) ? 1 : 0;

                $.ajax({
                    url: url + '/' + id + '/' + status,
                    type: "POST",
                    dataType: "json",
                    success: function(response) {
                        $('.btn-close').trigger('click');
                        success_message('', response.message);
                        contact_table.ajax.reload(null, false);
                    }
                });
            });

            //all reminder
            var reminders_table = $('#lead_reminder_datatable').DataTable({
                responsive: true,
                ajax: "<?php echo base_url('admin/Leadmaster/all_reminders/' . $lead_id); ?>",
                columnDefs: [{
                    responsivePriority: 1,
                    targets: 0
                },
                    {
                        responsivePriority: 2,
                        targets: 3
                    },
                    {
                        responsivePriority: 10,
                        targets: 6
                    },
                    {
                        responsivePriority: 4,
                        targets: 9
                    },
                    {
                        "targets": 10,
                        "createdCell": function(td, cellData, rowData, row, col) {
                            if (rowData[10] == '1') {
                                $(td).html('<span class="badge bg-soft-success text-success">Active</span>');
                            } else if (rowData[10] == '0') {
                                $(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
                            }
                        }
                    },
                ]
            });
            //add reminders
            $("#store-reminders").validate({
                rules: {
                    name: "required",
                    type: "required",
                    date_time: "required",
                    priority: "required",
                    repeat_every: "required",
                    //description: "required",
                    status: "required"
                },
                submitHandler: function(form, e) {
                    e.preventDefault();
                    var url = $(form).attr("action");
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('.btn-close').trigger('click');
                            $("#store-reminders").trigger("reset");
                            success_message('', response.message);
                            reminders_table.ajax.reload(null, false);
                        }
                    });
                }
            });

            //edit reminders
            $(document).on('click', "#lead_reminder_datatable .edit-btn", function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '<?php echo base_url() ?>admin/Leadmaster/edit_reminders/' + id,
                    type: "POST",
                    dataType: "json",
                    success: function(data) {
                        debugger;
                        $("#edit-lead-reminders-modal #reminder_id").val(data.id);
                        $('#edit-lead-reminders-modal #name').val(data.name);
                        $('#edit-lead-reminders-modal #type').val(data.type).trigger('change');
                        $('#edit-lead-reminders-modal #date_time').val(data.date_time);
                        $('#edit-lead-reminders-modal #priority').val(data.priority).trigger('change');
                        if(data.custom_recurring == 1){
                            $('#edit-lead-reminders-modal #repeat_every').val('custom').trigger('change');
                            $('#edit-lead-reminders-modal #repeat_every_custom').val(data.repeat_every).trigger('change');
                            $('#edit-lead-reminders-modal #repeat_type_custom').val(data.recurring_type).trigger('change');
                        }else{
                            $('#edit-lead-reminders-modal #repeat_every').val(data.repeat_every+'-'+data.recurring_type).trigger('change');
                        }
                        if(data.cycles == 0){
                            $('#edit-lead-reminders-modal #unlimited_cycles').prop('checked', true).trigger('change');
                        }else{
                            $('#edit-lead-reminders-modal #unlimited_cycles').prop('checked', false).trigger('change');
                        }
                        $('#edit-lead-reminders-modal #cycles').val(data.cycles);
                        $('#edit-lead-reminders-modal #description').val(data.description);
                        $("#edit-lead-reminders-modal #reminders_status").val(data.status);
                    }
                });
            });

            $(document).ready(function() {
                // Hide the Total Cycles and Custom fields by default
                $('#lead-reminder-modal #cycles').parent().parent().hide();
                $('#lead-reminder-modal #custom_cycle_row').hide();

                // Show/hide the Total Cycles field based on the selected Repeat value
                $('#lead-reminder-modal #repeat_every').on('change', function() {
                    var selectedValue = $(this).val();
                    if (selectedValue === '1-week' || selectedValue === '2-week' || selectedValue === '1-month' || selectedValue === '2-month' || selectedValue === '3-month' || selectedValue === '6-month' || selectedValue === '1-year') {
                        $('#lead-reminder-modal #cycles').parent().parent().show();
                        $('#lead-reminder-modal #custom_cycle_row').hide();
                    } else if (selectedValue === 'custom') {
                        //$('#customer-reminders-modal #cycles').parent().parent().hide();
                        $('#lead-reminder-modal #cycles').parent().parent().show();
                        $('#lead-reminder-modal #custom_cycle_row').show();
                    } else {
                        $('#lead-reminder-modal #cycles').parent().parent().hide();
                        $('#lead-reminder-modal #custom_cycle_row').hide();
                    }
                });

                // spacing between the Infinity checkbox and label
                $('#lead-reminder-modal #default_total_cycles').on('change', function() {
                    var checkbox = $(this);
                    var label = checkbox.next('label');
                    if (checkbox.is(':checked')) {
                        label.css('margin-left', '5px');
                    } else {
                        label.css('margin-left', '15px');
                    }
                });

                // Disable the Total Cycles field when Infinity is checked
                $('#lead-reminder-modal #unlimited_cycles').on('change', function() {
                    var checkbox = $(this);
                    var totalCycles = $('#lead-reminder-modal #cycles');
                    if (checkbox.is(':checked')) {
                        totalCycles.attr('disabled', true);
                    } else {
                        totalCycles.attr('disabled', false);
                    }
                });

                //for edit model
                // Hide the Total Cycles and Custom fields by default
                $('#edit-lead-reminders-modal #cycles').parent().parent().hide();
                $('#edit-lead-reminders-modal #custom_cycle_row').hide();

                // Show/hide the Total Cycles field based on the selected Repeat value
                $('#edit-lead-reminders-modal #repeat_every').on('change', function() {
                    var selectedValue = $(this).val();
                    if (selectedValue === '1-week' || selectedValue === '2-week' || selectedValue === '1-month' || selectedValue === '2-month' || selectedValue === '3-month' || selectedValue === '6-month' || selectedValue === '1-year') {
                        $('#edit-lead-reminders-modal #cycles').parent().parent().show();
                        $('#edit-lead-reminders-modal #custom_cycle_row').hide();
                    } else if (selectedValue === 'custom') {
                        //$('#edit-customer-reminders-modal #cycles').parent().parent().hide();
                        $('#edit-lead-reminders-modal #cycles').parent().parent().show();
                        $('#edit-lead-reminders-modal #custom_cycle_row').show();
                    } else {
                        $('#edit-lead-reminders-modal #cycles').parent().parent().hide();
                        $('#edit-lead-reminders-modal #custom_cycle_row').hide();
                    }
                });

                // spacing between the Infinity checkbox and label
                $('#edit-lead-reminders-modal #default_total_cycles').on('change', function() {
                    var checkbox = $(this);
                    var label = checkbox.next('label');
                    if (checkbox.is(':checked')) {
                        label.css('margin-left', '5px');
                    } else {
                        label.css('margin-left', '15px');
                    }
                });

                // Disable the Total Cycles field when Infinity is checked
                $('#edit-lead-reminders-modal #unlimited_cycles').on('change', function() {
                    var checkbox = $(this);
                    var totalCycles = $('#edit-lead-reminders-modal #cycles');
                    if (checkbox.is(':checked')) {
                        totalCycles.attr('disabled', true);
                    } else {
                        totalCycles.attr('disabled', false);
                    }
                });
            });

            //update reminders
            $("#update-reminders").validate({
                rules: {
                    name: "required",
                    type: "required",
                    date_time: "required",
                    priority: "required",
                    repeat_every: "required",
                    description: "required",
                    status: "required"
                },
                submitHandler: function(form, e) {
                    e.preventDefault();
                    var url = $(form).attr("action");
                    var id = $('#edit-lead-reminders-modal #reminder_id').val();
                    $.ajax({
                        url: url + '/' + id,
                        type: "POST",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('.btn-close').trigger('click');
                            success_message('', response.message);
                            reminders_table.ajax.reload(null, false);
                        }
                    });
                }
            });
        </script>
