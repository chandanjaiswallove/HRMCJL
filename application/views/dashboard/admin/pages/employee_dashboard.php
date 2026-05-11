<?php
// ==========================================
// GET STUDENT UID FROM URL
// ==========================================
$student_uid = $_GET['student_uid'] ?? '';

if (empty($student_uid)) {
    echo "Invalid Employee";
    exit;
}

// ==========================================
// EMPLOYEE DETAILS
// ==========================================
$employee = $this->db
    ->where('student_uid', $student_uid)
    ->get('student_directory')
    ->row();

if (!$employee) {
    echo "Employee Not Found";
    exit;
}

// ==========================================
// MONTH + YEAR
// ==========================================
$current_month = date('F');
$current_year = date('Y');

$month_number = date('m', strtotime($current_month));

// ==========================================
// ATTENDANCE CALCULATION
// ==========================================
$this->db->where('employee_uid', $student_uid);
$this->db->where('MONTH(attendance_date)', $month_number);
$this->db->where('YEAR(attendance_date)', $current_year);

$attendanceRecords = $this->db
    ->get('employee_attendance')
    ->result();

$total_present = 0;
$total_absent = 0;
$total_leave = 0;

foreach ($attendanceRecords as $attendance) {

    if ($attendance->attendance_status == 'Present') {
        $total_present++;
    }

    if ($attendance->attendance_status == 'Absent') {
        $total_absent++;
    }

    if ($attendance->attendance_status == 'Leave') {
        $total_leave++;
    }
}

// ==========================================
// SALARY DETAILS
// ==========================================
$monthly_salary = $employee->monthly_salary ?? 0;

$days_in_month = date('t');

$per_day_salary = 0;

if ($days_in_month > 0) {

    $per_day_salary =
        $monthly_salary / $days_in_month;
}

$current_absent_deduction = $per_day_salary * $total_absent;

// ==========================================
// PREVIOUS PAYROLL
// ==========================================
$previousPayroll = $this->db
    ->where('employee_uid', $student_uid)
    ->order_by('id', 'DESC')
    ->get('employee_payroll')
    ->row();

$previous_due = 0;
$previous_advance = 0;

if ($previousPayroll) {

    $previous_due = $previousPayroll->due_amount ?? 0;

    $previous_advance = $previousPayroll->advance_amount ?? 0;
}

// ==========================================
// FINAL PAYABLE
// ==========================================
$final_payable_salary =
    $monthly_salary
    - $current_absent_deduction
    - $previous_advance
    + $previous_due;

if ($final_payable_salary < 0) {
    $final_payable_salary = 0;
}

// ==========================================
// PAYROLL RECORDS
// ==========================================
$payrollRecords = $this->db
    ->where('employee_uid', $student_uid)
    ->order_by('id', 'DESC')
    ->get('employee_payroll')
    ->result();

?>
<?php

// ==========================================
// MONTH + YEAR
// ==========================================
$current_month = date('F');
$current_year = date('Y');
$month_number = date('m');

// ==========================================
// MONTHLY SALARY
// ==========================================
$monthly_salary = $employee->monthly_salary ?? 0;

// ==========================================
// CURRENT MONTH PAYROLL
// ==========================================
$currentPayroll = $this->db
    ->where('employee_uid', $student_uid)
    ->where('salary_month', $current_month)
    ->where('salary_year', $current_year)
    ->get('employee_payroll')
    ->row();

$current_paid = 0;
$current_due = 0;
$current_advance = 0;
$current_absent_deduction = 0;

if ($currentPayroll) {

    $current_paid = $currentPayroll->paid_amount ?? 0;

    $current_due = $currentPayroll->due_amount ?? 0;

    $current_advance = $currentPayroll->advance_amount ?? 0;

    $current_absent_deduction =
        $currentPayroll->deduction_amount ?? 0;
}

// ==========================================
// ANNUAL CALCULATION
// ==========================================
$this->db->select_sum('paid_amount');
$this->db->where('employee_uid', $student_uid);

$paidData = $this->db
    ->get('employee_payroll')
    ->row();

$total_paid = $paidData->paid_amount ?? 0;


// TOTAL DUE
$this->db->select_sum('due_amount');
$this->db->where('employee_uid', $student_uid);

$dueData = $this->db
    ->get('employee_payroll')
    ->row();

$total_due = $dueData->due_amount ?? 0;


// TOTAL ADVANCE
$this->db->select_sum('advance_amount');
$this->db->where('employee_uid', $student_uid);

$advanceData = $this->db
    ->get('employee_payroll')
    ->row();

$total_advance =
    $advanceData->advance_amount ?? 0;


// TOTAL DEDUCTION
$this->db->select_sum('deduction_amount');
$this->db->where('employee_uid', $student_uid);

$deductionData = $this->db
    ->get('employee_payroll')
    ->row();

$total_deduction =
    $deductionData->deduction_amount ?? 0;


// ==========================================
// ATTENDANCE
// ==========================================
$total_present = $this->db
    ->where('employee_uid', $student_uid)
    ->where('attendance_status', 'Present')
    ->where('MONTH(attendance_date)', $month_number)
    ->where('YEAR(attendance_date)', $current_year)
    ->count_all_results('employee_attendance');

$total_absent = $this->db
    ->where('employee_uid', $student_uid)
    ->where('attendance_status', 'Absent')
    ->where('MONTH(attendance_date)', $month_number)
    ->where('YEAR(attendance_date)', $current_year)
    ->count_all_results('employee_attendance');

$total_leaves = $this->db
    ->where('employee_uid', $student_uid)
    ->where('attendance_status', 'Leave')
    ->where('MONTH(attendance_date)', $month_number)
    ->where('YEAR(attendance_date)', $current_year)
    ->count_all_results('employee_attendance');

$total_work_days =
    $total_present +
    $total_absent +
    $total_leaves;


// ==========================================
// ANNUAL SALARY
// ==========================================
$annual_salary = $monthly_salary * 12;

?>
<div class="dashboard-main-body">

    <!-- ===================== PAGE HEADER ===================== -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">


        <div class="d-flex align-items-center gap-2">

            <!-- Back Icon Clickable -->
            <a href="javascript:history.back()" class="text-decoration-none">
                <iconify-icon icon="mdi:arrow-left" class="text-dark fs-4">
                </iconify-icon>
            </a>

            <!-- Forward Icon Clickable -->
            <a href="javascript:history.forward()" class="text-decoration-none">
                <iconify-icon icon="mdi:arrow-right" class="text-dark fs-4">
                </iconify-icon>
            </a>
            <!-- Text Not Clickable -->
            <h6 class="fw-semibold mb-0 text-capitalize text-dark">
                <?= $employee->student_name ?? 'Employee'; ?>
            </h6>

        </div>

        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?= base_url('admin_playground'); ?>"
                    class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Employee </li>
        </ul>
    </div>
    <!-- ===================== EMPLOYEE PERSONAL DASHBOARD ===================== -->
    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">

        <!-- Monthly Salary -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-1 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Monthly Salary</p>
                            <h6 class="mb-0">₹<?= number_format($monthly_salary); ?></h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:wallet-outline" class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Current monthly salary</p>
                </div>
            </div>
        </div>

        <!-- Current Paid -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-2 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Current Paid</p>
                            <h6 class="mb-0">₹<?= number_format($current_paid); ?></h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:cash-check" class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Paid this month</p>
                </div>
            </div>
        </div>

        <!-- Current Due -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-3 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Current Due</p>
                            <h6 class="mb-0">₹<?= number_format($current_due); ?></h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-warning rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:cash-clock" class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Pending this month</p>
                </div>
            </div>
        </div>

        <!-- Deduction -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-5 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Deduction / Month</p>
                            <h6 class="mb-0">₹<?= number_format($total_deduction + $current_absent_deduction); ?></h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:cash-minus" class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Absent / penalties this month</p>
                </div>
            </div>
        </div>

        <!-- Advance Taken -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Advance Taken</p>
                            <h6 class="mb-0">₹<?= number_format($total_advance); ?></h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-warning rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:credit-card-fast-outline"
                                class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Salary advance received</p>
                </div>
            </div>
        </div>

        <!-- Annual Salary -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-1 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Annual Salary</p>
                            <h6 class="mb-0">₹<?= number_format($annual_salary); ?></h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:currency-inr" class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Yearly salary package</p>
                </div>
            </div>
        </div>

        <!-- Annual Paid -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-2 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Annual Paid</p>
                            <h6 class="mb-0">₹<?= number_format($total_paid); ?></h6>
                        </div>

                        <!-- Updated Icon -->
                        <div
                            class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:cash-check" class="text-white text-2xl"></iconify-icon>
                        </div>

                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Total yearly paid</p>
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
                            <h6 class="mb-0">₹<?= number_format($total_due); ?></h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-danger rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:calendar-alert" class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Remaining yearly dues</p>
                </div>
            </div>
        </div>

        <!-- Deduction Annual -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-5 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Deduction / Annual</p>
                            <h6 class="mb-0">₹<?= number_format($total_deduction + $current_absent_deduction); ?></h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:cash-remove" class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Absent / penalties this year</p>
                </div>
            </div>
        </div>

        <!-- Total Work Days -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Work Days</p>
                            <h6 class="mb-0"><?= $total_work_days; ?> Days</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:calendar-month-outline" class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">This month work days</p>
                </div>
            </div>
        </div>

        <!-- Total Present -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-1 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Present</p>
                            <h6 class="mb-0"><?= $total_present; ?> Days</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:calendar-check-outline" class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">This month attendance</p>
                </div>
            </div>
        </div>

        <!-- Total Leaves -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-2 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Leaves</p>
                            <h6 class="mb-0"><?= $total_leaves; ?> Days</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:calendar-arrow-right" class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">This month leaves</p>
                </div>
            </div>
        </div>

        <!-- Total Absent -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-3 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Absent</p>
                            <h6 class="mb-0"><?= $total_absent; ?> Days</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-danger rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:calendar-remove-outline" class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">This month absence</p>
                </div>
            </div>
        </div>

        <!-- Total Earned -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-5 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Earned</p>
                            <h6 class="mb-0">₹<?= number_format($total_deduction + $current_absent_deduction); ?></h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:cash-plus" class="text-white text-2xl"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">This month earned</p>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="dashboard-main-body">


    <!-- ===================================== -->
    <!-- PAYROLL TABLE -->
    <!-- ===================================== -->
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <!-- LEFT SIDE -->
            <h5 class="mb-0">Payroll Records</h5>

            <!-- RIGHT SIDE -->
            <button class="btn btn-success d-flex align-items-center gap-2" data-bs-toggle="modal"
                data-bs-target="#payrollModal">

                <iconify-icon icon="mdi:cash-register"></iconify-icon>

                <span>Process Payroll</span>

            </button>

        </div>

        <div class="card-body table-responsive">

            <table id="payrollTable" class="display table-bordered border card-table table-vcenter text-nowrap">

                <thead class="bg-neutral-300">

                    <tr>
                        <th>Month</th>
                        <th>Gross</th>
                        <th>Deduction</th>
                        <th>Previous Due</th>
                        <th>Previous Advance</th>
                        <th>Final Salary</th>
                        <th>Paid</th>
                        <th>Advance</th>
                        <!-- <th>Earned</th> -->
                        <th>Due</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($payrollRecords as $payroll): ?>

                        <tr>

                            <td>
                                <?= $payroll->salary_month . ' ' . $payroll->salary_year; ?>
                            </td>

                            <td>
                                ₹<?= number_format($payroll->gross_salary); ?>
                            </td>

                            <td>
                                ₹<?= number_format($payroll->deduction_amount); ?>
                            </td>

                            <td>
                                ₹<?= number_format($payroll->previous_due); ?>
                            </td>

                            <td>
                                ₹<?= number_format($payroll->previous_advance); ?>
                            </td>

                            <td>
                                ₹<?= number_format($payroll->final_payable_salary); ?>
                            </td>

                            <td>
                                ₹<?= number_format($payroll->paid_amount); ?>
                            </td>

                            <td>
                                ₹<?= number_format($payroll->advance_amount); ?>
                            </td>

                            <!-- <td>
                                ₹<?= number_format($payroll->earned_amount); ?>
                            </td> -->

                            <td>
                                ₹<?= number_format($payroll->due_amount); ?>
                            </td>

                            <td>
                                <?php if ($payroll->due_amount > 0): ?>

                                    <span class="badge bg-warning">
                                        Partial Paid
                                    </span>

                                <?php elseif ($payroll->advance_amount > 0): ?>

                                    <span class="badge bg-info">
                                        Advance Paid
                                    </span>

                                <?php else: ?>

                                    <span class="badge bg-success">
                                        Full Paid
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>
                                <?= date('d-m-Y', strtotime($payroll->payment_date)); ?>
                            </td>

                            <td>

                                <!-- EDIT BUTTON -->
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editPayrollModal_<?= $payroll->id; ?>">

                                    <iconify-icon icon="lucide:edit"></iconify-icon>

                                </button>


                                <!-- SEND BUTTON -->
                                <a href="<?= base_url('employee_payslip?employee_uid=' . $employee->student_uid); ?>"
                                    class="btn btn-success btn-sm">
                                    <iconify-icon icon="mdi:send"></iconify-icon>
                                </a>

                            </td>

                        </tr>

                        <!-- ===================================== -->
                        <!-- EDIT MODAL -->
                        <!-- ===================================== -->
                        <div class="modal fade" id="editPayrollModal_<?= $payroll->id; ?>" tabindex="-1">

                            <div class="modal-dialog modal-lg">

                                <form method="POST" action="<?= base_url('update_payroll_employee'); ?>">

                                    <input type="hidden" name="id" value="<?= $payroll->id; ?>">

                                    <div class="modal-content">

                                        <div class="modal-header bg-primary text-white">

                                            <h5 class="modal-title">
                                                Edit Payroll
                                            </h5>

                                            <button type="button" class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"></button>

                                        </div>

                                        <div class="modal-body">

                                            <div class="row">

                                                <!-- FINAL SALARY -->
                                                <div class="col-md-4 mb-3">

                                                    <label>Final Salary</label>

                                                    <input type="number" class="form-control"
                                                        value="<?= $payroll->final_payable_salary; ?>" readonly>

                                                </div>

                                                <!-- PAID AMOUNT -->
                                                <div class="col-md-4 mb-3">

                                                    <label>Paid Amount</label>

                                                    <input type="number" id="edit_paid_amount_<?= $payroll->id; ?>"
                                                        name="paid_amount" class="form-control"
                                                        value="<?= $payroll->paid_amount; ?>" onkeyup="editPayrollCalculation(
                                    <?= $payroll->id; ?>,
                                    <?= $payroll->final_payable_salary; ?>
                                )">

                                                </div>

                                                <!-- DUE AMOUNT -->
                                                <div class="col-md-4 mb-3">

                                                    <label>Due Amount</label>

                                                    <input type="number" id="edit_due_amount_<?= $payroll->id; ?>"
                                                        name="due_amount" class="form-control"
                                                        value="<?= $payroll->due_amount; ?>" readonly>

                                                </div>

                                                <!-- ADVANCE AMOUNT -->
                                                <div class="col-md-4 mb-3">

                                                    <label>Advance Amount</label>

                                                    <input type="number" id="edit_advance_amount_<?= $payroll->id; ?>"
                                                        name="advance_amount" class="form-control"
                                                        value="<?= $payroll->advance_amount; ?>" readonly>

                                                </div>

                                                <!-- PAYMENT MODE -->
                                                <div class="col-md-4 mb-3">

                                                    <label>Payment Mode</label>

                                                    <select name="payment_mode" class="form-control">

                                                        <option value="Cash" <?= ($payroll->payment_mode == 'Cash') ? 'selected' : ''; ?>>
                                                            Cash
                                                        </option>

                                                        <option value="Bank Transfer" <?= ($payroll->payment_mode == 'Bank Transfer') ? 'selected' : ''; ?>>
                                                            Bank Transfer
                                                        </option>

                                                        <option value="UPI" <?= ($payroll->payment_mode == 'UPI') ? 'selected' : ''; ?>>
                                                            UPI
                                                        </option>

                                                    </select>

                                                </div>

                                                <!-- PAYMENT DATE -->
                                                <div class="col-md-4 mb-3">

                                                    <label>Payment Date</label>

                                                    <input type="date" name="payment_date" class="form-control"
                                                        value="<?= $payroll->payment_date; ?>">

                                                </div>

                                                <!-- REMARKS -->
                                                <div class="col-12 mb-3">

                                                    <label>Remarks</label>

                                                    <input type="text" name="remarks" class="form-control"
                                                        value="<?= $payroll->remarks; ?>">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-success">

                                                Update Payroll

                                            </button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- ===================================== -->
<!-- PROCESS PAYROLL MODAL -->
<!-- ===================================== -->
<div class="modal fade" id="payrollModal" tabindex="-1">

    <div class="modal-dialog modal-xl">

        <div class="modal-content border-0 shadow">

            <div class="modal-header bg-primary text-white">

                <h5 class="modal-title">
                    Process Payroll
                </h5>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>

            </div>

            <form method="POST" action="<?= base_url('process_payroll_employee'); ?>">

                <div class="modal-body">

                    <input type="hidden" name="employee_uid" value="<?= $employee->student_uid; ?>">

                    <input type="hidden" name="employee_name" value="<?= $employee->student_name; ?>">

                    <input type="hidden" name="department" value="<?= $employee->enrolled_class_section; ?>">

                    <input type="hidden" name="designation" value="<?= $employee->enrollment_year; ?>">

                    <div class="row">

                        <!-- MONTH -->
                        <div class="col-md-3 mb-3">

                            <label>Salary Month</label>

                            <select name="salary_month" id="salary_month" class="form-control">

                                <?php
                                $months = [
                                    'January',
                                    'February',
                                    'March',
                                    'April',
                                    'May',
                                    'June',
                                    'July',
                                    'August',
                                    'September',
                                    'October',
                                    'November',
                                    'December'
                                ];

                                foreach ($months as $month):
                                    ?>

                                    <option value="<?= $month; ?>">
                                        <?= $month; ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <!-- YEAR -->
                        <div class="col-md-3 mb-3">

                            <label>Salary Year</label>

                            <input type="text" name="salary_year" id="salary_year" class="form-control"
                                value="<?= date('Y'); ?>">

                        </div>

                        <!-- GROSS -->
                        <div class="col-md-3 mb-3">

                            <label>Gross Salary</label>

                            <input type="number" name="gross_salary" id="gross_salary" class="form-control" readonly>

                        </div>
                        <!-- EARNED -->
                        <div class="col-md-3 mb-3">

                            <label>Earned Amount</label>

                            <input type="number" name="earned_amount" id="earned_amount" class="form-control" readonly>

                        </div>


                        <!-- FINAL -->
                        <div class="col-md-3 mb-3">

                            <label>Final Payable</label>

                            <input type="number" name="final_payable_salary" id="final_payable_salary"
                                class="form-control" readonly>

                        </div>

                        <!-- PRESENT -->
                        <div class="col-md-4 mb-3">

                            <label>Present Days</label>

                            <input type="number" name="present_days" id="present_days" class="form-control" readonly>

                        </div>

                        <!-- ABSENT -->
                        <div class="col-md-4 mb-3">

                            <label>Absent Days</label>

                            <input type="number" name="absent_days" id="absent_days" class="form-control" readonly>

                        </div>

                        <!-- LEAVE -->
                        <div class="col-md-4 mb-3">

                            <label>Leave Days</label>

                            <input type="number" name="leave_days" id="leave_days" class="form-control" readonly>

                        </div>

                        <!-- DEDUCTION -->
                        <div class="col-md-4 mb-3">

                            <label>Deduction</label>

                            <input type="number" name="deduction_amount" id="deduction_amount" class="form-control"
                                readonly>

                        </div>

                        <!-- PREVIOUS DUE -->
                        <div class="col-md-4 mb-3">

                            <label>Previous Due</label>

                            <input type="number" name="previous_due" id="previous_due" class="form-control" readonly>

                        </div>

                        <!-- PREVIOUS ADVANCE -->
                        <div class="col-md-4 mb-3">

                            <label>Previous Advance</label>

                            <input type="number" name="previous_advance" id="previous_advance" class="form-control"
                                readonly>

                        </div>

                        <!-- PAID -->
                        <div class="col-md-6 mb-3">

                            <label>Paid Amount</label>

                            <input type="number" name="paid_amount" id="paid_amount" class="form-control">

                        </div>

                        <!-- DUE -->
                        <div class="col-md-6 mb-3">

                            <label>Current Due</label>

                            <input type="number" name="due_amount" id="due_amount" class="form-control" readonly>

                        </div>

                        <!-- ADVANCE -->
                        <div class="col-md-6 mb-3">

                            <label>Advance Amount</label>

                            <input type="number" name="advance_amount" id="advance_amount" class="form-control"
                                readonly>

                        </div>

                        <!-- MODE -->
                        <div class="col-md-6 mb-3">

                            <label>Payment Mode</label>

                            <select name="payment_mode" class="form-control">

                                <option value="Cash">Cash</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="UPI">UPI</option>

                            </select>

                        </div>

                        <!-- DATE -->
                        <div class="col-md-6 mb-3">

                            <label>Payment Date</label>

                            <input type="date" name="payment_date" class="form-control" value="<?= date('Y-m-d'); ?>">

                        </div>

                        <!-- REMARKS -->
                        <div class="col-12 mb-3">

                            <label>Remarks</label>

                            <input type="text" name="remarks" class="form-control" value="<?= $payroll->remarks; ?>">

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-success">

                        Save Payroll

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>



<!-- Work records -->
<!-- employee attendance records -->
<div class="dashboard-main-body">
    <!-- <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Work Records</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?= base_url('admin_playground'); ?>"
                    class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium"> Work Records</li>
        </ul>
    </div> -->
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <!-- LEFT SIDE -->
            <h5 class="mb-0">Work Records</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table id="checklistDetailsTable"
                    class="display  table-bordered border card-table table-vcenter text-nowrap">

                    <?php
                    $fetch_employee_uid = $_GET['student_uid'] ?? '';

                    $checklistsWork = $this->db
                        ->where('employee_uid', $fetch_employee_uid)
                        ->order_by('id', 'DESC')
                        ->get('employee_task_checklist')
                        ->result();
                    ?>


                    <!-- <h6 class="fw-semibold mb-0"><?= $checklistsWork[0]->employee_name; ?></h6> -->


                    <thead class="bg-neutral-300">
                        <tr>
                            <th>Date</th>
                            <th>Shift</th>
                            <th>Area / Section</th>
                            <th>Task</th>
                            <th>Status</th>
                            <th>Task Remark</th>
                            <th>Employee Remark</th>
                            <th>Supervisor Remark</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $groupedTasks = [];

                        /* Group by date */
                        foreach ($checklistsWork as $row) {
                            $date = date('d-m-Y', strtotime($row->checklist_date));
                            $groupedTasks[$date][] = $row;
                        }
                        ?>

                        <?php foreach ($groupedTasks as $date => $tasks): ?>

                            <tr>

                                <!-- DATE -->
                                <td>
                                    <strong><?= $date; ?></strong>
                                </td>

                                <!-- SHIFT -->
                                <td>
                                    <?= !empty($tasks[0]->shift)
                                        ? $tasks[0]->shift
                                        : '-'; ?>
                                </td>

                                <!-- AREA / SECTION -->
                                <td>
                                    <?= !empty($tasks[0]->area_section)
                                        ? $tasks[0]->area_section
                                        : '-'; ?>
                                </td>

                                <!-- TASK LIST -->
                                <td>
                                    <?php foreach ($tasks as $task): ?>
                                        <div class="mb-2">
                                            <?= $task->task_name; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </td>

                                <!-- STATUS LIST -->
                                <td>
                                    <?php foreach ($tasks as $task): ?>
                                        <div class="mb-2">

                                            <?php if ($task->task_status == 'Done'): ?>
                                                <span class="badge bg-success">Done</span>

                                            <?php elseif ($task->task_status == 'Pending'): ?>
                                                <span class="badge bg-warning">Pending</span>

                                            <?php else: ?>
                                                <span class="badge bg-danger">Not Done</span>
                                            <?php endif; ?>

                                        </div>
                                    <?php endforeach; ?>
                                </td>

                                <!-- TASK REMARK -->
                                <td>

                                    <?php foreach ($tasks as $task): ?>

                                        <div class="mb-2">

                                            <?= !empty($task->task_remark)
                                                ? $task->task_remark
                                                : '-'; ?>

                                        </div>

                                    <?php endforeach; ?>

                                </td>


                                <!-- EMPLOYEE REMARK -->
                                <td>
                                    <?= !empty($tasks[0]->cleaner_remark)
                                        ? $tasks[0]->cleaner_remark
                                        : '-'; ?>
                                </td>

                                <!-- SUPERVISOR REMARK -->
                                <td>
                                    <?= !empty($tasks[0]->supervisor_remark)
                                        ? $tasks[0]->supervisor_remark
                                        : '-'; ?>
                                </td>

                                <!-- ACTION -->
                                <td class="text-end">

                                    <?php foreach ($tasks as $task): ?>

                                        <div class="mb-2">

                                            <!-- Edit -->
                                            <button class="btn btn-primary btn-xs" data-bs-toggle="modal"
                                                data-bs-target="#editModal_<?= $task->id; ?>">
                                                <iconify-icon icon="lucide:edit"></iconify-icon>
                                            </button>

                                            <!-- DELETE BUTTON -->
                                            <button class="btn btn-danger btn-xs" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal_<?= $task->id; ?>">
                                                <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                            </button>

                                        </div>

                                    <?php endforeach; ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>

                <?php foreach ($checklistsWork as $row): ?>

                    <div class="modal fade" id="editModal_<?= $row->id; ?>" tabindex="-1">

                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content">

                                <form action="<?= base_url('update_employee_task_checklist'); ?>" method="POST">

                                    <input type="hidden" name="id" value="<?= $row->id; ?>">

                                    <div class="modal-header">
                                        <h5 class="card-title">Edit Task</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <!-- SHIFT -->
                                        <label>Shift</label>
                                        <select name="shift" class="form-control">
                                            <option value="All Day" <?= ($row->shift == 'All Day') ? 'selected' : ''; ?>>All
                                                Day</option>
                                            <option value="Morning" <?= ($row->shift == 'Morning') ? 'selected' : ''; ?>>
                                                Morning</option>
                                            <option value="Evening" <?= ($row->shift == 'Evening') ? 'selected' : ''; ?>>
                                                Evening</option>
                                            <option value="Night" <?= ($row->shift == 'Night') ? 'selected' : ''; ?>>Night
                                            </option>
                                        </select>

                                        <!-- AREA -->
                                        <label class="mt-2">Area / Section</label>
                                        <input type="text" name="area_section" class="form-control"
                                            value="<?= $row->area_section; ?>">

                                        <!-- TASK NAME (READ ONLY) -->
                                        <label class="mt-2">Task</label>
                                        <input type="text" class="form-control" value="<?= $row->task_name; ?>" readonly>

                                        <!-- TASK REMARK -->
                                        <label class="mt-2">Task Remark</label>
                                        <textarea name="task_remark" class="form-control"
                                            rows="2"><?= $row->task_remark; ?></textarea>

                                        <!-- STATUS -->
                                        <label class="mt-2">Status</label>
                                        <select name="task_status" class="form-control">

                                            <option value="Done" <?= ($row->task_status == 'Done') ? 'selected' : ''; ?>>
                                                Done
                                            </option>

                                            <option value="Pending" <?= ($row->task_status == 'Pending') ? 'selected' : ''; ?>>
                                                Pending
                                            </option>

                                            <option value="Not Done" <?= ($row->task_status == 'Not Done') ? 'selected' : ''; ?>>
                                                Not Done
                                            </option>

                                        </select>

                                        <!-- EMPLOYEE REMARK -->
                                        <label class="mt-2">Employee Remark</label>
                                        <input type="text" name="cleaner_remark" class="form-control"
                                            value="<?= $row->cleaner_remark; ?>">

                                        <!-- SUPERVISOR REMARK -->
                                        <label class="mt-2">Supervisor Remark</label>
                                        <input type="text" name="supervisor_remark" class="form-control"
                                            value="<?= $row->supervisor_remark; ?>">

                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-primary">Update</button>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

                <?php foreach ($checklistsWork as $row): ?>

                    <div class="modal fade" id="deleteModal_<?= $row->id; ?>" tabindex="-1">

                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="card-title text-danger">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body text-center">

                                    <p>Are you sure you want to delete this task?</p>

                                    <strong><?= $row->task_name; ?></strong>

                                </div>

                                <div class="modal-footer justify-content-center">

                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                        Cancel
                                    </button>

                                    <a href="<?= base_url('delete_employee_task_checklist/' . $row->id); ?>"
                                        class="btn btn-danger">
                                        Delete
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

</div>


<!-- attendance records -->
<div class="dashboard-main-body">



    <div class="row">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- LEFT SIDE -->
                    <h5 class="mb-0">Attendance Records</h5>
                </div>
                <div class="card-body">

                    <div class="table-responsive custom-scrollbar">

                        <table id="attendanceTable"
                            class="display  table-bordered border card-table table-vcenter text-nowrap">

                            <?php

                            $fetch_employee_uid = $_GET['student_uid'] ?? '';
                            $attendanceRecords = $this->db->where('employee_uid', $fetch_employee_uid)
                                ->order_by('id', 'DESC')
                                ->get('employee_attendance')
                                ->result();
                            ?>
                            <!-- <h6 class="fw-semibold mb-0"><?= $attendanceRecords[0]->employee_name; ?></h6> -->

                            <thead class="bg-neutral-300">
                                <tr>
                                    <!-- <th>Employee</th> -->
                                    <th>Date</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($attendanceRecords as $row): ?>

                                    <tr>

                                        <!-- Employee -->
                                        <!-- <td>
                                            <div class="d-flex align-items-center gap-2">

                                                <img class="img-fluid table-avtar rounded" src="<?= !empty($row->student_avatar)
                                                    ? 'uploads/services/' . $row->student_avatar
                                                    : 'uploads/default.jpeg'; ?>" alt="Employee"
                                                    style="height:40px; width:40px; object-fit:cover;">

                                                <div>
                                                    <strong><?= $row->employee_name; ?></strong><br>
                                                    <small><?= $row->employee_uid; ?></small><br>
                                                    <small>
                                                        <?= $row->department; ?> |
                                                        <?= $row->designation; ?>
                                                    </small>
                                                </div>

                                            </div>
                                        </td> -->

                                        <!-- Date -->
                                        <td>
                                            <?= date('d-m-Y', strtotime($row->attendance_date)); ?>
                                        </td>

                                        <!-- Check In -->
                                        <td>
                                            <?= !empty($row->check_in_time)
                                                ? date('h:i:s A', strtotime($row->check_in_time))
                                                : '-'; ?>
                                        </td>

                                        <!-- Check Out -->
                                        <!-- Check Out -->
                                        <td>
                                            <?= !empty($row->check_out_time)
                                                ? date('h:i:s A', strtotime($row->check_out_time))
                                                : '<span class="text-warning">Pending</span>'; ?>
                                        </td>

                                        <!-- Status -->
                                        <!-- Attendance Status Column -->
                                        <td>
                                            <?php if ($row->attendance_status == 'Present'): ?>

                                                <?php if (empty($row->check_out_time) || $row->check_out_time == '00:00:00'): ?>

                                                    <span class="badge bg-warning text-dark">
                                                        Pending Checkout
                                                    </span>

                                                <?php else: ?>

                                                    <span class="badge bg-success">
                                                        Present
                                                    </span>

                                                <?php endif; ?>

                                            <?php elseif ($row->attendance_status == 'Absent'): ?>

                                                <span class="badge bg-danger">
                                                    Absent
                                                </span>

                                            <?php elseif ($row->attendance_status == 'Leave'): ?>

                                                <span class="badge bg-info">
                                                    Leave
                                                </span>

                                            <?php endif; ?>
                                        </td>










                                        <!-- Remarks -->
                                        <td>
                                            <?= !empty($row->remarks)
                                                ? $row->remarks
                                                : '-'; ?>
                                        </td>

                                        <!-- Action -->
                                        <td class="text-end">

                                            <!-- Edit -->
                                            <button class="btn btn-primary btn-xs" data-bs-toggle="modal"
                                                data-bs-target="#editAttendanceModal_<?= $row->id; ?>">

                                                <iconify-icon icon="lucide:edit"></iconify-icon>

                                            </button>

                                            <!-- Delete -->
                                            <!-- <button class="btn btn-danger btn-xs" data-bs-toggle="modal"
                                                data-bs-target="#deleteAttendanceModal_<?= $row->id; ?>">
                                                <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                            </button> -->

                                        </td>

                                    </tr>

                                    <!-- ===================== EDIT MODAL ===================== -->
                                    <div class="modal fade" id="editAttendanceModal_<?= $row->id; ?>" tabindex="-1">

                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="card-title">
                                                        Edit Attendance
                                                    </h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <form method="POST"
                                                        action="<?= base_url('update_employee_attendance'); ?>">

                                                        <input type="hidden" name="attendance_id" value="<?= $row->id; ?>">

                                                        <div class="row">

                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">
                                                                    Employee Name
                                                                </label>
                                                                <input type="text" class="form-control" name="employee_name"
                                                                    value="<?= $row->employee_name; ?>" readonly>
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">
                                                                    Attendance Date
                                                                </label>
                                                                <input type="date" class="form-control"
                                                                    name="attendance_date"
                                                                    value="<?= $row->attendance_date; ?>" readonly>
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">
                                                                    Check In
                                                                </label>
                                                                <input type="time" step="1" class="form-control"
                                                                    name="check_in_time" value="<?= $row->check_in_time; ?>"
                                                                    readonly>
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">
                                                                    Check Out
                                                                </label>
                                                                <input type="time" step="1" class="form-control"
                                                                    name="check_out_time"
                                                                    value="<?= $row->check_out_time; ?>">
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">
                                                                    Status
                                                                </label>

                                                                <select class="form-control" name="attendance_status"
                                                                    readonly>

                                                                    <option value="Present"
                                                                        <?= ($row->attendance_status == 'Present') ? 'selected' : ''; ?>>
                                                                        Present
                                                                    </option>

                                                                    <option value="Absent"
                                                                        <?= ($row->attendance_status == 'Absent') ? 'selected' : ''; ?>>
                                                                        Absent
                                                                    </option>

                                                                    <option value="Leave"
                                                                        <?= ($row->attendance_status == 'Leave') ? 'selected' : ''; ?>>
                                                                        Leave
                                                                    </option>

                                                                </select>
                                                            </div>

                                                            <div class="col-md-12 mb-3">
                                                                <label class="form-label">
                                                                    Remarks
                                                                </label>

                                                                <input type="text" class="form-control" name="remarks"
                                                                    placeholder="remark.." value="<?= $row->remarks; ?>">
                                                            </div>

                                                        </div>

                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">
                                                                Update Attendance
                                                            </button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- ===================== EDIT MODAL ===================== -->
                                    <div class="modal fade" id="editAttendanceModal_<?= $row->id; ?>" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="card-title">Edit Attendance</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <form method="POST"
                                                        action="<?= base_url('update_employee_attendance'); ?>">

                                                        <input type="hidden" name="attendance_id" value="<?= $row->id; ?>">

                                                        <div class="row">

                                                            <!-- Employee Name -->
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Employee Name</label>
                                                                <input type="text" class="form-control"
                                                                    value="<?= $row->employee_name; ?>" readonly>
                                                            </div>

                                                            <!-- Attendance Date -->
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Attendance Date</label>
                                                                <input type="date" class="form-control"
                                                                    value="<?= $row->attendance_date; ?>" readonly>
                                                            </div>

                                                            <!-- Check In -->
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Check In</label>
                                                                <input type="time" step="1" class="form-control"
                                                                    name="check_in_time" value="<?= $row->check_in_time; ?>"
                                                                    <?= ($row->attendance_status == 'Present') ? 'readonly' : 'readonly'; ?>>
                                                            </div>

                                                            <!-- Check Out -->
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Check Out</label>

                                                                <?php if ($row->attendance_status == 'Present'): ?>

                                                                    <input type="time" step="1" class="form-control"
                                                                        name="check_out_time"
                                                                        value="<?= ($row->check_out_time == '00:00:00') ? '' : $row->check_out_time; ?>">

                                                                <?php else: ?>

                                                                    <input type="time" step="1" class="form-control"
                                                                        value="<?= $row->check_out_time; ?>" readonly>

                                                                <?php endif; ?>

                                                            </div>

                                                            <!-- Status -->
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Status</label>

                                                                <select class="form-control" name="attendance_status"
                                                                    readonly disabled>

                                                                    <option value="Present"
                                                                        <?= ($row->attendance_status == 'Present') ? 'selected' : ''; ?>>
                                                                        Present
                                                                    </option>

                                                                    <option value="Absent"
                                                                        <?= ($row->attendance_status == 'Absent') ? 'selected' : ''; ?>>
                                                                        Absent
                                                                    </option>

                                                                    <option value="Leave"
                                                                        <?= ($row->attendance_status == 'Leave') ? 'selected' : ''; ?>>
                                                                        Leave
                                                                    </option>

                                                                </select>

                                                                <!-- Hidden actual value -->
                                                                <input type="hidden" name="attendance_status"
                                                                    value="<?= $row->attendance_status; ?>">
                                                            </div>

                                                            <!-- Remarks -->
                                                            <div class="col-md-12 mb-3">
                                                                <label class="form-label">Remarks</label>

                                                                <textarea class="form-control" name="remarks"
                                                                    rows="3"><?= $row->remarks; ?></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">
                                                                Update Attendance
                                                            </button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===================== DELETE MODAL ===================== -->
                                    <div class="modal fade" id="deleteAttendanceModal_<?= $row->id; ?>" tabindex="-1">

                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="card-title text-danger">
                                                        Delete Attendance
                                                    </h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>

                                                <div class="modal-body text-center">
                                                    <p>
                                                        Are you sure you want to delete this attendance record?
                                                    </p>

                                                    <strong>
                                                        <?= $row->employee_name; ?>
                                                    </strong>
                                                </div>

                                                <div class="modal-footer justify-content-center">

                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                                        Cancel
                                                    </button>

                                                    <a href="<?= base_url('delete_employee_attendance/' . $row->id); ?>"
                                                        class="btn btn-danger">
                                                        Delete
                                                    </a>

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



<script>
    $(document).ready(function () {
        $('#attendanceTable').DataTable();
    });
</script>


<script>
    $(document).ready(function () {
        $('#checklistDetailsTable').DataTable();
    });
</script>



<!-- ===================================== -->
<!-- DATATABLE -->
<!-- ===================================== -->
<script>
    $(document).ready(function () {

        $('#payrollTable').DataTable({
            responsive: true,
            pageLength: 10
        });

    });
</script>

<!-- ===================================== -->
<!-- LIVE MONTH FETCH -->
<!-- ===================================== -->
<script>
    $(document).ready(function () {

        loadPayrollData();

        $('#salary_month, #salary_year').on('change keyup', function () {

            loadPayrollData();

        });

        $('#paid_amount').on('keyup change', function () {

            calculateDue();

        });

        function loadPayrollData() {

            let salary_month = $('#salary_month').val();

            let salary_year = $('#salary_year').val();

            $.ajax({

                url: "<?= base_url('ajax_get_employee_payroll_data'); ?>",

                type: "POST",

                data: {

                    employee_uid: "<?= $student_uid; ?>",

                    salary_month: salary_month,

                    salary_year: salary_year

                },

                dataType: "json",
                success: function (response) {

                    if (response.status == 'exists') {

                        alert(response.message);

                        return;
                    }

                    $('#gross_salary').val(response.gross_salary);

                    $('#present_days').val(response.present_days);

                    $('#absent_days').val(response.absent_days);

                    $('#leave_days').val(response.leave_days);

                    $('#deduction_amount').val(response.deduction_amount);

                    $('#previous_due').val(response.previous_due);

                    $('#previous_advance').val(response.previous_advance);

                    $('#final_payable_salary').val(response.final_payable_salary);

                    $('#earned_amount').val(response.earned_amount);

                    $('#advance_amount').val(response.advance_amount);

                    $('#paid_amount').val(response.final_payable_salary);

                    calculateDue();
                }

            });

        }

        function calculateDue() {

            let final_salary =
                parseFloat($('#final_payable_salary').val()) || 0;

            let paid =
                parseFloat($('#paid_amount').val()) || 0;

            let due = 0;
            let advance = 0;

            // DUE
            if (paid < final_salary) {

                due = final_salary - paid;

            }

            // ADVANCE
            if (paid > final_salary) {

                advance = paid - final_salary;

            }

            $('#due_amount').val(due.toFixed(0));

            $('#advance_amount').val(advance.toFixed(0));
        }

    });
</script>
<script>

    function editPayrollCalculation(id, finalSalary) {
        let paid =
            parseFloat(
                $('#edit_paid_amount_' + id).val()
            ) || 0;

        let due = 0;
        let advance = 0;

        if (paid < finalSalary) {

            due = finalSalary - paid;

        }

        if (paid > finalSalary) {

            advance = paid - finalSalary;

        }

        $('#edit_due_amount_' + id).val(due.toFixed(0));

        $('#edit_advance_amount_' + id).val(advance.toFixed(0));
    }

</script>