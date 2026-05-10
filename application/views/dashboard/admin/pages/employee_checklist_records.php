<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
<a href="javascript:history.back()"
   class="d-flex align-items-center gap-2 text-decoration-none">

    <iconify-icon icon="mdi:arrow-left"
        class="text-dark fs-4"></iconify-icon>

    <h6 class="fw-semibold mb-0 text-capitalize text-dark">
        Work Records
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


                    <h6 class="fw-semibold mb-0 text-capitalize"><?= $checklistsWork[0]->employee_name; ?></h6>


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





<script>
    $(document).ready(function () {
        $('#checklistDetailsTable').DataTable();
    });
</script>