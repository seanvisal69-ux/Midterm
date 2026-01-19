<?php
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
            <input name="name" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input name="username" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="passwd" type="password" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input name="confirm_passwd" type="password" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
