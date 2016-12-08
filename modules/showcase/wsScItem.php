<?php
/**
 *
 */
class wsScItem extends ws
{
    function save(){
        parse_str($this->raw_post["item_serialized_data"], $data);
        include_once dirname(__FILE__) . '/models/ScItemModel.php';
        $model = new ScItemModel();

        $model->loadByArray($data);
        if($model->sc_item_id!=""){
            if(!$model->update()){
                echo json_encode(["status"=>FALSE, "message"=>"ITEM_UPDATE_FAILED"]);
            }else{
                echo json_encode(["status"=>TRUE, "message"=>"ITEM_UPDATE_SUCCESS"]);
            }
        }else{
            $insert_id = $model->insert();
            if(!$insert_id){
                echo json_encode(["status"=>FALSE, "message"=>"ITEM_INSERT_FAILED"]);
            }else{
                echo json_encode(["status"=>TRUE, "message"=>"ITEM_INSERT_SUCCESS", "insert_id"=>$insert_id]);
            }
        }
    }
}
