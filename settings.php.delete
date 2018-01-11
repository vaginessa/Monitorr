<!DOCTYPE html>
<html lang="en">

<!--
  __  __             _ _                  
 |  \/  |           (_) |                 
 | \  / | ___  _ __  _| |_ ___  _ __ _ __ 
 | |\/| |/ _ \| '_ \| | __/ _ \| '__| '__|
 | |  | | (_) | | | | | || (_) | |  | |   
 |_|  |_|\___/|_| |_|_|\__\___/|_|  |_|  
          made for the community
by @seanvree, @wjbeckett, and @jonfinley 
  https://github.com/Monitorr/Monitorr 
--> 

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link rel="apple-touch-icon" href="favicon.ico">
    
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Monitorr">
    <meta name="author" content="Monitorr">
    <meta name="version" content="php">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
    <link href='//fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

    <!-- Custom styles -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        body.offline #link-bar {
            display: none;
        }

        body.online #link-bar {
            display: block;
        }

        .auto-style1 {
            float: center;
            text-align: center;
        }
    </style>

    <?php include ('assets/config.php'); ?>
    <?php include ('assets/php/check.php') ;?>
    <?php include ('assets/php/gitinfo.php'); ?>
    
    <script src="assets/js/jquery.min.js"></script>


    <title><?php echo $config['title']; ?></title>


        <!-- https://jonsuh.com/blog/jquery-ajax-call-to-php-script-with-json-return/ -->

        <script type="text/javascript">

            /*     ONLOAD HERE????? */
            $("document").ready(function(){
            $(".js-ajax-php-json").submit(function(){
                var data = {
                "action": "settings"
                };
                data = $(this).serialize() + "&" + $.param(data);
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "assets/php/response.php", //Relative or absolute path to response.php file
                    data: data,
                    success: function(data) {

                        //THIS fires ON SUBMIT.  The below block is only for testing to show settings are being accepted and re-wrote to the settings.php page (permissions). 
                        $(".the-return").html(
                            "Site Title: " + data["title"] + 
                            "<br />Site URL: " + data["siteurl"] + 
                            "<br />Update Branch: " + data["updatebranch"] + 
                            "<br />Time Zone: " + data["timezone"] + 
                            "<br />Time Standard: " + data["timestandard"] + 
                            "<br />Time Time Refresh: " + data["rftime"] + 
                            "<br />JSON: " + data["json"] 
                            //To do:  Add the services above
                            );

                        //This is an alert to show settings were accepted by server. Obv this will be replaced with something like "settings saved, etc". 
                        alert("Form submitted successfully.\nReturned json: " + data["json"]);
                        }
                    });
                    return false;
                });
            });
        </script>

</head>

    <body>

        <br>

        <div class="navbar-brand">
            <a class="navbar-brand" href="<?php echo $config['siteurl']; ?>">
                <?php echo $config['title']; ?>
            </a>
        </div> 

            <br>

        <div> <center><strong>SETTINGS:</strong></center></div>
        
        <form id="form" action="assets/php/response.php" class="js-ajax-php-json" method="post" accept-charset="utf-8">
            
            <div class="Row">
                <div id="appbase" class="Column"> 
                    <center>APPLICATION BASE:</center>

                    <br>

                    Site Title: <input type="text" name="title" value="" placeholder="<?php echo $config['title'];?>" />
                    
                    <br>

                    Site URL: <input type="text" name="siteurl" value="" placeholder="<?php echo $config['siteurl'];?>" />

                    <br>

                    Update Branch:
                        <select name="updatebranch">
                            <option value="<?php echo $config['updatebranch'];?>">develop</option>
                            <option value="Master">Master</option>
                        </select>

                    <br>

                    Time Zone: <input type="text" name="timezone" value="" placeholder="<?php echo $config['timezone'];?>" />
                    
                    <br>

                    Time Standard:
                        <select name="timestandard">
                            <option value="<?php echo $config['timestandard'];?>">False</option>
                            <option value="True">True</option>
                        </select>

                    <br>

                    Time Refresh:  <input type="text" name="rftime" value="" placeholder="<?php echo $config['rftime'];?>" />(in milliseconds)

                    <br>

                </div>

                <div id="sysinfo" class="Column">

                    <center>SYSTEM INFO:</center>
                    
                    <br>

                    CPU "OK": <input type="text" name="cpuok" value="" placeholder="<?php echo $config['cpuok'];?>" />

                    <br>
                    
                    CPU "Warn": <input type="text" name="cpuwarn" value="" placeholder="<?php echo $config['cpuwarn'];?>" />

                    <br>
                    
                    RAM "OK": <input type="text" name="cpuok" value="" placeholder="<?php echo $config['ramok'];?>" />

                    <br>
                    
                    RAM "Warn": <input type="text" name="ramwarn" value="" placeholder="<?php echo $config['ramwarn'];?>" />

                    <br>
                    
                    Ping Host: <input type="text" name="pinghost" value="" placeholder="<?php echo $config['pinghost'];?>" />

                    <br>
                    
                    Ping Port: <input type="text" name="pingport" value="" placeholder="<?php echo $config['pingport'];?>" />

                    <br>
                    
                    Sysinfo Refresh: <input type="text" name="rfsysinfo" value="" placeholder="<?php echo $config['rfsysinfo'];?>" />

                    <br>

                    
                </div>
                
                <div id="services" class="Column">

                    <center>SERVICES:</center>

                        <!-- NEED TO ADD, THI IS A PLACEHOLDER -->

                </div>

            </div>

            <br>

            <div>
                <center>
                <input type="submit" name="submit" value="Submit form"  />
                </center>
            </div>

        </form>

            <br>

        <div class="the-return">
            [JSON data will display in this area after form submit]
        </div>


        <div class="footer">
        
            <p> <a href="https://github.com/monitorr/Monitorr" target="_blank"> Repo: Monitorr </a> // <a href="https://github.com/Monitorr/Monitorr/releases" target="_blank"> Version: <?php echo file_get_contents( "assets/js/version/version.txt" );?> </a> </p>

            <script src="assets/js/update.js" type="text/javascript"></script>
            
            <div>
                <a class="version_check" id="version_check" style="cursor: pointer;">Check for Update</a>
            </div>

        </div>


    </body>

</html>
