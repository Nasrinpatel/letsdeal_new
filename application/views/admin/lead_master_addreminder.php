<!-- reminders add -->
<div class="modal fade" id="lead-reminders-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <label class="form-label">Reminder Type </label>
                                <select data-toggle="select2" title="type" class="form-control select2" name="type" data-width="100%">
                                    <option value="">Select Rreminder Type</option>

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
                                    <option value="day" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'day') {
                                        echo 'selected';
                                    } ?>>Days(s)</option>
                                    <option value="week" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'week') {
                                        echo 'selected';
                                    } ?>>Week(s)</option>
                                    <option value="month" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'month') {
                                        echo 'selected';
                                    } ?>>Month(s)</option>
                                    <option value="year" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'year') {
                                        echo 'selected';
                                    } ?>>Year(s)</option>
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
                                <label for="beforeday" class="form-label">Before Day</label>
                                <input type="number" class="form-control" name="beforeday" id="beforeday" placeholder="Enter Before day">
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
                                <label class="form-label">Rreminder Type </label>
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
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <select class="form-select" name="repeat_type_custom" id="repeat_type_custom">
                                    <option value="day" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'day') {
                                        echo 'selected';
                                    } ?>>Days(s)</option>
                                    <option value="week" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'week') {
                                        echo 'selected';
                                    } ?>>Week(s)</option>
                                    <option value="month" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'month') {
                                        echo 'selected';
                                    } ?>>Month(s)</option>
                                    <option value="year" <?php if (isset($task) && $task->custom_recurring == 1 && $task->recurring_type == 'year') {
                                        echo 'selected';
                                    } ?>>Year(s)</option>
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
                                <label for="beforeday" class="form-label">Before Day</label>
                                <input type="number" class="form-control" name="beforeday" id="beforeday" placeholder="Enter Before day">
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
                                <button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#lead-reminders-modal" style="margin-right: 5px;">Add Reminder</button>
                                <a href="<?= base_url('admin/Leadmaster') ?>" class="btn btn-primary waves-effect waves-light mb-2">Back</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Lead Reminder</h4>
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
                                <table class="table table-centered table-nowrap table-striped" id="lead_reminders_datatable">
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

    //all reminder
    var reminders_table = $('#lead_reminders_datatable').DataTable({
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
    //add reminders
    $("#store-reminders").validate({
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
                    $("#store-reminders").trigger("reset");
                    success_message('', response.message);
                    reminders_table.ajax.reload(null, false);
                }
            });
        }
    });
    //edit reminders
    $(document).on('click', "#lead_reminders_datatable .edit-btn", function() {
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
                if (data.custom_recurring == 1) {
                    $('#edit-lead-reminders-modal #repeat_every').val('custom').trigger('change');
                    $('#edit-lead-reminders-modal #repeat_every_custom').val(data.repeat_every).trigger('change');
                    $('#edit-lead-reminders-modal #repeat_type_custom').val(data.recurring_type).trigger('change');
                } else {
                    $('#edit-lead-reminders-modal #repeat_every').val(data.repeat_every + '-' + data.recurring_type).trigger('change');
                }
                if (data.cycles == 0) {
                    $('#edit-lead-reminders-modal #unlimited_cycles').prop('checked', true).trigger('change');
                } else {
                    $('#edit-lead-reminders-modal #unlimited_cycles').prop('checked', false).trigger('change');
                }
                $('#edit-lead-reminders-modal #cycles').val(data.cycles);
                $('#edit-lead-reminders-modal #beforeday').val(data.beforeday);
                $('#edit-lead-reminders-modal #description').val(data.description);
                $("#edit-lead-reminders-modal #reminders_status").val(data.status);
            }
        });
    });



    $(document).ready(function() {
        // Hide the Total Cycles and Custom fields by default
        $('#lead-reminders-modal #cycles').parent().parent().hide();
        $('#lead-reminders-modal #custom_cycle_row').hide();

        // Show/hide the Total Cycles field based on the selected Repeat value
        $('#lead-reminders-modal #repeat_every').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === '1-week' || selectedValue === '2-week' || selectedValue === '1-month' || selectedValue === '2-month' || selectedValue === '3-month' || selectedValue === '6-month' || selectedValue === '1-year') {
                $('#lead-reminders-modal #cycles').parent().parent().show();
                $('#lead-reminders-modal #custom_cycle_row').hide();
            } else if (selectedValue === 'custom') {
                //$('#property-reminders-modal #cycles').parent().parent().hide();
                $('#lead-reminders-modal #cycles').parent().parent().show();
                $('#lead-reminders-modal #custom_cycle_row').show();
            } else {
                $('#lead-reminders-modal #cycles').parent().parent().hide();
                $('#lead-reminders-modal #custom_cycle_row').hide();
            }
        });

        // spacing between the Infinity checkbox and label
        $('#lead-reminders-modal #default_total_cycles').on('change', function() {
            var checkbox = $(this);
            var label = checkbox.next('label');
            if (checkbox.is(':checked')) {
                label.css('margin-left', '5px');
            } else {
                label.css('margin-left', '15px');
            }
        });

        // Disable the Total Cycles field when Infinity is checked
        $('#lead-reminders-modal #unlimited_cycles').on('change', function() {
            var checkbox = $(this);
            var totalCycles = $('#lead-reminders-modal #cycles');
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
                //$('#edit-property-reminders-modal #cycles').parent().parent().hide();
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
            //description: "required",
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