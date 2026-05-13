<?php
$this->load->view('fronted/layouts/ui_Header');
?>

<div class="d-flex align-items-center justify-content-center vh-100 text-center">

	<div class="d-flex align-items-center justify-content-center vh-100 text-center">



		<div class="text-white">
			<!-- LOGO -->
<a href="<?php echo base_url(''); ?>">

    <?php if (!empty($card->company_logo)) { ?>

        <!-- Main Logo -->
        <img src="<?= base_url($card->company_logo); ?>" 
             alt="Company Logo" 
             style="height:36px; width:128px;">

    <?php } elseif (!empty($card->company_dark_logo)) { ?>

        <!-- Dark Logo -->
        <img src="<?= base_url($card->company_dark_logo); ?>" 
             alt="Dark Logo"
             style="height:36px; width:128px;">

    <?php } else { ?>

        <!-- Default Fallback -->
        <img src="<?= base_url('modules/assets/images/dark_logo.png'); ?>" 
             alt="Default Logo" 
             style="height:36px; width:128px;"
             onerror="this.onerror=null; this.src='<?= base_url('modules/assets/images/light_logo.png'); ?>';">

    <?php } ?>

</a>

			<h1 style="font-size:50px; font-weight:700; margin-bottom:10px;">
				Welcome to
			</h1>

			<h2 style="font-size:40px; font-weight:800; margin-bottom:20px;">
				 Employee Management System
			</h2>

			<p style="max-width:500px; margin:auto; margin-bottom:30px;">
    Manage employee attendance, payroll, work records, salary, reports, tasks, and employee data easily with our smart system.
			</p>

			<a href="<?= base_url('onBoarding'); ?>" class="theme-btn">
				<i class="las la-sign-in-alt"></i> Go To Login
			</a>

		</div>

	</div>

</div>






<!-- Header section ui_Footer  -->
<?php
$this->load->view('fronted/layouts/ui_Footer');
?>