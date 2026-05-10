<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
<a href="javascript:history.back()"
   class="d-flex align-items-center gap-2 text-decoration-none">

    <iconify-icon icon="mdi:arrow-left"
        class="text-dark fs-4"></iconify-icon>

    <h6 class="fw-semibold mb-0 text-capitalize text-dark">
        Attendance Records
    </h6>

</a>        <ul class="d-flex align-items-center gap-2">
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
                            <h6 class="fw-semibold mb-0 text-capitalize"><?= $attendanceRecords[0]->employee_name; ?></h6>

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

                                                                <select class="form-control" name="attendance_status" readonly>

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