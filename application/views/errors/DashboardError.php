<?php
// Error page ya kisi bhi page me header/footer ke sath data bhejne ka sahi tarika

$this->load->view('dashboard/admin/layouts/dashHeader', $data);
?>



<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">404</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?= base_url('admin_playground'); ?>"
                    class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">404</li>
        </ul>
    </div>

    <div class="card basic-data-table">
        <div class="card-body py-80 px-32 text-center">
            <div class="max-w-454-px mx-auto">
                <img src="modules/assets2//images/error/404-img.png" alt="Thumbnail" class="mb-24">
            </div>
            <h6 class="mb-16">403 Page not Found</h6>
            <p class="text-secondary-light max-w-650-px mx-auto">400 Bad Request response status code indicates that the
                server cannot or will not process the request due to something that is perceived to be a client error
            </p>
            <a href="<?= base_url('admin_playground'); ?>" class="btn btn-danger-600 radius-8 px-40 py-16">Back to
                Home</a>
        </div>
    </div>
</div>




<?php
$this->load->view('dashboard/admin/layouts/dashFooter', $data);
?>