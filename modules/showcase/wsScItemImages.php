<?php
/**
 *
 */
class wsScItemImages extends ws
{
    function save($args=array())
    {
        $this->args = $args;
        include_once dirname(__FILE__) . '/models/ScItemImageModel.php';
        $model = new ScItemImageModel();

        $data = new stdClass();
        $data->sc_image_src = $this->post['sc_image_src'];
        $data->fk_sc_item_id = $this->post['sc_item_id'];

        $insert_id = $model->insert($data);
        if(!$insert_id){
            echo json_encode(["status"=>false, "message"=>"DB_STORE_FAILED"]);
        }else{
            echo json_encode(["status"=>true, "message"=>"DB_STORE_SUCCES", "insert_id"=>$insert_id]);
        }

    }

    function delete($args=array())
    {
        $this->args = $args;

        if(isset($this->post['sc_item_image_id'])){
            include_once dirname(__FILE__) . '/models/ScItemImageModel.php';
            $model = new ScItemImageModel();
            if($model->delete($this->post['sc_item_image_id'])){
                if(isset($this->post['abs_file_name'])){
                    if(unlink($this->post['abs_file_name'])){
                        echo json_encode(["status"=>TRUE, "message"=>"FILE_DELETE_SUCCESS"]);
                    }else{
                        echo json_encode(["status"=>FALSE, "message"=>"FILE_DELETE_FAILED"]);
                    }
                }
            }else{
                echo json_encode(["status"=>FALSE, "message"=>"DB_DELETE_FAILED"]);
            }
        }
    }


}
