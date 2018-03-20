<?php
	session_start();
	include_once '../key.php';
	include_once '../database.php';

	if (isset($_SESSION['user'])) {
		switch (SGBD) {
			case 'mysql':
				$link = Database::getIntance()->connect();

				$sql = "SELECT id_territoire, lib_territoire FROM territoire ORDER BY id_territoire ASC";
				$result = mysql_query($sql);
				$i = 0;
				while ($row = mysql_fetch_array($result)){
					$arr[$i]['id_territoire'] = $row['id_territoire'];
					$arr[$i]['lib_territoire'] = stripslashes($row['lib_territoire']);
					$i++;
				}
				echo '({"userterritoire":'.json_encode($arr).'})';

				mysql_free_result($result);
				mysql_close($link);
				break;
			case 'postgresql':
				// TODO
				break;
		}
	}

?>
