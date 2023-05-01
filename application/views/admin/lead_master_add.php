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
                            <form method="post" id="store-promas" action="<?php echo base_url() . 'admin/Leadmaster/store'; ?>">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label">Customers<span class="text-danger"> *</span></label>
                                            <select data-toggle="select2" class="form-control select2" name="customer_id" id="customer_id" data-width="100%">
                                                <option value="">Select Customer</option>
                                                <?php foreach ($customers as $cust) { ?>
                                                    <option value="<?= $cust['id'] ?>"><?= $cust['first_name'] ?> <?= $cust['last_name'] ?>   <?= $cust['phone'] ?></option>
                                                <?php } ?>
                                            </select>
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
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="question" class="form-label">Questions<span class="text-danger"> *</span></label>
                                           <?php foreach($question as $item){ ?>
                                               <h5><?= $item['question'] ?></h5>
                                               <?php if($item['question_answer_inputtype'] == 'Dropdown'){ ?>
                                                   <select class="form-select" name="dropdown">
                                                   <option>Select Option</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   </select>
                                               <?php } ?>
                                            <?php } ?>
<!--                                            <span style="color: red;">--><?//= form_error('question_ids[]') ?><!--</span>-->
                                        </div>
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
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            theme: "bootstrap"
        });
        /*$("select#customer_id").change (function () {
            var selectedCustomer = $(this).children("option:selected").val();
            $('#store-specialistfor #customer_id ').val(selectedCustomer);
            $('#store-specialistarea #customer_id ').val(selectedCustomer);
        });*/
    });

    var property_table = $('#property_interested_datatable').DataTable({
        responsive: true,
        ajax: "<?php echo base_url('admin/Leadmaster/all_property/' . $agent->id . '/edit'); ?>",
        columnDefs: [{f
            target: 0,
            visible: false,
        },
            {
                responsivePriority: 1,
                targets: 1
            },
            {
                responsivePriority: 2,
                targets: 2
            },
            {
                responsivePriority: 3,
                targets: 6
            },
            {
                responsivePriority: 4,
                targets: 7
            },
            {
                "targets": 6,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).html('<div class="form-check form-switch"><input class="form-check-input property_status" data-proid="' + rowData[0] + '" name="property_status" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" ' + ((rowData[6] == '1') ? "checked" : "") + ' ></div>');
                }
            },
        ]
    });
</script>
<style>
    .select2 .selection .select2-selection--single .select2-selection__rendered {
        line-height: 1.5rem;
    }
    .select2-container .select2-selection--multiple .select2-selection__choice{
        background-color: #eceef0;
    }
</style>
