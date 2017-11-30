<?php echo validation_errors(); ?>
<div class="wrapper">
    <h2><?= $title; ?></h2>
    <p>Please fill this form to create an account.</p><br>
    <?php echo form_open('users/register') ?>
        <div>
            <input id="uname" type="text" name="username" placeholder="Enter Username" autofocus>
        </div>
        <div>
            <input type="password" name="password" placeholder="Enter Password">
        </div>
        <div>
            <input type="password" name="password2"  placeholder="Repeat Password">
        </div>
        <div>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>
        <p>Already registered? <a href="login.php">Login here</a>.</p>
    <?php echo form_close(); ?>
</div>
<script src="modalscript.js"></script>
</body>
</html>
