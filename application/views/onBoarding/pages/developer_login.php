<!-- LOGIN FORM -->
    <form method="POST" action="<?= base_url('useronHome'); ?>">

    <!-- USER ID -->
    <div class="input-group mb-3 scroll-animation" data-animation="fade_from_bottom">
        <label>User ID <sup>*</sup></label>
        <input type="text" name="user_id"
            class="bg-transparent w-100 p-1 text-white"
            placeholder="Enter your user id"
            style="border-radius:5px;" required>
    </div>

    <!-- EMAIL -->
    <div class="input-group mb-3 scroll-animation" data-animation="fade_from_right">
        <label>Email <sup>*</sup></label>
        <input type="email" name="email"
            class="bg-transparent w-100 p-1 text-white"
            placeholder="Enter your email"
            style="border-radius:5px;" required>
    </div>

    <!-- PASSWORD -->
    <label>Password <sup>*</sup></label>
    <div class="input-group mb-3 scroll-animation" data-animation="fade_from_left">
        <input type="password" id="login_password" name="password"
            class="form-control bg-transparent text-white"
            placeholder="Enter your password"
            style="border-radius:5px 0 0 5px;" required>

        <button type="button"
            class="btn btn-outline-secondary rounded-end"
            onclick="toggleLoginPassword(this)">
            Show
        </button>
    </div>

    <!-- REMEMBER + FORGOT -->
    <div class="input-group d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <input type="checkbox" name="remember" style="width:auto;margin-right:8px;">
            <label style="margin:0;">Remember Me</label>
        </div>

        <a href="<?= base_url('onBoarding_forgot'); ?>" class="project-btn">
            Forgot Password?
        </a>
    </div>

    <!-- BIG GREEN LOGIN BUTTON -->
    <button type="submit"
        class="theme-btn w-100 mb-3">
        Login
    </button>

    <!-- REGISTER (Button ke NICHE, Left + Right) -->
    <div class="d-flex justify-content-between align-items-center px-5">
        <small class="text-muted">
            Don’t have an account?
        </small>


        <a href="<?= base_url('onBoardingUser'); ?>"
            class="project-btn">
            Register
        </a>
    </div>

</form>

<script>
    function toggleLoginPassword(btn) {
        let input = document.getElementById("login_password");

        if (input.type === "password") {
            input.type = "text";
            btn.innerText = "Hide";
        } else {
            input.type = "password";
            btn.innerText = "Show";
        }
    }
</script>

