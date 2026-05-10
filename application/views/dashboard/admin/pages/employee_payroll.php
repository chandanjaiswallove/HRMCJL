<div class="dashboard-main-body">

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














    <!-- EMPLOYEE PERSONAL DASHBOARD -->
    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">

        <!-- Monthly Salary -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-1 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Monthly Salary</p>
                            <h6 class="mb-0">₹18,000</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
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
                            <h6 class="mb-0">₹15,000</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:cash-check" class="text-white text-2xl mb-0"></iconify-icon>
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
                            <h6 class="mb-0">₹3,000</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-warning rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:cash-remove" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Pending this month</p>
                </div>
            </div>
        </div>

        <!-- Annual Salary -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Annual Salary</p>
                            <h6 class="mb-0">₹2,16,000</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:cash-multiple" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Yearly salary package</p>
                </div>
            </div>
        </div>

        <!-- Annual Paid -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-5 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Annual Paid</p>
                            <h6 class="mb-0">₹1,95,000</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:bank-check" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Total yearly paid</p>
                </div>
            </div>
        </div>

        <!-- Annual Due -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-6 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Annual Due</p>
                            <h6 class="mb-0">₹21,000</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-danger rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:calendar-clock" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Remaining yearly dues</p>
                </div>
            </div>
        </div>

        <!-- Advance Taken -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-7 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Advance Taken</p>
                            <h6 class="mb-0">₹12,000</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-warning rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:credit-card-fast" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Salary advance received</p>
                </div>
            </div>
        </div>

        <!-- Deduction -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-8 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Deduction / Penalty</p>
                            <h6 class="mb-0">₹4,500</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:cash-minus" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Absent / penalties</p>
                </div>
            </div>
        </div>

        <!-- Present Days -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-9 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Present</p>
                            <h6 class="mb-0">26 Days</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:calendar-check" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">This month attendance</p>
                </div>
            </div>
        </div>

        <!-- Absent Days -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-10 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Absent</p>
                            <h6 class="mb-0">4 Days</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-danger rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:calendar-remove" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">This month absence</p>
                </div>
            </div>
        </div>

        <!-- Leave Days -->
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-11 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Leave</p>
                            <h6 class="mb-0">3 Days</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:calendar-arrow-right"
                                class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Approved leave</p>
                </div>
            </div>
        </div>

        <!-- Overtime -->
        <!-- <div class="col">
            <div class="card shadow-none border bg-gradient-start-12 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Overtime</p>
                            <h6 class="mb-0">12 Hrs</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:clock-fast" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">Extra duty hours</p>
                </div>
            </div>
        </div> -->

    </div>












</div>

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

                                                                <select class="form-control" name="attendance_status" readonly disabled >

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