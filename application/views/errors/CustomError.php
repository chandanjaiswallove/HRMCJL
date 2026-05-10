<!-- Header section ui_Footer  -->
<?php
$this->load->view('fronted/layouts/ui_Header');
?>


<div class="d-flex align-items-center justify-content-center vh-100 text-center">

    <div class="text-white">

        <h1 style="font-size:140px; font-weight:800; line-height:1;">
            404
        </h1>

        <h3 class="mb-3">
            Oops! Page Not Found
        </h3>

        <p style="max-width:500px; margin:auto; margin-bottom:30px;">
            The page you are looking for might have been removed,
            had its name changed, or is temporarily unavailable.
        </p>

        <a href="<?= base_url(); ?>" class="theme-btn">
            <i class="las la-home"></i> Back To Home
        </a>

    </div>

</div>







<!-- Header section ui_Footer  -->
<?php
$this->load->view('fronted/layouts/ui_Footer');
?>