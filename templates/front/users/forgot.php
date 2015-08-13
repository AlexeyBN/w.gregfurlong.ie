<div class="col-md-12 tagline">
    <div class="tagline_wrap">
        <div class="form-wrap">
            <h1>Forgot</h1>
            <?php if(!empty($message)) echo $message; ?>
            <form id="forgot" action="" method="post">
                <fieldset>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) {echo htmlentities($_POST['email']);} ?>" size="20" maxlength="80" tabindex="1" />
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
        $("#forgot").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                }
            }
        });
    });
</script>