<div class="dashboard-main-body">


    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Manage Eployee</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?= base_url('admin_playground'); ?>"
                    class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Manage Eployee
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Manage</li>
        </ul>
    </div>




    <div class="row">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive add-project custom-scrollbar">
                        <table id="studentTable"
                            class="display  table-bordered border card-table table-vcenter text-nowrap">
                            <thead class="bg-neutral-300">
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Employee UID</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Salary</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($students as $row): ?>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <img class="img-fluid table-avtar gallery-item rounded"
                                                src="<?= !empty($row->student_avatar) ? 'uploads/services/' . $row->student_avatar : 'uploads/default.jpeg'; ?>"
                                                data-caption="<?= $row->student_name; ?>" alt="Student Photo"
                                                style="height:32px; width:32px;">
                                            <?= $row->student_name; ?>
                                        </td>





                                        <td><?= $row->student_uid; ?></td>
                                        <td><?= $row->enrolled_class_section; ?></td>
                                        <td><?= $row->enrollment_year; ?></td>
                                        <td><?= $row->student_aapaar; ?></td>
                                        <td>
                                            <?php if ($row->student_profile_status == 'Active'): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>

                                        <!-- EDIT BUTTON -->
                                        <td class="text-end">
                                            <button class="btn btn-primary btn-xs editStudentBtn" data-id="<?= $row->id; ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editEnrolledStudentModal_<?= $row->id; ?>">
                                                <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon></button>


                                            <!-- PREVIEW BUTTON -->
                                            <button class="btn btn-info btn-xs editStudentBtn" data-id="<?= $row->id; ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#previewEnrolledStudentModal_<?= $row->id; ?>">
                                                <iconify-icon icon="majesticons:eye-line"
                                                    class="menu-icon"></iconify-icon></button>


                                            <!-- DELETE BUTTON -->
                                            <button class="btn btn-danger btn-xs" type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteEnrolledStudentModal_<?= $row->id; ?>">
                                                <iconify-icon icon="fluent:delete-24-regular"
                                                    class="menu-icon"></iconify-icon></button>

                                        </td>
                                    </tr>

                                    <!-- DELETE MODAL WITH CSRF FOR SAFETY FOR DUPLICATE ID FOR ATTACKER for using this $config['csrf_protection'] = TRUE;-->
                                    <div class="modal fade" id="deleteEnrolledStudentModal_<?= $row->id; ?>" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header border-0">
                                                    <h6 class="card-title text-danger">
                                                        Delete
                                                    </h6>

                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body text-center border-0">
                                                    <p>Are you sure you want to delete this Employee?</p>

                                                    <p><strong>Name:</strong>
                                                        <?= ucfirst(strtolower($row->student_name)); ?></p>
                                                    <p><strong>ID:</strong> <?= $row->id; ?></p>
                                                </div>

                                                <div class="modal-footer justify-content-center border-0">

                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                                        Cancel
                                                    </button>

                                                    <form action="<?= base_url('enrllStudentDataDelete') ?>" method="post">
                                                        <input type="hidden" name="studentEnrollId"
                                                            value="<?= $row->id; ?>">

                                                        <!-- CSRF (important if enabled in CodeIgniter First of all config.php  ON CSRF TRUE the use this csrf toke & get scrs hash) -->
                                                        <!-- <?php if (isset($this->security)): ?>
                                                                <input type="hidden"
                                                                    name="<?= $this->security->get_csrf_token_name(); ?>"
                                                                    value="<?= $this->security->get_csrf_hash(); ?>">
                                                            <?php endif; ?> -->

                                                        <button type="submit" class="btn btn-danger">
                                                            Yes, Delete
                                                        </button>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <!-- ======================= EDIT MODAL ======================= -->
                                    <div class="modal fade" id="editEnrolledStudentModal_<?= $row->id; ?>" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="card-title">Edit Employee Details</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="POST" action="<?= base_url('enroll_student_update'); ?>"
                                                        enctype="multipart/form-data">

                                                        <input type="hidden" name="enroll_student_id"
                                                            value="<?= $row->id; ?>">


                                                        <div class="row">

                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Employee
                                                                    Name</label>
                                                                <input type="text" class="form-control text-capitalize"
                                                                    name="student_name" placeholder="Enter Employee name"
                                                                    value="<?= $row->student_name; ?>" required>
                                                            </div>


                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Employee
                                                                    UID</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Employee UID " name="student_uid"
                                                                    value="<?= $row->student_uid; ?>" maxlength="25"
                                                                    readonly>
                                                            </div>

                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Joining
                                                                    Date</label>
                                                                <input type="date" class="form-control"
                                                                    name="admission_date"
                                                                    value="<?= date('Y-m-d', strtotime($row->joining_date)); ?>"
                                                                    placeholder="Enter Joining date" readonly>
                                                            </div>


                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Aadhar
                                                                    No.</label>
                                                                <input type="text" class="form-control" name="aadhar_id"
                                                                    value="<?= $row->student_aadhar; ?>" maxlength="12"
                                                                    placeholder="Enter Aadhar No.">
                                                            </div>

                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Salary
                                                                </label>
                                                                <input type="number" class="form-control" name="aapar_id"
                                                                    value="<?= $row->student_aapaar; ?>" maxlength="25"
                                                                    placeholder="Enter Salary">
                                                            </div>


                                                            <!-- IMPORTANT FIX:
Har modal ke andar same ID use karne se script kaam nahi karta.
Isliye unique ID use karo using row ID.
-->

                                                            <!-- Department -->
                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Department</label>
                                                                <select class="form-control" name="class_section"
                                                                    id="departmentSelect_<?= $row->id; ?>">

                                                                    <option value="">Select Department</option>

                                                                    <option value="IT Department"
                                                                        <?= ($row->enrolled_class_section == 'IT Department') ? 'selected' : ''; ?>>
                                                                        IT Department
                                                                    </option>

                                                                    <option value="Cleaning"
                                                                        <?= ($row->enrolled_class_section == 'Cleaning') ? 'selected' : ''; ?>>
                                                                        Cleaning
                                                                    </option>

                                                                    <option value="Sales"
                                                                        <?= ($row->enrolled_class_section == 'Sales') ? 'selected' : ''; ?>>
                                                                        Sales
                                                                    </option>

                                                                    <option value="Water Service Staff"
                                                                        <?= ($row->enrolled_class_section == 'Water Service Staff') ? 'selected' : ''; ?>>
                                                                        Water Service Staff
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <!-- Designation -->
                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Designation</label>
                                                                <select class="form-control" name="session_year"
                                                                    id="designationSelect_<?= $row->id; ?>">

                                                                    <!-- Current saved designation -->
                                                                    <option value="<?= $row->enrollment_year; ?>" selected>
                                                                        <?= !empty($row->enrollment_year) ? $row->enrollment_year : 'Select Designation'; ?>
                                                                    </option>

                                                                </select>
                                                            </div>
                                                            <script>
                                                                document.addEventListener("DOMContentLoaded", function () {

                                                                    const designationData = {
                                                                        "IT Department": [
                                                                            "IT Support",
                                                                            "Web Developer",
                                                                            "Software Developer",
                                                                            "Software Executive"
                                                                        ],
                                                                        "Cleaning": [
                                                                            "Cleaner",
                                                                            "Office Helper"
                                                                        ],
                                                                        "Sales": [
                                                                            "Sales Executive",
                                                                            "Sales Manager",
                                                                            "Marketing Executive"
                                                                        ],
                                                                        "Water Service Staff": [
                                                                            "Office Helper"
                                                                        ]
                                                                    };

                                                                    const departmentSelect = document.getElementById("departmentSelect_<?= $row->id; ?>");
                                                                    const designationSelect = document.getElementById("designationSelect_<?= $row->id; ?>");

                                                                    function loadDesignation(selectedDesignation = "") {
                                                                        const department = departmentSelect.value;

                                                                        // Reset designation dropdown
                                                                        designationSelect.innerHTML = '<option value="">Select Designation</option>';

                                                                        if (designationData[department]) {
                                                                            designationData[department].forEach(function (designation) {
                                                                                const option = document.createElement("option");
                                                                                option.value = designation;
                                                                                option.textContent = designation;

                                                                                // DB saved designation selected
                                                                                if (designation === selectedDesignation) {
                                                                                    option.selected = true;
                                                                                }

                                                                                designationSelect.appendChild(option);
                                                                            });
                                                                        }
                                                                    }

                                                                    // Department change
                                                                    departmentSelect.addEventListener("change", function () {
                                                                        loadDesignation();
                                                                    });

                                                                    // Page load edit mode
                                                                    loadDesignation("<?= $row->enrollment_year; ?>");

                                                                });
                                                            </script>




                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Gender</label>
                                                                <select class="form-control" name="gender">
                                                                    <option value="">Select Gender
                                                                    </option>
                                                                    <option value="male" <?= ($row->student_gender == 'male') ? 'selected' : ''; ?>>Male
                                                                    </option>
                                                                    <option value="female"
                                                                        <?= ($row->student_gender == 'female') ? 'selected' : ''; ?>>Female
                                                                    </option>
                                                                    <option value="other" <?= ($row->student_gender == 'other') ? 'selected' : ''; ?>>Other
                                                                    </option>
                                                                </select>
                                                            </div>


                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">DOB</label>
                                                                <input type="date" class="form-control" name="student_dob"
                                                                    value="<?= date('Y-m-d', strtotime($row->student_dob)); ?>"
                                                                    placeholder="Enter DOB">
                                                            </div>

                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Blood
                                                                    Group</label>
                                                                <input type="text" class="form-control" name="blood_group"
                                                                    maxlength="25" value="<?= $row->student_blood_group; ?>"
                                                                    placeholder="Enter Blood Group">
                                                            </div>


                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Email</label>
                                                                <input type="email" class="form-control" name="studenTemail"
                                                                    value="<?= $row->student_email; ?>"
                                                                    placeholder="Enter email">
                                                            </div>

                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Mobile</label>
                                                                <input type="text" class="form-control" name="mobile"
                                                                    value="<?= $row->student_contact; ?>" maxlength="13"
                                                                    placeholder="Enter Contact No.">
                                                            </div>


                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Father
                                                                    Name</label>
                                                                <input type="text" class="form-control text-capitalize"
                                                                    name="father_name"
                                                                    value="<?= $row->student_father_name; ?>"
                                                                    placeholder="Enter Father's name">
                                                            </div>

                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Father
                                                                    Contact
                                                                    No</label>
                                                                <input type="text" class="form-control" name="father_mobile"
                                                                    maxlength="13" value="<?= $row->father_contact_no; ?>"
                                                                    placeholder="Enter father's contact">
                                                            </div>

                                                            <!-- Status Dropdown -->
                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Status</label>
                                                                <select class="form-control" name="student_profile_status">
                                                                    <option value="">Select Status</option>

                                                                    <option value="Active"
                                                                        <?= ($row->student_profile_status == 'Active') ? 'selected' : ''; ?>>
                                                                        Active
                                                                    </option>

                                                                    <option value="Inactive"
                                                                        <?= ($row->student_profile_status == 'Inactive') ? 'selected' : ''; ?>>
                                                                        Inactive
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Last Updated Date</label>
                                                                <input type="text" class="form-control" name="updated_at"
                                                                    value="<?= date('Y-m-d h:i:s A', strtotime($row->db_enrollment_update)); ?>"
                                                                    readonly>
                                                            </div>


                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Permanent
                                                                    Address</label>
                                                                <textarea class="form-control text-capitalize" rows="2"
                                                                    name="permanent_address"><?= $row->permanent_address; ?></textarea>
                                                            </div>


                                                            <div class="mb-3 col-sm-6 col-md-4">
                                                                <label class="form-label">Correspondance
                                                                    Address</label>
                                                                <textarea class="form-control text-capitalize" rows="2"
                                                                    name="second_address"> <?= $row->correspondance_address; ?> </textarea>
                                                            </div>


                                                        </div>

                                                        <!-- PHOTO -->
                                                        <?php $id = $row->id; ?>

                                                        <div class="mb-3">
                                                            <label class="form-label">Employee Photo</label>

                                                            <!-- FILE INPUT -->
                                                            <input type="file" id="student_avatar_<?= $id ?>"
                                                                name="student_avatar" class="form-control"
                                                                onchange="previewImage(this, <?= $id ?>)">

                                                            <!-- IMAGE PREVIEW -->
                                                            <div class="mt-2">
                                                                <img id="avatarPreview_<?= $id ?>" src="<?= !empty($row->student_avatar)
                                                                      ? 'uploads/services/' . $row->student_avatar
                                                                      : 'uploads/default.jpeg'; ?>" alt="Avatar"
                                                                    style="width:100px;height:100px;object-fit:cover;border-radius:8px;border:1px solid #ddd;">
                                                            </div>

                                                            <!-- REMOVE BUTTON -->
                                                            <button type="button" class="btn btn-danger btn-sm mt-2"
                                                                onclick="removeImage(<?= $id ?>)">
                                                                Remove
                                                            </button>

                                                            <!-- HIDDEN INPUT -->
                                                            <input type="hidden" name="remove_avatar"
                                                                id="remove_avatar_<?= $id ?>" value="0">
                                                        </div>


                                                        <!-- PHOTO -->




                                                        <div class="text-end">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary ms-2">Update
                                                                Student</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ======================= PREVIEW MODAL ======================= -->
                                    <div class="modal fade" id="previewEnrolledStudentModal_<?= $row->id; ?>" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="card-title">Employee Detials</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="edit-profile">
                                                            <div class="row">
                                                                <div class="col-xl-4">
                                                                    <div class="card">

                                                                        <div class="card-body">
                                                                            <form>

                                                                                <div class="row mb-2">
                                                                                    <div class="profile-title">
                                                                                        <div
                                                                                            class="media d-flex align-items-center">

                                                                                            <!-- Employee Image -->
                                                                                            <img class="img-70 rounded me-3"
                                                                                                alt="Avatar"
                                                                                                src="<?= !empty($row->student_avatar)
                                                                                                    ? 'uploads/services/' . $row->student_avatar
                                                                                                    : 'uploads/default.jpeg'; ?>"
                                                                                                style="width:70px; height:70px; object-fit:cover;">

                                                                                            <!-- Employee Details -->
                                                                                            <div class="media-body">

                                                                                                <!-- Name -->
                                                                                                <h6
                                                                                                    class="mb-1 text-capitalize">
                                                                                                    <?= $row->student_name; ?>
                                                                                                </h6>

                                                                                                <!-- Department -->
                                                                                                <div>
                                                                                                    <strong><?= $row->enrolled_class_section; ?></strong>
                                                                                                </div>

                                                                                                <!-- Designation -->
                                                                                                <div>
                                                                                                    <strong><?= $row->enrollment_year; ?></strong>
                                                                                                </div>

                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Employee
                                                                                        UID</label>
                                                                                    <p class="form-control">
                                                                                        <?= $row->student_uid; ?>
                                                                                    </p>
                                                                                </div>



                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Date Of
                                                                                        Birth</label>
                                                                                    <p class="form-control">
                                                                                        <?= date('Y-m-d', strtotime($row->student_dob)); ?>
                                                                                    </p>
                                                                                    </p>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Gender</label>
                                                                                    <p class="form-control">
                                                                                        <?= ucfirst($row->student_gender); ?>
                                                                                    </p>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Blood
                                                                                        Group</label>
                                                                                    <p class="form-control">
                                                                                        <?= $row->student_blood_group; ?>
                                                                                    </p>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label">Email-Address</label>
                                                                                    <p class="form-control">
                                                                                        <?= $row->student_email; ?>
                                                                                    </p>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Contact
                                                                                        Number</label>
                                                                                    <p class="form-control">
                                                                                        <?= $row->student_contact; ?>
                                                                                    </p>
                                                                                </div>

                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-8">
                                                                    <form class="">

                                                                        <div class="card-body">
                                                                            <div class="row">


                                                                                <div class="col-sm-6 col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">Salary
                                                                                        </label>
                                                                                        <p
                                                                                            class="form-control text-capitalize">
                                                                                            <?= $row->student_aapaar; ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>


                                                                                <div class="col-sm-6 col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">Joining
                                                                                            Date</label>
                                                                                        <p class="form-control">
                                                                                            <?= date('Y-m-d', strtotime($row->joining_date)); ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>




                                                                                <div class="col-sm-6 col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">Aadhar
                                                                                            Number</label>
                                                                                        <p
                                                                                            class="form-control text-capitalize">
                                                                                            <?= $row->student_aadhar; ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>




                                                                                <div class="col-sm-6 col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">Father's
                                                                                            Name</label>
                                                                                        <p
                                                                                            class="form-control text-capitalize">
                                                                                            <?= $row->student_father_name; ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>



                                                                                <div class="col-sm-6 col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">Father's
                                                                                            Contact</label>
                                                                                        <p class="form-control">
                                                                                            <?= $row->father_contact_no; ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>


                                                                                <div class="col-sm-6 col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">Last
                                                                                            Update Date</label>
                                                                                        <p class="form-control">
                                                                                            <?= date('Y-m-d h:i:s A', strtotime($row->db_enrollment_update)); ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div>
                                                                                        <label class="form-label">Permanent
                                                                                            Address</label>
                                                                                        <textarea
                                                                                            class="form-control text-capitalize"
                                                                                            rows="2" style="resize:none;"
                                                                                            readonly><?= $row->permanent_address; ?></textarea>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div>
                                                                                        <label
                                                                                            class="form-label">Correspondance
                                                                                            Address</label>
                                                                                        <textarea
                                                                                            class="form-control text-capitalize"
                                                                                            rows="2" style="resize:none;"
                                                                                            readonly><?= $row->correspondance_address; ?></textarea>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
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


                                    <!-------------------------- IMAGE VIEWER MODAL ------------------ -->
                                    <div class="modal fade" id="imageModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content text-center">

                                                <div class="modal-header">
                                                    <h5 id="imageTitle"></h5>
                                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <!-- Zoom wrapper -->
                                                    <div id="zoomWrapper" style="overflow:hidden;">
                                                        <img id="modalImage" class="rounded"
                                                            style="width:100%;  transition:0.3s;">
                                                    </div>

                                                    <!-- Controls -->
                                                    <div class="mt-3">
                                                        <button id="prevBtn" class="btn btn-primary">Prev</button>
                                                        <button id="nextBtn" class="btn btn-primary">Next</button>

                                                        <button id="zoomIn" class="btn btn-success">+</button>
                                                        <button id="zoomOut" class="btn btn-warning">-</button>
                                                        <button id="resetZoom" class="btn btn-danger">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                <?php endforeach; ?>

                            </tbody>
                        </table>



                    </div>
                </div>

            </div>
        </div>


    </div>
</div>


</div>




<script>
    $(document).ready(function () {
        $('#studentTable').DataTable();
    });
</script>



<script>
    const DEFAULT_IMAGE = "uploads/default.jpeg"; // 👈 same as PHP

    function previewImage(input, id) {
        const preview = document.getElementById("avatarPreview_" + id);

        if (input.files && input.files[0]) {
            const file = input.files[0];

            // ✅ Image validation (optional but recommended)
            if (!file.type.startsWith("image/")) {
                sweetAlert(
                    'Invalid',
                    'Please Select a Valid Image File',
                    'error',

                );
                input.value = "";
                return;
            }

            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(file);
        }
    }

    function removeImage(id) {
        document.getElementById("avatarPreview_" + id).src = DEFAULT_IMAGE;
        document.getElementById("student_avatar_" + id).value = "";
        document.getElementById("remove_avatar_" + id).value = "1";
    }
</script>



<script>
    let images = [];
    let currentIndex = 0;
    let scale = 1;

    // CLICK (important fix)
    document.addEventListener('click', function (e) {

        if (e.target.classList.contains('gallery-item')) {

            // collect images fresh
            images = [];
            document.querySelectorAll('.gallery-item').forEach(function (el) {
                images.push({
                    src: el.src,
                    title: el.getAttribute('data-caption') || ''
                });
            });

            currentIndex = images.findIndex(img => img.src === e.target.src);
            scale = 1;

            showImage();

            new bootstrap.Modal(document.getElementById('imageModal')).show();
        }
    });

    function showImage() {
        let img = document.getElementById('modalImage');

        img.src = images[currentIndex].src;
        img.style.transform = "scale(1)";
        document.getElementById('imageTitle').innerText =
            images[currentIndex].title;
    }

    // NEXT
    document.getElementById('nextBtn').onclick = function () {
        currentIndex = (currentIndex + 1) % images.length;
        showImage();
    };

    // PREV
    document.getElementById('prevBtn').onclick = function () {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage();
    };

    // ZOOM
    document.getElementById('zoomIn').onclick = function () {
        scale += 0.2;
        document.getElementById('modalImage').style.transform = `scale(${scale})`;
    };

    document.getElementById('zoomOut').onclick = function () {
        scale = Math.max(1, scale - 0.2);
        document.getElementById('modalImage').style.transform = `scale(${scale})`;
    };

    document.getElementById('resetZoom').onclick = function () {
        scale = 1;
        document.getElementById('modalImage').style.transform = "scale(1)";
    };
    const wrapper = document.getElementById('zoomWrapper');
    const img = document.getElementById('modalImage');

    wrapper.addEventListener('mousemove', function (e) {

        if (scale <= 1) return; // zoom na ho to move nahi

        const rect = wrapper.getBoundingClientRect();

        let x = (e.clientX - rect.left) / rect.width;
        let y = (e.clientY - rect.top) / rect.height;

        // move range (-50% to 50%)
        let intensity = 30 / scale; // zoom jyada → movement kam
        let moveX = (x - 0.5) * intensity;
        let moveY = (y - 0.5) * intensity;

        img.style.transform = `scale(${scale}) translate(${-moveX}%, ${-moveY}%)`;
    });

    // MOUSE ZOOM
    document.getElementById('zoomWrapper').addEventListener('wheel', function (e) {
        e.preventDefault();

        scale += (e.deltaY < 0) ? 0.1 : -0.1;
        scale = Math.max(1, scale);

        document.getElementById('modalImage').style.transform = `scale(${scale})`;
    });
</script>