<div class="col-md-12 tagline">
    <div class="tagline_wrap">
        <div class="form-wrap">
            <h1>Change password</h1>
            <?php if(!empty($message)) echo $message; ?>
            <form id="change-pass" action="" method="post">
                <fieldset>
                    <div class="form-group">
                        <label for="pass">New Password:</label>
                        <input class="form-control" type="password" name="pass" id="pass" size="20" maxlength="80" tabindex="1" />
                    </div>
                    <div class="form-group">
                        <label for="pass2">Confirm Password:</label>
                        <input class="form-control" type="password" name="pass2" id="pass2" size="20" maxlength="80" tabindex="1" />
                    </div>
                    <div class="form-group">
                        <label for="pass2">Captcha</label>
                        <?php
/*                            $vals = array(
                                'img_path'      => 'captcha/',
                                'img_url'       => $base_url."captcha/",
                                'width' => 100,
                                'expiration' => 3600
                            );

                            $cap = create_captcha($vals);
                            $data = array(
                                'captcha_time'  => $cap['time'],
                                'ip_address'    => $this->input->ip_address(),
                                'word'          => $cap['word']
                            );
                            $_SESSION['captcha'] = $cap['word'];
                            echo $cap['image'];
                        */?>
                        <input class="form-control" type="text" name="captcha" id="captcha" size="20" maxlength="80" tabindex="1" />
                    </div>
                </fieldset>
                <div><input class="btn btn-default" type="submit" name="submit" value="Submit" /></div>
            </form>
            <hr>

        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $("#change-pass").validate({
            rules: {
                pass: {
                    required: true
                },
                pass2: {
                    required: true,
                    equalTo: "#pass"
                },
                captcha: {
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                pass: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                pass2: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                captcha: {
                    required: "Please enter captcha",
                    minlength: "Your captcha must be at least 8 characters long"
                }
            }
        });
    });
</script>