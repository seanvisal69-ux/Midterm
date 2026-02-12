<?php

function usernameExists($username)
{
    global $db;
    $query = $db->prepare('SELECT * FROM tbl_users WHERE username = ?');
    $query->bind_param('s', $username);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows) {
        return true;
    } else {
        return false;
    }
}

function registerUser($name, $username, $passwd)
{
    global $db;
    $query = $db->prepare('INSERT INTO tbl_users (name, username, passwd) VALUES (?, ?, ?)');
    $query->bind_param('sss', $name, $username, $passwd);
    return $query->execute();
    if ($db->affected_rows) {
        return true;
    } else {
        return false;
    }
}

function loginUser($username, $passwd)
{
    global $db;
    $query = $db->prepare('SELECT * FROM tbl_users WHERE username = ? AND passwd = ?');
    $query->bind_param('ss', $username, $passwd);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows) {
        return $result->fetch_object();
    } else {
        return false;
    }
}

function loggedInUser()
{
    global $db;
    if (!isset($_SESSION['user_id'])) {
        return null;
    }
    $user_id = $_SESSION['user_id'];
    $query = $db->prepare('SELECT * FROM tbl_users WHERE id = ?');
    $query->bind_param('d', $user_id);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows) {
        return $result->fetch_object();
    } else {
        return null;

    }
}

function isAdmin()
{
    $user = loggedInUser();
    if ($user && $user->Level == 'admin') {
        return true;
    }
    return false;
}

function insertImage($file)
{
    global $db;
    $image_name = $file["photo"]["name"];
    $image_temp = $file["photo"]["tmp_name"];

    $db->begin_transaction();

    $query = $db->prepare("UPDATE tbl_users SET photo = ? WHERE id = ?");
    $query->bind_param('sd', $image_name, $_SESSION['user_id']);
    $query->execute();
    if (!$query->affected_rows) {
        $db->rollback();
        return false;
    }
    if (!move_uploaded_file($image_temp, "./assets/image/" . $image_name)) {
        $db->rollback();
        return false;
    }
    $db->commit();

    return true;
}
function getUserImage($user_id)
{
    global $db;
    $query = $db->prepare("SELECT photo FROM tbl_users WHERE id = ?");
    $query->bind_param('d', $user_id);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows) {
        return $result->fetch_object()->photo;
    }
    return null;
}

function deleteUserImage()
{
    global $db;
    $user = loggedInUser();
    $query = $db->prepare("UPDATE tbl_users SET photo = NULL WHERE id = ?");
    $query->bind_param('d', $user->id);
    $query->execute();
    if ($db->affected_rows) {
        return true;
    }
    return false;
}
