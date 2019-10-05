<?php

session_start();

require('model/CamagruModel.php');
include("config/database.php");

if (isset($_POST['submit'])) {
	$_POST['login'] = strip_tags($_POST['login']);
	$_POST['passwd'] = strip_tags($_POST['passwd']);
	$_POST['passwd2'] = strip_tags($_POST['passwd2']);
	$_POST['mail'] = strip_tags($_POST['mail']);
}

if ((empty($_POST['login']) || empty($_POST['passwd']) || empty($_POST['mail']) || empty($_POST['mail'])) && isset($_POST['submit']))
	$_SESSION['error'] = "Incomplete fields";

else if (isset($_POST['login']) && isset($_POST['passwd']) && isset($_POST['passwd2']) && isset($_POST['mail']) && isset($_POST['submit'])) {
	if (ft_login_exist($_POST['login']) && ft_mail_exist($_POST['mail'])) {
		if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $_POST['mail']) == false)
			$_SESSION['error'] = "Invalid email address";
		else if ($_POST['passwd'] != $_POST['passwd2'])
			$_SESSION['error'] = "Passwords don't match";
		else {
			if (password_secure($_POST['passwd'])) {
				ft_user_new($_POST['login'], $_POST['passwd'], $_POST['mail']);
				$_SESSION['error'] = "A confirmation email has been sent to your e-mail address";
			}
		}
	}
}

$error = ft_error();

require('view/subscriptionView.php');
