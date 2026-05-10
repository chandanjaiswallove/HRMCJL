<?php
// =============================
// GET EMPLOYEE UID FROM URL
// =============================
$student_uid = $_GET['student_uid'] ?? '';

if (empty($student_uid)) {
    die('Employee UID Missing');
}

// =============================
// CODEIGNITER INSTANCE
// =============================
$CI =& get_instance();
$CI->load->database();

// =============================
// FETCH EMPLOYEE DETAILS
// =============================
$employee = $CI->db->query("
    SELECT * FROM student_directory 
    WHERE student_uid = ?
", [$student_uid])->row();

if (!$employee) {
    die('Employee Not Found');
}

// =============================
// BASIC SALARY
// =============================
$monthly_salary = (float)($employee->student_aapaar ?? 0);
$annual_salary  = $monthly_salary * 12;
$per_day_salary = $monthly_salary / 30;

// =============================
// CURRENT MONTH / YEAR
// =============================
$current_month_num  = date('m');
$current_month_name = date('F');
$current_year       = date('Y');

// =============================
// TOTAL PRESENT
// =============================
$total_present = $CI->db->query("
    SELECT COUNT(*) as total
    FROM employee_attendance
    WHERE employee_uid = ?
    AND MONTH(attendance_date) = ?
    AND YEAR(attendance_date) = ?
    AND attendance_status = 'Present'
", [$student_uid, $current_month_num, $current_year])->row()->total;

// =============================
// TOTAL ABSENT
// =============================
$total_absent = $CI->db->query("
    SELECT COUNT(*) as total
    FROM employee_attendance
    WHERE employee_uid = ?
    AND MONTH(attendance_date) = ?
    AND YEAR(attendance_date) = ?
    AND attendance_status = 'Absent'
", [$student_uid, $current_month_num, $current_year])->row()->total;

// =============================
// TOTAL LEAVE
// =============================
$total_leave = $CI->db->query("
    SELECT COUNT(*) as total
    FROM employee_attendance
    WHERE employee_uid = ?
    AND MONTH(attendance_date) = ?
    AND YEAR(attendance_date) = ?
    AND attendance_status = 'Leave'
", [$student_uid, $current_month_num, $current_year])->row()->total;





// =============================
// PAID DAYS = PRESENT + LEAVE
// =============================
$paid_days = $total_present + $total_leave;

// =============================
// ABSENT DEDUCTION
// =============================
$current_absent_deduction = round($total_absent * $per_day_salary);



// =============================
// TOTAL WORK DAYS
// =============================
$total_work_days = $total_present + $total_leave + $total_absent;

// =============================
// PAID DAYS (Present + Leave)
// =============================
$paid_days_total = $total_present + $total_leave;

// =============================
// EARNED SALARY
// =============================
$earned_amount = round($paid_days_total * $per_day_salary);

// =============================
// CURRENT MONTH TOTAL PAID
// =============================
$current_month_total_paid = (float)($CI->db->query("
    SELECT SUM(paid_amount) as total
    FROM employee_payroll
    WHERE employee_uid = ?
    AND salary_month = ?
    AND salary_year = ?
", [$student_uid, $current_month_name, $current_year])->row()->total ?? 0);

// =============================
// PENDING AMOUNT
// =============================
$pending_amount = max(0, $earned_amount - $current_month_total_paid);








// =============================
// EARNED SALARY
// =============================
$earned_salary = round($paid_days * $per_day_salary);

// =============================
// CURRENT MONTH PAID
// =============================
$current_paid = (float)($CI->db->query("
    SELECT SUM(paid_amount) as total
    FROM employee_payroll
    WHERE employee_uid = ?
    AND salary_month = ?
    AND salary_year = ?
", [$student_uid, $current_month_name, $current_year])->row()->total ?? 0);

// =============================
// CURRENT DUE
// =============================
$current_due = max(
    0,
    $earned_salary - $current_paid
);

// =============================
// TOTAL PAID
// =============================
$total_paid = (float)($CI->db->query("
    SELECT SUM(paid_amount) as total
    FROM employee_payroll
    WHERE employee_uid = ?
", [$student_uid])->row()->total ?? 0);

// =============================
// TOTAL DUE
// =============================
$total_due = (float)($CI->db->query("
    SELECT SUM(due_amount) as total
    FROM employee_payroll
    WHERE employee_uid = ?
", [$student_uid])->row()->total ?? 0);

// =============================
// TOTAL ADVANCE
// =============================
$total_advance = (float)($CI->db->query("
    SELECT SUM(advance_amount) as total
    FROM employee_payroll
    WHERE employee_uid = ?
", [$student_uid])->row()->total ?? 0);

// =============================
// TOTAL DEDUCTION
// =============================
$total_deduction = (float)($CI->db->query("
    SELECT SUM(deduction_amount) as total
    FROM employee_payroll
    WHERE employee_uid = ?
", [$student_uid])->row()->total ?? 0);

// =============================
// PAYROLL RECORDS
// =============================
$payrollRecords = $CI->db->query("
    SELECT * FROM employee_payroll
    WHERE employee_uid = ?
    ORDER BY id DESC
", [$student_uid])->result();

// =============================
// PAYROLL DEFAULT VALUES
// =============================
$paid_default = $earned_salary;
$due_default  = max(0, $earned_salary - $paid_default);

// =============================
// REQUIRED VARIABLES
// =============================
$student_uid = $_GET['student_uid'] ?? '';

$fetch_employee_uid = $student_uid;
?>
<div class="dashboard-main-body">

    <!-- ===================== PAGE HEADER ===================== -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Employee Dashboard</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?= base_url('admin_playground'); ?>"
                    class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Employee Dashboard</li>
        </ul>
    </div>


    <!-- ===================== DASHBOARD CARDS ===================== -->


    <!-- ===================== PAYROLL HEADER ===================== -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-32 mb-24">
    
    <!-- Left Side Title -->
    <h6 class="fw-semibold mb-0">Employee Payroll</h6>

    <!-- Right Side Payroll Button -->
    <button class="btn btn-primary d-flex align-items-center gap-2"
        data-bs-toggle="modal"
        data-bs-target="#payrollModal">

        <iconify-icon icon="mdi:cash-register" class="text-lg"></iconify-icon>
        <span>Payroll</span>

    </button>

</div>

    <!-- ===================== PAYROLL TABLE ===================== -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Payroll Records</h5>
        </div>

        <div class="card-body table-responsive">
            <table id="payrollTable" class="display table-bordered border card-table table-vcenter text-nowrap">

                <thead class="bg-neutral-300">
                    <tr>
                        <th>Month</th>
                        <th>Gross Salary</th>
                        <th>Deduction</th>
                        <th>Advance</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Payment Date</th>
                        <th>Mode</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($payrollRecords as $payroll): ?>
                        <tr>

                            <td><?= $payroll->salary_month . ' ' . $payroll->salary_year; ?></td>

                            <td>₹<?= number_format($payroll->gross_salary); ?></td>

                            <td>₹<?= number_format($payroll->deduction_amount); ?></td>

                            <td>₹<?= number_format($payroll->advance_amount); ?></td>

                            <td>₹<?= number_format($payroll->paid_amount); ?></td>

                            <td>₹<?= number_format($payroll->due_amount); ?></td>

                            <td><?= date('d-m-Y', strtotime($payroll->payment_date)); ?></td>

                            <td><?= $payroll->payment_mode; ?></td>

                            <td>
                                <?php if ($payroll->due_amount > 0): ?>
                                    <span class="badge bg-warning">Partial Paid</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Full Paid</span>
                                <?php endif; ?>
                            </td>

                            <td class="text-end">
                                <button class="btn btn-primary btn-xs"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editPayrollModal_<?= $payroll->id; ?>">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </button>
                            </td>

                            <div class="modal fade" id="editPayrollModal_<?= $payroll->id; ?>" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <form method="POST" action="<?= base_url('update_payroll_employee'); ?>">

            <input type="hidden" name="id" value="<?= $payroll->id; ?>">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Payroll</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                <div class="row">

    <!-- Paid Amount -->
    <div class="col-md-4 mb-3">
        <label>Paid Amount</label>
        <input type="number" name="paid_amount"
            class="form-control"
            value="<?= $payroll->paid_amount; ?>">
    </div>

    <!-- Payment Mode -->
    <div class="col-md-4 mb-3">
        <label>Payment Mode</label>
        <select name="payment_mode" class="form-control">
            <option value="Cash" <?= $payroll->payment_mode=='Cash'?'selected':''; ?>>Cash</option>
            <option value="Bank Transfer" <?= $payroll->payment_mode=='Bank Transfer'?'selected':''; ?>>Bank Transfer</option>
            <option value="UPI" <?= $payroll->payment_mode=='UPI'?'selected':''; ?>>UPI</option>
        </select>
    </div>

    <!-- Payment Date -->
    <div class="col-md-4 mb-3">
        <label>Payment Date</label>
        <input type="date" name="payment_date"
            class="form-control"
            value="<?= $payroll->payment_date; ?>">
    </div>

    <!-- Remarks (Full Width Next Line) -->
    <div class="col-12 mb-3">
        <label>Remarks</label>
        <input type="text" name="remarks"
            class="form-control"
            value="<?= $payroll->remarks; ?>">
    </div>

</div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>

            </div>
        </form>
    </div>
</div>

                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

</div>

<!-- ===================== PROCESS PAYROLL MODAL ===================== -->
<div class="modal fade" id="payrollModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-lg border-0 rounded-4">
<!-- Modal Header -->
<div class="modal-header bg-primary d-flex align-items-center justify-content-between">
    
    <h5 class="modal-title fw-bold text-white d-flex align-items-center gap-2 mb-0">
        <iconify-icon icon="mdi:cash-register" class="text-xl"></iconify-icon>
        <span>Process Payroll</span>
    </h5>

    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>

</div>


            <form method="POST" action="<?= base_url('process_payroll_employee'); ?>">
                <div class="modal-body">

                    <!-- Hidden Fields -->
                    <input type="text" name="employee_secretId" value="<?= htmlspecialchars($_GET['student_uid'] ?? ''); ?>">
                    <input type="hidden" name="employee_name" value="<?= $employee->student_name ?? ''; ?>">
                    <input type="hidden" name="department" value="<?= $employee->enrolled_class_section ?? ''; ?>">
                    <input type="hidden" name="designation" value="<?= $employee->enrollment_year ?? ''; ?>">

                    <?php
                    $paid_default = max(0, $monthly_salary - $current_absent_deduction);
                    $due_default  = max(0, $monthly_salary - $paid_default - $current_absent_deduction);
                    ?>

                    <div class="row">

                        <!-- Employee Name -->
                        <div class="col-md-6 mb-3">
                            <label class="fw-semibold">Employee Name</label>
                            <input type="text" class="form-control"
                                value="<?= $employee->student_name ?? ''; ?>" readonly>
                        </div>

                        <!-- Department -->
                        <div class="col-md-3 mb-3">
                            <label class="fw-semibold">Department</label>
                            <input type="text" class="form-control"
                                value="<?= $employee->enrolled_class_section ?? ''; ?>" readonly>
                        </div>

                        <!-- Designation -->
                        <div class="col-md-3 mb-3">
                            <label class="fw-semibold">Designation</label>
                            <input type="text" class="form-control"
                                value="<?= $employee->enrollment_year ?? ''; ?>" readonly>
                        </div>

                        <!-- Salary Month -->
                        <div class="col-md-3 mb-3">
                            <label class="fw-semibold">Salary Month</label>
                            <input type="text" name="salary_month" class="form-control"
                                value="<?= date('F'); ?>" >
                        </div>

                        <!-- Salary Year -->
                        <div class="col-md-3 mb-3">
                            <label class="fw-semibold">Salary Year</label>
                            <input type="text" name="salary_year" class="form-control"
                                value="<?= date('Y'); ?>" readonly>
                        </div>

                        <!-- Gross Salary -->
                        <div class="col-md-3 mb-3">
                            <label class="fw-semibold">Gross Salary</label>
                            <input type="number" name="gross_salary" id="gross_salary"
                                class="form-control"
                                value="<?= $monthly_salary; ?>" readonly>
                        </div>

                        <!-- Per Day Salary -->
                        <div class="col-md-3 mb-3">
                            <label class="fw-semibold">Per Day Salary</label>
                            <input type="text" class="form-control"
                                value="<?= number_format($per_day_salary, 2); ?>" readonly>
                        </div>

                        <!-- Present Days -->
                        <div class="col-md-4 mb-3">
                            <label class="fw-semibold">Present Days</label>
                            <input type="number" name="present_days"
                                class="form-control"
                                value="<?= $total_present; ?>" readonly>
                        </div>

                        <!-- Absent Days -->
                        <div class="col-md-4 mb-3">
                            <label class="fw-semibold">Absent Days</label>
                            <input type="number" name="absent_days"
                                class="form-control"
                                value="<?= $total_absent; ?>" readonly>
                        </div>

                        <!-- Leave Days -->
                        <div class="col-md-4 mb-3">
                            <label class="fw-semibold">Leave Days</label>
                            <input type="number" name="leave_days"
                                class="form-control"
                                value="<?= $total_leave; ?>" readonly>
                        </div>

                        <!-- Deduction -->
                        <div class="col-md-4 mb-3">
                            <label class="fw-semibold">Deduction Amount</label>
                            <input type="number" name="deduction_amount"
                                id="deduction_amount"
                                class="form-control"
                                value="<?= round($current_absent_deduction); ?>" readonly>
                        </div>

                        <!-- Advance -->
                        <div class="col-md-4 mb-3">
                            <label class="fw-semibold">Advance Amount</label>
                            <input type="number" name="advance_amount"
                                id="advance_amount"
                                class="form-control"
                                value="0" readonly>
                        </div>

                        <!-- Paid -->
                        <div class="col-md-4 mb-3">
                            <label class="fw-semibold">Paid Amount</label>
                            <input type="number" name="paid_amount"
                                id="paid_amount"
                                class="form-control"
                                value="<?= round($paid_default); ?>">
                        </div>

                        <!-- Due -->
                        <div class="col-md-4 mb-3">
                            <label class="fw-semibold">Due Amount</label>
                            <input type="number" name="due_amount"
                                id="due_amount"
                                class="form-control"
                                value="<?= round($due_default); ?>" readonly>
                        </div>

                        <!-- Payment Mode -->
                        <div class="col-md-4 mb-3">
                            <label class="fw-semibold">Payment Mode</label>
                            <select name="payment_mode" class="form-control">
                                <option value="Cash">Cash</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="UPI">UPI</option>
                            </select>
                        </div>

                        <!-- Payment Date -->
                        <div class="col-md-4 mb-3">
                            <label class="fw-semibold">Payment Date</label>
                            <input type="date" name="payment_date"
                                class="form-control"
                                value="<?= date('Y-m-d'); ?>">
                        </div>

                        <!-- Remarks -->
                        <div class="col-12 mb-3">
                            <label class="fw-semibold">Remarks</label>
                            <input type="text" name="remarks" class="form-control"
                                placeholder="Enter payroll remarks...">   
                        </div>

                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer bg-light">
                    <button type="submit" class="btn btn-success px-4">
                        Save Payroll
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>




<!-- ===================== AUTO CALCULATION SCRIPT ===================== -->
<script>
    $(document).ready(function () {

        function calculateDue() {
            let gross = parseFloat($('#gross_salary').val()) || 0;
            let deduction = parseFloat($('#deduction_amount').val()) || 0;
            let advance = parseFloat($('#advance_amount').val()) || 0;
            let paid = parseFloat($('#paid_amount').val()) || 0;

            let due = gross - deduction - advance - paid;
            if (due < 0) due = 0;

            $('#due_amount').val(due.toFixed(0));
        }

        $('#advance_amount, #paid_amount').on('keyup change', function () {
            calculateDue();
        });

    });
</script>

<!-- ===================== DATATABLE ===================== -->
<script>
    $(document).ready(function () {
        $('#payrollTable').DataTable({
            responsive: true,
            pageLength: 10
        });
    });
</script>



















































<!-- ///____________________________________??? -->



 <!-- Work records -->
  <!-- employee attendance records -->
   <div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
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
    </div>
    <div class="card">



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


                    <h6 class="fw-semibold mb-0"><?= $checklistsWork[0]->employee_name; ?></h6>


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

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Attendance Records</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?= base_url('admin_playground'); ?>"
                    class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium"> Attendances Records</li>
        </ul>
    </div>

    <div class="row">

        <div class="col-sm-12">
            <div class="card">

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
                            <h6 class="fw-semibold mb-0"><?= $attendanceRecords[0]->employee_name; ?></h6>

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
                                                                    name="check_in_time"
                                                                    value="<?= $row->check_in_time; ?>" readonly>
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

                                                                <select class="form-control" name="attendance_status" readonly  >

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

                                                                <input type="text" class="form-control" name="remarks" placeholder="remark.."
                                                                    value="<?= $row->remarks; ?>">
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








