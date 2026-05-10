<div class="dashboard-main-body">

    <div class="row gy-4">

        <div class="col-12">

            <form class="card" action="<?= base_url('insert_employee_task_master'); ?>" method="POST">

                <div class="card-header">
                    <h4 class="card-title mb-0">
                        Employee Task Assignment Master
                    </h4>
                </div>

                <div class="card-body">

                    <!-- ================= EMPLOYEE SEARCH + DETAILS ================= -->
                    <div class="row align-items-end">

                        <!-- Search -->
                        <div class="col-md-2 mb-3">
                            <label class="form-label">
                                Search
                            </label>

                            <input type="text" id="employeeSearch" class="form-control" placeholder="Name / UID">
                        </div>

                        <!-- Employee Dropdown -->
                        <div class="col-md-2 mb-3">
                            <label class="form-label">
                                Employee
                            </label>

                            <select class="form-control" id="employeeSelect" name="employee_id" required>

                                <option value="">
                                    Select Employee
                                </option>

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

                        <!-- Name -->
                        <div class="col-md-2 mb-3">
                            <label class="form-label">
                                Name
                            </label>

                            <input type="text" id="employeeName" name="employee_name" class="form-control" readonly>
                        </div>

                        <!-- UID -->
                        <div class="col-md-2 mb-3">
                            <label class="form-label">
                                UID
                            </label>

                            <input type="text" id="employeeUID" name="employee_uid" class="form-control" readonly>
                        </div>

                        <!-- Department -->
                        <div class="col-md-2 mb-3">
                            <label class="form-label">
                                Department
                            </label>

                            <input type="text" id="department" name="department" class="form-control" readonly>
                        </div>

                        <!-- Designation -->
                        <div class="col-md-2 mb-3">
                            <label class="form-label">
                                Designation
                            </label>

                            <input type="text" id="designation" name="designation" class="form-control" readonly>
                        </div>

                    </div>

                    <hr>
                    <br/>
                    
                    <!-- ================= TASK SECTION ================= -->
                    <div id="taskContainer">

                        <!-- Default Task -->
                        <div class="row taskRow align-items-end mb-3">

                            <!-- Task Label -->
                            <div class="col-md-2">
                                <label class="form-label">
                                    Task 1
                                </label>
                            </div>

                            <!-- Task Input -->
                            <div class="col-md-8 gy-2">
                                <input type="text" name="task_name[]" class="form-control"
                                    placeholder="Enter Task Name " required>
                            </div>

                            <!-- Remove -->
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger removeTaskBtn w-100">

                                    Remove

                                </button>
                            </div>

                        </div>

                    </div>

                    <!-- Add Task -->
                    <div class="mb-3">
                        <button type="button" class="btn btn-success" id="addTaskBtn">

                            + Add Task

                        </button>
                    </div>

                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">

                        Save Employee Tasks

                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

<script>
    // ================= EMPLOYEE AUTO LOAD + EXISTING TASKS =================
    document.getElementById('employeeSelect').addEventListener('change', function () {

        let selected = this.options[this.selectedIndex];
        let employeeId = this.value;

        // Employee details fill
        document.getElementById('employeeName').value =
            selected.getAttribute('data-name') || '';

        document.getElementById('employeeUID').value =
            selected.getAttribute('data-uid') || '';

        document.getElementById('department').value =
            selected.getAttribute('data-department') || '';

        document.getElementById('designation').value =
            selected.getAttribute('data-designation') || '';

        // Existing tasks load
        if (employeeId !== '') {

            fetch("<?= base_url('get_employee_tasks_ajax/'); ?>" + employeeId)

                .then(response => response.json())

                .then(data => {

                    let container = document.getElementById('taskContainer');
                    container.innerHTML = '';

                    if (data.length > 0) {

                        // Existing tasks show
                        data.forEach(function (task, index) {

                            let row = document.createElement('div');
                            row.classList.add('row', 'taskRow', 'align-items-end', 'mb-3');

                            row.innerHTML = `

                            <div class="col-md-2">
                                <label class="form-label">
                                    Task ${index + 1}
                                </label>
                            </div>

                            <div class="col-md-8">
                                <input type="text"
                                    name="task_name[]"
                                    class="form-control"
                                    value="${task.task_name}"
                                    required>
                            </div>

                            <div class="col-md-2">
                                <button type="button"
                                    class="btn btn-danger removeTaskBtn w-100">

                                    Remove

                                </button>
                            </div>

                        `;

                            container.appendChild(row);

                        });

                        taskCount = data.length;

                    } else {

                        // Default blank task
                        container.innerHTML = `

                        <div class="row taskRow align-items-end mb-3">

                            <div class="col-md-2">
                                <label class="form-label">
                                    Task 1
                                </label>
                            </div>

                            <div class="col-md-8">
                                <input type="text"
                                    name="task_name[]"
                                    class="form-control"
                                    placeholder="Enter Task Name"
                                    required>
                            </div>

                            <div class="col-md-2">
                                <button type="button"
                                    class="btn btn-danger removeTaskBtn w-100">

                                    Remove

                                </button>
                            </div>

                        </div>

                    `;

                        taskCount = 1;

                    }

                    updateTaskNumbers();

                })

                .catch(error => {

                    console.error("Task load error:", error);

                });

        }

    });


    // ================= EMPLOYEE SEARCH =================
    document.getElementById('employeeSearch').addEventListener('keyup', function () {

        let filter = this.value.toLowerCase();
        let options = document.getElementById('employeeSelect').options;

        for (let i = 0; i < options.length; i++) {

            let txt = options[i].text.toLowerCase();

            if (txt.includes(filter) || options[i].value === "") {

                options[i].style.display = '';

            } else {

                options[i].style.display = 'none';

            }

        }

    });


    // ================= TASK COUNTER =================
    let taskCount = 1;


    // ================= ADD TASK =================
    document.getElementById('addTaskBtn').addEventListener('click', function () {

        taskCount++;

        let container = document.getElementById('taskContainer');

        let newRow = document.createElement('div');
        newRow.classList.add('row', 'taskRow', 'align-items-end', 'mb-3');

        newRow.innerHTML = `

        <div class="col-md-2">
            <label class="form-label">
                Task ${taskCount}
            </label>
        </div>

        <div class="col-md-8">
            <input type="text"
                name="task_name[]"
                class="form-control"
                placeholder="Enter Task Name"
                required>
        </div>

        <div class="col-md-2">
            <button type="button"
                class="btn btn-danger removeTaskBtn w-100">

                Remove

            </button>
        </div>

    `;

        container.appendChild(newRow);

        updateTaskNumbers();

    });


    // ================= REMOVE TASK =================
    document.addEventListener('click', function (e) {

        if (e.target.classList.contains('removeTaskBtn')) {

            let rows = document.querySelectorAll('.taskRow');

            if (rows.length > 1) {

                e.target.closest('.taskRow').remove();

                updateTaskNumbers();

            } else {

                alert("At least one task is required.");

            }

        }

    });


    // ================= UPDATE TASK LABELS =================
    function updateTaskNumbers() {

        let rows = document.querySelectorAll('.taskRow');

        rows.forEach(function (row, index) {

            row.querySelector('label').textContent =
                `Task ${index + 1}`;

        });

        taskCount = rows.length;

    }
</script>