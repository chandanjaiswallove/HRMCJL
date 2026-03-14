<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Project </h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_playground') ?>">
                                <svg class="stroke-icon">
                                    <use href="modules/assets2/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item"> Dashboard </li>
                        <li class="breadcrumb-item active"> <a href="<?= base_url('Project'); ?>">Project</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>





    <!-- Container-fluid starts-->
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <!-- Button -->
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter1">
                                Add New Project
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">

                                        <!-- Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add New Project</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Body -->
                                        <div class="modal-body">

                                            <form method="POST" action="<?php echo base_url('insertPortProj'); ?>"
                                                enctype="multipart/form-data">
                                                <div class="border rounded p-3">
                                                    <div class="row">
                                                        <!-- FULL IMAGE -->
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label">Full Project Image</label>

                                                            <div class="input-group">
                                                                <input type="text" id="fullImageName"
                                                                    value="No file chosen" class="form-control"
                                                                    readonly>
                                                                <button class="btn btn-primary rounded-end"
                                                                    type="button"
                                                                    onclick="document.getElementById('fullImageFile').click()">Browse</button>
                                                                <input type="file" class="d-none" id="fullImageFile"
                                                                    name="full_project_image" accept="image/*"
                                                                    onchange="previewImage(this,'fullImageName','fullPreview','fullRemove')">
                                                            </div>

                                                            <div class="position-relative mt-2">
                                                                <img id="fullPreview"
                                                                    style="width:300px;display:none;border-radius:8px;">
                                                                <button type="button" id="fullRemove"
                                                                    class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                                                    style="display:none"
                                                                    onclick="removeImage('fullImageFile','fullImageName','fullPreview','fullRemove')">
                                                                    Remove
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <!-- TITLE -->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Project Title</label>
                                                            <input type="text" placeholder=" Project Title"
                                                                class="form-control" name="project_title" required>
                                                        </div>

                                                        <!-- LINK -->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Project Link</label>
                                                            <input type="url" placeholder=" Project link"
                                                                class="form-control" name="project_link" required>
                                                        </div>

                                                    </div>

                                                    <!-- TAGS -->
                                                    <div class="mb-3">
                                                        <label class="form-label">Project Tags</label>

                                                        <div id="tagWrapper">
                                                            <div class="d-flex mb-2">
                                                                <input type="text" name="project_tags[]"
                                                                    class="form-control me-2"
                                                                    placeholder="Ex: WordPress">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    onclick="removeTag(this)">Remove</button>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            onclick="addTag()">
                                                            + Add Tag
                                                        </button>
                                                    </div>

                                                </div>

                                                <!-- FOOTER -->
                                                <div class="text-end mt-3">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary ms-2">
                                                        Save Project
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive add-project custom-scrollbar">
                            <table class="table card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Project Photo</th>
                                        <th>Project Title</th>
                                        <th>Project Tags</th>
                                        <th>Project Links</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1;
                                    foreach ($portfolios as $row): ?>
                                        <tr>
                                            <td><?= $i++; ?></td>

                                            <td><?= date('d M Y', strtotime($row->created_at)); ?></td>

                                            <td>
                                                <img src="<?= base_url($row->full_image); ?>"
                                                    style="width:60px;height:40px;object-fit:cover;border-radius:6px;">
                                            </td>

                                            <td><?= $row->project_title; ?></td>

                                            <td>
                                                <?php foreach ($row->tags as $tag): ?>
                                                    <span class="badge bg-primary"><?= $tag->project_tags; ?></span>
                                                <?php endforeach; ?>
                                            </td>

                                            <td>
                                                <a href="<?= $row->project_link; ?>" target="_blank">
                                                    <?= $row->project_link; ?>
                                                </a>
                                            </td>

                                            <td class="text-end">

                                                <!-- EDIT -->
                                                <a class="btn btn-primary btn-sm editProjectBtn" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalCenter2" data-id="<?= $row->id; ?>"
                                                    data-title="<?= $row->project_title; ?>"
                                                    data-link="<?= $row->project_link; ?>" data-type="full"
                                                    data-full="<?= base_url($row->full_image); ?>"
                                                    data-tags='<?= json_encode(array_column($row->tags, 'project_tags')); ?>'>
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <!-- DELETE -->
                                                <button class="btn btn-secondary btn-sm" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#projectDelModal_<?= $row->id; ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                                <!-- DELETE MODAL -->
                                                <div class="modal fade" id="projectDelModal_<?= $row->id; ?>" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content bg-dark">

                                                            <div class="modal-header border-0">
                                                                <h5 class="modal-title text-white">
                                                                    Delete Row <?= $row->id; ?>
                                                                </h5>
                                                                <button class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <div class="modal-body text-center border-0">
                                                                Are you sure you want to delete this row?
                                                            </div>

                                                            <div class="modal-footer justify-content-center border-0">
                                                                <button class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <a href="<?= base_url('portfolioProjectRemove?id=' . $row->id); ?>"
                                                                    class="btn btn-primary">Yes, Delete</a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>



                            <!-- EDIT Project MODAL -->
                            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">

                                        <!-- HEADER -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Project</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- BODY -->
                                        <div class="modal-body">

                                            <form method="POST" action="<?php echo base_url('updatePortProj'); ?>"
                                                enctype="multipart/form-data">
                                                <input type="hidden" id="editProjectId" name="Project_id">
                                                <input type="hidden" name="remove_full_image" id="removeFullImage"
                                                    value="0">


                                                <!-- Full Image -->
                                                <div id="editFullBox" class="mb-3 d-none">
                                                    <label>Full Image</label>
                                                    <div class="input-group">
                                                        <input type="text" id="editFullName" class="form-control"
                                                            value="No file chosen" readonly>
                                                        <button class="btn btn-primary rounded-end" type="button"
                                                            onclick="document.getElementById('editFullFile').click()">Browse</button>
                                                        <input type="file" id="editFullFile" class="d-none"
                                                            name="full_project_image" accept="image/*"
                                                            onchange="previewImage(this,'editFullName','editFullPreview','editFullRemove')">
                                                    </div>
                                                    <div class="position-relative mt-2">
                                                        <img id="editFullPreview"
                                                            style="width:300px;border-radius:8px;">
                                                        <button id="editFullRemove" type="button"
                                                            class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                                            onclick="removeImage(
        'editFullFile',
        'editFullName',
        'editFullPreview',
        'editFullRemove',
        'removeFullImage'
    )">
                                                            Remove
                                                        </button>

                                                    </div>
                                                </div>



                                                <!-- Title & Link -->
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Project Title</label>
                                                        <input type="text" id="editTitle" class="form-control"
                                                            name="project_title" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Project Link</label>
                                                        <input type="url" id="editLink" class="form-control"
                                                            name="project_link" required>
                                                    </div>
                                                </div>

                                                <!-- Tags -->
                                                <div class="mb-3">
                                                    <label class="form-label">Project Tags</label>
                                                    <div id="editTagWrapper"></div>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        onclick="addEditTag()">+ Add Tag</button>
                                                </div>

                                                <!-- Footer -->
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary ms-2">Update
                                                        Project</button>
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

    <!-- Container-fluid starts-->
    <!-- Container-fluid starts-->




</div>



<!-- Container-fluid Ends-->
<!-- Container-fluid Ends-->

<!-- insert form-->
<!-- 
<script>
    function toggleImage(type) {
        document.getElementById('fullImageBox').classList.add('d-none');
        document.getElementById('smallImageBox').classList.add('d-none');

        if (type === 'full') {
            document.getElementById('fullImageBox').classList.remove('d-none');
        } else {
            document.getElementById('smallImageBox').classList.remove('d-none');
        }
    }

    function previewFull(input) {
        let reader = new FileReader();
        reader.onload = e => document.getElementById('fullPreview').src = e.target.result;
        reader.readAsDataURL(input.files[0]);
    }

    function previewSmall(input) {
        let reader = new FileReader();
        reader.onload = e => document.getElementById('smallPreview').src = e.target.result;
        reader.readAsDataURL(input.files[0]);
    }

    function addTag() {
        document.getElementById('tagWrapper').insertAdjacentHTML('beforeend', `
        <div class="d-flex mb-2">
            <input type="text" name="project_tags[]" class="form-control me-2">
            <button type="button" class="btn btn-secondary btn-sm" onclick="removeTag(this)">Remove</button>
        </div>
    `);
    }

    function removeTag(btn) {
        btn.parentElement.remove();
    }





    function toggleImage(type) {
        fullImageBox.classList.add('d-none');
        smallImageBox.classList.add('d-none');
        if (type === 'full') fullImageBox.classList.remove('d-none');
        else smallImageBox.classList.remove('d-none');
    }

    function previewImage(input, nameId, previewId, removeId) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById(previewId).src = e.target.result;
            document.getElementById(previewId).style.display = 'block';
            document.getElementById(removeId).style.display = 'block';
            document.getElementById(nameId).value = input.files[0].name;
        };
        reader.readAsDataURL(input.files[0]);
    }

    function removeImage(fileId, nameId, previewId, removeId) {
        document.getElementById(fileId).value = '';
        document.getElementById(nameId).value = '';
        document.getElementById(previewId).src = '';
        document.getElementById(previewId).style.display = 'none';
        document.getElementById(removeId).style.display = 'none';
    }

    /* EDIT FETCH */
    document.querySelectorAll('.editProjectBtn').forEach(btn => {
        btn.onclick = () => {
            editProjectId.value = btn.dataset.id;

            if (btn.dataset.type === 'full') {
                editFullBox.classList.remove('d-none');
                editSmallBox.classList.add('d-none');
                editFullPreview.src = btn.dataset.full;
            } else {
                editSmallBox.classList.remove('d-none');
                editFullBox.classList.add('d-none');
                editSmallPreview.src = btn.dataset.small;
            }
        }
    });
</script> -->

<script>
    // INSERT FORM ONLY
    function insertToggleImage(type) {
        document.getElementById('fullImageBox').classList.add('d-none');
        document.getElementById('smallImageBox').classList.add('d-none');

        if (type === 'full')
            document.getElementById('fullImageBox').classList.remove('d-none');
        else
            document.getElementById('smallImageBox').classList.remove('d-none');
    }

    function insertPreviewImage(input, nameId, previewId, removeId) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById(previewId).src = e.target.result;
            document.getElementById(previewId).style.display = 'block';
            document.getElementById(removeId).style.display = 'block';
            document.getElementById(nameId).value = input.files[0].name;
        };
        reader.readAsDataURL(input.files[0]);
    }

    function insertRemoveImage(fileId, nameId, previewId, removeId) {
        document.getElementById(fileId).value = '';
        document.getElementById(nameId).value = '';
        document.getElementById(previewId).src = '';
        document.getElementById(previewId).style.display = 'none';
        document.getElementById(removeId).style.display = 'none';
    }

    function addTag() {
        document.getElementById('tagWrapper').insertAdjacentHTML('beforeend', `
        <div class="d-flex mb-2">
            <input type="text" name="project_tags[]" class="form-control me-2">
            <button type="button" class="btn btn-secondary btn-sm" onclick="this.parentElement.remove()">Remove</button>
        </div>
        `);
    }
</script>

<!-- edit form -->
<!-- <script>
    // ==============================
    // 1️⃣ Image Preview
    // ==============================
    function previewImage(input, nameId, previewId, removeId) {
        if (!input.files || !input.files[0]) return;

        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById(previewId).src = e.target.result;
            document.getElementById(previewId).style.display = 'block';
            document.getElementById(removeId).style.display = 'block';
            document.getElementById(nameId).value = input.files[0].name;

            // 🔁 New image selected → remove flag reset
            document.getElementById('removeFullImage').value = '0';
        };
        reader.readAsDataURL(input.files[0]);
    }

    // ==============================
    // 2️⃣ Remove Image (DB + File)
    // ==============================
    function removeImage(fileId, nameId, previewId, removeId) {
        document.getElementById(fileId).value = '';
        document.getElementById(nameId).value = '';
        document.getElementById(previewId).src = '';
        document.getElementById(previewId).style.display = 'none';
        document.getElementById(removeId).style.display = 'none';

        // ⭐ Backend ko signal
        document.getElementById('removeFullImage').value = '1';
    }

    // ==============================
    // 3️⃣ Tags Add / Remove
    // ==============================
    function addEditTag() {
        document.getElementById('editTagWrapper').insertAdjacentHTML('beforeend', `
            <div class="d-flex mb-2">
                <input type="text" name="project_tags[]" class="form-control me-2">
                <button type="button" class="btn btn-secondary btn-sm"
                    onclick="this.parentElement.remove()">Remove</button>
            </div>
        `);
    }

    // ==============================
    // 4️⃣ Edit Modal Data Load
    // ==============================
    document.querySelectorAll('.editProjectBtn').forEach(btn => {
        btn.addEventListener('click', () => {

            // Reset remove flag every time modal opens
            document.getElementById('removeFullImage').value = '0';

            // Basic data
            document.getElementById('editProjectId').value = btn.dataset.id;
            document.getElementById('editTitle').value = btn.dataset.title;
            document.getElementById('editLink').value = btn.dataset.link;

            // Show full image box
            const fullBox = document.getElementById('editFullBox');
            fullBox.classList.remove('d-none');

            // Image preview
            document.getElementById('editFullPreview').src = btn.dataset.full;
            document.getElementById('editFullPreview').style.display = 'block';
            document.getElementById('editFullName').value = btn.dataset.full.split('/').pop();
            document.getElementById('editFullRemove').style.display = 'block';

            // Tags
            const tagWrapper = document.getElementById('editTagWrapper');
            tagWrapper.innerHTML = '';

            JSON.parse(btn.dataset.tags || '[]').forEach(tag => {
                tagWrapper.insertAdjacentHTML('beforeend', `
                    <div class="d-flex mb-2">
                        <input type="text" name="project_tags[]" class="form-control me-2" value="${tag}">
                        <button type="button" class="btn btn-secondary btn-sm"
                            onclick="this.parentElement.remove()">Remove</button>
                    </div>
                `);
            });
        });
    });
</script> -->


<script>
    // ==============================
    // 1️⃣ Image Preview
    // ==============================
    function previewImage(input, nameId, previewId, removeId) {
        if (!input.files || !input.files[0]) return;

        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById(previewId).src = e.target.result;
            document.getElementById(previewId).style.display = 'block';
            document.getElementById(removeId).style.display = 'block';
            document.getElementById(nameId).value = input.files[0].name;

            document.getElementById('removeFullImage').value = '0';
        };
        reader.readAsDataURL(input.files[0]);
    }

    // ==============================
    // 2️⃣ Remove Image
    // ==============================
    function removeImage(fileId, nameId, previewId, removeId) {
        document.getElementById(fileId).value = '';
        document.getElementById(nameId).value = '';
        document.getElementById(previewId).src = '';
        document.getElementById(previewId).style.display = 'none';
        document.getElementById(removeId).style.display = 'none';

        document.getElementById('removeFullImage').value = '1';
    }

    // ==============================
    // 3️⃣ Add Tag
    // ==============================
    function addEditTag() {
        document.getElementById('editTagWrapper').insertAdjacentHTML('beforeend', `
            <div class="d-flex mb-2">
                <input type="text" name="project_tags[]" class="form-control me-2">
                <button type="button" class="btn btn-secondary btn-sm"
                    onclick="this.parentElement.remove()">Remove</button>
            </div>
        `);
    }

    // ==============================
    // 4️⃣ Edit Modal Load (FIXED)
    // ==============================
    document.querySelectorAll('.editProjectBtn').forEach(btn => {
        btn.addEventListener('click', () => {

            document.getElementById('removeFullImage').value = '0';

            document.getElementById('editProjectId').value = btn.dataset.id;
            document.getElementById('editTitle').value = btn.dataset.title;
            document.getElementById('editLink').value = btn.dataset.link;

            document.getElementById('editFullBox').classList.remove('d-none');

            const preview = document.getElementById('editFullPreview');
            const removeBtn = document.getElementById('editFullRemove');
            const nameInput = document.getElementById('editFullName');

            // ✅ IMAGE EXISTS?
            if (btn.dataset.full && btn.dataset.full !== '') {
                preview.src = btn.dataset.full;
                preview.style.display = 'block';
                removeBtn.style.display = 'block';
                nameInput.value = btn.dataset.full.split('/').pop();
            } else {
                preview.src = '';
                preview.style.display = 'none';
                removeBtn.style.display = 'none';
                nameInput.value = '';
            }

            // Tags
            const tagWrapper = document.getElementById('editTagWrapper');
            tagWrapper.innerHTML = '';

            JSON.parse(btn.dataset.tags || '[]').forEach(tag => {
                tagWrapper.insertAdjacentHTML('beforeend', `
                    <div class="d-flex mb-2">
                        <input type="text" name="project_tags[]" class="form-control me-2" value="${tag}">
                        <button type="button" class="btn btn-secondary btn-sm"
                            onclick="this.parentElement.remove()">Remove</button>
                    </div>
                `);
            });
        });
    });
</script>


<!-- <script>

    // 1️⃣ Common functions: image preview + remove
    function previewImage(input, nameId, previewId, removeId) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById(previewId).src = e.target.result;
            document.getElementById(previewId).style.display = 'block';
            document.getElementById(removeId).style.display = 'block';
            document.getElementById(nameId).value = input.files[0].name;
        };
        reader.readAsDataURL(input.files[0]);
    }

    function removeImage(fileId, nameId, previewId, removeId) {
        document.getElementById(fileId).value = '';
        document.getElementById(nameId).value = '';
        document.getElementById(previewId).src = '';
        document.getElementById(previewId).style.display = 'none';
        document.getElementById(removeId).style.display = 'none';
    }

    // 2️⃣ Tags (Add/Remove)
    function addEditTag() {
        document.getElementById('editTagWrapper').insertAdjacentHTML('beforeend', `
        <div class="d-flex mb-2">
            <input type="text" name="project_tags[]" class="form-control me-2">
            <button type="button" class="btn btn-secondary btn-sm" onclick="this.parentElement.remove()">Remove</button>
        </div>
    `);
    }

    // 3️⃣ Edit Modal fetch
    document.querySelectorAll('.editProjectBtn').forEach(btn => {
        btn.addEventListener('click', () => {

            // Basic Info
            document.getElementById('editProjectId').value = btn.dataset.id;
            document.getElementById('editTitle').value = btn.dataset.title;
            document.getElementById('editLink').value = btn.dataset.link;

            // Hide both image boxes first
            const fullBox = document.getElementById('editFullBox');
            const smallBox = document.getElementById('editSmallBox');
            fullBox.classList.add('d-none');
            smallBox.classList.add('d-none');

            // Show proper image
            if (btn.dataset.type === 'full') {
                fullBox.classList.remove('d-none');
                document.getElementById('editFullPreview').src = btn.dataset.full;
                document.getElementById('editFullName').value = btn.dataset.full.split('/').pop();
                document.getElementById('editFullRemove').style.display = 'block';
            } else {
                smallBox.classList.remove('d-none');
                document.getElementById('editSmallPreview').src = btn.dataset.small;
                document.getElementById('editSmallName').value = btn.dataset.small.split('/').pop();
                document.getElementById('editSmallRemove').style.display = 'block';
            }

            // Populate Tags
            const tagWrapper = document.getElementById('editTagWrapper');
            tagWrapper.innerHTML = '';
            JSON.parse(btn.dataset.tags || '[]').forEach(tag => {
                tagWrapper.insertAdjacentHTML('beforeend', `
                <div class="d-flex mb-2">
                    <input type="text" name="project_tags[]" class="form-control me-2" value="${tag}">
                    <button type="button" class="btn btn-secondary btn-sm" onclick="this.parentElement.remove()">Remove</button>
                </div>
            `);
            });
        });
    });
</script> -->