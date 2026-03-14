<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Contact </h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_playground') ?>">
                                <svg class="stroke-icon">
                                    <use href="modules/assets2/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('visitors'); ?>">Contact</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>








    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Visitors Data</h4>
                    <!-- <span>Only Visitors Data listed here</span> -->
                </div>
                <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-dashed">
                                <thead>
                                    <tr>
                                        <th><b>ID</b></th>
                                        <th><b>Visit Date</b></th>
                                        <th><b>Full Name</b></th>
                                        <th><b>Email</b></th>
                                        <th><b>Subject</b></th>
                                        <th><b>Message</b></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (!empty($contacts)): ?>
                                        <?php foreach ($contacts as $row): ?>
                                            <tr>
                                                <th><?= $row->id ?></th>

                                                <td>
                                                    <?= date('d M Y, h:i A', strtotime($row->contact_date)) ?>
                                                </td>

                                                <td><?= htmlspecialchars($row->visitor_fullname) ?></td>

                                                <td><?= htmlspecialchars($row->visitor_email) ?></td>

                                                <td><?= htmlspecialchars($row->visitor_subject) ?></td>

                                                <td style="max-width:250px;">
                                                    <?= htmlspecialchars($row->visitor_message) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">
                                                No contact messages found
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->



















</div>