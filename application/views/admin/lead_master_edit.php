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
                                            <a class="nav-link py-2" id="agent-tab" data-bs-toggle="pill" href="#property" role="tab" aria-controls="agent" aria-selected="false">
                                                <i class="mdi mdi-account-circle d-block font-24"></i>
                                                Property Interested
                                            </a>
                                            <a class="nav-link mt-2 py-2" id="agent-contacts-tab" data-bs-toggle="pill" href="#area" role="tab" aria-controls="agent-contacts" aria-selected="false">
                                                <i class="mdi mdi-contacts d-block font-24"></i>
                                                Area Interested
                                            </a>
                                        </div>

                                    </div> <!-- end col-->
                                    <div class="col-lg-8">
                                        <div class="tab-content p-3">
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
                    console.log(id);
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
                    var id = $('#edit-agent-specialistfor-modal #specialistfor_id').val();
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
                            $("#edit-area-modal #lead_id").val(data.id);
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
                    var id = $('#edit-agent-specialistarea-modal #specialistarea_id').val();
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
        </script>
