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
            <li class="fw-medium">Visitor</li>
        </ul>
    </div>






















    

</div>






<!-- add staff code  -->
<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Wizard</h6>
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"></h5>
                </div>
                <div class="card-body">
                    <form class="row gy-3 needs-validation" method="post" enctype="multipart/form-data">

                        <!-- Profile Image -->
                        <div class="mb-24 col-md-4">
                            <h6 class="text-md text-primary-light mb-16">Profile Image</h6>
                            <input type="file" name="photo" class="form-control" accept=".png, .jpg, .jpeg">
                        </div>
                        <!-- Full Name -->
                        <div class="col-md-4">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Full Name" required>
                        </div>

                        <!-- Staff ID -->
                        <div class="col-md-4">
                            <label class="form-label">Staff ID</label>
                            <input type="text" name="staff_id" class="form-control" placeholder="Enter Staff ID">
                        </div>

                        <!-- Email -->
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
                        </div>

                        <!-- Contact Number -->
                        <div class="col-md-4">
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number"
                                required>
                        </div>

                        <!-- Emergency Contact -->
                        <div class="col-md-4">
                            <label class="form-label">Emergency Contact</label>
                            <input type="text" name="emergency_contact" class="form-control"
                                placeholder="Emergency Contact">
                        </div>

                        <!-- Aadhar Number -->
                        <div class="col-md-4">
                            <label class="form-label">Aadhar Number</label>
                            <input type="text" name="aadhar" class="form-control" placeholder="Enter Aadhar Number">
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-md-4">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="dob" class="form-control">
                        </div>

                        <!-- Gender -->
                        <div class="col-md-4">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="">Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <!-- Blood Group -->
                        <div class="col-md-4">
                            <label class="form-label">Blood Group</label>
                            <select name="blood_group" class="form-select">
                                <option value="">Select Blood Group</option>
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>O+</option>
                                <option>O-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                            </select>
                        </div>



                        <!-- Permanent Address -->
                        <div class="col-md-8">
                            <label class="form-label">Permanent Address</label>
                            <textarea name="permanent_address" class="form-control"
                                placeholder="Enter Permanent Address"></textarea>
                        </div>


                        <!-- Joining Date -->
                        <div class="col-md-4">
                            <label class="form-label">Joining Date</label>
                            <input type="date" name="joining_date" class="form-control">
                        </div>



                        <!-- Correspondence Address -->
                        <div class="col-md-8">
                            <label class="form-label">Correspondence Address</label>
                            <textarea name="correspondence_address" class="form-control"
                                placeholder="Enter Correspondence Address"></textarea>
                        </div>



                        <!-- Salary -->
                        <div class="col-md-4">
                            <label class="form-label">Salary</label>
                            <input type="number" name="salary" class="form-control" value="4500">
                        </div>

                        <!-- Role -->
                        <div class="col-md-4">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select">
                                <option>Cleaner</option>
                                <option>Helper</option>
                                <option>Supervisor</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <!-- Submit -->
                        <div class="col-12">
                            <button class="btn btn-primary-600" type="submit" name="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>




    </div>







</div>