<?php
    $nameErr = $usernameErr = $passwdErr = $confirm_passwdErr = '';
    $name = $username = '';
    if(isset($_POST['name'], $_POST['username'], $_POST['passwd'], $_POST['confirm_passwd'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $passwd = $_POST['passwd'];
        $confirm_passwd = $_POST['confirm_passwd'];
        if(empty($name)){
            $nameErr = 'please input name!';
        }
        if(empty($username)){
            $usernameErr = 'please input username!';
        }
        if(empty($passwd)){
            $passwdErr = 'please input password!';
        }
        if($passwd !== $confirm_passwd){
            $confirm_passwdErr = 'passwords do not match!';
        }
    }
?>
    <form method="post" action="./?page=register" class="col-md-8 col-lg-6 mx-auto">
        <h3>Register page</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input name="name" type="text" value="<?php echo $name ?>" class="form-control
            <?php echo empty($nameErr) ? '' : 'is-invalid'; ?>">
            <div class="invalid-feedback">
                <?php echo $nameErr ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input name="username" type="text" value="<?php echo $username ?>" class="form-control
            <?php echo empty($usernameErr) ? '' : 'is-invalid'; ?>">
            <div class="invalid-feedback">
                <?php echo $usernameErr ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="passwd" type="password" class="form-control
            <?php echo empty($passwdErr) ? '' : 'is-invalid'; ?>">
            <div class="invalid-feedback">
                <?php echo $passwdErr ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input name="confirm_passwd" type="password" class="form-control
            <?php echo empty($confirm_passwdErr) ? '' : 'is-invalid'; ?>">
            <div class="invalid-feedback">
                <?php echo $confirm_passwdErr ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
