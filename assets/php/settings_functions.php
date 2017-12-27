<?php
// Write array into json config file
function json_write($json, $path, $key = ''){
	if (!empty($key)){
		$fp = fopen($path.$key.'.json', 'w');
		if ($fp) {
			$success_write = fwrite($fp, json_encode($json[$key], JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT));
			$success_close = fclose($fp);
			if ($success_write == FALSE) {$return[$key][] = 'Could not write to file '.$path.$key.'.json! Are there permission issues?';}
			if ($success_close == FALSE) {$return[$key][] = 'Could not close file '.$path.$key.'.json! Are there permission issues?';}
		}
		else {
			$return[$key][] = 'Could not open file '.$path.$key.'.json for writting! Are there permission issues?';
		}
		if (!is_array($return[$key])) { $return[$key] = true; }
	}
	else {
		foreach ($json as $key => $value) {
			$fp = fopen($path.$key.'.json', 'w');
			if ($fp) {
				$success_write = fwrite($fp, json_encode($value, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT));
				$success_close = fclose($fp);
				if ($success_write == FALSE) {$return[$key][] = 'Could not write to file '.$path.$key.'.json! Are there permission issues?';}
				if ($success_close == FALSE) {$return[$key][] = 'Could not close file '.$path.$key.'.json! Are there permission issues?';}
			}
			else {
				$return[$key][] = 'Could not open file '.$path.$key.'.json for writing! Are there permission issues?';
			}
			if (!is_array($return[$key])) { $return[$key] = true; }
		}
	}
	return $return;
}

?>
