<?php

function get_page()
{
	if (empty($_GET['page'])) {
		$_GET['page'] = 1;
	}
	$page = intval($_GET['page']);
	if ($page <= 0)
		$page = 1;

	return $page;
}

function get_gallery($page, $limit)
{
	$db = db_connect();
	$start = ($page - 1) * $limit;
	$sql = 'SELECT * FROM picture ORDER BY UNIX_TIMESTAMP(date) DESC LIMIT :limit OFFSET :start';
	$sql = $db->prepare($sql);
	$sql->bindValue('start', $start, PDO::PARAM_INT);
	$sql->bindValue('limit', $limit, PDO::PARAM_INT);
	$sql->execute();
	$db = null;
	return $sql;
}

function get_page_number($limit)
{
	$db = db_connect();
	$sql = 'SELECT * FROM picture ';
	$sql = $db->prepare($sql);
	$sql->execute();

	$row = $sql->rowCount();
	$count = ceil($row / $limit);
	$db = null;
	return $count;
}

function page_style($i, $page)
{
	if ($i == $page)
		echo " style='color: #EF626C; font-weight:bold; transform: scale(1.3)' ";
}
