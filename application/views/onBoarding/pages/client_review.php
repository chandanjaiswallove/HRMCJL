<form method="POST" action="<?php echo base_url('submit-client-review/_a1c2b3d4_e5f6_7890_1234_abcdef123456') ?>" enctype="multipart/form-data">
    <div class="row">
        <!-- Profile Name -->
        <div class="col-md-12 mb-3">
            <label class="form-label">Profile Name</label>
            <input type="text" class="form-control  bg-transparent text-white" name="profile_name"
                placeholder="Enter profile name" required>
        </div>

        <!-- Company Name -->
        <div class="col-md-12 mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" class="form-control bg-transparent text-white" name="company_name"
                placeholder="Enter company name" required>
        </div>

        <!-- Client Project Name -->
        <div class="col-md-12 mb-3">
            <label class="form-label">Client Project Name</label>
            <input type="text" class="form-control bg-transparent text-white" name="client_project_name"
                placeholder="Enter project name" required>
        </div>



        <!-- Profile Photo (Insert Form) -->
        <div class="col-md-6  position-relative">
            <label class="form-label">Profile Photo</label>

            <div class="input-group mb-2">
                <!-- File name display -->
                <input type="text" id="profilePhotoName" class="form-control bg-transparent text-white"
                    placeholder="No file chosen" readonly>

                <!-- Browse button -->
                <button class="btn btn-success rounded-end" type="button"
                    onclick="document.getElementById('profilePhoto').click();">
                    Browse
                </button>

                <!-- Hidden file input -->
                <input type="file" class="d-none" id="profilePhoto" name="profile_photo" accept="image/*"
                    onchange="handleProfileImageChange()">
            </div>

            <!-- Preview + Remove -->
            <div class="d-inline-block position-relative">
                <img id="profilePhotoPreview"
                    style="width:100px;height:100px;border-radius:50%;object-fit:cover;display:none;">
                <button type="button" id="profilePhotoRemove" onclick="removeProfileImage()"
                    style="position:absolute;top:-10px;right:-10px;border:none;background:none;font-size:20px;color:#fe6a49;cursor:pointer;display:none;">
                    &times;
                </button>
            </div>
        </div>


        <!-- Company Logo -->
        <div class="col-md-6 position-relative">
            <label class="form-label">Company Logo</label>

            <div class="input-group mb-2">
                <!-- File name display -->
                <input type="text" id="companyLogoName" class="form-control bg-transparent text-white"
                    placeholder="No file chosen" readonly>

                <!-- Browse button -->
                <button class="btn btn-success rounded-end" type="button"
                    onclick="document.getElementById('companyLogo').click();">
                    Browse
                </button>

                <!-- Hidden file input -->
                <input type="file" class="d-none" id="companyLogo" name="company_logo" accept="image/*"
                    onchange="handleFileChange('companyLogo','companyLogoName','companyLogoPreview','companyLogoRemove')">
            </div>

            <!-- Preview + Remove -->
            <div class="d-inline-block position-relative">
                <img id="companyLogoPreview"
                    style="width:100px;height:100px;border-radius:50%;object-fit:cover;display:none;">
                <button type="button" id="companyLogoRemove"
                    onclick="removeFile('companyLogo','companyLogoName','companyLogoPreview','companyLogoRemove')"
                    style="position:absolute;top:-10px;right:-10px;border:none;background:none;font-size:20px;color:#fe6a49;cursor:pointer;display:none;">
                    &times;
                </button>
            </div>
        </div>


        <!-- Client Review -->
        <div class="col-md-12 mb-3">
            <label class="form-label">Client Review</label>
            <textarea class="form-control bg-transparent text-white" rows="4" name="client_review"
                placeholder="Give your client review..." style="resize:none;" required></textarea>
        </div>


    </div>

    <!-- Permission Checkbox -->
    <div class="col-12 mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="permissionCheck" name="permission" required>
            <label class="form-check-label text-success" for="permissionCheck">
                I consent to share my logo and review on the website for marketing materials.
            </label>
        </div>
    </div>


    <!-- Footer Buttons -->
    <div class="text-end">
        <button type="submit" class="theme-btn w-100 mt-3">
            Submit
        </button>
    </div>
</form>



<script>
    function handleFileChange(inputId, nameId, previewId, removeId) {
        const input = document.getElementById(inputId);
        const fileNameInput = document.getElementById(nameId);
        const preview = document.getElementById(previewId);
        const removeBtn = document.getElementById(removeId);

        if (input.files && input.files[0]) {
            fileNameInput.value = input.files[0].name;

            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'inline-block';
                removeBtn.style.display = 'inline-block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeFile(inputId, nameId, previewId, removeId) {
        const input = document.getElementById(inputId);
        const fileNameInput = document.getElementById(nameId);
        const preview = document.getElementById(previewId);
        const removeBtn = document.getElementById(removeId);

        input.value = '';
        fileNameInput.value = '';
        preview.src = '';
        preview.style.display = 'none';
        removeBtn.style.display = 'none';
    }

    // Optional: attach to Profile Photo
    document.getElementById('profilePhoto').addEventListener('change', function () {
        handleFileChange('profilePhoto', 'profilePhotoName', 'profilePhotoPreview', 'profilePhotoRemove');
    });
    document.getElementById('profilePhotoRemove').addEventListener('click', function () {
        removeFile('profilePhoto', 'profilePhotoName', 'profilePhotoPreview', 'profilePhotoRemove');
    });

    // Company Logo uses the same functions via HTML onchange/onclick
</script>