<div class="col-md-12 tagline">
    <div class="tagline_wrap">
        <div class="form-wrap">
            <h1>Sing Up</h1>
            <?php if(!empty($mes)) echo $mes; ?>
            <form action="" method="post" id="singup">
                <fieldset>
                    <div class="form-group">
                        <label for="First Name">First Name <span class="required">*</span></label>
                        <input class="form-control" type="text" name="first_name" size="20" maxlength="20" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" tabindex='1' />
                    </div>

                    <div class="form-group">
                        <label for="Last Name">Last Name <span class="required">*</span></label>
                        <input class="form-control" type="text" name="last_name" size="20" maxlength="40" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" tabindex='2' />
                    </div>

                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input class="form-control" type="text" name="email" id="email" size="20" maxlength="80" value="<?php if(isset($_POST['email'])) echo htmlentities($_POST['email'], ENT_COMPAT, 'UTF-8'); ?>" tabindex='3' />
                        <span id="available"></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password <span class="required">*</span></label>
                        <input class="form-control" id="password" type="password" name="password1" size="20" maxlength="20" value="<?php if(isset($_POST['password1'])) echo $_POST['password1']; ?>" tabindex='4' />
                    </div>

                    <div class="form-group">
                        <label for="email">Confirm Password <span class="required">*</span></label>
                        <input class="form-control" type="password" name="password2" size="20" maxlength="20" value="<?php if(isset($_POST['password12'])) echo $_POST['password2']; ?>" tabindex='5' />
                    </div>
                </fieldset>
                <p><input class="btn btn-default" type="submit" name="submit" value="Register" /></p>
            </form>
            <hr>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $("#singup").validate({
            rules: {
                first_name: "required",
                last_name: "required",
                password1: {
                    required: true,
                    minlength: 5
                },
                password2: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                first_name: "Please enter your firstname",
                last_name: "Please enter your lastname",
                password1: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password2: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address"
            }
        });
    });
</script>