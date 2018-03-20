<?php
	define('DEBUG', FALSE);
	define('LOG_FILE', '/var/log/velobs-web.log'); //should be stdout
	define('HOST', 'localhost'); // TODO rename to DB_HOST
	define('PORT', '3306'); // TODO rename to DB_PORT or merge with DB_HOST

	define('SGBD', 'mysql');

	define('DB_USER', 'xxx');
	define('DB_PASS', 'xxx');
	define('DB_NAME', 'xxx');

	define('URL', 'xxx');

	define('MAIL_ALIAS_OBSERVATION_ADHERENTS', 'xxx');
	define('MAIL_FROM', 'xxx');
	define('MAIL_REPLY_TO', 'xxx');
	define('MAIL_SUBJECT_PREFIX', '[Test][VelObs]');

	define('VELOBS_ASSOCIATION', '2 pieds 2 roues');
	define('VELOBS_COLLECTIVITE1', 'Toulouse Métropole');
	define('VELOBS_COLLECTIVITE2', 'le Sicoval');
	define('VELOBS_COLLECTIVITE3', 'la CAM');
	define('VELOBS_EMERGENCY_MAIL1', 'Veuillez téléphoner au 05 61 222 222 pour prévenir de ce problème si celui-ci est sur la commune de Toulouse');

	define('INCLUDE_CODE_HTML_PUBLIC',''); //code html inclus en fin de fichier index.php
	define('INCLUDE_CODE_HTML_ADMIN',''); //code html inclus en fin de fichier admin.php

	if (!function_exists('mysql_connect')){
        include_once('mysql2i.class.php');
    }

?>
