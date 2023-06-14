<div class="modal fade" id="lead-property-suggestion-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Add Property</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="store-reminders" action="<?php echo base_url() . 'admin/Leadmaster/store_reminders'; ?>">
                    <input type="hidden" name="lead_id" value="<?= $lead_id ?>">
                    <div class="table-responsive" style="margin-top: 20px">
                        <table class="table table-centered table-nowrap table-striped" id="property_suggestion_datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Master Name</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Create Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
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

                           <!-- <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-striped" id="lead_property_suggest_datatable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
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
                            </div>-->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>
<script>
    var table = $('#property_suggestion_datatable').DataTable({
        responsive: true,
        ajax: "<?php echo base_url('admin/Leadmaster/all_property_suggestion/'.$lead_id); ?>",
        "columnDefs": [{
            "targets": 5,
            "createdCell": function(td, cellData, rowData, row, col) {
                console.log(rowData[0]);
                console.log(rowData[0] == '0');
                if(rowData[0] == '0'){
                    $(td).html('<input type="checkbox" name="hobbies[]" id="hobby1" value="1" data-parsley-mincheck="2" class="form-check-input" data-parsley-multiple="hobbies">');
                }
                if (rowData[5] == '1') {
                    $(td).html('<span class="badge bg-soft-success text-success">Active</span>');
                } else if (rowData[5] == '0') {
                    $(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
                }
            }
        }, ]
    });
</script>