<!-- ======================= Services Page ======================= -->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>My Services</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin_playground') ?>">
                                <svg class="stroke-icon">
                                    <use href="modules/assets2/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('services'); ?>">My Service</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <!-- ADD NEW SERVICE BUTTON -->
                        <div class="card-body">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#addServiceModal">
                                Add New Service
                            </button>

                            <!-- ======================= INSERT MODAL ======================= -->
                            <div class="modal fade" id="addServiceModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">New Service</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form method="POST" action="<?= base_url('insert_service'); ?>"
                                                enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label class="form-label">Service Title</label>
                                                    <input type="text" class="form-control" name="service_title"
                                                        placeholder="Enter service title" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Service Description</label>
                                                    <textarea class="form-control" rows="4" name="service_paragraph"
                                                        placeholder="Enter service description" style="resize:none;"
                                                        required></textarea>
                                                </div>
                                                <div class="mb-3 position-relative">
                                                    <label class="form-label">Service Icon</label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" id="insertServiceIconName"
                                                            class="form-control" placeholder="No file chosen" readonly>
                                                        <button type="button" class="btn btn-primary rounded-end"
                                                            onclick="document.getElementById('insert_service_icon').click();">Browse</button>
                                                        <input type="file" class="d-none" id="insert_service_icon"
                                                            name="service_icon" accept="image/*"
                                                            onchange="updateFileNameAndPreview(this,'insertServiceIconName','insertServiceIconPreview','insertServiceIconRemove')">
                                                    </div>
                                                    <div class="d-inline-block position-relative">
                                                        <img id="insertServiceIconPreview"
                                                            style="width:80px;height:80px;object-fit:contain;display:none;">
                                                        <button type="button" id="insertServiceIconRemove"
                                                            onclick="removeFileWithPreview('insert_service_icon','insertServiceIconName','insertServiceIconPreview','insertServiceIconRemove')"
                                                            style="position:absolute;top:-10px;right:-20px;border:none;background:none;font-size:20px;color:#fe6a49;cursor:pointer;display:none;">&times;</button>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Service Project Count</label>
                                                    <input type="text" class="form-control"
                                                        name="service_project_count" placeholder="Number of projects"
                                                        required>
                                                </div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary ms-2">Save
                                                        Service</button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- ======================= TABLE ======================= -->
                        <div class="table-responsive add-project custom-scrollbar">
                            <table class="table card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Heading</th>
                                        <th>Description</th>
                                        <th>Projects Count</th>
                                        <th>Service Icon</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($service)): ?>
                                        <?php foreach ($service as $row): ?>
                                            <tr>
                                                <td><?= $row->id ?></td>
                                                <td><?= date('d M Y', strtotime($row->updated_date)) ?></td>
                                                <td><?= $row->heading ?></td>
                                                <td><?= $row->description ?></td>
                                                <td><?= $row->projects_count ?> Projects</td>
                                                <td>
                                                    <?php if ($row->service_icon): ?>
                                                        <img src="<?= base_url($row->service_icon) ?>"
                                                            style="width:40px;height:40px;object-fit:contain;">
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-end">
                                                    <!-- EDIT BUTTON -->
                                                    <button type="button" class="btn btn-primary btn-sm editServiceBtn"
                                                        data-bs-toggle="modal" data-bs-target="#editServiceModal"
                                                        data-id="<?= $row->id ?>"
                                                        data-title="<?= htmlspecialchars($row->heading) ?>"
                                                        data-desc="<?= htmlspecialchars($row->description) ?>"
                                                        data-count="<?= $row->projects_count ?>"
                                                        data-icon="<?= $row->service_icon ? base_url($row->service_icon) : '' ?>">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </button>

                                                        <!-- delete function modal here -->
                                                    <!-- DELETE BUTTON -->
                                                    <button class="btn btn-secondary" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal_<?= $row->id; ?>">
                                                        Delete
                                                    </button>

                                                    <!-- DELETE MODAL -->
                                                    <div class="modal fade" id="deleteModal_<?= $row->id; ?>" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content bg-dark ">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header border-0">
                                                                <h5 class="modal-title text-white ">Delete Row <?= $row->id; ?></h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <!-- Modal Body -->
                                                                <div class="modal-body text-center ">
                                                                    <p>Are you sure you want to delete this row? <br> This action
                                                                        cannot be undone.</p>
                                                                </div>

                                                                <!-- Modal Footer -->
                                                                <div class="modal-footer justify-content-center border-0">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <a href="<?= base_url('deleteService?id=' . $row->id); ?>"
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
                                            <td colspan="7" class="text-center text-muted">No services found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- ======================= EDIT MODAL ======================= -->
                        <div class="modal fade" id="editServiceModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Service</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">


                                        <form method="POST" action="<?= base_url('insert_service_update'); ?>"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="id" id="edit_service_id">
                                            <input type="hidden" name="remove_icon" id="remove_icon" value="0">


                                            <div class="mb-3">
                                                <label class="form-label">Service Title</label>
                                                <input type="text" class="form-control" name="service_title"
                                                    placeholder="Enter service title" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Service Description</label>
                                                <textarea class="form-control" rows="4" name="service_paragraph"
                                                    placeholder="Enter service description" style="resize:none;"
                                                    required></textarea>
                                            </div>

                                            <!-- ICON -->
                                            <div class="mb-3 position-relative">
                                                <label class="form-label">Service Icon</label>
                                                <div class="input-group mb-2">
                                                    <input type="text" id="editServiceIconName" class="form-control"
                                                        placeholder="No file chosen" readonly>
                                                    <button class="btn btn-primary rounded-end" type="button"
                                                        onclick="document.getElementById('edit_service_icon').click();">Browse</button>
                                                    <input type="file" class="d-none" id="edit_service_icon"
                                                        name="service_icon" accept="image/*"
                                                        onchange="updateFileNameAndPreview(this,'editServiceIconName','editServiceIconPreview','editServiceIconRemove')">
                                                </div>
                                                <div class="d-inline-block position-relative">
                                                    <img id="editServiceIconPreview"
                                                        style="width:80px;height:80px;object-fit:contain;display:none;">
                                                    <button type="button" id="editServiceIconRemove"
                                                        onclick="removeFileWithPreview('edit_service_icon','editServiceIconName','editServiceIconPreview','editServiceIconRemove')"
                                                        style="position:absolute;top:-10px;right:-20px;border:none;background:none;font-size:20px;color:#fe6a49;cursor:pointer;display:none;">&times;</button>
                                                </div>
                                                <small class="text-muted d-block mt-1">Leave empty to keep existing
                                                    icon</small>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Service Project Count</label>
                                                <input type="text" class="form-control" name="service_project_count"
                                                    placeholder="Number of projects" required>
                                            </div>

                                            <div class="text-end">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary ms-2">Update
                                                    Service</button>
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

    <!-- ======================= JS ======================= -->
    <script>
        /*
        ===================================================
        FILE SELECT → PREVIEW + NAME SHOW
        ===================================================
        */
        function updateFileNameAndPreview(input, nameInputId, previewId, removeBtnId) {
            const fileNameInput = document.getElementById(nameInputId);
            const preview = document.getElementById(previewId);
            const removeBtn = document.getElementById(removeBtnId);

            if (input.files && input.files[0]) {
                // filename show
                fileNameInput.value = input.files[0].name;

                // image preview
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    removeBtn.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);

                // 🔥 IMPORTANT: new image select → remove_icon reset
                const removeIconInput = document.getElementById('remove_icon');
                if (removeIconInput) {
                    removeIconInput.value = '0';
                }
            }
        }

        /*
        ===================================================
        REMOVE IMAGE (× BUTTON CLICK)
        ===================================================
        */
        function removeFileWithPreview(fileInputId, nameInputId, previewId, removeBtnId) {
            // file input clear
            document.getElementById(fileInputId).value = '';

            // filename clear
            document.getElementById(nameInputId).value = '';

            // preview hide
            const preview = document.getElementById(previewId);
            preview.src = '';
            preview.style.display = 'none';

            // remove button hide
            document.getElementById(removeBtnId).style.display = 'none';

            // 🔥🔥 MOST IMPORTANT: backend ko signal
            const removeIconInput = document.getElementById('remove_icon');
            if (removeIconInput) {
                removeIconInput.value = '1';
            }
        }

        /*
        ===================================================
        EDIT BUTTON CLICK → DATA FETCH INTO MODAL
        ===================================================
        */
        document.addEventListener('DOMContentLoaded', function () {

            document.querySelectorAll('.editServiceBtn').forEach(btn => {
                btn.addEventListener('click', function () {

                    // fetch data from button
                    const id = this.dataset.id;
                    const title = this.dataset.title;
                    const desc = this.dataset.desc;
                    const count = this.dataset.count;
                    const icon = this.dataset.icon;
                    const iconName = icon ? icon.split('/').pop() : '';

                    // set form values
                    document.getElementById('edit_service_id').value = id;
                    document.querySelector('#editServiceModal input[name="service_title"]').value = title;
                    document.querySelector('#editServiceModal textarea[name="service_paragraph"]').value = desc;
                    document.querySelector('#editServiceModal input[name="service_project_count"]').value = count;

                    // reset remove_icon on modal open
                    const removeIconInput = document.getElementById('remove_icon');
                    if (removeIconInput) {
                        removeIconInput.value = '0';
                    }

                    // icon preview handling
                    const preview = document.getElementById('editServiceIconPreview');
                    const nameInput = document.getElementById('editServiceIconName');
                    const removeBtn = document.getElementById('editServiceIconRemove');

                    if (icon) {
                        preview.src = icon;
                        preview.style.display = 'block';
                        nameInput.value = iconName;
                        removeBtn.style.display = 'block';
                    } else {
                        preview.src = '';
                        preview.style.display = 'none';
                        nameInput.value = '';
                        removeBtn.style.display = 'none';
                    }
                });
            });

        });
    </script>


</div>