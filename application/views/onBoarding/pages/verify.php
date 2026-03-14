<main class="drake-main">


    <form method="POST" action="<?= base_url('verify_otp'); ?>">

        <div class="input-group mb-3 scroll-animation" data-animation="fade_from_bottom">
            <label>OTP <sup>*</sup></label>
            <input type="text" name="otp" class="bg-transparent w-100 p-1 text-white" placeholder="Enter OTP"
                style="border-radius:5px;" required>
        </div>

        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="input-group submit-btn-wrap">
                    <button type="submit" class="theme-btn w-100 mb-3" data-animation="fade_from_right">
                        Verify OTP
                    </button>
                </div>
            </div>
        </div>

    </form>


</main>