<main class="drake-main">

    <form method="POST" action="<?= base_url('update_password'); ?>">

        <label>New Password <sup>*</sup></label>
        <div class="input-group mb-3 scroll-animation" data-animation="fade_from_left">
            <input type="password" id="password" name="password" class="form-control bg-transparent text-white"
                placeholder="Enter your New password" style="border-radius:5px 0 0 5px;" required>

            <button type="button" class="btn btn-outline-secondary rounded-end"
                onclick="togglePassword('password', this)">
                Show
            </button>
        </div>

        <label>Confirm Password <sup>*</sup></label>
        <div class="input-group mb-3 scroll-animation" data-animation="fade_from_left">
            <input type="password" id="confirm_password" name="confirm_password"
                class="form-control bg-transparent text-white" placeholder="Enter your New password again"
                style="border-radius:5px 0 0 5px;" required>

            <button type="button" class="btn btn-outline-secondary rounded-end"
                onclick="togglePassword('confirm_password', this)">
                Show
            </button>
        </div>

        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="input-group submit-btn-wrap">
                    <button type="submit" class="theme-btn w-100 scroll-animation" data-animation="fade_from_right">
                        Update Password
                    </button>
                </div>
            </div>
        </div>

    </form>

    <script>
        function togglePassword(inputId, btn) {
            let input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                btn.innerText = "Hide";
            } else {
                input.type = "password";
                btn.innerText = "Show";
            }
        }
    </script>

</main>