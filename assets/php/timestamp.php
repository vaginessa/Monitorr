<?php // adapted from this website: https://bojanz.wordpress.com/2014/03/11/detecting-the-system-timezone-php/

$str = file_get_contents('../config/usersettings.json');
$json = json_decode($str, true);

if (!empty($json['timezone'])) {
    $str = file_get_contents('../config/usersettings.json');
    $json = json_decode($str, true);
    $timezone = $json['timezone']; 
}
$timestandard = strtolower($config['timestandard']); 
if (is_link('/etc/localtime')) {
    // Mac OS X (and older Linuxes)
    // /etc/localtime is a symlink to the
    // timezone in /usr/share/zoneinfo.
    $filename = readlink('/etc/localtime');
    if (strpos($filename, '/usr/share/zoneinfo/') === 0) {
        $timezone = substr($filename, 20);
    }
} elseif (file_exists('/etc/timezone')) {
    // Ubuntu / Debian.
    $data = file_get_contents('/etc/timezone');
    if ($data) {
        $timezone = $data;
    }
} elseif (file_exists('/etc/sysconfig/clock')) {
    // RHEL / CentOS
    $data = parse_ini_file('/etc/sysconfig/clock');
    if (!empty($data['ZONE'])) {
        $timezone = $data['ZONE'];
    }
}
    date_default_timezone_set($timezone);
    $timestamp = time();
    $server_date = date("D, d M Y");
?>

<?php
    echo "$server_date"?>
<br>

<?php
$str = file_get_contents('../config/usersettings.json');
$json = json_decode($str, true);
$timestandard = $json['timestandard']; 
if ($timestandard=='True') {
    $msg = date("h:i:s a T");
    echo $msg;
} elseif ($timestandard=='true') {
    $msg = date("h:i:s a T");
    echo $msg;
} elseif ($timestandard=='t') {
    $msg = date("h:i:s a T");
    echo $msg;
} elseif ($timestandard=='False') {
    $msg = date("H:i:s T");
    echo $msg;
} elseif ($timestandard=='false') {
    $msg = date("H:i:s T");
    echo $msg;
} elseif ($timestandard=='f') {
    $msg = date("H:i:s T");
    echo $msg;
}
    ?>
