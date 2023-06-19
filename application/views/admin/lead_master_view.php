<!--Add Thums Down reason Modal -->
<div class="modal fade" id="thumbsdown_reason-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Add Reason for Thumbs-down</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body p-4">
                <form method="post" class="store-reason" id="thumbsdown_reason_form" action="#">
                    <div class="mb-3">
                        <label for="thumbsdown_reason" class="form-label">Reason</label>
                        <input type="hidden" value="1" name="thumbs_down">
                        <input type="text" class="form-control" name="thumbsdown_reason" id="thumbsdown_reason" placeholder="Enter Reason" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Add Not Match reason Modal -->
<div class="modal fade" id="notmatch_reason-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Add Reason for Not-match</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body p-4">
                <form method="post" class="store-notmatchreason" id="notmatch_reason_form" action="#">
                    <div class="mb-3">
                        <label for="notmatch_reason" class="form-label">Reason</label>
                        <input type="hidden" value="1" name="not_match">
                        <input type="text" class="form-control" name="notmatch_reason" id="notmatch_reason" placeholder="Enter Reason" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
                                <a href="<?= base_url('admin/Leadmaster/add') ?>" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle me-1"></i> Add New</a>
                                <a href="<?= base_url('admin/Leadmaster/leadfeedbackview') ?>" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-circle-circle me-1"></i> Feedback List </a>

                            </ol>
                        </div>
                        <h4 class="page-title">Lead</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <form class="d-flex flex-wrap align-items-center" id="search_form">
                                        <div class="me-sm-3 mb-3">
                                            <label for="status-select" class="col-form-label">Start Date:</label>
                                            <input type="date" class="form-control" name="start_date" id="start_date" value="<?= $this->session->userdata('start_date') ?>" placeholder="Start Date">
                                        </div>
                                        <div class="me-sm-3 mb-3">
                                            <label for="status-select" class="col-form-label">End Date:</label>
                                            <input type="date" class="form-control" name="end_date" id="end_date" value="<?= $this->session->userdata('end_date') ?>" placeholder="End Date">
                                        </div>
                                        <div class="me-sm-3 mb-3">
                                            <label class="col-form-label">Master:</label>
                                            <select class="form-select select2" name="pro_master_id" id="master">
                                                <option value="">Select Master</option>
                                                <?php foreach ($master as $mas) : ?>
                                                    <option value="<?php echo $mas['id']; ?>" <?= ($this->session->userdata('master') == $mas['id']) ? 'selected' : '' ?>><?php echo $mas['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="me-sm-3 mb-3">
                                            <label class="col-form-label">Lead Stage:</label>
                                            <select class="form-select select2" name="lead_stage_id" id="lead_stage">
                                                <option value="">Select Stage</option>
                                                <?php foreach ($all_leadstage as $stage) { ?>
                                                    <option value="<?= $stage['id'] ?>" <?= ($this->session->userdata('lead_stage') == $stage['id']) ? 'selected' : '' ?>><?= $stage['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="me-sm-3 mb-3">
                                            <label class="col-form-label">Property:</label>

                                            <select class="form-select select2" name="pro_subcategory_id" id="property">
                                                <option value="">Select Property</option>
                                                <?php foreach ($sub_category as $scat) { ?>
                                                    <option value="<?= $scat['id'] ?>" <?= ($this->session->userdata('property') == $scat['id']) ? 'selected' : '' ?>><?= $scat['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="me-sm-3 mb-3">
                                            <label class="col-form-label">Area:</label>

                                            <select class="form-select select2" name="area_id" id="area">
                                                <option value="">Select Area</option>
                                                <?php foreach ($area as $ar) { ?>
                                                    <option value="<?= $ar['id'] ?>" <?= ($this->session->userdata('area') == $ar['id']) ? 'selected' : '' ?>><?= $ar['name'] ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>

                                        <div class="me-sm-3 mb-3">
                                            <label class="col-form-label">Budget:</label>
                                            <input type="number" class="form-control" name="budget" id="budget" placeholder="Budget">
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-lg-end my-1 my-lg-0">
                                                <input type="submit" class="btn btn-success waves-effect waves-light me-1" value="SEARCH">
                                                <input type="reset" class="btn btn-danger waves-effect waves-light" value="RESET" id="reset_btn">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end page title -->

            <div class="row">
                <!-- <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="<?= base_url('admin/Leadmaster/add') ?>" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle me-1"></i> Add New</a>
                            </ol>
                        </div>
                        <h4 class="page-title">.</h4>
                    </div>
                </div> -->
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
                                <table class="table table-centered table-nowrap table-striped" id="leadmaster_datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer</th>
                                            <th>Channel Partner</th>
                                            <th>Master</th>
                                            <th>Lead Stage</th>
                                            <th>Property</th>
                                            <th>Area</th>
                                            <th>Budget</th>
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
    var table = $('#leadmaster_datatable').DataTable({
        responsive: true,
        ajax: "<?php echo base_url('admin/Leadmaster/all_lead'); ?>",
        "columnDefs": [{
            "targets": 8,
            "createdCell": function(td, cellData, rowData, row, col) {
                // console.log(rowData);
                if (rowData[8] == '1') {
                    $(td).html('<span class="badge bg-soft-success text-success">Active</span>');
                } else if (rowData[8] == '0') {
                    $(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
                }
            }
        }]
    });

    $('#search_form').submit(function(e) {
        e.preventDefault();
        var filterData = {
            "start_date": $('#start_date').val(),
            "end_date": $('#end_date').val(),
            "master": $('#master').val(),
            "lead_stage": $('#lead_stage').val(),
            "property": $('#property').val(),
            "area": $('#area').val(),
            "budget": $('#budget').val()
        };
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Leadmaster/set_filter'); ?>",
            data: filterData,
            success: function(response) {
                table.ajax.reload();
            }
        });
    });
    $('#reset_btn').click(function() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Leadmaster/reset_filter'); ?>",
            success: function(response) {
                $("#master").val('').trigger('change');
                $("#lead_stage").val('').trigger('change');
                $("#property").val('').trigger('change');
                $("#area").val('').trigger('change');
                table.ajax.reload();
            }
        });
    });

    $(document).on('click', ".thumbs-up-btn", function(e) {
        e.preventDefault();
        var url = e.currentTarget.getAttribute('href');

        Swal.fire({
            title: 'Are you sure ?',
            html: '<input type="checkbox" id="redirectCheckbox" /> Are you want to add Reminder ? ',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, hide it!'
        }).then((response) => {
            if (response.isConfirmed) {
                // Check if the checkbox is checked
                if ($('#redirectCheckbox').is(':checked')) {
                    window.location.href = '<?php echo base_url('admin/Leadmaster/addreminder/id'); ?>';
                } else {
                    $.ajax({
                        type: "post",
                        url: url,
                        data: {
                            thumbs_up: 1
                        },
                        success: function(response) {
                            table.ajax.reload();
                        }
                    });
                }
            }
        });
    });

    $(document).on('click', ".thumbs-down-btn", function(e) {
        e.preventDefault();
        $('#thumbsdown_reason-modal').modal('show');
        var url = e.currentTarget.getAttribute('href');
        $('#thumbsdown_reason_form').attr('action', url);

    });
    $(document).on('submit', "#thumbsdown_reason_form", function(e) {
        e.preventDefault();
        var url = e.currentTarget.getAttribute('action');
        debugger;
        $.ajax({
            type: "post",
            url: url,
            data: $(this).serialize(),
            success: function(response) {
                $('#thumbsdown_reason-modal').modal('hide');
                table.ajax.reload();
            }
        });
    });
    $(document).on('click', ".not-match-btn", function(e) {
        e.preventDefault();
        $('#notmatch_reason-modal').modal('show');
        var url = e.currentTarget.getAttribute('href');
        $('#notmatch_reason_form').attr('action', url);

    });
    $(document).on('submit', "#notmatch_reason_form", function(e) {
        e.preventDefault();
        var url = e.currentTarget.getAttribute('action');
        $.ajax({
            type: "post",
            url: url,
            data: $(this).serialize(),
            success: function(response) {
                $('#notmatch_reason-modal').modal('hide');
                table.ajax.reload();
            }
        });
    });
</script>