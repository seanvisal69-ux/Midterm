<?php
$oldPasswd = $newPasswd = $confirmPasswd = '';
$oldPasswdErr = $newPasswdErr = '';

if (isset($_POST['changePasswd'], $_POST['oldPasswd'], $_POST['newPasswd'], $_POST['confirmPasswd'])) {
    $oldPasswd = trim($_POST['oldPasswd']);
    $newPasswd = trim($_POST['newPasswd']);
    $confirmPasswd = trim($_POST['confirmPasswd']);

    if (empty($oldPasswd)) {
        $oldPasswdErr = 'Please input old password!';
    }
    if (empty($newPasswd)) {
        $newPasswdErr = 'Please input new password!';
    }
    if ($newPasswd !== $confirmPasswd) {
        $newPasswdErr = 'password do not match!';
    } else {
        if (!isUserHasPassword($oldPasswd)) {
            $oldPasswdErr = 'password is incorrect!';
        }
    }
    if (empty($oldPasswdErr) && empty($newPasswdErr)) {
        if (setUserNewPassword($newPasswd)) {
            header('Location: ./?page=login');
        } else {
            echo '<div class="alert alert-danger" role="alert">
                Failed to change password! Please try again later.
              </div>';
        }
    }

}
?>

<div class="row">
    <div class="col-6">
        <form method="post" action="./?page=profile">
            <div class="d-flex justify-content-center">
                <input name="photo" type="file" id="profileUpload" hidden>
                <label role="buttom" for="profileUpload">
                    <img src="./assets/image/images.png" class="rounded">
                </label>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" name="deletePhoto" class="btn btn-danger">Delete</button>
                <button type="submit" name="uploadPhoto" class="btn btn-success">Upload</button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <form method="post" action="./?page=profile" class="col-nd-8 col-lg-6 mx-auto">
            <h3>Chanae Password</h3>
            <div class="mb-3">
                <label class="form-label">Old Password</label>
                <input value="<?php echo $oldPasswd ?>" name="oldPasswd" type="password"
                    class="form-control <?php echo empty($oldPasswdErr) ? '' : 'is-invalid' ?>">
                <div class="invalid-feedback">
                    <?php echo $oldPasswdErr ?>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">New Password</label> <input name="newPasswd" type="password"
                    class="form-control <?php echo empty($newPasswdErr) ? '' : 'is-invalid' ?>">
                <div class="invalid-feedback">
                    <?php echo $newPasswdErr ?>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm New Password</label>
                <input name="confirmNevPasswd" type="password" class="form-control">
            </div>
            <button type="submit" name="changePasswd" class="btn btn-primary">Change Passwords/button>
        </form>
    </div>
</div>