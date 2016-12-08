<?php
/**
 * Web Services Controller
 */
class ws extends Controller
{
    function checkAuth($args=array())
    {
        require_once Config::$abs_path . '/libs/php/Auth.php';
        $user = $this->getModel('UserModel');

        if( isset($this->user['user_email']) ){

            //Auth By LOGIN
            $user->loadUserByEmail($this->user['user_email']);
            if($user->user_type !== "admin"){
                echo json_encode(["status"=>FALSE, "message"=>"AUTH_FAILED"]);
                exit;
            }else{
                return TRUE;
            }

        }else if( isset($this->post['user_email']) && isset($this->post['user_password']) ){

            // Auth By POST
            $user->loadUserByEmail($this->post['user_email']);
            if(!Auth::verifyPassword($this->post['user_password'], $user->user_password)){
                echo json_encode(["status"=>FALSE, "message"=>"AUTH_FAILED"]);
                exit;
            }else{
                return TRUE;
            }

        }else if( isset($args[0]) && isset($args[1]) ){

            // Auth By ARGS
            $user->loadUserByEmail($args[0]);
            if(!Auth::verifyPassword($args[1], $user->user_password)){
                echo json_encode(["status"=>FALSE, "message"=>"AUTH_FAILED"]);
                exit;
            }else{
                return TRUE;
            }

        }else{
            echo json_encode(["status"=>FALSE, "message"=>"AUTH_FAILED"]);
            exit;
        }
    }

    function call($args=array()){
        if($this->checkAuth($args)){
            if(
              isset($this->post['ws_file']) &&
              isset($this->post['ws_class']) &&
              isset($this->post['ws_action'])
            ){
                $ws_file = $this->post['ws_file'];
                $ws_class = $this->post['ws_class'];
                $ws_action = $this->post['ws_action'];
                include $ws_file;
                $ws = new $ws_class();
                $ws->$ws_action($args);
            }
        }
    }

    function deleteFile($args=array()){
        $this->checkAuth($args); //This Service Require Authentication
        if(isset($this->post['file'])){
            if(unlink($this->post['file'])){
                echo json_encode(["status"=>TRUE, "message"=>"FILE_DELETE_SUCCESS"]);
            }else{
                echo json_encode(["status"=>FALSE, "message"=>"FILE_DELETE_FAILED"]);
            }
        }
    }

    function deleteDirectory($args=array()){
        $this->checkAuth($args); //This Service Require Authentication
        if(isset($this->post['folder'])){
            if(rmdir($this->post['folder'])){
                echo json_encode(["status"=>TRUE, "message"=>"FOLDER_DELETE_SUCCESS"]);
            }else{
                echo json_encode(["status"=>FALSE, "message"=>"FOLDER_DELETE_FAILED"]);
            }
        }
    }

    function uploadImage($args=array()){
        $this->checkAuth($args); //This Service Require Authentication

        // Get Storage Path
        $store_path = "";
        if(isset($this->post['store_path'])){
            $store_path = $this->post['store_path'];
        }

        // Get Prefix For File Name
        $prefix = "";
        if(isset($this->post['prefix'])){
            $prefix = $this->post['prefix'];
        }

        if($store_path!==""){

            // Check if path folder exists. If not create it
            if (!file_exists($store_path)) {
                mkdir($store_path, 0777, true);
            }

            // Check and store file
            require_once Config::$abs_path . '/helpers/FileUpload.php';
            $upl = new FileUpload();

            // UploadFile settings
            $upl->allow     = array('image/jpeg', 'image/png', 'image/gif', 'image/bmp');
            $upl->maxSize   = 10485760;
            $upl->inputName = "file";
            $upl->savePath  = $store_path;
            $upl->prefix    = $prefix;

            $check_result = TRUE;

            if($check_result===TRUE)
            {
                if(!$upl->saveFile()){
                    echo json_encode(["status"=>FALSE, "message"=>"saveFile_FAILED"]);
                }else{
                    echo json_encode(["status"=>TRUE, "message"=>"saveFile_SUCCESS", "prefix"=>"$prefix"]);
                }
            }else{
                echo json_encode(["status"=>FALSE, "message"=>$upl->error]);
            }
        }
    }

}
