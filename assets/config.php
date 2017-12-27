<?php
// styled by @jonfinley
//          EXAMPLE
//  'dontedit' => 'EDITHERE'

$config = array(
    'title' => 'monitorr', // Site Title 
    'siteurl' => 'http://localhost', // SITE URL
    'updateBranch' => 'develop', // update branch you wish to use // "master" or "develop"
     'timezone' => 'America/Los_Angeles',
    'timestandard' => 'False', // True for Standard Time, DEFAULT = False
    'rftime' => '10000', // time refresh

  
    'cpuok' => '50', //CPU% less than this will be green
    'cpuwarn' => '90', //CPU% less than this will be yellow
    'ramok' => '50', //RAM% below this is green
    'ramwarn' => '90', //RAM% below this will be yellow
    'pinghost' => '8.8.8.8', // URL or IP to ping
    'pingport' => '53', // port to ping (defaults to 53)
    'rfsysinfo' => '5000', // system info refresh in milliseconds






    // if on Linux, the timezone script will automatically select your timezone
    // For Windows, set the timezone. Default is UTC Time.
    // I.E. ($timezone = 'America/Los_Angeles',) list of timezone: https://php.net/manual/en/timezones.php

//    'coloron' => '', // color for online, WIP
//    'coloroff' => '', // color for offline, WIP
    'githubtoken' => '', //OAuth2 token for access to github, to avoid 60/hr rate limit, see https://github.com/settings/tokens
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
