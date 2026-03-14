<form method="POST" action="<?= base_url('send_otp'); ?>">

    <div class="input-group mb-3">
        <label>Email <sup>*</sup></label>

        <input type="email" name="email" class="bg-transparent w-100 p-1 text-white" placeholder="Enter your email"
            required>

    </div>

    <button type="submit" class="theme-btn w-100">
        Send OTP
    </button>

</form>