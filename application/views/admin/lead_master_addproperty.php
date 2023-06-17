<div class="modal fade" id="lead-property-suggestion-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Add Property</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <form id="search_form" method="post">
                                            <div class="row mb">
                                                <label class="col-4 col-xl-2 col-form-label">Start Date :</label>
                                                <div class="col-8 col-xl-4">
                                                    <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date">
                                                </div>
                                                <label class="col-4 col-xl-2 col-form-label">End Date :</label>
                                                <div class="col-8 col-xl-4">
                                                    <input type="date" class="form-control" name="end_date" id="end_date" placeholder="End Date">
                                                </div>
                                            </div>
                                            <div class="row mb">
                                                <label class="col-4 col-xl-2">Property Stage :</label>
                                                <div class="col-8 col-xl-4">
                                                    <select class="js-example-basic-multiple stage" name="stage" id="stage">
                                                        <option value="">Select Stage</option>
                                                        <?php foreach ($propertystage as $row) { ?>
                                                            <option value="<?= $row['id'] ?>" <?php echo set_select('stage', $row['name']); ?>><?= $row['name'] ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-4 col-xl-2 col-form-label">Master :</label>
                                                <div class="col-8 col-xl-4">
                                                    <select class="js-example-basic-multiple master" name="master" id="master">
                                                        <option value="">Select Master</option>
                                                        <?php foreach ($allmaster as $row) { ?>
                                                            <option value="<?= $row['id'] ?>" <?php echo set_select('master', $row['name']); ?>><?= $row['name'] ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb">
                                                <label class="col-4 col-xl-2 col-form-label">Category :</label>
                                                <div class="col-8 col-xl-4">
                                                    <select class="js-example-basic-multiple category" name="category" id="property_category">
                                                        <option value="">Select Category</option>
                                                        <?php foreach ($category as $row) { ?>
                                                            <option value="<?= $row['id'] ?>" <?php echo set_select('category', $row['name']); ?>><?= $row['name'] ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-4 col-xl-2">Sub Category :</label>
                                                <div class="col-8 col-xl-4">
                                                    <select class="js-example-basic-multiple subcategory" name="subcategory" id="property_subcategory">
                                                        <option value="">Select Sub Category</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-4 col-xl-2 col-form-label">Moje / Area :</label>
                                                <div class="col-8 col-xl-4">
                                                    <select class="js-example-basic-multiple area" name="area" id="area">
                                                        <option value="">Select Area</option>
                                                        <?php foreach ($allarea as $row) { ?>
                                                            <option value="<?= $row['id'] ?>" <?php echo set_select('area', $row['name']); ?>><?= $row['name'] ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-4 col-xl-2 col-form-label">Budget :</label>
                                                <div class="col-8 col-xl-4">
                                                    <input type="text" class="form-control" name="budget" id="budget" placeholder="Budget">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-8 col-xl-5" style="margin: 10px;">
                                                    <input type="submit" class="btn btn-success waves-effect waves-light me-1" name="button_1" value="SEARCH">
                                                    <input type="reset" class="btn btn-danger waves-effect waves-light" value="RESET" id="reset_btn">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="post" id="store-property-suggestion" action="<?php echo base_url() . 'admin/Leadmaster/store_property_suggestion'; ?>">
                    <input type="hidden" name="lead_id" id="lead_id" value="<?= $lead_id ?>">
                    <div class="table-responsive" style="margin-top: 20px">
                        <table class="table table-centered table-nowrap table-striped" id="property_suggestion_datatable">
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
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light" name="button_2">Submit</button>
                                <!--<button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>-->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

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
                                <button type="button" class="btn btn-danger waves-effect waves-light mb-2 addproperty_table" data-bs-toggle="modal" data-bs-target="#lead-property-suggestion-modal" style="margin-right: 5px;">Add Property</button>
                                <a href="<?= base_url('admin/Leadmaster') ?>" class="btn btn-primary waves-effect waves-light mb-2">Back</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Lead Property Suggestion</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="mt-2 mb-1 text-muted">Customer</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-account font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $customer['first_name'] . ' ' . $customer['last_name'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <p class="mt-2 mb-1 text-muted">Mobile</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-phone font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $customer['phone'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <p class="mt-2 mb-1 text-muted">Source</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-newspaper font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $source_data['name'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <p class="mt-2 mb-1 text-muted">Lead Stage</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-badge-account font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $lead_stage['name'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <p class="mt-2 mb-1 text-muted">Master</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-alpha-m-box font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $master['name'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <?php if(!empty($property)) { ?>
                                    <div class="col-md-3">
                                        <p class="mt-2 mb-1 text-muted">Property</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-office-building-outline font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $property ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if(!empty($area)) { ?>
                                    <div class="col-md-3">
                                        <p class="mt-2 mb-1 text-muted">Area</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-google-maps font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $area ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="col-md-3">
                                    <p class="mt-2 mb-1 text-muted">Budget</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-cash font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $lead['from_budget'] .'-'. $lead['to_budget'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-striped" id="all_property_suggest_datatable">
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
    .mb{
        margin-bottom: 5px;
    }
</style>
<script>
    $(document).ready(function() {
        $('.master').select2({
            placeholder: "Select Master",
            width: '100%',
            theme: "bootstrap-5"
        });
        $('.area').select2({
            placeholder: "Select Area",
            width: '100%',
            theme: "bootstrap-5"
        });
        $('.stage').select2({
            placeholder: "Select Stage",
            width: '100%',
            theme: "bootstrap-5"
        });
        $('.category').select2({
            placeholder: "Select Category",
            width: '100%',
            theme: "bootstrap-5"
        });
        $('.subcategory').select2({
            placeholder: "Select Sub Category",
            width: '100%',
            theme: "bootstrap-5"
        });
        $('#property_category').change(function() {
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
    var table = $('#property_suggestion_datatable').DataTable({
        responsive: true,
        ajax: "<?php echo base_url('admin/Leadmaster/all_property_suggestion/'.$lead_id); ?>",
        "columnDefs": [
            {
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'className': 'dt-body-center',
                'render': function (data, type, full, meta) {
                    return '<input type="checkbox" id="id_'+data+'[]" name="property_id[]" value="'
                        + $('<div/>').text(data).html() + '">';
                }
            },
            {
            "targets": 8,
            "createdCell": function(td, cellData, rowData, row, col) {
                if (rowData[7] == '1') {
                    $(td).html('<span class="badge bg-soft-success text-success">Active</span>');
                } else if (rowData[7] == '0') {
                    $(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
                }
            }
        }
        ],
        'select': {
            'style': 'multi'
        }
    });

    $("#store-property-suggestion").validate({
        submitHandler: function(form, e) {
            e.preventDefault();
            var url = $(form).attr("action");
            var id = $('#lead-property-suggestion-modal #lead_id').val();
            var value = $('#id'+id).val();
            $.ajax({
                url: url + '/' + id,
                type: "POST",
                data: $(form).serialize(),
                dataType: "json",
                success: function(response) {
                    $('.btn-close').trigger('click');
                    success_message('', response.message);
                    var allproperty = $('#all_property_suggest_datatable').DataTable();
                    allproperty.ajax.reload(null, false);
                }
            });
        }
    });

    var allproperty = $('#all_property_suggest_datatable').DataTable({
        responsive: true,
        ajax: "<?php echo base_url('admin/Leadmaster/all_properties/'.$lead_id); ?>",
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
            url: "<?php echo base_url('admin/Leadmaster/set_property_filter'); ?>",
            data: filterData,
            success: function(response) {
                table.ajax.reload();
            }
        });
    });
    $('#reset_btn').click(function() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Leadmaster/reset_property_filter'); ?>",
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

</script>