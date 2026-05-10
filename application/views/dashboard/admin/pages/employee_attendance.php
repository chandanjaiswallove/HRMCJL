<div class="dashboard-main-body">


    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Employee Attendance</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?= base_url('admin_playground'); ?>"
                    class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium"> Attendance</li>
        </ul>
    </div>

    <div class="row gy-4">

        <div class="col-md-12">
            <form class="card" action="<?= base_url('save_employee_attendance'); ?>" method="POST">

                <!-- <div class="card-header">
                    <h4 class="card-title mb-0">Employee Attendance Info</h4>
                </div> -->

                <div class="card-body">
                    <div class="row">

                        <!-- Search + Select Employee Same Line -->
                        <div class="col-md-12">
                            <div class="row">

                                <!-- Search Employee -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Search Employee</label>
                                        <input type="text" class="form-control" id="employeeSearch"
                                            placeholder="Search Name / UID">
                                    </div>
                                </div>

                                <!-- Select Employee -->
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Select Employee</label>
                                        <select class="form-control" name="employee_id" id="employeeSelect" required>

                                            <option value="">Select Employee</option>

                                            <?php foreach ($students as $emp): ?>

                                                <?php if ($emp->student_profile_status == 'Active'): ?>

                                                    <option value="<?= $emp->id; ?>" data-name="<?= $emp->student_name; ?>"
                                                        data-uid="<?= $emp->student_uid; ?>"
                                                        data-department="<?= $emp->enrolled_class_section; ?>"
                                                        data-designation="<?= $emp->enrollment_year; ?>">

                                                        <?= $emp->student_name; ?> (<?= $emp->student_uid; ?>)

                                                    </option>

                                                <?php endif; ?>

                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Readonly Employee Details -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Employee Name</label>
                                <input class="form-control" type="text" name="employee_name" id="employeeName" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Employee UID</label>
                                <input class="form-control" type="text" name="employee_uid" id="employeeUID" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Department</label>
                                <input class="form-control" type="text" name="department" id="department" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input class="form-control" type="text" name="designation" id="designation" readonly>
                            </div>
                        </div>

                        <!-- Attendance Date -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Attendance Date</label>
                                <input type="date" class="form-control" name="attendance_date" required>
                            </div>
                        </div>

                        <!-- Check In -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Check In Time</label>
                                <input type="time" step="1" class="form-control" name="check_in_time" required>
                            </div>
                        </div>

                        <!-- Check Out -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Check Out Time</label>
                                <input type="time" step="1" class="form-control" name="check_out_time">
                            </div>
                        </div>

                        <!-- Attendance Status -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label d-block">Attendance Status</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="attendance_status"
                                        value="Present" checked>
                                    <label class="form-check-label">Present</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="attendance_status"
                                        value="Absent">
                                    <label class="form-check-label">Absent</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="attendance_status" value="Leave">
                                    <label class="form-check-label">Leave</label>
                                </div>

                            </div>
                        </div>

                        <!-- Remarks -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" class="form-control" name="remarks"
                                    placeholder="Enter remarks">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">
                        Submit Attendance
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // ==========================
            // Employee Elements
            // ==========================
            const employeeSelect = document.getElementById('employeeSelect');
            const employeeSearch = document.getElementById('employeeSearch');

            const employeeName = document.getElementById('employeeName');
            const employeeUID = document.getElementById('employeeUID');
            const department = document.getElementById('department');
            const designation = document.getElementById('designation');

            // ==========================
            // Attendance Fields
            // ==========================
            const statusRadios = document.querySelectorAll('input[name="attendance_status"]');
            const checkInField = document.querySelector('input[name="check_in_time"]');
            const checkOutField = document.querySelector('input[name="check_out_time"]');

            // ==========================
            // Employee Auto Fill
            // ==========================
            if (employeeSelect) {
                employeeSelect.addEventListener('change', function () {

                    let selected = this.options[this.selectedIndex];

                    employeeName.value = selected.getAttribute('data-name') || '';
                    employeeUID.value = selected.getAttribute('data-uid') || '';
                    department.value = selected.getAttribute('data-department') || '';
                    designation.value = selected.getAttribute('data-designation') || '';

                });
            }

            // ==========================
            // Employee Search Filter
            // ==========================
            if (employeeSearch) {
                employeeSearch.addEventListener('keyup', function () {

                    let filter = this.value.toLowerCase();
                    let options = employeeSelect.options;

                    for (let i = 0; i < options.length; i++) {

                        let txt = options[i].text.toLowerCase();

                        if (txt.includes(filter) || options[i].value === "") {
                            options[i].style.display = '';
                        } else {
                            options[i].style.display = 'none';
                        }

                    }

                });
            }

            // ==========================
            // Attendance Status Logic
            // ==========================
            function toggleAttendanceFields() {

                let selectedStatus = document.querySelector('input[name="attendance_status"]:checked').value;

                if (selectedStatus === "Present") {

                    // Present
                    checkInField.required = true;
                    checkOutField.required = false;

                    checkInField.readOnly = false;
                    checkOutField.readOnly = false;

                } else {

                    // Absent / Leave
                    checkInField.required = false;
                    checkOutField.required = false;

                    checkInField.value = "";
                    checkOutField.value = "";

                    checkInField.readOnly = true;
                    checkOutField.readOnly = true;

                }
            }

            // Radio Change
            statusRadios.forEach(function (radio) {
                radio.addEventListener("change", toggleAttendanceFields);
            });

            // Default Load
            toggleAttendanceFields();

        });
    </script>


</div>