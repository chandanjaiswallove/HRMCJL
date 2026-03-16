








<!-- Page Header Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Data Management</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_playground') ?>">
                                <svg class="stroke-icon">
                                    <use href="modules/assets2/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('admin_playground'); ?>">Data Management</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>




    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-xxl-9 box-col-12">
                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="card o-hidden small-widget">
                            <div class="card-body total-project border-b-primary border-2">
                                <span class="f-light f-w-500 f-14">Prjoject Completed</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600"><?= $intro->project_completed ?></h2>
                                        <!-- <span class="f-12 f-w-400">(This Year)</span> -->
                                    </div>
                                    <div class="product-sub bg-primary-light">
                                        <svg class="invoice-icon">
                                            <use href="modules/svg/icon-sprite.svg#color-swatch"></use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card o-hidden small-widget">
                            <div class="card-body total-Progress border-b-warning border-2">
                                <span class="f-light f-w-500 f-14">Services</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600"><?= sprintf("%02d", count($service)) ?></h2>
                                        <!-- <span class="f-12 f-w-400">(This year) </span> -->
                                    </div>
                                    <div class="product-sub bg-warning-light">
                                        <svg class="invoice-icon">
                                            <use href="modules/svg/icon-sprite.svg#tick-circle"></use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card o-hidden small-widget">
                            <div class="card-body total-Complete border-b-secondary border-2">
                                <span class="f-light f-w-500 f-14">Reviews</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600"><?= sprintf("%02d", count($testimonials)) ?></h2>
                                        <!-- <span class="f-12 f-w-400">(This year) </span> -->
                                    </div>
                                    <div class="product-sub bg-secondary-light">
                                        <svg class="invoice-icon">
                                            <use href="modules/svg/icon-sprite.svg#add-square"></use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card o-hidden small-widget">
                            <div class="card-body total-upcoming">
                                <span class="f-light f-w-500 f-14">Inquiries</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600"><?= sprintf("%02d", count($contacts)) ?></h2>
                                        <!-- <span class="f-12 f-w-400">(This year) </span> -->
                                    </div>
                                    <div class="product-sub bg-light-light">
                                        <svg class="invoice-icon">
                                            <use href="modules/svg/icon-sprite.svg#edit-2"></use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Container-fluid starts-->
                    <!-- <div class="container-fluid">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Dummy  Data</h4>
                                </div>
                                <div class="card-block row">
                                    <div class="col-sm-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table table-dashed">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"><b>Id</b></th>
                                                        <th scope="col"><b>Visit Date</b></th>
                                                        <th scope="col"><b>Full Name</b></th>
                                                        <th scope="col"><b>Email</b></th>
                                                        <th scope="col"><b>Subject</b></th>
                                                        <th scope="col"><b>Message</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mind & Body</td>
                                                        <td>Yoga</td>
                                                        <td>8:00 AM - 9:00 AM</td>
                                                        <td>Adam Stewart</td>
                                                        <td>20</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Container-fluid Ends-->

                </div>
            </div>

            <div class="col-xxl-3 d-xxl-block d-none activity-group box-col-none">
                <div class="row">
                    <div class="col-xl-12 col-md-6">
                        <div class="card overflow-hidden">
                            <div class="card-body pt-0 project-ideas-card">
                                <div class="project-card">
                                    <div>
                                        <span class="f-22 f-w-500 text-center">Get more ideas for your important
                                            project</span>
                                        <div class="btn-showcase text-center">
                                            <a href="#">
                                                <button class="btn btn-pill btn-outline-primary-2x b-r-8 active">
                                                    Upgrade Now
                                                </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
    <!-- Container-fluid Ends-->









</div>






