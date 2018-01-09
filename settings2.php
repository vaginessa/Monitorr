<?php
// Start Session
session_start();

// will be buliding upon this.
//search DEVCHANGETHIS for things that need looking at -jonfinley

// Log out if requested << not setup DEVCHANGETHIS
//if (isset($_GET['logout']) and isset($_SESSION['loged-in'])) {
//	unset($_SESSION['loged-in']);
//	header('Location: index.php');
//	die;
//}

// Defining constants
define('mon_PATH', '');
define('mon_INCLUDE_PATH', mon_PATH.'assets/php/');
define('mon_CONFIGURATION_PATH', mon_PATH.'assets/config/');
define('mon_LANGUAGES_PATH', mon_PATH.'assets/languages/');
define('mon_CSS_PATH', mon_PATH.'assets/css/');
define('mon_JS_PATH', mon_PATH.'assets/js/');
define('mon_TEMPLATES_PATH', mon_PATH.'assets/templates/');
define('mon_FONTS_PATH', mon_PATH.'assets/fonts/');
define('mon_IMGCACHE_PATH', mon_PATH.'assets/cache/');
define('mon_BASE_PATH', $_SERVER['SCRIPT_NAME']);

// Defining runtime variables and setting standard details
$monConfiguration = array(
	'general' => array(), // internal info, dev and program info
	'usersettings' => array(), // user changeable settings
	'advancedsettings' => array(),
	'services' => array(), //
);

if (isset($_GET['section'])) {
	$monConfigurationSection = $_GET['section'];
}
else {
	$monConfigurationSection = 'services';
}

$monSomethingToSave = false;

$monConfigurationSettings = array(
	'general' => array( // GENERIC INFO NOT TO BE CHANGED EXCEPT BY DEV
		'script_name' => array(
			'name' => 'Program Name',
			'help' => '',
			'type' => 'info',
			'default' => 'Monitorr'
		),
		'script_description' => array(
			'name' => 'Description',
			'help' => '',
			'type' => 'info',
			'default' => 'WE MONITORR YOUR SHIT!!!', //DEVCHANGETHIS
		),
		'script_version' => array(
			'name' => 'Version',
			'help' => '',
			'type' => 'info',
			'default' => 'v1.0.1s (alpha)' //DEVCHANGETHIS
		),
		'script_guid' => array( //DEVCHANGETHIS is this even needed?
			'name' => 'GUID',
			'help' => 'Globally Unique IDentifier of the script',
			'type' => 'info',
			'default' => ''
		)
	),
	'usersettings' => array( // MAIN USER SETTINGS
		'name' => 'User Settings',
		'description' => 'Monitorr User Settings',
		'settings' => array(
			'title' => array( // DEVCHANGETHIS
				'name' => 'Site Title',
				'help' => 'Title to be shown in the header',
				'type' => 'string',
				'default' => 'monitorr'
			),
			'siteurl' => array( // DEVCHANGETHIS
				'name' => 'Site URL',
				'help' => 'URL that links from the Site Header',
				'type' => 'string',
				'default' => ''
			),
			'admin_password' => array(
				'name' => 'Administator Password',
				'help' => 'Administator Password for the Settings section',
				'type' => 'string',
				'default' => ''
			),
			'language' => array(
				'name' => 'Language',
				'help' => 'Select the language of the program (not yet implemented)',
				'type' => 'disabled',
				'default' => 'en'
			),
			'settings_link' => array(
				'name' => 'Settings Link',
				'help' => 'Show link to Settings section in on mainpage', //DEVCHANGETHIS
				'type' => 'bolean',
				'default' => 1
			),
			'debug' => array(
				'name' => 'Debug',
				'help' => 'Show link with debug information (CAUTION: this will expose your token!)<br />Will also turn on/off PHP error reporting',
				'type' => 'bolean',
				'default' => 0
			),
			'timezone' => array(
				'name' => 'Timezone',
				'help' => 'Choose your Timezone, ', //should look at autopopulating this on Linux
 				'type' => 'single_option',
				'options' => array(
				    'Pacific/Midway'       => "(GMT-11:00) Midway Island",
				    'US/Samoa'             => "(GMT-11:00) Samoa",
				    'US/Hawaii'            => "(GMT-10:00) Hawaii",
				    'US/Alaska'            => "(GMT-09:00) Alaska",
				    'US/Pacific'           => "(GMT-08:00) Pacific Time (US &amp; Canada)",
				    'America/Tijuana'      => "(GMT-08:00) Tijuana",
				    'US/Arizona'           => "(GMT-07:00) Arizona",
				    'US/Mountain'          => "(GMT-07:00) Mountain Time (US &amp; Canada)",
				    'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
				    'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
				    'America/Mexico_City'  => "(GMT-06:00) Mexico City",
				    'America/Monterrey'    => "(GMT-06:00) Monterrey",
				    'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
				    'US/Central'           => "(GMT-06:00) Central Time (US &amp; Canada)",
				    'US/Eastern'           => "(GMT-05:00) Eastern Time (US &amp; Canada)",
				    'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
				    'America/Bogota'       => "(GMT-05:00) Bogota",
				    'America/Lima'         => "(GMT-05:00) Lima",
				    'America/Caracas'      => "(GMT-04:30) Caracas",
				    'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
				    'America/La_Paz'       => "(GMT-04:00) La Paz",
				    'America/Santiago'     => "(GMT-04:00) Santiago",
				    'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
				    'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
				    'Greenland'            => "(GMT-03:00) Greenland",
				    'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
				    'Atlantic/Azores'      => "(GMT-01:00) Azores",
				    'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
				    'Africa/Casablanca'    => "(GMT) Casablanca",
				    'Europe/Dublin'        => "(GMT) Dublin",
				    'Europe/Lisbon'        => "(GMT) Lisbon",
				    'Europe/London'        => "(GMT) London",
				    'Africa/Monrovia'      => "(GMT) Monrovia",
				    'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
				    'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
				    'Europe/Berlin'        => "(GMT+01:00) Berlin",
				    'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
				    'Europe/Brussels'      => "(GMT+01:00) Brussels",
				    'Europe/Budapest'      => "(GMT+01:00) Budapest",
				    'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
				    'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
				    'Europe/Madrid'        => "(GMT+01:00) Madrid",
				    'Europe/Paris'         => "(GMT+01:00) Paris",
				    'Europe/Prague'        => "(GMT+01:00) Prague",
				    'Europe/Rome'          => "(GMT+01:00) Rome",
				    'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
				    'Europe/Skopje'        => "(GMT+01:00) Skopje",
				    'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
				    'Europe/Vienna'        => "(GMT+01:00) Vienna",
				    'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
				    'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
				    'Europe/Athens'        => "(GMT+02:00) Athens",
				    'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
				    'Africa/Cairo'         => "(GMT+02:00) Cairo",
				    'Africa/Harare'        => "(GMT+02:00) Harare",
				    'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
				    'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
				    'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
				    'Europe/Kiev'          => "(GMT+02:00) Kyiv",
				    'Europe/Minsk'         => "(GMT+02:00) Minsk",
				    'Europe/Riga'          => "(GMT+02:00) Riga",
				    'Europe/Sofia'         => "(GMT+02:00) Sofia",
				    'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
				    'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
				    'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
				    'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
				    'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
				    'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
				    'Europe/Moscow'        => "(GMT+03:00) Moscow",
				    'Asia/Tehran'          => "(GMT+03:30) Tehran",
				    'Asia/Baku'            => "(GMT+04:00) Baku",
				    'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
				    'Asia/Muscat'          => "(GMT+04:00) Muscat",
				    'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
				    'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
				    'Asia/Kabul'           => "(GMT+04:30) Kabul",
				    'Asia/Karachi'         => "(GMT+05:00) Karachi",
				    'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
				    'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
				    'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
				    'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
				    'Asia/Almaty'          => "(GMT+06:00) Almaty",
				    'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
				    'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
				    'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
				    'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
				    'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
				    'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
				    'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
				    'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
				    'Australia/Perth'      => "(GMT+08:00) Perth",
				    'Asia/Singapore'       => "(GMT+08:00) Singapore",
				    'Asia/Taipei'          => "(GMT+08:00) Taipei",
				    'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
				    'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
				    'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
				    'Asia/Seoul'           => "(GMT+09:00) Seoul",
				    'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
				    'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
				    'Australia/Darwin'     => "(GMT+09:30) Darwin",
				    'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
				    'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
				    'Australia/Canberra'   => "(GMT+10:00) Canberra",
				    'Pacific/Guam'         => "(GMT+10:00) Guam",
				    'Australia/Hobart'     => "(GMT+10:00) Hobart",
				    'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
				    'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
				    'Australia/Sydney'     => "(GMT+10:00) Sydney",
				    'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
				    'Asia/Magadan'         => "(GMT+12:00) Magadan",
				    'Pacific/Auckland'     => "(GMT+12:00) Auckland",
				    'Pacific/Fiji'         => "(GMT+12:00) Fiji",
				),
			),
			'timestandard' => array(
				'name' => 'Time Standard',
				'help' => '12 hour or 24 hour',
				'type' => 'single_option',
				'options' => array(
					'Military (24 hour)' => 'world', // DEVCHANGETHIS
					'Standard (12 hour)' => 'human' // DEVCHANGETHIS
				),
				'default' => 'world'
			),
			'rftime' => array( // DEVCHANGETHIS
				'name' => 'Refresh Time',
				'help' => 'Refresh time to check all services',
				'type' => 'string',
				'default' => '10000'
			),
	),
	'services' => array( // SERVICES TBD
	),
	'advancedsettings' => array( // ADVANCED USER SETTINGS
		'name' => 'Advanced User Settings',
		'description' => 'Advanced Monitorr User Settings',
		'settings' => array(
			'updatebranch' => array( //DEVCHANGETHIS
				'name' => 'Update Branch',
				'help' => 'The branch you want to be on for updates',
				'type' => 'single_option',
				'options' => array(
					'Master' => 'safe', // DEVCHANGETHIS
					'Develop' => 'edgy' // DEVCHANGETHIS
				),
				'default' => 'master'
			),
			'cpuok' => array( // DEVCHANGETHIS
				'name' => 'CPU Good',
				'help' => 'CPU% less than this will be green',
				'type' => 'string',
				'default' => '50'
			),
			'cpuwarn' => array( // DEVCHANGETHIS
				'name' => 'CPU Warn',
				'help' => 'CPU% less than this will be yellow',
				'type' => 'string',
				'default' => '90'
			),
			'ramok' => array( // DEVCHANGETHIS
				'name' => 'RAM Good',
				'help' => 'RAM% less than this will be green',
				'type' => 'string',
				'default' => '50'
			),
			'ramwarn' => array( // DEVCHANGETHIS
				'name' => 'RAM Warn',
				'help' => 'RAM% less than this will be yellow',
				'type' => 'string',
				'default' => '90'
			),
			'coloron' => array( // DEVCHANGETHIS
				'name' => 'Online Color',
				'help' => 'This is the color that shows when service is online',
				'type' => 'string',
				'default' => '' // will need to rewrite this
			),
			'coloroff' => array( // DEVCHANGETHIS
				'name' => 'Offline Color',
				'help' => 'This is the color that shows when service is offline',
				'type' => 'string',
				'default' => '' // will need to rewrite this
			),
			'bgcolor' => array( // DEVCHANGETHIS
				'name' => 'Background Color',
				'help' => 'This is the color that shows one the background',
				'type' => 'string',
				'default' => '' // will need to rewrite this
			),
			'tilecolor' => array( // DEVCHANGETHIS
				'name' => 'Tile Color',
				'help' => 'This is the  tile color that shows one the background',
				'type' => 'string',
				'default' => '' // will need to rewrite this
			),
			'tileshadowcolor' => array( // DEVCHANGETHIS
				'name' => 'Tile Shadow Color',
				'help' => 'This is the  tile Shadow color',
				'type' => 'string',
				'default' => '' // will need to rewrite this
			),
			'textcolor' => array( // DEVCHANGETHIS
				'name' => 'Text Color',
				'help' => 'This is the Text color on the main page',
				'type' => 'string',
				'default' => '' // will need to rewrite this
			),
			'textshadowcolor' => array( // DEVCHANGETHIS
				'name' => 'Text Shadow Color',
				'help' => 'This is the text shadow color on the main page',
				'type' => 'string',
				'default' => '' // will need to rewrite this
			),
			'pinghost' => array( // DEVCHANGETHIS
				'name' => 'Ping Host',
				'help' => 'URL or IP to ping',
				'type' => 'string',
				'default' => '8.8.8.8'
			),
			'pingport' => array( // DEVCHANGETHIS
				'name' => 'Ping Port',
				'help' => 'Port to ping (defaults to 53)',
				'type' => 'string',
				'default' => '53'
			),
			'rfsysinfo' => array( // DEVCHANGETHIS
				'name' => 'System Info Refresh',
				'help' => 'ystem info refresh in milliseconds',
				'type' => 'string',
				'default' => '5000'
			),
			'githubtoken' => array( // DEVCHANGETHIS
				'name' => 'Github OAuth token',
				'help' => 'OAuth2 token for access to github, to avoid 60/hr rate limit',
				'type' => 'string',
				'default' => ''
			),
	),
);

?>
