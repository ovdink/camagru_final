<?php

include("CamagruModel.php");
include("../config/database.php");
include("accountModel.php");

session_start();
$profile = get_profile($_SESSION['login']);


if ($_GET['page'] == "account") {
    $target_dir = "public/picture/" . $_SESSION['login'] . "/profile/";
    $data = 1;

    if (!file_exists("../" . $target_dir))
        mkdir("../" . $target_dir, 0777, true);
    else
        unlink("../" . $profile['profile']);
}

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (file_exists("../" . $target_file)) {
    $i = 1;
    $file_name = explode("." . $fileType, $target_file);
    while (file_exists("../" . $file_name[0] . "(" . $i . ")." . $fileType))
        $i++;
    $_FILES["fileToUpload"]["name"] = $file_name[0] . "(" . $i . ")." . $fileType;
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    $_SESSION['error'] = "File is too large";
}

if (empty($_SESSION['error'])) {
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../" . $target_file)) {
        $_SESSION['error'] = "Your image cannot be sent";
    } else if ($_GET['page'] ==  "account") {
        ft_mod_profile($_SESSION['login'], $target_file, 'profile');
    }
}

echo json_encode($data);
