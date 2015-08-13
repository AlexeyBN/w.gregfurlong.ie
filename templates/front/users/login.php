<div class="col-md-12 tagline">
    <div class="tagline_wrap">
        <div class="form-wrap">
            <h1>Login</h1>
            <?php if(!empty($message)) echo $message; ?>
            <form id="login" action="" method="post">
                <fieldset>
                    <div class="form-group">
                        <label for="email">Email:
                            <?php if(isset($errors) && in_array('email',$errors)) echo "<span class='warning'>Please enter your email.</span>";?>
                        </label>
                        <input class="form-control" type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) {echo htmlentities($_POST['email']);} ?>" size="20" maxlength="80" tabindex="1" />
                    </div>
                    <div class="form-group">
                        <label for="pass">Password:
                            <?php if(isset($errors) && in_array('password',$errors)) echo "<span class='warning'>Please enter your password.</span>";?>
                        </label>
                        <input class="form-control" type="password" name="password" id="pass" value="" size="20" maxlength="20" tabindex="2" />
                    </div>
                </fieldset>
                <div><input class="btn btn-default" type="submit" name="submit" value="Login" /></div>
            </form>
            <p><a href="<?php echo base_url(); ?>forgot">Forgot password?</a></p>
            <hr>

        </div>
    </div>
</div>