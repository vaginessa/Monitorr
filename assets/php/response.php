    <?php
        if (is_ajax()) {
            if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
                $action = $_POST["action"];
                switch($action) { //Switch case for value of action
                    case "settings": settings_function(); break;
                }
            }
        }

        //Function to check if the request is an AJAX request
        function is_ajax() {
            return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        }

        function settings_function(){
            $return = $_POST;
            
            $return["json"] = json_encode($return);
            echo json_encode($return);
            
/*            $file = fopen("settings.json","w");
            echo fwrite($file, "$return");
            fclose($file);  */
        }
    
    ?>