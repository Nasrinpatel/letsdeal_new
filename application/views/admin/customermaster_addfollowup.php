<!-- followup add -->
<div class="modal fade" id="customer-followup-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Add Followup</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="post" id="store-followup" action="<?php echo base_url() . 'admin/Customermaster/store_followup'; ?>">
                    <input type="hidden" name="customer_id" value="<?= $customer_id ?>">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Followup Type </label>
                                <select data-toggle="select2" title="followtype_id" class="form-control select2" name="followtype_id" data-width="100%">
                                    <option value="">Select Followup Type</option>

                                    <?php foreach ($followuptype as $ft) { ?>
                                        <option value="<?= $rt['id'] ?>"><?= $ft['name'] ?></option>
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
                                <label class="form-label">Reminder Date</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="repeat_every_checkbox" name="is_reminder" onclick="toggleCalendarInput()">

                                    <!-- <input class="form-check-input" type="checkbox" id="repeat_every_checkbox" name="repeat_every_checkbox"> -->
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
<div class="modal fade" id="edit-customer-followup-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Edit Followup</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="post" id="update-followup" action="<?php echo base_url() . 'admin/Customermaster/update_followup'; ?>">
                    <input type="hidden" name="customer_id" value="<?= $customer_id ?>">
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
                                <label for="date_time" class="form-label">Date </label>
                                <input class="form-control" id="date_time" type="datetime-local" name="date_time">
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
                                <button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#customer-followup-modal" style="margin-right: 5px;">Add Followup</button>
                                <a href="<?= base_url('admin/Customermaster') ?>" class="btn btn-primary waves-effect waves-light mb-2">Back</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Customer Followup</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted">Name</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-account font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $customer->first_name . ' ' . $customer->last_name ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div>
                                <div class="col-md-4">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted">Phone</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-phone font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $customer->phone ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div>
                                <!-- end col -->
                                <?php if (!empty($customer->email)) { ?>
                                    <div class="col-md-4">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Email</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-gmail font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $customer->email ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                <?php } ?>

                                <?php if (!empty($customer->email)) { ?>
                                    <div class="col-md-4">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Company</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-office-building font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $customer->company_name ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                <?php } ?>

                                <?php if (!empty($position_data->name)) { ?>
                                    <div class="col-md-4">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Position</p>
                                        <div class="d-flex align-items-start">
                                            <i class="mdi mdi-badge-account font-18 text-success me-1"></i>
                                            <div class="w-100">
                                                <h5 class="mt-1 font-size-14">
                                                    <?= $position_data->name ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div>
                                <?php } ?>

                                <div class="col-md-4">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted">Source</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-newspaper font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= $source->name ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div>
                                <div class="col-md-4">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted">Team Name</p>
                                    <div class="d-flex align-items-start">
                                        <i class="mdi mdi-account-group font-18 text-success me-1"></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                <?= ($staff != null) ? $staff->first_name . ' ' . $staff->last_name : ' - ' ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div>
                            </div>
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
                                <table class="table table-centered table-nowrap table-striped" id="customer_followup_datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <!-- <th>Name</th> -->
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>Priority</th>
                                            <th>Repeat Every</th>
                                            <th>Total Cycle</th>
                                            <th>Before Day</th>
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
    var followup_table = $('#customer_followup_datatable').DataTable({
        responsive: true,
        ajax: "<?php echo base_url('admin/Customermaster/all_followup/' . $customer_id); ?>",

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
                "targets": 9,
                "createdCell": function(td, cellData, rowData, row, col) {
                    if (rowData[9] == '1') {
                        $(td).html('<span class="badge bg-soft-success text-success">Active</span>');
                    } else if (rowData[9] == '0') {
                        $(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
                    }
                }
            },
        ]
    });
    //add followup
    $("#store-followup").validate({
        rules: {
            name: "required",
            type: "required",
            date_time: "required",
            priority: "required",
            repeat_every: "required",
            beforeday: "required",
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
                    $("#store-followup").trigger("reset");
                    success_message('', response.message);
                    followup_table.ajax.reload(null, false);
                }
            });
        }
    });
    //edit followup
    // $(document).on('click', "#customer_followup_datatable .edit-btn", function() {
    //     var id = $(this).attr('data-id');
    //     $.ajax({
    //         url: '<?php echo base_url() ?>admin/Customermaster/edit_followup/' + id,
    //         type: "POST",
    //         dataType: "json",
    //         success: function(data) {
    //             debugger;
    //             $("#edit-customer-followup-modal #followup_id").val(data.id);
    //             $('#edit-customer-followup-modal #name').val(data.name);
    //             $('#edit-customer-followup-modal #followtype_id').val(data.followtype_id).trigger('change');
    //             $('#edit-customer-followup-modal #date_time').val(data.date_time);


    //             $('#edit-customer-followup-modal #description').val(data.description);
    //             $("#edit-customer-followup-modal #followup_status").val(data.status);
    //         }
    //     });
    // });



    $(document).ready(function() {
        // Hide the Total Cycles and Custom fields by default
        $('#customer-followup-modal #cycles').parent().parent().hide();
        $('#customer-followup-modal #custom_cycle_row').hide();

        // Show/hide the Total Cycles field based on the selected Repeat value
        $('#customer-followup-modal #repeat_every').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === '1-week' || selectedValue === '2-week' || selectedValue === '1-month' || selectedValue === '2-month' || selectedValue === '3-month' || selectedValue === '6-month' || selectedValue === '1-year') {
                $('#customer-followup-modal #cycles').parent().parent().show();
                $('#customer-followup-modal #custom_cycle_row').hide();
            } else if (selectedValue === 'custom') {
                //$('#property-followup-modal #cycles').parent().parent().hide();
                $('#customer-followup-modal #cycles').parent().parent().show();
                $('#customer-followup-modal #custom_cycle_row').show();
            } else {
                $('#customer-followup-modal #cycles').parent().parent().hide();
                $('#customer-followup-modal #custom_cycle_row').hide();
            }
        });

        // spacing between the Infinity checkbox and label
        $('#customer-followup-modal #default_total_cycles').on('change', function() {
            var checkbox = $(this);
            var label = checkbox.next('label');
            if (checkbox.is(':checked')) {
                label.css('margin-left', '5px');
            } else {
                label.css('margin-left', '15px');
            }
        });

        // Disable the Total Cycles field when Infinity is checked
        $('#customer-followup-modal #unlimited_cycles').on('change', function() {
            var checkbox = $(this);
            var totalCycles = $('#customer-followup-modal #cycles');
            if (checkbox.is(':checked')) {
                totalCycles.attr('disabled', true);
            } else {
                totalCycles.attr('disabled', false);
            }
        });

        //for edit model
        // Hide the Total Cycles and Custom fields by default
        $('#edit-customer-followup-modal #cycles').parent().parent().hide();
        $('#edit-customer-followup-modal #custom_cycle_row').hide();

        // Show/hide the Total Cycles field based on the selected Repeat value
        $('#edit-customer-followup-modal #repeat_every').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === '1-week' || selectedValue === '2-week' || selectedValue === '1-month' || selectedValue === '2-month' || selectedValue === '3-month' || selectedValue === '6-month' || selectedValue === '1-year') {
                $('#edit-customer-followup-modal #cycles').parent().parent().show();
                $('#edit-customer-followup-modal #custom_cycle_row').hide();
            } else if (selectedValue === 'custom') {
                //$('#edit-property-followup-modal #cycles').parent().parent().hide();
                $('#edit-customer-followup-modal #cycles').parent().parent().show();
                $('#edit-customer-followup-modal #custom_cycle_row').show();
            } else {
                $('#edit-customer-followup-modal #cycles').parent().parent().hide();
                $('#edit-customer-followup-modal #custom_cycle_row').hide();
            }
        });

        // spacing between the Infinity checkbox and label
        $('#edit-customer-followup-modal #default_total_cycles').on('change', function() {
            var checkbox = $(this);
            var label = checkbox.next('label');
            if (checkbox.is(':checked')) {
                label.css('margin-left', '5px');
            } else {
                label.css('margin-left', '15px');
            }
        });

        // Disable the Total Cycles field when Infinity is checked
        $('#edit-customer-followup-modal #unlimited_cycles').on('change', function() {
            var checkbox = $(this);
            var totalCycles = $('#edit-customer-followup-modal #cycles');
            if (checkbox.is(':checked')) {
                totalCycles.attr('disabled', true);
            } else {
                totalCycles.attr('disabled', false);
            }
        });
    });



    //update followup
    $("#update-followup").validate({
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
            var id = $('#edit-customer-followup-modal #reminder_id').val();
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

    function toggleCalendarInput() {
        var checkbox = document.getElementById('repeat_every_checkbox');
        var calendarDiv = document.getElementById('calendar_input_div');

        if (checkbox.checked) {
            calendarDiv.style.display = 'block'; // Show the calendar input div
        } else {
            calendarDiv.style.display = 'none'; // Hide the calendar input div
        }
    }
</script>