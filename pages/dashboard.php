<?php
if (isset($_SESSION['user_id'])) {
    echo $_SESSION['user_id'];
}

echo 'Level: ' . (isAdmin() ? 'Admin' : 'User');
?>
<h1>DashBoard</h1>