<style>
    @media print {

        body * {
            visibility: hidden;
        }

        #payslip,
        #payslip * {
            visibility: visible;
        }

        #payslip {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }

        .no-print {
            display: none !important;
        }
    }

    .payslip-box {
        max-width: 850px;
        margin: auto;
        border: 1px solid #dcdcdc;
        border-radius: 10px;
        background: #fff;
        overflow: hidden;
    }

    .payslip-header {
        border-bottom: 1px solid #e9e9e9;
        padding: 15px 20px;
    }

    .company-logo {
        width: 90px;
        height: auto;
    }

    .small-text {
        font-size: 13px;
    }

    .salary-table td,
    .salary-table th {
        padding: 8px 12px;
        font-size: 13px;
        vertical-align: middle;
    }

    .signature-box {
        border-top: 1px solid #999;
        width: 180px;
        text-align: center;
        padding-top: 5px;
        font-size: 13px;
    }
</style>

<div class="dashboard-main-body">

    <!-- TOP -->
    <div class="d-flex justify-content-between align-items-center mb-24 no-print">

        <a href="javascript:history.back()" class="d-flex align-items-center gap-2 text-decoration-none">
            <iconify-icon icon="mdi:arrow-left" class="text-dark fs-4"></iconify-icon>
            <h6 class="fw-semibold mb-0">Pay Slip</h6>
        </a>


        <div class="d-flex gap-2">

            <!-- SEND -->
            <a href="<?= base_url('send_payroll_slip/' . $payroll->id); ?>" class="btn btn-sm btn-primary">
                <iconify-icon icon="pepicons-pencil:paper-plane"></iconify-icon>
            </a>

            <!-- DOWNLOAD -->
            <a href="<?= base_url('download_payroll_pdf/' . $payroll->id); ?>" class="btn btn-sm btn-warning">
                <iconify-icon icon="solar:download-linear"></iconify-icon>
            </a>

            <!-- PRINT -->
            <button type="button" class="btn btn-sm btn-danger" onclick="printPayslip()">
                <iconify-icon icon="basil:printer-outline"></iconify-icon>
            </button>

        </div>

    </div>

    <!-- PAYSLIP -->
    <div id="payslip">

        <div class="payslip-box">

            <!-- HEADER -->
            <div class="payslip-header">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    <!-- COMPANY -->
                    <div class="d-flex align-items-center gap-3">

                        <?php if (!empty($card->company_logo)) { ?>

                            <img src="<?= base_url($card->company_logo); ?>" class="company-logo">

                        <?php } ?>

                        <div>

                            <h5 class="mb-1 fw-bold">
                                <?= $card->company_name ?? 'Company Name'; ?>
                            </h5>

                            <p class="mb-0 small-text">
                                <?= $card->company_address ?? 'Mithapur, Bihar'; ?>
                            </p>

                            <p class="mb-0 small-text">
                                <?= $registere->student_email ?? 'support@company.com'; ?>
                            </p>

                        </div>

                    </div>

                    <!-- PAYSLIP INFO -->
                    <div class="text-end">

                        <h4 class="fw-bold mb-1">
                            PAY SLIP
                        </h4>

                        <p class="mb-0 small-text">
                            Salary Month :
                            <?= $payroll->salary_month; ?>
                            <?= $payroll->salary_year; ?>
                        </p>

                        <p class="mb-0 small-text">
                            Payment Date :
                            <?= date('d-m-Y', strtotime($payroll->payment_date)); ?>
                        </p>

                    </div>

                </div>

            </div>

            <!-- BODY -->
            <div class="p-20">

                <!-- EMPLOYEE DETAILS -->
                <div class="row">

                    <!-- LEFT -->
                    <div class="col-md-6">

                        <table class="table table-borderless small-text mb-0">

                            <tr>
                                <td width="150">
                                    Employee Name
                                </td>

                                <td>
                                    : <?= $payroll->employee_name; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Employee ID
                                </td>

                                <td>
                                    : <?= $payroll->employee_uid; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Department
                                </td>

                                <td>
                                    : <?= $payroll->department; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Designation
                                </td>

                                <td>
                                    : <?= $payroll->designation; ?>
                                </td>
                            </tr>

                        </table>

                    </div>

                    <!-- RIGHT -->
                    <div class="col-md-6">

                        <table class="table table-borderless small-text mb-0">

                            <tr>
                                <td width="170">
                                    Total Working Days
                                </td>

                                <td>
                                    : 30 Days
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Present Days
                                </td>

                                <td>
                                    : <?= $payroll->present_days; ?> Days
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Absent Days
                                </td>

                                <td>
                                    : <?= $payroll->absent_days; ?> Days
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Leave Days
                                </td>

                                <td>
                                    : <?= $payroll->leave_days; ?> Days
                                </td>
                            </tr>

                        </table>

                    </div>

                </div>

                <!-- SALARY -->
                <div class="table-responsive mt-20">

                    <table class="table table-bordered salary-table">

                        <thead class="table-light">

                            <tr>

                                <th>
                                    Earnings
                                </th>

                                <th class="text-end">
                                    Amount
                                </th>

                                <th>
                                    Deductions
                                </th>

                                <th class="text-end">
                                    Amount
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td>
                                    Gross Salary
                                </td>

                                <td class="text-end">
                                    ₹<?= number_format($payroll->gross_salary); ?>
                                </td>

                                <td>
                                    Deduction Amount
                                </td>

                                <td class="text-end text-danger">
                                    ₹<?= number_format($payroll->deduction_amount); ?>
                                </td>

                            </tr>

                            <tr>

                                <td>
                                    Earned Salary
                                </td>

                                <td class="text-end text-success">
                                    ₹<?= number_format($payroll->earned_amount); ?>
                                </td>

                                <td>
                                    Advance Amount
                                </td>

                                <td class="text-end text-danger">
                                    ₹<?= number_format($payroll->advance_amount); ?>
                                </td>

                            </tr>

                            <tr>

                                <td>
                                    Previous Due
                                </td>

                                <td class="text-end">
                                    ₹<?= number_format($payroll->previous_due); ?>
                                </td>

                                <td>
                                    Previous Advance
                                </td>

                                <td class="text-end text-danger">
                                    ₹<?= number_format($payroll->previous_advance); ?>
                                </td>

                            </tr>

                            <tr>

                                <td>
                                    Final Payable Salary
                                </td>

                                <td class="text-end fw-bold text-primary">
                                    ₹<?= number_format($payroll->final_payable_salary); ?>
                                </td>

                                <td>
                                    Due Amount
                                </td>

                                <td class="text-end text-danger fw-bold">
                                    ₹<?= number_format($payroll->due_amount); ?>
                                </td>

                            </tr>

                            <tr class="table-light">

                                <td colspan="3" class="fw-bold text-end">

                                    Paid Amount

                                </td>

                                <td class="text-end fw-bold text-success">

                                    ₹<?= number_format($payroll->paid_amount); ?>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

                <!-- FOOTER -->
                <div class="row mt-3">

                    <div class="col-md-6">

                        <table class="table table-borderless small-text mb-0">

                            <tr>
                                <td width="150">
                                    Payment Mode
                                </td>

                                <td>
                                    : <?= $payroll->payment_mode; ?>
                                </td>
                            </tr>

                            <!-- <tr>
                                <td>
                                    Payroll Key
                                </td>

                                <td>
                                    : <?= $payroll->payroll_month_key; ?>
                                </td>
                            </tr> -->

                            <tr>
                                <td>
                                    Status
                                </td>



                                <td>
                                    <?php if ($payroll->due_amount > 0): ?>

                                        <span class="badge text-sm fw-semibold text-warning-600 text-white">
                                            Partial Paid
                                        </span>

                                    <?php elseif ($payroll->advance_amount > 0): ?>

                                        <span class="badge text-sm fw-semibold text-info-600 text-white">
                                            Advance Paid
                                        </span>

                                    <?php else: ?>

                                        <span class="badge text-sm fw-semibold text-success-600 text-white">
                                            Full Paid
                                        </span>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        </table>

                    </div>

                    <div class="col-md-6 text-md-end">

                        <p class="small-text mb-1">

                            <strong>
                                Remarks :
                            </strong>

                            <?= $payroll->remarks ?: 'Salary processed successfully'; ?>

                        </p>

                        <p class="small-text mb-0">
                            This is computer generated payslip
                        </p>

                    </div>

                </div>

                <!-- SIGN -->
                <div class="d-flex justify-content-between mt-5">

                    <div class="signature-box">
                        Employee Signature
                    </div>

                    <div class="signature-box">
                        Authorized Signature
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- PRINT -->
<script>

    function printPayslip() {
        window.print();
    }

</script>