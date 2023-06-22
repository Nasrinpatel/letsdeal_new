<!-- followup add -->
<div class="modal fade" id="property-followup-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Add Followup</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="post" id="store-followup" action="<?php echo base_url() . 'admin/Propertymaster/store_followups'; ?>">
                    <input type="hidden" name="property_id" value="<?= $property_id ?>">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Followup Type </label>
                                <select data-toggle="select2" title="followtype_id" class="form-control select2" name="followtype_id" data-width="100%">
                                    <option value="">Select Followup Type</option>
                                    <?php foreach ($followuptype as $ft) { ?>
                                        <option value="<?= $ft['id'] ?>"><?= $ft['name'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div> <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="followup_date" class="form-label">Followup Date </label>
                                <input class="form-control" id="followup_date" type="datetime-local" name="followup_date">
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_reminder" name="is_reminder" value="1" onclick="toggleCalendarInput()">

                                    <label class="form-check-label" for="repeat_every_checkbox">
                                        Is Remider
                                    </label>

                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row" id="calendar_input_div" style="display: none;">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Reminder Date</label>
                                <div class="input-group">
                                    <input class="form-control" id="reminder_date" type="datetime-local" name="reminder_date">
                                </div>
                            </div>
                        </div>
                    </div>


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
<div class="modal fade" id="edit-property-followup-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Edit Followup</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="post" id="update-followup" action="<?php echo base_url() . 'admin/Propertymaster/update_followups'; ?>">
                    <input type="hidden" name="property_id" value="<?= $property_id ?>">
                    <input type="hidden" name="followup_id" id="followup_id">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Followup Type </label>
                                <select data-toggle="select2" class="form-control select2" name="followtype_id" id="followtype_id" data-width="100%">
                                    <option value="">Select Followup Type</option>
                                    <?php foreach ($followuptype as $ft) { ?>
                                        <option value="<?= $ft['id'] ?>"><?= $ft['name'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div> <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="followup_date" class="form-label">Date </label>
                                <input class="form-control" id="followup_date" type="datetime-local" name="followup_date">
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_reminder" name="is_reminder" value="1" onclick="toggleCalendarInput()">

                                    <label class="form-check-label" for="is_reminder">
                                        Is Remider
                                    </label>

                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row" id="calendar_input_div" style="display: none;">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Reminder Date</label>
                                <div class="input-group">
                                    <input class="form-control" id="reminder_date" type="datetime-local" name="reminder_date">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="mb-3">
                        <label for="followup_status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="followup_status">
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
                                <button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#property-followup-modal" style="margin-right: 5px;">Add Followup</button>
                                <a href="<?= base_url('admin/Propertymaster') ?>" class="btn btn-primary waves-effect waves-light mb-2">Back</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Property Reminder</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php if ($property->customer_id != '') { ?>
                                    <div class="col-md-3">
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
                                    <div class="col-md-3">
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

                                <div class="col-md-3">
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
                            <!-- end form-check-->
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted">Stage</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-bookmark font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $property_stage['name'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div>
                                <div class="col-md-3">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted">Budget</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-home-variant font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $property->from_budget .'-'. $property->to_budget ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div>
                                <div class="col-md-3">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted">State</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-home-variant font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $state['name'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div>
                                <div class="col-md-3">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted">District</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-home-variant font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $district['name'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div>
                                <div class="col-md-3">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted">Sub District</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-home-variant font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $subdistrict['name'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div>
                                <div class="col-md-3">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted">Moje / Area</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-home-variant font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $area['name'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
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
                                <table class="table table-centered table-nowrap table-striped" id="property_followup_datatable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <!-- <th>Name</th> -->
                                        <!-- <th>Type</th> -->
                                        <th>Followup Date</th>
                                        <th>Is reminder</th>
                                        <th>Reminder date</th>
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
            <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>
<script>
    //all Followup
    var followup_table = $('#property_followup_datatable').DataTable({
        responsive: true,
        ajax: "<?php echo base_url('admin/Propertymaster/all_followups/' . $property_id); ?>",

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
                targets: 7
            },
            {
                "targets": 7,
                "createdCell": function(td, cellData, rowData, row, col) {
                    if (rowData[7] == '1') {
                        $(td).html('<span class="badge bg-soft-success text-success">Active</span>');
                    } else if (rowData[7] == '0') {
                        $(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
                    }
                }
            },
        ]
    });
    //add followup
    $("#store-followup").validate({
        rules: {
            followup_date: "required",
            followtype_id: "required",
            description: "required",
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
                    $("#store-followup").trigger("reset");
                    success_message('', response.message);
                    followup_table.ajax.reload(null, false);
                }
            });
        }
    });
    function datetimeLocal(datetime) {
        const dt = new Date(datetime);
        dt.setMinutes(dt.getMinutes() - dt.getTimezoneOffset());
        return dt.toISOString().slice(0, 16);
    }
    //edit followup
    $(document).on('click', "#property_followup_datatable .edit-btn", function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '<?php echo base_url() ?>admin/Propertymaster/edit_followups/' + id,
            type: "POST",
            dataType: "json",
            success: function(data) {
                debugger;
                $("#edit-property-followup-modal #followup_id").val(data.id);
                $('#edit-property-followup-modal #name').val(data.name);
                $('#edit-property-followup-modal #followtype_id').val(data.followtype_id).trigger('change');
                $('#edit-property-followup-modal #followup_date').val(data.followup_date);
                $('#edit-property-followup-modal #description').val(data.description);
                $("#edit-property-followup-modal #followup_status").val(data.status);
                $("#edit-property-followup-modal #is_reminder").attr('checked', (data.is_reminder == 1)?true:false);
                $("#edit-property-followup-modal #is_reminder").trigger('change');
                $('#edit-property-followup-modal #reminder_date').val(data.reminder_date);
            }
        });
    });

    //update followup
    $("#update-followup").validate({
        rules: {
            followup_date: "required",
            followtype_id: "required",
            description: "required",
            status: "required"
        },
        submitHandler: function(form, e) {
            e.preventDefault();
            var url = $(form).attr("action");
            var id = $('#edit-property-followup-modal #followup_id').val();
            $.ajax({
                url: url + '/' + id,
                type: "POST",
                data: $(form).serialize(),
                dataType: "json",
                success: function(response) {
                    $('.btn-close').trigger('click');
                    success_message('', response.message);
                    followup_table.ajax.reload(null, false);
                }
            });
        }
    });

    $("#property-followup-modal #is_reminder").change(function() {
        if($(this).is(':checked')){
            $("#property-followup-modal #calendar_input_div").show();
        }else{
            $("#property-followup-modal #calendar_input_div").hide();
        }
    });
    $("#edit-property-followup-modal #is_reminder").change(function() {
        if($(this).is(':checked')){
            $("#edit-property-followup-modal #calendar_input_div").show();
        }else{
            $("#edit-property-followup-modal #calendar_input_div").hide();
        }
    });
</script>