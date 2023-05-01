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
                                <a type="button" href="<?= base_url('admin/LeadFormMaster') ?>" class="btn btn-success" style="float:right;">Back</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Lead Form Master</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">

                            <form method="post" action="<?php echo base_url('admin/LeadFormMaster/update/'.$leadform->id); ?>">

                                <input type="hidden" name="id" id="edit_leadformmaster_id" />

                                <div id="questions">
                                    <?php $questions = explode(',', $leadform->question_ids);
                                    for ($i = 0; $i < count($questions); $i++) { ?>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="question" class="form-label">Select Question</label>
                                                    <select class="form-select select2" name="question_ids[]" id="question">
                                                        <option value="">Select Question</option>
                                                        <?php foreach ($question as $q) : ?>
                                                            <option value="<?php echo $q['id']; ?>" <?= ($questions[$i] == $q['id']) ? 'selected' : '' ?>><?php echo $q['question']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <label class="form-label" style='width:100%'>&nbsp;</label>
                                                <?php if ($i == 0) { ?>
                                                    <a class="btn btn-success waves-effect waves-light add-button">Add </a>
                                                <?php } else { ?>
                                                    <a class='btn btn-danger remove-button'><i class='fa fa-trash'></i></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?= form_error('question_ids[]') ?>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="form_status" class="form-label">Status</label>
                                            <select class="form-select" name="status" id="form_status">
                                                <option selected="">Select Status</option>
                                                <option value="1" <?= ($leadform->status == 1) ? 'selected' : '' ?>>Active</option>
                                                <option value="0" <?= ($leadform->status == 0) ? 'selected' : '' ?>>Inactive</option>
                                            </select>
                                            <!-- <?= form_error('status') ?> -->
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
        $(".add-button").click(function() {
            // create a new select element
            var newSelect = $("<div class='row question'>" +
                "<div class='col-lg-6'>" +
                "<div class='mb-3'>" +
                "<label for='question' class='form-label'>Select Question</label>" +
                "<select class='form-select select2' name='question_ids[]' id='question'>" +
                "<option value=''>Select Question</option>" +
                "<?php foreach ($question as $q) : ?>" +
                "<option value='<?php echo $q['id']; ?>'><?php echo $q['question']; ?></option>" +
                "<?php endforeach; ?>" +
                "</select>" +
                "</div>" +
                "</div>" +
                "<div class='col-lg-1'>" +
                "<label class='form-label' style='width:100%'>&nbsp;</label>" +
                "<a class='btn btn-danger remove-button'><i class='fa fa-trash'></i></a>" +
                "</div>" +
                "</div>");
            $("#questions").append(newSelect);
        });
        $(document).on('click', '.remove-button', function() {
            // remove the select element with the id 'question'
            $(this).parent().parent('div').remove();
        });

    });
</script>