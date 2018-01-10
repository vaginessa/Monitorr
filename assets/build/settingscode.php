<?
// EMPTY SETTINGS
if (empty($monConfiguration['usersettings']['admin_password'])) {
	$monOutput['Content'] .= '<form class="form-horizontal" action="'.MON_BASE_PATH.'" method="post">'.PHP_EOL;
	$monOutput['Content'] .= '<fieldset>'.PHP_EOL;
	$monOutput['Content'] .= '<legend>Setting Administrator Password</legend>'.PHP_EOL;
	$monOutput['Content'] .= '	<fieldset class="form-group">'.PHP_EOL;
	$monOutput['Content'] .= '		<label class="col-md-1 control-label" for="admin_password">Administrator Password</label>'.PHP_EOL;
	$monOutput['Content'] .= '		<div class="col-md-4">'.PHP_EOL;
	$monOutput['Content'] .= '			<input id="admin_password" name="admin_password" type="text" placeholder="" value="" class="form-control input-md" required="">'.PHP_EOL;
	$monOutput['Content'] .= '			<span class="help-block">Please set your Administartor Password to access the Settings section</span>'.PHP_EOL;
	$monOutput['Content'] .= '		</div>'.PHP_EOL;
	$monOutput['Content'] .= '	</fieldset>'.PHP_EOL;
	$monOutput['Content'] .= '	<fieldset class="row form-group">'.PHP_EOL;
	$monOutput['Content'] .= '		<div class="col-md-1">'.PHP_EOL;
	$monOutput['Content'] .= '			<input type="hidden" name="section" id="section" value="usersettings">'.PHP_EOL;
	$monOutput['Content'] .= '		</div>'.PHP_EOL;
	$monOutput['Content'] .= '		<div class="col-md-4">'.PHP_EOL;
	$monOutput['Content'] .= '			<input class="btn btn-primary" type="submit" value="Save">'.PHP_EOL;
	$monOutput['Content'] .= '		</div>'.PHP_EOL;
	$monOutput['Content'] .= '	</fieldset>'.PHP_EOL;
	$monOutput['Content'] .= '</fieldset>'.PHP_EOL;
	$monOutput['Content'] .= '</form>'.PHP_EOL;
}
else if (!isset($_SESSION['loged-in'])) {
	$monOutput['Content'] .= '<form class="form-horizontal" action="'.MON_BASE_PATH.'" method="post">'.PHP_EOL;
	$monOutput['Content'] .= '<fieldset>'.PHP_EOL;
	$monOutput['Content'] .= '<legend>Login</legend>'.PHP_EOL;
	$monOutput['Content'] .= '	<fieldset class="form-group">'.PHP_EOL;
	$monOutput['Content'] .= '		<label class="col-md-1 control-label" for="settings_password">Administrator Password</label>'.PHP_EOL;
	$monOutput['Content'] .= '		<div class="col-md-4">'.PHP_EOL;
	$monOutput['Content'] .= '			<input id="password" name="settings_password" type="settings_password" placeholder="" value="" class="form-control input-md" required="">'.PHP_EOL;
	$monOutput['Content'] .= '			<span class="help-block">Please enter your Administartor Password to access the Settings section</span>'.PHP_EOL;
	$monOutput['Content'] .= '		</div>'.PHP_EOL;
	$monOutput['Content'] .= '	</fieldset>'.PHP_EOL;
	$monOutput['Content'] .= '	<fieldset class="form-group">'.PHP_EOL;
	$monOutput['Content'] .= '		<div class="col-md-1"></div>'.PHP_EOL;
	$monOutput['Content'] .= '		<div class="col-md-4">'.PHP_EOL;
	$monOutput['Content'] .= '			<input class="btn btn-primary" type="submit" value="Submit">'.PHP_EOL;
	$monOutput['Content'] .= '		</div>'.PHP_EOL;
	$monOutput['Content'] .= '	</fieldset>'.PHP_EOL;
	$monOutput['Content'] .= '</fieldset>'.PHP_EOL;
	$monOutput['Content'] .= '</form>'.PHP_EOL;
}
else if (isset($_SESSION['loged-in'])) {

	$monOutput['Content'] .= '<form class="form-horizontal" action="'.MON_BASE_PATH.'?section='.$monConfigurationSection.'" method="post">'.PHP_EOL;
	$monOutput['Content'] .= '<fieldset>'.PHP_EOL;
	$monOutput['Content'] .= '<legend>'.$monConfigurationSettings[$monConfigurationSection]['description'].'</legend>'.PHP_EOL;

	// Creating the settings menu
	foreach($monConfigurationSettings as $key => $value) {
		$monOutput['Menu'] .= '<li class="mon_menu';
		if ($key == $monConfigurationSection) {
			$monOutput['Menu'] .= ' mon_menu_selected selected';
		}
		$monOutput['Menu'] .= '"><a href="'.MON_BASE_PATH.'?section='.$key.'">';
		$monOutput['Menu'] .= '<span class="fa fa-gear fa-lg"></span>&nbsp;&nbsp;';
		$monOutput['Menu'] .= $value['name'].'</a></li>'.PHP_EOL;
	}
	$monOutput['Menu'] .= '<li class="mon_menu"><a href="'.MON_BASE_PATH.'?logout=1"><i class="fa fa-sign-out fa-lg"></i>&nbsp;&nbsp;Log out</a></li>'.PHP_EOL;
	$monOutput['Menu'] .= '<li class="mon_menu"><a href="index.php"><i class="fa fa-home fa-lg"></i>&nbsp;&nbsp;Back to Frontend</a></li>'.PHP_EOL;

	// Creating the settings content
	foreach ($monConfigurationSettings[$monConfigurationSection]['settings'] as $key => $value) {

		if (isset($monConfiguration[$monConfigurationSection][$key])){
			$setting_value = $monConfiguration[$monConfigurationSection][$key];
		}
		else {
			$setting_value = $value['default'];
		}


		switch ($value['type']) {
			case 'string': {
				$monOutput['Content'] .= '	<fieldset class="form-group">'.PHP_EOL;
				$monOutput['Content'] .= '		<label class="col-md-1 control-label" for="'.$key.'">'.$value['name'].'</label>'.PHP_EOL;
				$monOutput['Content'] .= '		<div class="col-md-4">'.PHP_EOL;
				$monOutput['Content'] .= '			<input id="'.$key.'" name="'.$key.'" type="text" placeholder="" value="'.$setting_value.'" class="form-control input-md" required="">'.PHP_EOL;
				$monOutput['Content'] .= '			<span class="help-block">'.$value['help'].'</span>'.PHP_EOL;
				$monOutput['Content'] .= '		</div>'.PHP_EOL;
				$monOutput['Content'] .= '	</fieldset>'.PHP_EOL;
				$monSomethingToSave = true;
				break;
			}
			case 'disabled': {
				$monOutput['Content'] .= '	<fieldset class="form-group">'.PHP_EOL;
				$monOutput['Content'] .= '		<label class="col-md-1 control-label" for="'.$key.'">'.$value['name'].'</label>'.PHP_EOL;
				$monOutput['Content'] .= '		<div class="col-md-4">'.PHP_EOL;
				$monOutput['Content'] .= '			<input id="'.$key.'" name="'.$key.'" type="text" placeholder="" value="'.$setting_value.'" class="form-control input-md" disabled="">'.PHP_EOL;
				$monOutput['Content'] .= '			<span class="help-block">'.$value['help'].'</span>'.PHP_EOL;
				$monOutput['Content'] .= '		</div>'.PHP_EOL;
				$monOutput['Content'] .= '	</fieldset>'.PHP_EOL;

				break;
			}
			case 'info': {
				$monOutput['Content'] .= '	<fieldset class="form-group">'.PHP_EOL;
				$monOutput['Content'] .= '		<label class="col-md-1 control-label" for="'.$key.'">'.$value['name'].'</label>'.PHP_EOL;
				$monOutput['Content'] .= '		<div class="col-md-4">'.PHP_EOL;
				$monOutput['Content'] .= '			<input type="text" placeholder="'.$setting_value.'" value="'.$setting_value.'" class="form-control input-md">'.PHP_EOL;
				$monOutput['Content'] .= '			<span class="help-block">'.$value['help'].'</span>'.PHP_EOL;
				$monOutput['Content'] .= '		</div>'.PHP_EOL;
				$monOutput['Content'] .= '	</fieldset>'.PHP_EOL;

				break;
			}
			case 'bolean': {
				if ($setting_value){
					$checked_true = 'checked';
					$checked_false = '';
				}
				else {
					$checked_false = 'checked';
					$checked_true = '';
				}
				$monOutput['Content'] .= '	<fieldset class="form-group">'.PHP_EOL;
				$monOutput['Content'] .= '		<label class="col-md-1 control-label" for="'.$key.'">'.$value['name'].'</label>'.PHP_EOL;
				$monOutput['Content'] .= '		<div class="col-md-4">'.PHP_EOL;
				$monOutput['Content'] .= '			<div class="radio">'.PHP_EOL;
				$monOutput['Content'] .= '				<label for="'.$key.'-0">'.PHP_EOL;
				$monOutput['Content'] .= '				<input type="radio" name="'.$key.'" id="'.$key.'-0" value="1" '.$checked_true.'>True</label><br />'.PHP_EOL;
				$monOutput['Content'] .= '				<label for="'.$key.'-1">'.PHP_EOL;
				$monOutput['Content'] .= '				<input type="radio" name="'.$key.'" id="'.$key.'-1" value="0" '.$checked_false.'>False</label>'.PHP_EOL;
				$monOutput['Content'] .= '			</div>'.PHP_EOL;
				$monOutput['Content'] .= '			<span class="help-block">'.$value['help'].'</span>'.PHP_EOL;
				$monOutput['Content'] .= '		</div>'.PHP_EOL;
				$monOutput['Content'] .= '	</fieldset>'.PHP_EOL;
				$monSomethingToSave = true;
				break;

			}
			case 'library_select': {

				if (empty($monConfiguration['plexserver']['domain'])) {
					$monErrors[count($monErrors)] = 'Please setup Plex Server first!';
				}
				else {

					// Requesting the token if not already set in session variable (speeds up image delivery)
					if (isset($_SESSION['token'])) {
						$monConfiguration['plexserver']['token'] = $_SESSION['token'];
						$plex = new plexAPI($monConfiguration['plexserver'], $monConfiguration['general']);
					}
					else {
						$plex = new plexAPI($monConfiguration['plexserver'], $monConfiguration['general']);
						if (empty($plex->getToken())) {
							$monErrors[count($monErrors)] = 'No token received! Plex.tv not reachable or wrong credentials!';
						}
						else {
							$_SESSION['token'] = $plex->getToken();
						}
					}


					// Getting the xml for the plex library index
					$mon_libraryindex = $plex->getIndex();
					if (empty($mon_libraryindex)) {
						$monErrors[count($monErrors)] = 'Plex server not reachable!';
					}
					else {
						if ($monConfiguration['libraries']['sort_order'] == 'SORT_ASC') {
							usort($mon_libraryindex['items'], make_comparer([$monConfiguration['libraries']['sort_by'], SORT_ASC], ['title', SORT_ASC]));
						}
						else {
							usort($mon_libraryindex['items'], make_comparer([$monConfiguration['libraries']['sort_by'], SORT_DESC], ['title', SORT_ASC]));
						}
						$monOutput['Content'] .= '	<fieldset class="form-group">'.PHP_EOL;
						$monOutput['Content'] .= '		<label class="col-md-1 control-label" for="'.$key.'">'.$value['name'].'</label>'.PHP_EOL;
						$monOutput['Content'] .= '		<div class="col-md-4">'.PHP_EOL;
						$monOutput['Content'] .= '			<div class="checkbox">'.PHP_EOL;
						$count = 0;
						foreach ($mon_libraryindex['items'] as $child) {
	//							if (array_key_exists($child['type'],$monConfiguration['mediatypes'])) {
								if (in_array($child['key'],$monConfiguration[$monConfigurationSection][$key])) {
									$checked = ' checked';
								}
								else {
									$checked = '';
								}
								$monOutput['Content'] .= '				<label for="'.$key.'-'.$count.'">'.PHP_EOL;
								$monOutput['Content'] .= '				<input type="checkbox" name="'.$key.'[]" id="'.$key.'-'.$count.'" value="'.$child['key'].'"'.$checked.'>';
								$monOutput['Content'] .= '				<i class="fa '.$monConfiguration['mediatypes'][$child['type']]['icon'].'"></i>&nbsp;&nbsp;';
								$monOutput['Content'] .= $child['title'].'</label><br />'.PHP_EOL;
								$count += 1;
	//							}
						}

						$monOutput['Content'] .= '			</div>'.PHP_EOL;
						$monOutput['Content'] .= '			<span class="help-block">'.$value['help'].'</span>'.PHP_EOL;
						$monOutput['Content'] .= '		</div>'.PHP_EOL;
						$monOutput['Content'] .= '	</fieldset>'.PHP_EOL;

					}
				}
				$monSomethingToSave = true;
				break;

			}
			case 'single_option': {
				$monOutput['Content'] .= '	<fieldset class="form-group">'.PHP_EOL;
				$monOutput['Content'] .= '		<label class="col-md-1 control-label" for="'.$key.'">'.$value['name'].'</label>'.PHP_EOL;
				$monOutput['Content'] .= '		<div class="col-md-4">'.PHP_EOL;
				$monOutput['Content'] .= '			<select id="'.$key.'" name="'.$key.'" class="form-control">'.PHP_EOL;
				foreach ($value['options'] as $options_key => $options_value){
					if ($setting_value == $options_value) {
						$selected = ' selected=""';
					}
					else {
						$selected = '';
					}
					$monOutput['Content'] .= '				<option value="'.$options_value.'"'.$selected.'>'.$options_key.'</option>'.PHP_EOL;
				}
				$monOutput['Content'] .= '			</select>'.PHP_EOL;
				$monOutput['Content'] .= '			<span class="help-block">'.$value['help'].'</span>'.PHP_EOL;
				$monOutput['Content'] .= '		</div>'.PHP_EOL;
				$monOutput['Content'] .= '	</fieldset>'.PHP_EOL;
				$monSomethingToSave = true;
				break;
			}
			default: {

			}
		}
	}

	$monOutput['Content'] .= '	<fieldset class="form-group">'.PHP_EOL;
	$monOutput['Content'] .= '		<div class="col-md-1 control-label" for="">'.PHP_EOL;
	$monOutput['Content'] .= '			<input type="hidden" name="section" id="section" value="'.$monConfigurationSection.'">'.PHP_EOL;
	$monOutput['Content'] .= '		</div>'.PHP_EOL;
	$monOutput['Content'] .= '		<div class="col-md-4">'.PHP_EOL;
	if ($monSomethingToSave) {
		$monOutput['Content'] .= '			<input class="btn btn-primary" type="submit" value="Save">'.PHP_EOL;
	}
	$monOutput['Content'] .= '		</div>'.PHP_EOL;
	$monOutput['Content'] .= '	</fieldset>'.PHP_EOL;
	$monOutput['Content'] .= '</fieldset>'.PHP_EOL;
	$monOutput['Content'] .= '</form>'.PHP_EOL;

	}


	$monOutput['Include'] .= '	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">'.PHP_EOL;
	$monOutput['Include'] .= '	<link rel="stylesheet" type="text/css" href="css/mon.css"/>'.PHP_EOL;

	$monOutput['Title'] = $monConfiguration['usersettings']['title'].' - Settings';
	}


	// Constructing the error messages
	if (!empty($monErrors)){
	foreach ($monErrors as $details) {
	$monOutput['Errors'] .= '<div class="monErrors alert alert-danger"><strong>Error:</strong> '.$details.'</div>'.PHP_EOL;
	}
	}

	if (!empty($monNotifications)){
	foreach ($monNotifications as $details) {
	$monOutput['Errors'] .= '<div class="monErrors alert alert-success alert-dismissible"><strong>Success:</strong> '.$details.'</div>'.PHP_EOL;
	}
	}

	$output = new Template(MON_TEMPLATES_PATH.'index.tpl');
	foreach ($monOutput as $key => $content){
	$output->set($key, $content);
	}
	echo $output->output();
?>
