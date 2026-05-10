<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Employee Basic Info</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?= base_url('admin_playground'); ?>"
                    class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">My Profile</li>
        </ul>
    </div>

    <div class="row gy-4">

        <div class="col-md-12">
            <form class="card" action="enroll_student_insert_basic" method="POST" enctype="multipart/form-data">
                <!-- <div class="card-header">
                    <h4 class="card-title mb-0">Employee Basic Info</h4>
                </div> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Employee Name </label>
                                <input class="form-control text-capitalize" type="text" placeholder="Employee Name"
                                    id="student_name" name="student_name" required="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Joining Date
                                    Date</label>
                                <input type="date" class="form-control" name="admission_date"
                                    placeholder="Enter Joining date">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Address </label>
                                <input class="form-control" type="email" placeholder="Email Address"
                                    name="student_email" required="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Employee UID </label>
                                <input class="form-control" type="text" placeholder="Employee UID" name="student_uid"
                                    id="student_uid" readonly="">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">
                        Submit
                    </button>
                </div>
            </form>

        </div>
    </div>







</div>


<script>
    document.getElementById('student_name').addEventListener('input', function () {
        let name = this.value.replace(/[^A-Za-z]/g, ''); // sirf letters
        let prefix = name.substring(0, 3).toUpperCase();

        let now = new Date();
        let datetime = now.getFullYear().toString() +
            String(now.getMonth() + 1).padStart(2, '0') +
            String(now.getDate()).padStart(2, '0') +
            String(now.getHours()).padStart(2, '0') +
            String(now.getMinutes()).padStart(2, '0') +
            String(now.getSeconds()).padStart(2, '0');

        document.getElementById('student_uid').value = prefix + datetime;
    });
</script>