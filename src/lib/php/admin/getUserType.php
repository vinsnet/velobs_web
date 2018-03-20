<?php
	session_start();
	include_once '../key.php';
	include_once '../database.php';

	if (isset($_SESSION['user'])) {
		switch (SGBD) {
			case 'mysql':
				$link = Database::getIntance()->connect();

				$sql = "SELECT id_usertype, lib_usertype FROM usertype ORDER BY id_usertype ASC";
				$result = mysql_query($sql);
				$i = 0;
				while ($row = mysql_fetch_array($result)) {
					$arr[$i]['id_usertype'] = $row['id_usertype'];
					$arr[$i]['lib_usertype'] = stripslashes($row['lib_usertype']);
					$i++;
				}
				echo '({"usertype":'.json_encode($arr).'})';

				mysql_free_result($result);
				mysql_close($link);
				break;
			case 'postgresql':
				// TODO
				break;
		}
	}

?>
