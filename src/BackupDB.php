<?php

namespace EuroplanSpa\LaravelDbBackup;

class BackupDB
{
	public static function backup($host, $username, $password, $dbname, $bk_path, $bk_filename, $mysqldump = 'mysqldump'){    
    // Create backup folder and set permission if not exist.
		if(!file_exists($bk_path)) {
			mkdir($bk_path, 0755, true);
		}

		$command = $mysqldump." --user=" . $username ." --password=" . $password . " --host=" . $host . " " . $dbname . " --no-tablespaces  > " . $bk_path . $bk_filename;
		$output = NULL;
		$result = NULL;

		exec($command, $output, $result);

		return [
      "result" => $result,
      "output" => $output
    ];
	}
}