<!-- Page Sidebar Ends-->
<div class="page-body">

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>About Management </h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_playground') ?>">
                                <svg class="stroke-icon">
                                    <use href="modules/assets2/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('about'); ?>">About</a> </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>














    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">

                <div class="col-md-12">


                    <form class="card" action="<?= base_url('about_update'); ?>" method="POST">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit About</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <!-- About Headings -->
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">About Headings</label>
                                        <input class="form-control" type="text" name="aboutHeadings"
                                            value="<?= isset($about->about_title) ? $about->about_title : ''; ?>"
                                            required />
                                    </div>
                                </div>

                                <!-- About Tag -->
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">About Tag</label>
                                        <input class="form-control" type="text" name="aboutTag"
                                            value="<?= isset($about->title_highlights) ? $about->title_highlights : ''; ?>" />
                                    </div>
                                </div>

                                <!-- About Message -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">About Message</label>
                                        <textarea class="form-control" rows="4" name="IntroduceMessage"
                                            style="resize:none;"><?= isset($about->about_paragraph) ? $about->about_paragraph : ''; ?></textarea>
                                    </div>
                                </div>

                                <!-- Hidden ID -->
                                <input type="hidden" name="id" value="<?= $about->id; ?>">

                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">
                                Update About
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
    <!-- Container-fluid Ends-->











</div>