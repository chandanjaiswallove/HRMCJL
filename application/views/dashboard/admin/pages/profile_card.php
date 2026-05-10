<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">My Profile
</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?= base_url('admin_playground'); ?>"
                    class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">My Profile</li>
        </ul>
    </div>




    <div class="row gy-4">

        <div class="col-md-12">

            <form class="card" action="<?= base_url('update_profile'); ?>" method="POST" enctype="multipart/form-data">

                <div class="card-header">
                    <h4 class="card-title mb-0">Admin Basic Info</h4>
                    <div class="card-options">
                        <a class="card-options-collapse" href="edit-profile.html#" data-bs-toggle="card-collapse"><i
                                class="fe fe-chevron-up"></i></a><a class="card-options-remove"
                            href="edit-profile.html#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 d-none">
                            <div class="mb-3">
                                <label class="form-label">Company Name</label>
                                <input class="form-control" type="text" placeholder="Company Name" id="company_name"
                                    name="company_name" value="<?= $card->company_name ?? '' ?>" />
                            </div>
                        </div>




                        <div class="col-sm-6 col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label"> Icon</label>

                                <!-- Input + Browse button -->
                                <div class="input-group mb-2">
                                    <input type="text" id="companyIconName" class="form-control"
                                        placeholder="No file chosen" readonly
                                        value="<?= !empty($card->web_icon) ? basename($card->web_icon) : '' ?>">
                                    <button class="btn btn-primary rounded-end   z-1 " type="button"
                                        onclick="document.getElementById('company_icon').click();">
                                        Browse
                                    </button>
                                    <input type="file" class="d-none" id="company_icon" name="company_icon"
                                        accept="image/*"
                                        onchange="updateFileNameAndPreview(this, 'companyIconName', 'companyIconPreview', 'companyIconRemove')">
                                    <input type="hidden" name="remove_company_icon" id="remove_company_icon" value="0">

                                </div>

                                <!-- Preview container -->
                                <div class="d-inline-block position-relative">
                                    <img id="companyIconPreview"
                                        src="<?= !empty($card->web_icon) ? base_url($card->web_icon) : '' ?>"
                                        style="width:80px; height:80px; object-fit:contain; border:none; <?= empty($card->web_icon) ? 'display:none;' : '' ?>">

                                    <!-- Remove/X button outside container -->
                                    <button type="button" id="companyIconRemove"
                                        style="position:absolute; top:-10px; right:-20px; border:none; background:none; font-size:20px; color:#fe6a49; display: <?= empty($card->web_icon) ? 'none' : 'block' ?>; cursor:pointer;"
                                        onclick="removeFileWithPreview('company_icon','companyIconName','companyIconPreview','companyIconRemove')">
                                        &times;
                                    </button>
                                </div>
                            </div>


                        </div>




                        <div class="col-sm-6 col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Light Logo</label>

                                <!-- Input + Browse button -->
                                <div class="input-group mb-2">
                                    <input type="text" id="companyLogoName" class="form-control"
                                        placeholder="No file chosen" readonly
                                        value="<?= !empty($card->company_logo) ? basename($card->company_logo) : '' ?>">
                                    <button class="btn btn-primary rounded-end z-1" type="button"
                                        onclick="document.getElementById('company_logo').click();">
                                        Browse
                                    </button>
                                    <input type="file" class="d-none" id="company_logo" name="company_logo"
                                        accept="image/*"
                                        onchange="updateFileNameAndPreview(this, 'companyLogoName', 'companyLogoPreview', 'companyLogoRemove')">
                                    <input type="hidden" name="remove_company_logo" id="remove_company_logo" value="0">

                                </div>

                                <!-- Preview container -->
                                <div class="d-inline-block position-relative">
                                    <img id="companyLogoPreview"
                                        src="<?= !empty($card->company_logo) ? base_url($card->company_logo) : '' ?>"
                                        style="margin-top:10px; width:120px; height:80px; object-fit:contain; border:none; <?= empty($card->company_logo) ? 'display:none;' : '' ?>">

                                    <!-- Remove/X button outside container -->
                                    <button type="button" id="companyLogoRemove"
                                        style="position:absolute; top:-10px; right:-10px; border:none; background:none; font-size:20px; color:#fe6a49; display: <?= empty($card->company_logo) ? 'none' : 'block' ?>; cursor:pointer;"
                                        onclick="removeFileWithPreview('company_logo','companyLogoName','companyLogoPreview','companyLogoRemove')">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Dark Logo</label>

                                <!-- Input + Browse button -->
                                <div class="input-group mb-2">
                                    <input type="text" id="companyDarkLogoName" class="form-control"
                                        placeholder="No file chosen" readonly
                                        value="<?= !empty($card->company_dark_logo) ? basename($card->company_dark_logo) : '' ?>">

                                    <button class="btn btn-primary rounded-end z-1" type="button"
                                        onclick="document.getElementById('company_dark_logo').click();">
                                        Browse
                                    </button>

                                    <input type="file" class="d-none" id="company_dark_logo" name="company_dark_logo"
                                        accept="image/*" onchange="updateFileNameAndPreview(
                       this,
                       'companyDarkLogoName',
                       'companyDarkLogoPreview',
                       'companyDarkLogoRemove'
                   )">
                                    <input type="hidden" name="remove_company_dark_logo" id="remove_company_dark_logo"
                                        value="0">

                                </div>

                                <!-- Preview container -->
                                <div class="d-inline-block position-relative">
                                    <img id="companyDarkLogoPreview"
                                        src="<?= !empty($card->company_dark_logo) ? base_url($card->company_dark_logo) : '' ?>"
                                        style="margin-top:10px; width:120px; height:80px; object-fit:contain; border:none;
                 <?= empty($card->company_dark_logo) ? 'display:none;' : '' ?>">

                                    <!-- Remove/X button -->
                                    <button type="button" id="companyDarkLogoRemove" style="position:absolute; top:-10px; right:-10px;
                           border:none; background:none;
                           font-size:20px; color:#fe6a49;
                           display: <?= empty($card->company_dark_logo) ? 'none' : 'block' ?>;
                           cursor:pointer;" onclick="removeFileWithPreview(
                        'company_dark_logo',
                        'companyDarkLogoName',
                        'companyDarkLogoPreview',
                        'companyDarkLogoRemove'
                    )">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-6 col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Profile Photo</label>

                                <!-- Input + Browse button -->
                                <div class="input-group mb-2">
                                    <input type="text" id="profilePhotoName" class="form-control"
                                        placeholder="No file chosen" readonly
                                        value="<?= !empty($card->profile_photo) ? basename($card->profile_photo) : '' ?>">
                                    <button class="btn btn-primary rounded-end   z-1" type="button"
                                        onclick="document.getElementById('profile_photo').click();">
                                        Browse
                                    </button>
                                    <input type="file" class="d-none" id="profile_photo" name="profile_photo"
                                        accept="image/*"
                                        onchange="updateFileNameAndPreview(this, 'profilePhotoName', 'profilePhotoPreview', 'profilePhotoRemove')">
                                    <input type="hidden" name="remove_profile_photo" id="remove_profile_photo"
                                        value="0">

                                </div>

                                <!-- Preview container -->
                                <div class="d-inline-block position-relative">
                                    <img id="profilePhotoPreview"
                                        src="<?= !empty($card->profile_photo) ? base_url($card->profile_photo) : '' ?>"
                                        style="margin-top:10px; width:120px; height:120px; border-radius:50%; object-fit:cover; border:none; <?= empty($card->profile_photo) ? 'display:none;' : '' ?>">

                                    <!-- Remove/X button outside container -->
                                    <button type="button" id="profilePhotoRemove"
                                        style="position:absolute; top:-10px; right:-10px; border:none; background:none; font-size:20px; color:#fe6a49; display: <?= empty($card->profile_photo) ? 'none' : 'block' ?>; cursor:pointer;"
                                        onclick="removeFileWithPreview('profile_photo','profilePhotoName','profilePhotoPreview','profilePhotoRemove')">
                                        &times;
                                    </button>
                                </div>
                            </div>

                        </div>



                        <div class="col-sm-6 col-md-4 ">
                            <div class="mb-3">
                                <label class="form-label">Web Title</label>
                                <input class="form-control" type="text" placeholder="Enter Website Title" id="web_title"
                                    name="web_title" value="<?= $card->web_title ?? '' ?>" />
                            </div>
                        </div>


                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input class="form-control" type="text" placeholder="Full Name" id="full_name"
                                    value="<?= $card->person_name ?? '' ?>" name="full_name" required />
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Email </label>
                                <input class="form-control" type="email" placeholder=" Email" name="email"
                                    value="<?= $registered->email ?? '' ?>" readonly />
                            </div>
                        </div>


                        <!-- Facebook -->
                        <div class="col-sm-6 col-md-6 ">
                            <div class="mb-3">
                                <label class="form-label">Facebook Link</label>
                                <input class="form-control" type="text" placeholder="Facebook link" id="facebook_link"
                                    name="facebook_link" value="<?= $card->facebook ?? '' ?>" />
                            </div>
                        </div>
                        <!-- X / Twitter -->
                        <div class="col-sm-6 col-md-6 d-none ">
                            <div class="mb-3">
                                <label class="form-label">Internet Search</label>
                                <input class="form-control" type="text" placeholder="X / Twitter link" id="twitter_link"
                                    name="twitter_link" value="<?= $card->internet_search ?? '' ?>" />
                            </div>
                        </div>

                        <!-- GitHub -->
                        <div class="col-sm-6 col-md-6 d-none">
                            <div class="mb-3">
                                <label class="form-label">GitHub Link</label>
                                <input class="form-control" type="text" placeholder="GitHub profile link"
                                    id="github_link" name="github_link" value="<?= $card->github ?? '' ?>" />
                            </div>
                        </div>


                        <!-- LinkedIn -->
                        <div class="col-sm-6 col-md-6 d-none ">
                            <div class="mb-3">
                                <label class="form-label">LinkedIn Link</label>
                                <input class="form-control" type="text" placeholder="LinkedIn link" id="linkedin_link"
                                    name="linkedin_link" value="<?= $card->linkedin ?? '' ?>" />
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 ">
                            <div class="mb-3">
                                <label class="form-label">Instagram Links </label>
                                <input class="form-control" type="text" placeholder="Instagram links"
                                    name="instagram_link" value="<?= $card->instagram ?? '' ?>" />
                            </div>
                        </div>



                        <div class="col-sm-6 col-md-4 d-none">
                            <div class="mb-3">
                                <label class="form-label">Whatsapp Number</label>
                                <input class="form-control" type="text" placeholder="Whatsapp Number " maxlength="13"
                                    name="whatsapp_contact" value="<?= $card->whatsapp_contact ?? '' ?>" />
                            </div>
                        </div>





                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Aadhar Number </label>
                                <input class="form-control" type="text" placeholder=" Aadhar Number"
                                    name="aadhar_number" value="<?= $card->aadhar_number ?? '' ?>" maxlength="12" />
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input class="form-control" type="text" placeholder="Address" name="address"
                                    value="<?= $card->address ?? '' ?>" />
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Contact Number</label>
                                <input class="form-control" type="text" placeholder="Contact Number " maxlength="13"
                                    name="contact_number" value="<?= $card->whatsapp_contact ?? '' ?>" />
                            </div>
                        </div>

                        <div class="col-md-12  ">
                            <div>
                                <label class="form-label">Whatsapp Message</label>
                                <textarea class="form-control" rows="4" placeholder="Enter About your Message"
                                    style="resize:none;" id="WhatsappMessage"
                                    name="WhatsappMessage"><?= $card->whatsapp_message ?? '' ?> </textarea>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit" id="whatsapp_message" name="update_Profile">
                        Update Profile
                    </button>
                </div>
            </form>

        </div>
    </div>








</div>



<script>
    function updateFileNameAndPreview(input, nameInputId, previewId, removeBtnId) {
        const fileNameInput = document.getElementById(nameInputId);
        const preview = document.getElementById(previewId);
        const removeBtn = document.getElementById(removeBtnId);

        // 🔁 Nayi file select hone par remove flag reset
        if (input.id === 'company_icon') {
            document.getElementById('remove_company_icon').value = '0';
        }
        if (input.id === 'profile_photo') {
            document.getElementById('remove_profile_photo').value = '0';
        }
        if (input.id === 'company_logo') {
            document.getElementById('remove_company_logo').value = '0';
        }
        if (input.id === 'company_dark_logo') {
            document.getElementById('remove_company_dark_logo').value = '0';
        }

        if (input.files && input.files[0]) {
            fileNameInput.value = input.files[0].name;

            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = "block";
                removeBtn.style.display = "block";
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            fileNameInput.value = '';
            preview.style.display = 'none';
            removeBtn.style.display = 'none';
        }
    }

    function removeFileWithPreview(fileInputId, nameInputId, previewId, removeBtnId) {
        document.getElementById(fileInputId).value = '';
        document.getElementById(nameInputId).value = '';
        document.getElementById(previewId).style.display = 'none';
        document.getElementById(removeBtnId).style.display = 'none';

        // 👇 Server ko signal bhejna
        if (fileInputId === 'company_icon') {
            document.getElementById('remove_company_icon').value = '1';
        }
        if (fileInputId === 'profile_photo') {
            document.getElementById('remove_profile_photo').value = '1';
        }
        if (fileInputId === 'company_logo') {
            document.getElementById('remove_company_logo').value = '1';
        }
        if (fileInputId === 'company_dark_logo') {
            document.getElementById('remove_company_dark_logo').value = '1';
        }
    }
</script>