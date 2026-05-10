<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Dashboard</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?= base_url('admin_playground'); ?>"
                    class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Home</li>
        </ul>
    </div>

<div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">

    <!-- Total Employees -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Employees</p>
                        <h6 class="mb-0">150</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:account-group" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Company workforce</p>
            </div>
        </div>
    </div>

    <!-- Active Employees -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Active Employees</p>
                        <h6 class="mb-0">120</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:account-check" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Currently active employees</p>
            </div>
        </div>
    </div>

    <!-- Inactive Employees -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Inactive Employees</p>
                        <h6 class="mb-0">30</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-danger rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:account-off" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Inactive / resigned staff</p>
            </div>
        </div>
    </div>

    <!-- Total Monthly Salary -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-2 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Monthly Salary</p>
                        <h6 class="mb-0">₹8,50,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Monthly payroll budget</p>
            </div>
        </div>
    </div>

    <!-- Current Month Paid -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-2 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Current Month Paid</p>
                        <h6 class="mb-0">₹7,30,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-warning rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="fa6-solid:file-invoice-dollar" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Paid this month</p>
            </div>
        </div>
    </div>

    <!-- Monthly Due -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-2 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Monthly Due</p>
                        <h6 class="mb-0">₹1,20,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:cash-remove" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Pending monthly salary</p>
            </div>
        </div>
    </div>

    <!-- Total Annual Salary -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-3 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Annual Salary</p>
                        <h6 class="mb-0">₹1,02,00,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:cash-multiple" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Annual payroll budget</p>
            </div>
        </div>
    </div>

    <!-- Annual Paid -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-3 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Annual Paid</p>
                        <h6 class="mb-0">₹96,50,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:bank-check" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Total annual paid</p>
            </div>
        </div>
    </div>

    <!-- Annual Due -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-3 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Annual Due</p>
                        <h6 class="mb-0">₹5,50,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-warning rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:calendar-clock" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Pending yearly salary</p>
            </div>
        </div>
    </div>

    <!-- Advance Paid -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Advance Paid</p>
                        <h6 class="mb-0">₹8,25,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:credit-card-fast" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Employee advances</p>
            </div>
        </div>
    </div>

    <!-- Deduction / Penalty -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-3 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Deduction / Penalty</p>
                        <h6 class="mb-0">₹2,80,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-danger rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:cash-minus" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Absent penalties</p>
            </div>
        </div>
    </div>


        <!-- Deduction / Penalty Annual -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Deduction / A</p>
                        <h6 class="mb-0">₹2,80,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-danger rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:cash-minus" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Absent penalties</p>
            </div>
        </div>
    </div>

    <!-- Total Present -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-2 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Present</p>
                        <h6 class="mb-0">2,850</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:calendar-check" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Attendance days</p>
            </div>
        </div>
    </div>

    <!-- Total Absent -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Absent</p>
                        <h6 class="mb-0">320</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-warning rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:calendar-remove" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Absent days</p>
            </div>
        </div>
    </div>

    <!-- Total Leave -->
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-3 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Leave</p>
                        <h6 class="mb-0">540</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:calendar-arrow-right" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Approved leave days</p>
            </div>
        </div>
    </div>



</div>


    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">All Employees</h6>

        </div>

        <div class="row">

            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive custom-scrollbar">

                            <table id="attendanceTable"
                                class="display  table-bordered border card-table table-vcenter text-nowrap">

                                <thead class="bg-neutral-300">
                                    <tr>
                                        <th>Employee</th>
                                        <th>UID</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($students as $row): ?>
                                        <?php if ($row->student_profile_status != 'Active')
                                            continue; ?>

                                        <tr>

                                            <!-- Employee -->
                                            <td>
                                                <div class="d-flex align-items-center gap-2">

                                                    <img class="img-fluid table-avtar rounded" src="<?= !empty($row->student_avatar)
                                                        ? 'uploads/services/' . $row->student_avatar
                                                        : 'uploads/default.jpeg'; ?>" alt="Employee"
                                                        style="height:40px; width:40px; object-fit:cover;">

                                                    <div>
                                                        <strong><?= limit_text($row->student_name,15); ?></strong>
                                                    </div>

                                                </div>
                                            </td>

                                            <!-- UID -->
                                            <td>
                                                <?= $row->student_uid; ?>
                                            </td>

                                            <!-- Department -->
                                            <td>
                                                <?= $row->enrolled_class_section; ?>
                                            </td>

                                            <!-- Designation -->
                                            <td>
                                                <?= $row->enrollment_year; ?>
                                            </td>

                                            <!-- Action Buttons -->
                                            <td class="text-end">

                                                <!-- Attendance Records -->
                                                <a href="<?= base_url('employee_attendance_records?student_uid=' . $row->student_uid); ?>"
                                                    class="btn btn-success btn-sm">
                                                    Attendance
                                                </a>

                                                <!-- Employee Work Records -->
                                                <a href="<?= base_url('employee_checklist_records?student_uid=' . $row->student_uid); ?>"
                                                    class="btn btn-info btn-sm">
                                                    Work
                                                </a>

                                                <!-- Employee Dashboard -->
                                                <a href="<?= base_url('employee_dashboard?student_uid=' . $row->student_uid); ?>"
                                                    class="btn btn-primary btn-sm">
                                                    Dashboard
                                                </a>

                                            </td>

                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>


                            </table>

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

    <script>
        $(document).ready(function () {
            $('#attendanceTable').DataTable();
        });
    </script>



</div>