<!-- Page Sidebar Ends-->
<div class="page-body">

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Testimonials</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin_playground') ?>">
                                <svg class="stroke-icon">
                                    <use href="modules/assets2/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('testimonials'); ?>">Testimonials</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">



                        <!-- TABLE -->
                        <!-- TABLE -->
                        <div class="table-responsive add-project custom-scrollbar">
                            <table class="table card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Profile Name</th>
                                        <th>Profile Photo</th>
                                        <th>Company Name</th>
                                        <th>Company Logo</th>
                                        <th>Client Review</th>
                                        <th>Project Name</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (!empty($testimonials)): ?>
                                        <?php foreach ($testimonials as $row): ?>
                                            <tr>
                                                <td><?= $row->id ?></td>
                                                <td><?= date('d M Y', strtotime($row->updated_at)) ?></td>
                                                <td><?= htmlspecialchars($row->profile_name) ?></td>
                                                <td>
                                                    <?php if (!empty($row->profile_photo)): ?>
                                                        <img src="<?= base_url($row->profile_photo) ?>"
                                                            style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
                                                    <?php else: ?>
                                                        <span class="text-muted">No Photo</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= htmlspecialchars($row->company_name) ?></td>
                                                <td>
                                                    <?php if (!empty($row->company_logo)): ?>
                                                        <img src="<?= base_url($row->company_logo) ?>"
                                                            style="width:40px;height:40px;object-fit:contain;">
                                                    <?php else: ?>
                                                        <span class="text-muted">No Logo</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= limit_text($row->client_review, 20) ?></td>
                                                <td><?= htmlspecialchars($row->client_project_name) ?></td>
                                                <td class="text-end">

                                                    <!-- Edit Button -->
                                                    <button type="button" class="btn btn-primary btn-sm me-2 editTestimonialBtn"
                                                        data-bs-toggle="modal" data-bs-target="#editTestimonialModal"
                                                        data-id="<?= $row->id ?>"
                                                        data-profile-name="<?= htmlspecialchars($row->profile_name) ?>"
                                                        data-company-name="<?= htmlspecialchars($row->company_name) ?>"
                                                        data-client-review="<?= htmlspecialchars($row->client_review) ?>"
                                                        data-client-project="<?= htmlspecialchars($row->client_project_name) ?>"
                                                        data-profile-photo="<?= $row->profile_photo ?>"
                                                        data-company-logo="<?= $row->company_logo ?>">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </button>

                                                    <!-- Delete Button -->
                                                    <button class="btn btn-secondary btn-sm me-2" type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteTestimonialModal<?= $row->id; ?>">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>

                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="deleteTestimonialModal<?= $row->id; ?>"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content bg-dark">
                                                                <div class="modal-header border-0">
                                                                    <h5 class="modal-title text-white">Delete <?= $row->id; ?>
                                                                    </h5>
                                                                    <button class="btn-close" type="button"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body text-center border-0">
                                                                    <p>Are you sure you want to delete this testimonial?
                                                                        <br>This action cannot be undone.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer border-0 justify-content-center">
                                                                    <button class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <a href="<?= base_url('removeTestimonial?id=' . $row->id); ?>"
                                                                        class="btn btn-primary">
                                                                        Yes, Delete
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Approve Button -->
                                                    <?php if ($row->status == 'pending'): ?>

                                                        <button class="btn btn-success btn-sm me-2" data-bs-toggle="modal"
                                                            data-bs-target="#approveTestimonialModal<?= $row->id; ?>">

                                                            <i class="fa fa-check"></i> Approve
                                                        </button>

                                                    <?php else: ?>

                                                        <span class="badge bg-success">Approved</span>

                                                    <?php endif; ?>

                                                    <!-- Approve Modal -->
                                                    <div class="modal fade" id="approveTestimonialModal<?= $row->id; ?>"
                                                        tabindex="-1" aria-hidden="true">

                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content bg-dark">

                                                                <div class="modal-header border-0">
                                                                    <h5 class="modal-title text-white">
                                                                        Approve <?= $row->profile_name; ?>
                                                                    </h5>

                                                                    <button class="btn-close" type="button"
                                                                        data-bs-dismiss="modal">
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body text-center border-0">
                                                                    <p>
                                                                        Are you sure you want to approve this testimonial?
                                                                    </p>
                                                                </div>

                                                                <div class="modal-footer border-0 justify-content-center">

                                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                                                        Cancel
                                                                    </button>

                                                                    <a href="<?= base_url('approveTestimonial?id=' . $row->id); ?>"
                                                                        class="btn btn-success">

                                                                        Yes, Approve
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
                                            <td colspan="9" class="text-center text-muted">No testimonials found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>










                        <!-- EDIT MODAL testimonal 1-->
                        <div class="modal fade" id="editTestimonialModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Testimonial</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <form method="POST" action="<?php echo base_url('updateTestimonial'); ?>"
                                            enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="hidden" name="rProfilephoto" id="rProfilephoto" value="0">
                                                <input type="hidden" name="editTestId" id="editTestId">
                                                <input type="hidden" name="rCompanyLogo" id="rCompanyLogo" value="0">


                                                <!-- Profile Name -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Profile Name</label>
                                                    <input type="text" class="form-control" name="profile_name"
                                                        id="editProfileName" required>
                                                </div>

                                                <!-- Company Name -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" name="company_name"
                                                        id="editCompanyName" required>
                                                </div>

                                                <!-- Project Name -->
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Client Project Name</label>
                                                    <input type="text" class="form-control" name="client_project_name"
                                                        id="editProjectName" required>
                                                </div>



                                                <!-- Profile Photo -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Profile Photo</label>

                                                    <!-- Fake input + Browse button -->
                                                    <div class="input-group mb-2">

                                                        <!-- File name show -->
                                                        <input type="text" id="editProfilePhotoName"
                                                            class="form-control" placeholder="No file chosen" readonly>

                                                        <!-- Browse button -->
                                                        <button class="btn btn-primary rounded-end" type="button"
                                                            onclick="openImageInput('editProfilePhotoFile')">
                                                            Browse
                                                        </button>

                                                        <!-- Hidden file input -->
                                                        <input type="file" class="d-none" id="editProfilePhotoFile"
                                                            name="profile_photo" accept="image/*" onchange="handleImageChange(
                'editProfilePhotoFile',
                'editProfilePhotoName',
                'editProfilePhotoPreview',
                'editProfilePhotoRemove'
            )">
                                                    </div>

                                                    <!-- Image Preview -->
                                                    <div class="d-inline-block position-relative mt-2">

                                                        <!-- Preview -->
                                                        <img id="editProfilePhotoPreview" src=""
                                                            style="width:100px;height:100px;border-radius:50%;object-fit:cover;display:none;">

                                                        <!-- Remove button -->
                                                        <button type="button" id="editProfilePhotoRemove" onclick="removeImage(
                'editProfilePhotoFile',
                'editProfilePhotoName',
                'editProfilePhotoPreview',
                'editProfilePhotoRemove'
            )" style="display:none; position:absolute; top:-10px; right:-10px; border:none; background:none; font-size:20px; color:#fe6a49; cursor:pointer;">
                                                            &times;
                                                        </button>

                                                    </div>
                                                </div>

                                                <!-- Company Logo -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Company Logo</label>

                                                    <div class="input-group mb-2">

                                                        <!-- File name show -->
                                                        <input type="text" id="editCompanyLogoName" class="form-control"
                                                            placeholder="No file chosen" readonly>

                                                        <!-- Browse Button -->
                                                        <button class="btn btn-primary rounded-end" type="button"
                                                            onclick="openImageInput('editCompanyLogoFile')">
                                                            Browse
                                                        </button>

                                                        <!-- Hidden File Input -->
                                                        <input type="file" class="d-none" id="editCompanyLogoFile"
                                                            name="company_logo" accept="image/*" onchange="handleImageChange(
                'editCompanyLogoFile',
                'editCompanyLogoName',
                'editCompanyLogoPreview',
                'editCompanyLogoRemove'
            )">
                                                    </div>

                                                    <!-- Preview -->
                                                    <div class="d-inline-block position-relative mt-2">

                                                        <img id="editCompanyLogoPreview" src=""
                                                            style="width:100px;height:100px;object-fit:cover;display:none;">

                                                        <button type="button" id="editCompanyLogoRemove" onclick="removeImage(
                'editCompanyLogoFile',
                'editCompanyLogoName',
                'editCompanyLogoPreview',
                'editCompanyLogoRemove'
            )" style="display:none; position:absolute; top:-10px; right:-10px; border:none; background:none; font-size:20px; color:#fe6a49; cursor:pointer;">
                                                            &times;
                                                        </button>

                                                    </div>
                                                </div>

                                                <!-- Review -->
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Client Review</label>
                                                    <textarea class="form-control" rows="4" name="client_review"
                                                        id="editClientReview" style="resize:none;" required></textarea>
                                                </div>

                                            </div>

                                            <!-- Buttons -->
                                            <div class="text-end">

                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>

                                                <button type="submit" class="btn btn-primary ms-2">
                                                    Update Testimonial
                                                </button>
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











</div>




<!-- Testimonial  edit js  -->
<script>

    /* =====================================================
    1️⃣ BROWSE BUTTON CLICK
    ===================================================== */
    function openImageInput(inputId) {
        const input = document.getElementById(inputId);
        if (input) input.click();
    }

    /* =====================================================
    2️⃣ IMAGE SELECT → NAME SHOW + PREVIEW
    ===================================================== */
    function handleImageChange(inputId, nameId, previewId, removeBtnId) {

        const input = document.getElementById(inputId);
        const nameField = document.getElementById(nameId);
        const preview = document.getElementById(previewId);
        const removeBtn = document.getElementById(removeBtnId);

        if (input.files && input.files[0]) {

            // file name
            nameField.value = input.files[0].name;

            // preview
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';

                if (removeBtn) removeBtn.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);

            // reset remove flags
            const removeProfile = document.getElementById('rProfilephoto');
            const removeLogo = document.getElementById('rCompanyLogo');

            if (removeProfile && inputId === "editProfilePhotoFile") {
                removeProfile.value = 0;
            }

            if (removeLogo && inputId === "editCompanyLogoFile") {
                removeLogo.value = 0;
            }
        }
    }

    /* =====================================================
    3️⃣ IMAGE REMOVE
    ===================================================== */
    function removeImage(inputId, nameId, previewId, removeBtnId) {

        document.getElementById(inputId).value = '';
        document.getElementById(nameId).value = '';

        const preview = document.getElementById(previewId);
        preview.src = '';
        preview.style.display = 'none';

        const removeBtn = document.getElementById(removeBtnId);
        if (removeBtn) removeBtn.style.display = 'none';

        // backend remove signal
        if (inputId === "editProfilePhotoFile") {
            const removeFlag = document.getElementById('rProfilephoto');
            if (removeFlag) removeFlag.value = 1;
        }

        if (inputId === "editCompanyLogoFile") {
            const removeFlag = document.getElementById('rCompanyLogo');
            if (removeFlag) removeFlag.value = 1;
        }
    }

    /* =====================================================
    4️⃣ EDIT MODAL PREFILL
    ===================================================== */
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.editTestimonialBtn').forEach(btn => {

            btn.addEventListener('click', function () {

                /* ===============================
                TEXT PREFILL
                =============================== */

                document.getElementById('editTestId').value =
                    this.dataset.id || '';

                document.getElementById('editProfileName').value =
                    this.dataset.profileName || '';

                document.getElementById('editCompanyName').value =
                    this.dataset.companyName || '';

                document.getElementById('editProjectName').value =
                    this.dataset.clientProject || '';

                document.getElementById('editClientReview').value =
                    this.dataset.clientReview || '';

                /* ===============================
                PROFILE PHOTO PREFILL
                =============================== */

                const profilePreview = document.getElementById('editProfilePhotoPreview');
                const profileName = document.getElementById('editProfilePhotoName');
                const profileRemove = document.getElementById('editProfilePhotoRemove');
                const profileFlag = document.getElementById('rProfilephoto');

                profileFlag.value = 0;

                if (this.dataset.profilePhoto && this.dataset.profilePhoto !== '') {

                    profilePreview.src = "<?= base_url() ?>" + this.dataset.profilePhoto;
                    profilePreview.style.display = 'block';

                    profileName.value = this.dataset.profilePhoto.split('/').pop();

                    profileRemove.style.display = 'block';

                } else {

                    profilePreview.src = '';
                    profilePreview.style.display = 'none';

                    profileName.value = '';
                    profileRemove.style.display = 'none';
                }

                /* ===============================
                COMPANY LOGO PREFILL
                =============================== */

                const logoPreview = document.getElementById('editCompanyLogoPreview');
                const logoName = document.getElementById('editCompanyLogoName');
                const logoRemove = document.getElementById('editCompanyLogoRemove');
                const logoFlag = document.getElementById('rCompanyLogo');

                logoFlag.value = 0;

                if (this.dataset.companyLogo && this.dataset.companyLogo !== '') {

                    logoPreview.src = "<?= base_url() ?>" + this.dataset.companyLogo;
                    logoPreview.style.display = 'block';

                    logoName.value = this.dataset.companyLogo.split('/').pop();

                    logoRemove.style.display = 'block';

                } else {

                    logoPreview.src = '';
                    logoPreview.style.display = 'none';

                    logoName.value = '';
                    logoRemove.style.display = 'none';
                }

            });

        });

    });
</script>




</div>