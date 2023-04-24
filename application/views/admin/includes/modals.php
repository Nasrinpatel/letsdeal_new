   <!-- Modal -->
   <div class="modal fade" id="propertytype-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Add New Customers</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body p-4">
						<form method="post" id="store-protype" action="<?php echo base_url() . 'front/designation/desig_store'; ?>">

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter full name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="position" placeholder="Enter phone number">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Location</label>
                                <input type="text" class="form-control" id="category" placeholder="Enter Location">
                            </div>
        
                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Continue</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<script>
		// add Property Type
		$("#store-protype").submit(function(e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: '<?php echo base_url() ?>/front/designation/desig_store',
				data: $("#store-protype").serialize(),
				dataType: 'json',
				success: function(data) {
					if (data.status == 'success') {
						$("#designation_table").load(" #designation_table");
						$(".desig_details").html(data.data);
						$("#store-protype").get(0).reset();
						close_popup();
						success_message('', data.message);
					} else {
						close_popup();
						error_message('', data.message);
					}
				},
				error: function() {
					error_message('', 'Something went wrong. Please try again');
				}
			});
		});
</script>