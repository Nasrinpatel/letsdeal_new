<div class="modal fade" id="add-customer-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="scrollableModalTitle">Add Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="store-customer-modal" action="<?php echo base_url() . 'admin/Customermaster/store_ajax'; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input class="form-check-input" type="radio" id="direct" name="inquiry_type" checked value="direct">
                                <label class="form-check-label" for="direct">Direct</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <input class="form-check-input" type="radio" id="agent" name="inquiry_type" value="agent">
                                <label class="form-check-label" for="agent">Via Channel Partner </label>
                            </div>
                        </div>
                    </div>
                    <div id='agent_div' style='display:none'>

                        <div class="mb-3">
                            <label class="form-label">Channel Partner <span class="text-danger"> *</span></label>
                            <select data-toggle="select2" title="Partner" class="form-control select2 channelpartner" name="agent_id[]" data-width="100%" multiple>
                                <?php foreach ($agent as $ag) { ?>
                                    <option value="<?= $ag['id'] ?>"><?= $ag['first_name'] ?> <?= $ag['last_name'] ?> <?= $ag['nick_name'] ? ' (' . $ag['nick_name'] . ')' : '' ?> <?= $ag['phone'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Inquiry Source<span class="text-danger"> *</span></label>
                                <select data-toggle="select2" class="form-control select2" name="source_id" data-width="100%">
                                    <option value=''>Select Source</option>
                                    <?php foreach ($source as $sou) { ?>
                                        <option value="<?= $sou['id'] ?>"><?= $sou['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="billing-first-name" class="form-label">First Name<span class="text-danger"> *</span></label>
                                <input class="form-control" type="text" placeholder="Enter your First name" name="first_name" id="billing-first-name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="billing-last-name" class="form-label">Last Name<span class="text-danger"> *</span></label>
                                <input class="form-control" type="text" placeholder="Enter your Last name" name="last_name" id="billing-last-name" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="billing-phone" class="form-label">Mobile <span class="text-danger"> *</span></label>
                                <input class="form-control" type="text" name="phone" placeholder="(xx) xxx xxxx xxx" id="billing-phone" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="billing-email-address" class="form-label">Email Address </label>
                                <input class="form-control" type="email" name="email" placeholder="Enter your Email" id="billing-email-address" />
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="company" class="form-label">Company Name</label>
                                <input type="text" maxlength="14" class="form-control" name="company_name" id="company" placeholder="Enter Company Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter your Description"></textarea>
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Assigned</label>
                                <select data-toggle="select2" title="Assigned" class="form-control select2 assigned" name="assigned_id[]" data-width="100%" multiple>
                                    <?php foreach ($staff as $sta) { ?>
                                        <option value="<?= $sta['id'] ?>"><?= $sta['first_name'] ?> <?= $sta['last_name'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Position</label>
                                <select data-toggle="select2" title="Position" class="form-control select2" name="position_id" data-width="100%">
                                    <option value=''>Select Position</option>
                                    <?php foreach ($position as $pos) { ?>
                                        <option value="<?= $pos['id'] ?>"><?= $pos['name'] ?></option>
                                    <?php }
                                    ?>
                                </select>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="add-agent-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="scrollableModalTitle">Add Channel Partner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="store-agent-modal" action="<?php echo base_url() . 'admin/Agentmaster/store_ajax'; ?>">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Inquiry Source<span class="text-danger"> *</span></label>
                            <select data-toggle="select2" class="form-control select2" name="source_id" data-width="100%">
                                <option value=''>Select Source</option>
                                <?php foreach ($source as $sou) { ?>
                                    <option value="<?= $sou['id'] ?>"><?= $sou['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Assigned</label>
                                <select data-toggle="select2" title="Assigned" class="form-control select2 assigned" name="assigned_id[]" data-width="100%" multiple>
                                    <?php foreach ($staff as $sta) { ?>
                                        <option value="<?= $sta['id'] ?>"><?= $sta['first_name'] ?> <?= $sta['last_name'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Position</label>
                                <select data-toggle="select2" title="Position" class="form-control select2" name="position_id" data-width="100%">
                                    <option value=''>Select Position</option>
                                    <?php foreach ($position as $pos) { ?>
                                        <option value="<?= $pos['id'] ?>"><?= $pos['name'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div> <!-- end row -->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="billing-first-name" class="form-label">First Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Enter your First name" name="first_name" id="billing-first-name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="billing-last-name" class="form-label">Last Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Enter your Last name" name="last_name" id="billing-last-name" />
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="billing-nick-name" class="form-label">Nick Name</label>
                                <input class="form-control" type="text" placeholder="Enter your Nick name" name="nick_name" id="billing-nick-name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="billing-phone" class="form-label">Mobile <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="phone" placeholder="(xx) xxx xxxx xxx" id="billing-phone" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="billing-email-address" class="form-label">Email Address </label>
                                <input class="form-control" type="email" name="email" placeholder="Enter your Email" id="billing-email-address" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="company" class="form-label">Company Name</label>
                                <input type="text" maxlength="14" class="form-control" name="company_name" id="company" placeholder="Enter Company Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter your Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="city_status" class="form-label">Status</label>
                            <select class="form-select" name="status" id="city_status">
                                <option selected="">Select Status</option>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#add-customer-modal #firstname').bind('keyup blur', function() {
            var node = $(this);
            node.val(node.val().replace(/[^a-zA-Z ]/g, ''));
        });
        $('#add-customer-modal #lastname').bind('keyup blur', function() {
            var node = $(this);
            node.val(node.val().replace(/[^a-zA-Z ]/g, ''));
        });
    });
    $('#add-customer-modal input[name=inquiry_type]').click(function() {

        if (this.id == "agent") {
            $("#add-customer-modal #agent_div").show('slow');

        } else {
            $("#add-customer-modal #agent_div").hide('slow');
        }
    });
</script>
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
        $('.channelpartner').select2({
            multiple:true,
            placeholder: "Select Channel Partner",
            theme: "bootstrap-5"
        });
    });
    //add customer
    $("#add-customer-modal #store-customer-modal").validate({
        rules: {
            source_id: "required",
            first_name: "required",
            last_name: "required",
            phone: "required"
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
                   $('#customer_div').load();
                   success_message('', response.message);
               }
           });
       }
   });
    //add channel partner
    $("#store-agent-modal").validate({
        rules: {
            source_id: "required",
            first_name: "required",
            last_name: "required",
            phone: "required"
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
                    $('#agent_div').load();
                    success_message('', response.message);
                }
            });
        }
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