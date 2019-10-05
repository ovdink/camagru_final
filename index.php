<?php
session_start();

include("model/CamagruModel.php");
include("config/database.php");
include("model/indexModel.php");

if (!db_connect()) {
	?>
	<br />
	<p>Настройка БД <a href="config/setup.php">Нажмите здесь</a>
		<p>
		<?php
		} else {
			$page = get_page();

			$limit = 9;

			$gallery = get_gallery($page, $limit);

			$page_count = get_page_number($limit);

			if (isset($_SESSION['login']))
				$profile = get_profile($_SESSION['login']);

			require('view/indexView.php');
		}
