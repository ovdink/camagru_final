<?php

include('modalModel.php');
include('userModel.php');

function db_connect()
{
	global $DB_DSN, $DB_USER, $DB_PASSWORD;

	try {
		$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	} catch (PDOException $e) {
		echo 'Ошибка подключения: ' . $e->getMessage();
	}
}

function get_profile($login)
{
	$db = db_connect();
	$sql = $db->prepare("SELECT * FROM user WHERE login = :login");
	$sql->bindParam("login", $login, PDO::PARAM_STR);
	$sql->execute();
	$res = $sql->fetch();
	$db = null;
	return $res;
}

function get_count($id, $item, $table)
{
	$db = db_connect();
	$sql = "SELECT COUNT(*) FROM " . $table . " WHERE " . $item . " = '" . $id . "'";
	$req = $db->query($sql);
	$req = $req->fetch();
	$db = null;
	return ($req[0]);
}

function ft_hash($id, $passwd)
{
	return hash('sha256', $id) . hash('whirlpool', $passwd);
}

function ft_user_check($login, $passwd)
{
	$profile = get_profile($login);
	$passwd = ft_hash($profile['id'], $passwd);
	$db = db_connect();

	$sql = $db->prepare("SELECT * FROM user WHERE login=:login AND pass=:passwd");
	$sql->bindParam("login", $login, PDO::PARAM_STR);
	$sql->bindParam("passwd", $passwd, PDO::PARAM_STR);
	$sql->execute();
	$data = $sql->fetch();
	if ($data == "") {
		$_SESSION['error'] = "Wrong password";
		$db = null;
		return false;
	} else if ($data['active'] === '0') {
		$_SESSION['error'] = "Your account has not been activated yet;";
		$db = null;
		return false;
	} else {
		$_SESSION['login'] = $login;
		$db = null;
		return true;
	}
}

function ft_error()
{
	if (isset($_SESSION['error'])) {
		$tmp = $_SESSION['error'];
		$_SESSION['error'] = NULL;
		return $tmp;
	} else
		return "";
}

function password_secure($password)
{

	$error = "";
	if (strlen($password) < 8)
		$error .= " is too short; ";

	if (!preg_match("#[0-9]+#", $password))
		$error .= "don't contain digits; ";

	if (!preg_match("#[a-z]+#", $password))
		$error .= "don't contain lowercase letter; ";

	if (!preg_match("#[A-Z]+#", $password))
		$error .= "don't contain uppercase letter; ";

	if (!empty($error)) {
		$_SESSION['error'] = "New password: " . $error;
		return false;
	} else
		return true;
}
