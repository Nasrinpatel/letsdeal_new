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
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                            <div id="progressbarwizard">

                                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                                                    <li class="nav-item">
                                                        <a href="#lead" id="lead_tab" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi mdi-account-circle me-1"></i>
                                                            <span class="d-none d-sm-inline">Lead</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#property_interested" id="property_interested_tab" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi mdi-office-building me-1"></i>
                                                            <span class="d-none d-sm-inline">Property Interested</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#area_interested" id="area_interested_tab" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi mdi-office-building me-1"></i>
                                                            <span class="d-none d-sm-inline">Area Interested</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#question" id="question_tab" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi mdi-file-question me-1"></i>
                                                            <span class="d-none d-sm-inline">Question</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content b-0 mb-0 pt-0">

                                                    <div id="bar" class="progress mb-3" style="height: 7px;">
                                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                                    </div>

                                                    <div class="tab-pane" id="lead">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form method="post" id="store-lead" action="<?php echo base_url() . 'admin/Leadmaster/store'; ?>">
                                                                    <div class="row">
                                                                        <div class="col-lg-5">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Customers<span class="text-danger"> *</span></label>
                                                                                <select data-toggle="select2" class="form-control select2" name="customer_id" id="customer_id" data-width="100%">
                                                                                    <option value="">Select Customer</option>
                                                                                    <?php foreach ($customers as $cust) { ?>
                                                                                        <option value="<?= $cust['id'] ?>"><?= $cust['first_name'] ?> <?= $cust['last_name'] ?>   <?= $cust['phone'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                                <span style="color: red;"><?= form_error('customer_id') ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" style='width:100%'>&nbsp;</label>
                                                                                <button type="button" class="btn btn-success waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#add-customer-modal">Add</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <div class="mb-3">
                                                                                <label for="property_master" class="form-label">Select Master<span class="text-danger"> *</span></label>
                                                                                <select class="form-select select2" name="pro_master_id" id="property_master">
                                                                                    <option value="">Select Master</option>
                                                                                    <?php foreach ($master as $mas) { ?>
                                                                                        <option value="<?= $mas['id'] ?>"><?= $mas['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                                <span style="color: red;"><?= form_error('pro_master_id') ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Lead Stage<span class="text-danger"> *</span></label>
                                                                                <select data-toggle="select2" class="form-control select2" name="lead_stage_id" data-width="100%">
                                                                                    <option value="">Select Stage</option>
                                                                                    <?php foreach ($leadstage as $stage) { ?>
                                                                                        <option value="<?= $stage['id'] ?>"><?= $stage['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                                <span style="color: red;"><?= form_error('lead_stage_id') ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <label class="form-label">Budget <span class="text-danger"> *</span></label>
                                                                        <div class="col-range">
                                                                            <div class="mb-3">
                                                                                <input type="text" class="form-control" name="from_budget" placeholder="From">
                                                                            </div>
                                                                            <span style="color: red;"><?= form_error('from_budget') ?></span>
                                                                        </div>
                                                                        <div class="col-range">
                                                                            <div class="mb-3">
                                                                                <input type="text" class="form-control" name="to_budget" placeholder="To">
                                                                            </div>
                                                                            <span style="color: red;"><?= form_error('to_budget') ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-5">
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
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="tab-pane" id="property_interested">
                                                        <div class="row">
                                                            <div class="col-12">
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
                                                                                        <table class="table table-centered table-nowrap table-striped dt-responsive nowrap" style="width:100%" id="property_interested_datatable" data-id="">
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
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="tab-pane" id="area_interested">
                                                        <div class="row">
                                                            <div class="col-12">
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
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="tab-pane" id="question">
                                                    </div>

                                                    <ul class="list-inline mb-0 wizard mt-20 hide">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);" class="btn btn-secondary previous-btn">Previous</a>
                                                        </li>
                                                        <li class="next list-inline-item float-end">
                                                            <a href="javascript: void(0);" class="btn btn-secondary next-btn">Next</a>
                                                        </li>
                                                    </ul>

                                                </div> <!-- tab-content -->
                                            </div> <!-- end #progressbarwizard-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
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
                    <input type="hidden" name="lead_id" id="lead_id" value="">
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
                                <!-- <button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>-->
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
                    <input type="hidden" name="lead_id" id="lead_id" value="">
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
                    <input type="hidden" name="lead_id" id="lead_id" value="">
                    <div class="row">
                        <div class="mb-3">
                            <label for="state_id" class="form-label">Select State</label>
                            <select class="form-select" name="state_id" id="state_id">
                                <option value="">Select State</option>
                                <?php foreach ($states as $sta) { ?>
                                    <option value="<?= $sta['id'] ?>" <?= ($sta['is_default'] == 1) ? 'selected' : '' ?>><?= $sta['name'] ?></option>
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
                    <input type="hidden" name="lead_id" id="lead_id" value="">
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

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            theme: "bootstrap"
        });

        $('.hide').css('display','none');
        $('#property_interested_tab').addClass('disabled');
        $('#area_interested_tab').addClass('disabled');
        $('#question_tab').addClass('disabled');

        $(".sequence_box").sortable({ tolerance: 'pointer' });
        $('.sequence').css("cursor","move");
    });

    //add lead
    $("#store-lead").validate({
        rules: {
            customer_id: "required",
            pro_master_id: "required",
            lead_stage_id: "required",
            from_budget: "required",
            to_budget: "required",
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
                    $('#store-specialistfor #lead_id').val(response.insert_id);
                    $('#update-specialistfor #lead_id').val(response.insert_id);
                    $('#store-specialistarea #lead_id').val(response.insert_id);
                    $('#update-specialistarea #lead_id').val(response.insert_id);
                    // $('#store-question #lead_id').val(response.insert_id);
                    $('#property_interested_datatable').attr('data-id',response.insert_id);
                    $('.hide').removeAttr("style");
                    $('#property_interested_tab').removeClass('disabled');
                    $('#area_interested_tab').removeClass('disabled');
                    $('#question_tab').removeClass('disabled');
                   var master_id = response.master_id.pro_master_id;
                   var lead_id = response.insert_id;
                    $.ajax({
                        // type: 'POST',
                        url: '<?php echo base_url('admin/Leadmaster/get_questions'); ?>',
                        type: 'POST',
                        data: {
                            master_id: master_id,
                            lead_id:lead_id
                        },
                        dataType: 'json',
                        success: function(data) {
                            debugger;
                            if (data.success == true) {
                                $('#question').html(data.html);
                                form_init();
                                $(".image_gallery").fileinput();
                            }
                        }
                    });
                    success_message('', response.message);
                }
            });
        }
    });

    //add question
   /* $("#store-question").validate({
        submitHandler: function(form, e) {
            e.preventDefault();
            var url = $(form).attr("action");
            $.ajax({
                url: url,
                type: "POST",
                data: $(form).serialize(),
                dataType: "json",
                success: function(response) {
                    success_message('', response.message);
                }
            });
        }
    });*/
    $(document).ready(function() {
        $('#property_interested_tab, .next-btn').on('click',function(){
            //all specialist for
            var id = $('#lead-property-modal #store-specialistfor #lead_id').val();

            var specialistfor_table = $('#property_interested_datatable').DataTable({
                responsive: true,
                destroy: true,
                ajax: "<?php echo base_url('admin/Leadmaster/all_property_interested/'); ?>" + id,
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
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if (rowData[4] == '1') {
                                $(td).html('<span class="badge bg-soft-success text-success">Active</span>');
                            } else if (rowData[4] == '0') {
                                $(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
                            }
                        }
                    },
                ]
            });
        });
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
                    var specialistfor_table = $('#property_interested_datatable').DataTable();
                    specialistfor_table.ajax.reload(null, false);
                }
            });
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
    $(document).ready(function() {
        //edit specialist for
        $(document).on('click', "#property_interested_datatable .edit-btn", function() {
            var id = $(this).attr('data-id');
            $.ajax({
                url: '<?php echo base_url() ?>admin/Leadmaster/edit_property/' + id,
                type: "POST",
                dataType: "json",
                success: function(data) {
                    $("#edit-property-modal #lead_id").val(data.id);
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
                    var specialistfor_table = $('#property_interested_datatable').DataTable();
                    specialistfor_table.ajax.reload(null, false);
                }
            });
        }
    });

    $(document).ready(function() {
        $('.next-btn, #area_interested_tab').on('click',function(){
            //all specialist for
            var id = $('#add-area-modal #store-specialistarea #lead_id').val();

            var specialistarea_table = $('#area_interested_datatable').DataTable({
                responsive: true,
                destroy: true,
                ajax: "<?php echo base_url('admin/Leadmaster/all_area_interested/'); ?>" + id,
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
        });
    });

    $(document).ready(function() {
        //edit specialist for
        $(document).on('click', "#property_interested_datatable .edit-btn", function() {
            var id = $(this).attr('data-id');
            console.log(id);
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
                        var is_default = response[i]['is_default'];
                        $("#store-specialistarea #city_id").append("<option value='" + id + "' " + ((is_default == 1) ? 'selected' : '') + ">" + name + "</option>");
                    }
                }
            });
        } else {
            $("#store-specialistarea #city_id").empty();
        }
    });
    $('#add-area-modal').on('shown.bs.modal', function(e) {
        $('#add-area-modal #state_id').trigger('change');
        setTimeout(function() {
            $('#add-area-modal #city_id').trigger('change');
        }, 250);
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
                    var specialistarea_table = $('#area_interested_datatable').DataTable();
                    specialistarea_table.ajax.reload(null, false);
                }
            });
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
                    var specialistarea_table = $('#area_interested_datatable').DataTable();
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
</script>
<style>
    .select2 .selection .select2-selection--single .select2-selection__rendered {
        line-height: 1.5rem;
    }
    .select2-container .select2-selection--multiple .select2-selection__choice{
        background-color: #eceef0;
    }
    .mt-20{
        margin-top: 20px;
    }
    .col-range {
        -webkit-box-flex: 0;
        flex: 0 0 auto;
        width: 20.86666667%;
    }
</style>
