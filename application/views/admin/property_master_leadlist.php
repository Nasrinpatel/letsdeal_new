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
                                <a type="button" href="<?= base_url('admin/Propertymaster') ?>" class="btn btn-success" style="float:right;">Back</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Lead of Property Master</h4>
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
                            <div class="table-responsive" style="margin-top: 20px">
                                <table class="table table-centered table-nowrap table-striped" id="lead_promaster_datatable">
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
    .filter-box{
        border:1px solid #aaa;
        padding: 10px;
        border-radius: 5px;
    }
    .filter span{
        width:190px;
    }
    .filter option{
        width:174px;
    }
    .select2-container .select2-selection--multiple .select2-selection__choice{
        color:black;
    }
    .filter label{
        display: inherit;
    }
    .filterTable td{
        padding:10px;
    }
    span.label.label-info {
        border: 1px solid #6c757d;
        padding: 3px;
        font-size: 12px;
    }
</style>
<script>
    var table = $('#lead_promaster_datatable').DataTable({
        responsive: true,
        ajax: "<?php echo base_url('admin/Propertymaster/lead_of_property/'. $property_id); ?>",
        "columnDefs": [{
            "targets": 8,
            "createdCell": function(td, cellData, rowData, row, col) {
                if (rowData[8] == '1') {
                    $(td).html('<span class="badge bg-soft-success text-success">Active</span>');
                } else if (rowData[8] == '0') {
                    $(td).html('<span class="badge bg-soft-danger text-danger">Inactive</span>');
                }
            }
        }, ]
    });
</script>