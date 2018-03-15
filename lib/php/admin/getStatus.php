<?php header('Content-Type: text/html; charset=UTF-8');
	session_start();
	include_once '../key.php';
	include_once '../database.php';

	//if (isset($_SESSION['user'])) {
		switch (SGBD) {
			case 'mysql':
				$link = Database::getIntance()->connect();

				$sql = "SELECT id_status, lib_status FROM status ORDER BY lib_status ASC";
				$result = mysql_query($sql);
				$i = 0;
				while ($row = mysql_fetch_array($result)){
					$arr[$i]['id_status'] = $row['id_status'];
					$arr[$i]['lib_status'] = stripslashes($row['lib_status']);
					$i++;
				}
				echo '({"status":'.json_encode($arr).'})';

				mysql_free_result($result);
				mysql_close($link);
				break;
			case 'postgresql':
				// TODO
				break;
		}
	//}

?>
