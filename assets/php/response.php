    <?php
    include ('../config.php'); 

        if (is_ajax()) {
            if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
                $action = $_POST["action"];
                switch($action) { //Switch case for value of action
                    // case "settings": settings_function(); break;
                    case "settings": write(); break;

                }
            }
        }

        //Function to check if the request is an AJAX request
        function is_ajax() {
            return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        };


        //Return JSON data to client
        
        function settings_function(){
            $return = $_POST;
            
            $return["json"] = json_encode($return);
            echo json_encode($return);
        };


        // FWRTE SCRIPT FROM INDEX HERE NOT IN INDEX

        function write(){
            $file = "../settings.json";
            $fh = fopen($file, 'w') or die("can't open file");
            
                $stringData = "Site Title: \$title;\n";
                fwrite($fh, $stringData);

            fclose($fh); 
        };

            
    ?>
