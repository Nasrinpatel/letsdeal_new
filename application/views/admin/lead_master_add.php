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
                                            <span style="color: red;"><?= form_error('customer_id') ?></span>
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
                                    <div class="col-lg-5">
                                        <div class="mb-3">
                                            <label for="question" class="form-label">Questions</label>
                                           <?php foreach($question as $item){
                                               ?>
                                               <h5><?= $item['question'] ?></h5>
                                               <input type="hidden" name="question[]" value="<?= $item['question'] ?>">
                                               <input type="hidden" name="question_id[]" value="<?= $item['id'] ?>">
                                               <input type="hidden" name="answer_type_<?= $item['id'] ?>" value="<?= $item['question_answer_inputtype'] ?>">
                                               <?php if($item['source_id'] != ''){
                                                   $source_options=$this->db->get_where('source_option_master',array('source_cat_id'=>$item['source_id']))->result_array();
                                                   foreach($source_options as $source_option){ ?>
                                                       <input type="hidden" name="answer_options_<?= $item['id'] ?>[]" value="<?= $source_option['name'] ?>">
                                                       <input type="hidden" name="answer_option_ids_<?= $item['id'] ?>[]" value="<?= $source_option['id'] ?>">
                                                   <?php } ?>
                                               <?php }else {
                                                   $source_options=[];
                                               } ?>
                                               <?php if($item['question_answer_inputtype'] == 'Textbox'){ ?>
                                                   <input type="text" class="form-control" name="answer_<?= $item['id'] ?>" id="userName1" value="" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Dropdown'){ ?>
                                                   <select class="form-select" name="answer_<?= $item['id'] ?>" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                                       <option>Select Option</option>
                                                       <?php foreach($source_options as $source_option){ ?>
                                                         <option value="<?= $source_option['id'] ?>"><?= $source_option['name'] ?></option>
                                                       <?php } ?>
                                                   </select>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Checkbox'){ ?>
                                                   <?php foreach($source_options as $source_option){ ?>
                                                       <div class="form-check form-check-inline">
                                                           <input class="form-check-input" type="checkbox" id="userName1"  name="answer_<?= $item['id'] ?>[]" value="<?= $source_option['id'] ?>" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                                           <label class="form-check-label" for="userName1"><?= $source_option['name'] ?></label><br>
                                                       </div>
                                                   <?php } ?>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Radio'){ ?>
                                                   <?php foreach($source_options as $source_option){ ?>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="userName1"  name="answer_<?= $item['id'] ?>" value="<?= $source_option['id'] ?>" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                                            <label class="form-check-label" for="userName1"><?= $source_option['name'] ?></label><br>
                                                        </div>
                                                   <?php } ?>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Date'){ ?>
                                                   <input type="date" class="form-control" id="userName1"  name="answer_<?= $item['id'] ?>" value="" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Textarea'){ ?>
                                                   <textarea class="form-control" id="userName1" name="answer_<?= $item['id'] ?>" <?php (($item['is_require'] == 1) ? 'required' : '') ?>></textarea>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'File'){ ?>
                                                   <input type="file" class="form-control" id="userName1"  name="answer_<?= $item['id'] ?>" value="" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Number'){ ?>
                                                   <input type="number" class="form-control" id="userName1"  name="answer_<?= $item['id'] ?>" value="" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Phone'){ ?>
                                                   <input type="tel" class="form-control" placeholder="Enter Phone number" id="userName1" name="answer_<?= $item['id'] ?>" value="" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Email'){ ?>
                                                   <input type="email" class="form-control" id="userName1" placeholder="Enter Email Address"  name="answer_<?= $item['id'] ?>" value="" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Link'){ ?>
                                                   <input type="url" class="form-control" id="userName1" placeholder="Enter Link"  name="answer_<?= $item['id'] ?>" value="" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Image'){ ?>
                                                   <input type="file" class="form-control" name="answer_<?= $item['id'] ?>" accept="image/*" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Video 360'){ ?>
                                                   <input type="url" class="form-control" placeholder="Enter Vieo 360 Link" name="answer_<?= $item['id'] ?>" accept="video/*" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Image Gallery'){ ?>
                                                   <input class="image_gallery" name="answer_<?= $item['id'] ?>[]" type="file" multiple <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                               <?php }
                                               elseif ($item['question_answer_inputtype'] == 'Video Gallery'){ ?>
                                                    <div id="videogallery">
                                                        <div class="row">
                                                            <div class="col-lg-10">
                                                                <div class="mb-3">
                                                                    <input type="url" class="form-control" name="answer_<?= $item['id'] ?>[]" id="videogallery" placeholder="Enter Video Link" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <a class="btn btn-success waves-effect waves-light add-button"  data-name="answer_<?= $item['id'] ?>[]">Add </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                               <?php }elseif ($item['question_answer_inputtype'] == 'Google map'){ ?>
                                                   <div class="row">
                                                       <div class="col-md-6">
                                                           <input type="text" class="form-control" placeholder="Enter Latitude"  name="answer_<?= $item['id'] ?>[]" value="" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                                       </div>
                                                       <div class="col-md-6">
                                                           <input type="text" class="form-control" placeholder="Enter Longitude"  name="answer_<?= $item['id'] ?>[]" value="" <?php (($item['is_require'] == 1) ? 'required' : '') ?>>
                                                       </div>
                                                   </div>
                                               <?php }?>
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
