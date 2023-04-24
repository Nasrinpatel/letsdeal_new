	<!DOCTYPE html>
	<html lang="en">

		<head>
			<?php $this->load->view('admin/includes/hlinks'); ?>
		</head>

		<!-- body start -->
		<body data-theme="light" data-layout-mode="horizontal" data-topbar-color="dark" data-menu-position="fixed">

			<!-- Begin page -->
			<div id="wrapper">

				
				<?php $this->load->view('admin/includes/header') ?>
	
				<?php $this->load->view('admin/' .$page_name) ?>
			
			</div>
			<!-- END wrapper -->

			<?php $this->load->view('admin/includes/sidebar') ?>

			<?php $this->load->view('admin/includes/flinks') ?>
			
		</body>
	</html>
