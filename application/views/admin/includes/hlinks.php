<meta charset="utf-8" />
<title>Dashboard | UBold - Responsive Admin Dashboard Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- App favicon -->
<link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.ico">

<!-- Plugins css -->
<link href="<?= base_url('assets/') ?>libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/') ?>libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

<!-- Bootstrap css -->
<link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- App css -->
<link href="<?= base_url('assets/') ?>css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
<!-- icons -->
<link href="<?= base_url('assets/') ?>css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/') ?>css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/') ?>css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/') ?>css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/') ?>css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/') ?>css/select2-bootstrap-5-theme.min.css" rel="stylesheet" type="text/css" />

<link href="<?= base_url('assets/') ?>css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/') ?>css/fileinput.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/') ?>css/switchery.min.css" rel="stylesheet" type="text/css" />

<link href="<?= base_url('assets/') ?>libs/fullcalendar/main.min.css" rel="stylesheet" type="text/css" />



<!-- <link href="<?php echo base_url(); ?>assets/css/select2/select2-bootstrap.min.css" rel="stylesheet"> -->
<style>
	label.error {
		color: red;
	}

	form.error {
		color: red;
	}
	/* image button */
	.image-area {
		position: relative;
		width: 50%;
		background: #333;
	}

	.image-area img {
		max-width: 100%;
		height: auto;
	}

	.remove-image {
		display: none;
		position: absolute;
		top: -10px;
		right: -10px;
		border-radius: 10em;
		padding: 2px 6px 3px;
		text-decoration: none;
		font: 700 21px/20px sans-serif;
		background: #555;
		border: 3px solid #fff;
		color: #FFF;
		box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(0, 0, 0, 0.3);
		text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
		-webkit-transition: background 0.5s;
		transition: background 0.5s;
	}

	.remove-image:hover {
		background: #E54E4E;
		color: #fff;
		padding: 3px 7px 5px;
		top: -11px;
		right: -11px;
	}

	.remove-image:active {
		background: #E54E4E;
		top: -10px;
		right: -11px;
	}
</style>
<!-- Head js -->
<!-- Vendor js -->
<script src="<?= base_url('assets/') ?>js/vendor.min.js"></script>
<script src="<?= base_url('assets/') ?>js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/') ?>js/head.js"></script>

<script type="text/javascript" src="<?= base_url('assets/') ?>js/jquery.validate.min.js"></script>

<script type="text/javascript" src="<?= base_url('assets/') ?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>js/responsive.bootstrap5.min.js"></script>

<!-- Calendar -->
<script type="text/javascript" src="<?= base_url('assets/') ?>libs/fullcalendar/main.min.js"></script>

<script src="<?= base_url('assets/') ?>js/select2.min.js"></script>

<script src="<?= base_url('assets/') ?>js/select2.full.min.js"></script>



<script>
	function success_message(title, text) {
		Swal.fire({
			title: title,
			text: text,
			icon: "success",
			button: "Okay!",
		});
	}

	function error_message(title, text) {
		Swal.fire({
			title: title,
			text: text,
			icon: "error",
			button: "Okay!",
		});
	}
	$(document).ready(function () {
		<?php if ($this->session->flashdata('success') != '') { ?>
			success_message('', '<?= $this->session->flashdata('success') ?>');
		<?php } ?>
		<?php if ($this->session->flashdata('error') != '') { ?>
			error_message('', '<?= $this->session->flashdata('error') ?>');
		<?php } ?>
	});	
</script>
