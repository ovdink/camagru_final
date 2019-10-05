<?php

session_start();

require("model/CamagruModel.php");
include("model/profileModel.php");
include("config/database.php");

$profile = get_profile($_GET['log']);

if ($profile == "" || $profile['activation_key'] != $_GET['key']) {
    $_SESSION['error'] = "Invalid activation link";
} else if ($profile['active'] == 1) {
    $_SESSION['error'] = "Your account is activated";
} else {
    $_SESSION['error'] = "Your account is activated";
    ft_activate_account($_GET['log']);
}


$error = ft_error();

require('view/activationView.php');
