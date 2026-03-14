<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Introduce </h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_playground') ?>">
                                <svg class="stroke-icon">
                                    <use href="modules/assets2/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('introduce'); ?>">Introduce</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>







    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">

                <div class="col-md-12">

                    <div class="card-header">
                        <h4 class="card-title mb-0">Edit Introduce</h4>
                        <div class="card-options">
                            <a class="card-options-collapse" href="<?= base_url('introduce') ?>"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="<?= base_url('introduce') ?>"
                                data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>


                <form class="card" action="<?= base_url('update_introduce') ?>" method="POST" enctype="multipart/form-data">

    <!-- 🔥 ID -->
    <input type="hidden" name="id" value="<?= $intro->id ?? '' ?>">
    <input type="hidden" name="remove_project_file" id="remove_project_file" value="0">

    <div class="card-body">
        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Introduce Heading</label>
                <input type="text" class="form-control" name="introduceHeadings"
                       value="<?= $intro->introduce_title ?? '' ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label>Highlight</label>
                <input type="text" class="form-control" name="hightlightTag"
                       value="<?= $intro->introduce_highlight ?? '' ?>">
            </div>

            <div class="col-md-4 mb-3">
                <label>Experience</label>
                <input type="text" class="form-control" name="yearExperience"
                       value="<?= $intro->experience ?? '' ?>">
            </div>

            <div class="col-md-3 mb-3">
                <label>Project File</label>

                <div class="input-group">
                    <input type="text" id="projectFileName" class="form-control"  readonly
                           value="<?= !empty($intro->project_download) ? basename($intro->project_download) : '' ?>">

                    <button type="button" class="btn btn-primary rounded-end"
                        onclick="document.getElementById('projectDownloads').click();"
                        id="projectBrowseBtn"
                        style="<?= !empty($intro->project_download) ? 'display:none' : '' ?>">
                        Browse
                    </button>

                    <button type="button" class="btn btn-danger rounded-end"
                        onclick="removeProjectFile()"
                        id="projectRemoveBtn"
                        style="<?= empty($intro->project_download) ? 'display:none' : '' ?>">
                        Remove
                    </button>

                    <input type="file" class="d-none" id="projectDownloads"
                           name="projectDownloads"
                           onchange="handleProjectFileChange(this)">
                </div>
            </div>

            <div class="col-md-5 mb-3">
                <label>Project Completed</label>
                <input type="text" class="form-control" name="projectCompleted"
                       value="<?= $intro->project_completed ?? '' ?>">
            </div>

            <div class="col-md-12 mb-3">
                <label>Message</label>
                <textarea class="form-control" name="IntroduceMessage"
                          rows="4"><?= $intro->introduce_paragraph ?? '' ?></textarea>
            </div>

        </div>
    </div>

    <div class="card-footer text-end">
        <button class="btn btn-primary">Update Introduce</button>
    </div>
</form>



                </div>
            </div>
        </div>

    </div>
    <!-- Container-fluid Ends-->



















</div>

<script>
function handleProjectFileChange(input) {
    const fileNameInput = document.getElementById('projectFileName');
    const browseBtn = document.getElementById('projectBrowseBtn');
    const removeBtn = document.getElementById('projectRemoveBtn');

    if (input.files && input.files[0]) {
        fileNameInput.value = input.files[0].name;
        browseBtn.style.display = 'none';
        removeBtn.style.display = 'inline-block';

        // new file select → remove flag reset
        document.getElementById('remove_project_file').value = '0';
    }
}

function removeProjectFile() {
    document.getElementById('projectDownloads').value = '';
    document.getElementById('projectFileName').value = '';
    document.getElementById('projectBrowseBtn').style.display = 'inline-block';
    document.getElementById('projectRemoveBtn').style.display = 'none';

    // 🔥 THIS LINE WAS MISSING
    document.getElementById('remove_project_file').value = '1';
}
</script>
