<?php
/**
 *
 */
class ScItemImageModel extends Model
{
    public $sc_image_id = NULL;
    public $sc_image_src = NULL;
    public $sc_image_title = NULL;
    public $sc_image_alt = NULL;
    public $sc_image_width = NULL;
    public $sc_image_height = NULL;
    public $sc_is_main = NULL;
    public $fk_sc_item_id = NULL;

    function insert($data=NULL){
        if($data!==NULL){
            $this->loadByObject($data);
        }

        $query =
          "INSERT INTO mod_showcase_images(
            sc_image_src,
            sc_image_title,
            sc_image_alt,
            sc_image_width,
            sc_image_height,
            sc_is_main,
            fk_sc_item_id
          )
          VALUES (
            '$this->sc_image_src',
            '$this->sc_image_title',
            '$this->sc_image_alt',
            '$this->sc_image_width',
            '$this->sc_image_height',
            '$this->sc_is_main',
            '$this->fk_sc_item_id'
          )";

          if(!$this->queryExec($query)){
              return FALSE;
          }else{
              return $this->mysqli->insert_id;
          }
    }

    function update($data=NULL){
        if($data!==NULL){
            $this->loadByObject($data);
        }

        $count = 0;
        foreach((array)$this as $field => $value){
            // TODO: field = value
            $count++;
        }

        $query =
          "UPDATE mod_showcase_images
          SET ($set_string)";
    }

    function delete($sc_item_image_id=NULL){
        if($sc_item_image_id!==NULL){
            $query = "DELETE FROM mod_showcase_images WHERE sc_image_id = $sc_item_image_id;";
            $result = $this->queryExec($query);
            if(!$result){
                return FALSE;
            }else{
                return TRUE;
            }
        }
    }
}
