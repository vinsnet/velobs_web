<?php
	session_start();
	include_once '../key.php';
	include_once '../database.php';

	if (isset($_SESSION['user'])) {
		switch (SGBD) {
			case 'mysql':
				$link = Database::getIntance()->connect();

				$sql = "SELECT id_pole, lib_pole FROM pole WHERE id_pole <> 9 ORDER BY lib_pole ASC";
				$result = mysql_query($sql);
				$i = 0;
				while ($row = mysql_fetch_array($result)){
					$arr[$i]['id_userpole'] = $row['id_pole'];
					$arr[$i]['lib_userpole'] = stripslashes($row['lib_pole']);
					$i++;
				}
				echo '({"userpole":'.json_encode($arr).'})';

				mysql_free_result($result);
				mysql_close($link);
				break;
			case 'postgresql':
				// TODO
				break;
		}
	}

?>
