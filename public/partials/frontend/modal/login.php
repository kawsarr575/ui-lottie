
<div class="modal fade nx-lottie-signin-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Sign In</h5>
              <span class="btn-close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            
            <div class="modal-body p-4">
                <div class="mb-3">
                    <span class="nx-error-msg"></span>
                    <span class="nx-success-msg"></span>
                </div>

                <form action="" method="post" class="nx-lottie-signin-form">
                    <div class="mb-3">
                        <label for="" class="form-label">Email or Username</label>
                        <input type="text" name="user_email" class="form-control border" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="user_pass" class="form-control border" placeholder="**********">
                    </div>

                    <div class="mb-3">
                        <label>
                            <input type="checkbox" name="rememberme" value="forever" class=""> Remember me
                        </label>
                        
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="signin" class="btn btn-primary">Sign In</button>
                    </div>
                </form>

                <div class="mb-3">
                  <span>Don’t have an Account yet?</span> <a href="javascript:void(0)" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target=".nx-lottie-signup-modal" >Sign Up</a>
                </div>
            </div>
            
        </div>
    </div>
</div>