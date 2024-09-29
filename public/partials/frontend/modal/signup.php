
<div class="modal fade nx-lottie-signup-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Sign Up</h5>
              <span class="btn-close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            
            <div class="modal-body p-4">
                <div class="mb-3">
                    <span class="nx-error-msg"></span>
                    <span class="nx-success-msg"></span>
                </div>

                <form action="" method="post" class="nx-lottie-signup-form">
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" required name="user_email" class="form-control border" placeholder="Enter your email">
                        <small>Email address should be valid</small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" required name="user_pass" class="form-control border" placeholder="**********">
                        <small>Password length min 6 characters</small>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>

                <div class="mb-3">
                  <span>Already a member?</span> <a href="javascript:void(0)" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target=".nx-lottie-signin-modal" >Sign In</a>
                </div>
             
            </div>
            
        </div>
    </div>
</div>