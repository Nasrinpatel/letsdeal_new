<!-- Plugins js-->
<script src="<?= base_url('assets/') ?>libs/flatpickr/flatpickr.min.js"></script>

<script src="<?= base_url('assets/') ?>libs/apexcharts/apexcharts.min.js"></script>

<script src="<?= base_url('assets/') ?>libs/selectize/js/standalone/selectize.min.js"></script>

<!-- Dashboar 1 init js-->
<script src="<?= base_url('assets/') ?>js/pages/dashboard-1.init.js"></script>

<script src="<?= base_url('assets/') ?>js/jquery.bootstrap.wizard.min.js"></script>

<!-- Init js-->
<script src="<?= base_url('assets/') ?>js/form-wizard.init.js"></script>

<!-- App js-->
<script src="<?= base_url('assets/') ?>js/app.min.js"></script>

<script type="text/javascript" src="<?= base_url('assets/') ?>js/fileinput.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>js/selectize.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>js/switchery.min.js"></script>

<script>
    $('.select2').select2();
    $('.select2').select2({
        theme: 'bootstrap-5'
        // dropdownParent: $('#state-modal'),
    });
    // $('#city-modal').select2({
    // 	theme:'bootstrap-5'
    // 	// dropdownParent: $('#state-modal'),
    // }); you
    $(document).ready(function() {
        $(document).on('click', ".delete-btn", function(e) {
            e.preventDefault();
            var url = e.currentTarget.getAttribute('href');
            Swal.fire({
                title: 'Are sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((response) => {
                if (response.isConfirmed) {
                    window.location.href = url;
                }
            })
        });
    });
</script>