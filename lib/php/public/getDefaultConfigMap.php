<?php
	include_once '../key.php';
	include_once '../database.php';

	switch (SGBD) {
		case 'mysql':
			$link = Database::getIntance()->connect();

			$sql = "SELECT * FROM configmap";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result)){
				$arr[0]['lat'] = $row['lat_configmap'];
				$arr[0]['lon'] = $row['lon_configmap'];
				$arr[0]['zoom'] = $row['zoom_configmap'];
				$arr[0]['baselayer'] = $row['baselayer_configmap'];
			}
			echo '{"configmap":'.json_encode($arr).'}';

			mysql_free_result($result);
			mysql_close($link);

			break;
		case 'postgresql':
			// TODO
			break;
	}

?>
