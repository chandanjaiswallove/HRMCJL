<div class="dashboard-main-body">

    <div class="row gy-4">

        <!-- ================= TASK CHECKLIST FORM ================= -->
        <div class="col-12">
            <form class="card" action="<?= base_url('insert_employee_task_checklist'); ?>" method="POST">

                <div class="card-header">
                    <h4 class="card-title mb-0">
                        Employee Daily Task Checklist
                    </h4>
                </div>

                <div class="card-body">

                    <!-- Employee Search + Select -->
                    <div class="row align-items-end">

                        <div class="col-md-2 mb-3">
                            <label class="form-label">Search</label>
                            <input type="text" id="employeeSearch" class="form-control" placeholder="Name / UID">
                        </div>

                        <div class="col-md-2 mb-3">
                            <label class="form-label">Employee</label>
                            <select class="form-control" id="employeeSelect" name="employee_id" required>

                                <option value="">Select Employee</option>

                                <?php foreach ($students as $emp): ?>
                                    <?php if ($emp->student_profile_status == 'Active'): ?>
                                        <option value="<?= $emp->id; ?>" data-name="<?= $emp->student_name; ?>"
                                            data-uid="<?= $emp->student_uid; ?>"
                                            data-department="<?= $emp->enrolled_class_section; ?>"
                                            data-designation="<?= $emp->enrollment_year; ?>">
                                            <?= $emp->student_name; ?>
                                            (<?= $emp->student_uid; ?>)
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" id="employeeName" name="employee_name" class="form-control" readonly>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label class="form-label">UID</label>
                            <input type="text" id="employeeUID" name="employee_uid" class="form-control" readonly>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label class="form-label">Department</label>
                            <input type="text" id="department" name="department" class="form-control" readonly>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" id="designation" name="designation" class="form-control" readonly>
                        </div>

                    </div>

                    <!-- Date + Shift + Area -->
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Checklist Date</label>
                            <input type="date" name="checklist_date" class="form-control" value="<?= date('Y-m-d'); ?>"
                                required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Shift</label>
                            <select class="form-control" name="shift">
                                <option value="All Day">All Day</option>
                                <option value="Morning">Morning</option>
                                <option value="Evening">Evening</option>
                                <option value="Night">Night</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Work Area / Section / Department Zone</label>
                            <input type="text" name="area_section" class="form-control"
                                placeholder="Work area, floor, office zone, department section">
                        </div>

                    </div>

                    <hr>

                    <!-- Dynamic Tasks -->
                    <div id="taskChecklistContainer">
                        <div class="text-muted">
                            Select employee to load assigned tasks.
                        </div>
                    </div>

                    <hr>

                    <!-- Remarks -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Employee Remark</label>
                            <textarea class="form-control" name="cleaner_remark" rows="3"
                                placeholder="Employee remark..."></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Supervisor Remark</label>
                            <textarea class="form-control" name="supervisor_remark" rows="3"
                                placeholder="Supervisor remark..."></textarea>
                        </div>
                    </div>

                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">
                        Save Daily Checklist
                    </button>
                </div>

            </form>
        </div>

    </div>

</div>

<script>
    // ================= EMPLOYEE SEARCH =================
    document.getElementById('employeeSearch').addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        let options = document.getElementById('employeeSelect').options;

        for (let i = 0; i < options.length; i++) {
            let txt = options[i].text.toLowerCase();

            if (txt.includes(filter) || options[i].value === '') {
                options[i].style.display = '';
            } else {
                options[i].style.display = 'none';
            }
        }
    });


    // ================= EMPLOYEE SELECT =================
    document.getElementById('employeeSelect').addEventListener('change', function () {

        let selected = this.options[this.selectedIndex];
        let employeeId = this.value;

        document.getElementById('employeeName').value =
            selected.getAttribute('data-name') || '';

        document.getElementById('employeeUID').value =
            selected.getAttribute('data-uid') || '';

        document.getElementById('department').value =
            selected.getAttribute('data-department') || '';

        document.getElementById('designation').value =
            selected.getAttribute('data-designation') || '';

        if (employeeId !== '') {

            fetch("<?= base_url('get_employee_tasks_ajax/'); ?>" + employeeId)
                .then(response => response.json())
                .then(data => {

                    let container = document.getElementById('taskChecklistContainer');
                    container.innerHTML = '';

                    if (data.length > 0) {

                        data.forEach(function (task, index) {

                            let row = document.createElement('div');
                            row.classList.add('row', 'align-items-end', 'mb-3');

                            row.innerHTML = `
                            <div class="col-md-5">
                                <label class="form-label">Task ${index + 1}</label>
                                <input type="text"
                                       class="form-control"
                                       name="task_name[]"
                                       value="${task.task_name}"
                                       readonly>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Status</label>
                                <div class="d-flex gap-3 mt-2">
                                    <label><input type="radio" class="form-check-input" name="task_status[${index}]" value="Done" checked> Done</label>
                                    <label><input type="radio" class="form-check-input" name="task_status[${index}]" value="Pending"> Pending</label>
                                    <label><input type="radio" class="form-check-input" name="task_status[${index}]" value="Not Done"> Not Done</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Task Remark</label>
                                <input type="text"
                                       class="form-control"
                                       name="task_remark[]"
                                       placeholder="Optional remark">
                            </div>
                        `;

                            container.appendChild(row);
                        });

                    } else {

                        container.innerHTML = `
                        <div class="alert alert-warning mb-0">
                            No assigned tasks found for this employee.
                        </div>
                    `;
                    }
                });
        }
    });
</script>