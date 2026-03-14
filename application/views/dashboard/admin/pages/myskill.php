<!-- Page Sidebar Ends -->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Skills</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url('admin_playground') ?>">
                                <svg class="stroke-icon">
                                    <use href="modules/assets2/svg/icon-sprite.svg#stroke-home"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('skill'); ?>">Skills</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <!-- CARD BODY -->
                        <div class="card-body">

                            <!-- ADD BUTTON -->
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#addSkillModal">
                                Add New Skill
                            </button>

                            <!-- ADD MODAL -->
                            <div class="modal fade" id="addSkillModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title">Add New Skill</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">

                                            <form method="POST" enctype="multipart/form-data"
                                                action="<?= base_url('insert_skill'); ?>">
                                                <div class="row">
                                                    <!-- SKILL LOGO -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Skill Logo</label>
                                                        <div class="input-group mb-2">
                                                            <input type="text" id="skillLogoName" class="form-control"
                                                                placeholder="No file chosen" readonly>

                                                            <button type="button" class="btn btn-primary rounded-end"
                                                                onclick="document.getElementById('skill_logo').click();">Browse</button>

                                                            <input type="file" class="d-none" id="skill_logo"
                                                                name="skill_logo" accept="image/*"
                                                                onchange="handleFilePreview(this,'skillLogoName','skillLogoPreview','skillLogoRemove')">
                                                        </div>

                                                        <div class="d-inline-block position-relative">
                                                            <img id="skillLogoPreview"
                                                                style="width:80px;height:80px;object-fit:contain;display:none;">

                                                            <button type="button" id="skillLogoRemove"
                                                                onclick="removeFile('skill_logo','skillLogoName','skillLogoPreview','skillLogoRemove')"
                                            style="position:absolute;top:-10px;right:-10px;border:none;background:none;font-size:20px;color:#fe6a49;display:none;cursor:pointer;">&times;</button>
                                                        </div>
                                                    </div>

                                                    <!-- SKILL TITLE -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Skill Title</label>
                                                        <input type="text" class="form-control" name="skill_title"
                                                            placeholder="Ex: HTML / CSS / PHP" required>
                                                    </div>

                                                    <!-- SKILL PROGRESS -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Skill Progress (%)</label>
                                                        <input type="text" class="form-control" name="skill_progress"
                                                            placeholder="0-100" min="0" max="100" required>
                                                    </div>
                                                </div>

                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary ms-2">Save
                                                        Skill</button>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- TABLE -->
                        <div class="table-responsive add-project custom-scrollbar">
                            <table class="table card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Skill Name</th>
                                        <th>Skill Progress (%)</th>
                                        <th>Skill Logo</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (!empty($skill)): ?>
                                        <?php foreach ($skill as $row): ?>
                                            <tr>
                                                <td><?= $row->id ?></td>
                                                <td><?= date('d M Y', strtotime($row->skill_updated_date)) ?></td>
                                                <td><?= $row->skill_name ?></td>
                                                <td><?= $row->skill_percentage ?></td>
                                                <td class="text-start">
                                                    <img src="<?= base_url($row->skill_logo) ?>"
                                                        title="<?= basename($row->skill_logo) ?>"
                                                        style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
                                                    <div style="font-size:12px;color:#777;"><?= basename($row->skill_logo) ?>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <!-- EDIT BUTTON -->
                                                    <button type="button" class="btn btn-primary btn-sm me-2 editSkillBtn"
                                                        data-bs-toggle="modal" data-bs-target="#editSkillModal"
                                                        data-id="<?= $row->id ?>" data-name="<?= $row->skill_name ?>"
                                                        data-progress="<?= rtrim($row->skill_percentage, '%') ?>"
                                                        data-logo="<?= base_url($row->skill_logo) ?>"
                                                        data-logo-name="<?= basename($row->skill_logo) ?>">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </button>

                                                    <!-- DELETE BUTTON -->
                                                    <button class="btn btn-secondary btn-sm me-2" type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#skillDeleteModal_<?= $row->id; ?>">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>

                                                    <!-- DELETE MODAL -->
                                                    <div class="modal fade" id="skillDeleteModal_<?= $row->id; ?>" tabindex="1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content bg-dark">
                                                                <div class="modal-header border-0">
                                                                    <h5 class="modal-title text-white">Delete <?= $row->id; ?>
                                                                    </h5>
                                                                    <button class="btn-close" type="button"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <div class="modal-body text-center border-0">
                                                                    <p>Are you sure you want to delete this row? <br> This
                                                                        action
                                                                        cannot be undone.</p>
                                                                </div>

                                                                <div class="modal-footer border-0 justify-content-center ">
                                                                    <button class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>

                                                                      <a href="<?= base_url('removeSkills?id=' . $row->id); ?>"
                                                                        class="btn btn-primary">
                                                                        Yes, Delete
                                                                    </a>
                                                                </div>


                                                            </div>

                                                        </div>

                                                    </div>



                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No skills found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- EDIT MODAL -->
                        <div class="modal fade" id="editSkillModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Skill</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <form method="POST" action="<?= base_url('update_skill'); ?>"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="logo_id" id="logo_id">
                                            <input type="hidden" name="remove_logo" id="remove_logo" value="0">
                                            <div class="row">
                                                <!-- SKILL LOGO -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Skill Logo</label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" id="editSkillLogoName" class="form-control"
                                                            placeholder="No file chosen" readonly>

                                                        <button type="button" class="btn btn-primary rounded-end"
                                                            onclick="document.getElementById('edit_skill_logo').click();">Browse</button>

                                                        <input type="file" class="d-none" id="edit_skill_logo"
                                                            name="skill_logo" accept="image/*"
                                                            onchange="handleFilePreview(this,'editSkillLogoName','editSkillLogoPreview','editSkillLogoRemove')">
                                                    </div>
                                                    <div class="d-inline-block position-relative">
                                                        <img id="editSkillLogoPreview"
                                                            style="width:80px;height:80px;object-fit:contain;display:none;">
                                                        <button type="button" id="editSkillLogoRemove"
                                                            onclick="removeFile('edit_skill_logo','editSkillLogoName','editSkillLogoPreview','editSkillLogoRemove')"
                                                            style="position:absolute;top:-10px;right:-10px;border:none;background:none;font-size:20px;color:#fe6a49;cursor:pointer;display:none;">&times;</button>
                                                    </div>
                                                    <small class="text-muted d-block mt-1">Leave empty to keep existing
                                                        logo</small>
                                                </div>

                                                <!-- SKILL TITLE -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Skill Title</label>
                                                    <input type="text" class="form-control" name="skill_title" required>
                                                </div>

                                                <!-- SKILL PROGRESS -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Skill Progress (%)</label>
                                                    <input type="text" class="form-control" name="skill_progress"
                                                        min="0" max="100" required>
                                                </div>
                                            </div>

                                            <div class="text-end">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary ms-2">Update Skill</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JS Functions -->
    <script>
        function handleFilePreview(input, nameInputId, previewId, removeBtnId) {
            const fileNameInput = document.getElementById(nameInputId);
            const preview = document.getElementById(previewId);
            const removeBtn = document.getElementById(removeBtnId);

            if (input.files && input.files[0]) {
                fileNameInput.value = input.files[0].name;
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    removeBtn.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeFile(fileInputId, nameInputId, previewId, removeBtnId) {
            document.getElementById(fileInputId).value = '';
            document.getElementById(nameInputId).value = '';

            const preview = document.getElementById(previewId);
            preview.src = '';
            preview.style.display = 'none';

            document.getElementById(removeBtnId).style.display = 'none';

            // 🔥 VERY IMPORTANT (backend ko signal)
            document.getElementById('remove_logo').value = '1';
        }


        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.editSkillBtn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    const progress = this.dataset.progress;
                    const logo = this.dataset.logo;
                    const logoName = this.dataset.logoName;

                    const modal = document.getElementById('editSkillModal');
                    modal.querySelector('input[name="logo_id"]').value = id;
                    modal.querySelector('input[name="skill_title"]').value = name;
                    modal.querySelector('input[name="skill_progress"]').value = progress;
                    // 🔥 YEH LINE ADD KARO (IMPORTANT)
                    document.getElementById('remove_logo').value = '0';

                    document.getElementById('editSkillLogoName').value = logoName;
                    const preview = document.getElementById('editSkillLogoPreview');
                    preview.src = logo;
                    preview.style.display = 'block';
                    document.getElementById('editSkillLogoRemove').style.display = 'block';
                });
            });
        });
    </script>

</div>
<!-- Container-fluid Ends -->