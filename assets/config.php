<?php
// styled by @jonfinley
//          EXAMPLE
//  'dontedit' => 'EDITHERE'

$config = array(
    'title' => 'monitorr', // Site Title <added usersettings
    'siteurl' => 'http://localhost', // SITE URL <added usersettings
    'updateBranch' => 'develop', // <advanced update branch you wish to use // "master" or "develop"
    'timezone' => 'America/Los_Angeles',// <added usersettings
    'timestandard' => 'False', // <added usersettings  True for Standard Time, DEFAULT = False
    'rftime' => '10000', // <added usersettings time refresh


    'cpuok' => '50', //<<added advancedsettings CPU% less than this will be green
    'cpuwarn' => '90', //<<added advancedsettings CPU% less than this will be yellow
    'ramok' => '50', //<<added advancedsettings RAM% below this is green
    'ramwarn' => '90', //<<added advancedsettings RAM% below this will be yellow
    'pinghost' => '8.8.8.8', //<<added advancedsettings URL or IP to ping
    'pingport' => '53', //<<added advancedsettings port to ping (defaults to 53)
    'rfsysinfo' => '5000', //<<added advancedsettings  system info refresh in milliseconds






    // if on Linux, the timezone script will automatically select your timezone
    // For Windows, set the timezone. Default is UTC Time.
    // I.E. ($timezone = 'America/Los_Angeles',) list of timezone: https://php.net/manual/en/timezones.php

//    'coloron' => '', //<<added advancedsettings color for online, WIP
//    'coloroff' => '', //<<added advancedsettings color for offline, WIP
    'githubtoken' => '', //<<added advancedsettings OAuth2 token for access to github, to avoid 60/hr rate limit, see https://github.com/settings/tokens
);
// thanks @causefx for the assist <3
// supports http, https, domain, ip,
//  "NAMEOFAPP" => array(
//      "link" => "http://linktoyourapp.com",
//      "image" => "ACTUALAPPNAME.png"
//    ),

$myServices = array(
    "Monitorr" => array(
        "link" => "http://localhost/monitorr",
        "image" => "monitorr.png"
        ),

    "PlexPy" => array(
        "link" => "http://localhost:8181",
        "image" => "plexpy.png"
        ),
   );
?>
