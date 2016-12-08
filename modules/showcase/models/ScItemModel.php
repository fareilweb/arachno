<?php
/**
 *
 */
class ScItemModel extends Model
{

    public $sc_item_id = NULL;
    public $sc_item_slug = "";
    public $sc_item_name = "";
    public $sc_item_short_desc = "";
    public $sc_item_long_desc = "";
    public $sc_item_date = "";
    public $sc_item_status = "";
    public $images = array();
    public $categories = array();


    function __construct(){
        parent::__construct();
    }


    function insert($data=NULL){
        foreach( (array)$this as $field => $value){
            if( is_string($value) ){
                $this->$field = $this->mysqli->real_escape_string($value);
            }
        }
        $query =
          "INSERT INTO mod_showcase_item (
              sc_item_id,
              sc_item_slug,
              sc_item_name,
              sc_item_short_desc,
              sc_item_long_desc,
              sc_item_date,
              sc_item_status
          ) VALUES (
              NULL,
              '$this->sc_item_slug',
              '$this->sc_item_name',
              '$this->sc_item_short_desc',
              '$this->sc_item_long_desc',
              '$this->sc_item_date',
              '$this->sc_item_status'
          );";

          if(!$this->queryExec($query)){
              return FALSE;
          }else{
              return $this->mysqli->insert_id;
          }
    }


    function update($data=NULL){
        foreach( (array)$this as $field => $value){
            if( is_string($value) ){
                $this->$field = $this->mysqli->real_escape_string($value);
            }
        }
        $query =
          "UPDATE mod_showcase_item
          SET
            sc_item_slug = '$this->sc_item_slug',
            sc_item_name = '$this->sc_item_name',
            sc_item_short_desc = '$this->sc_item_short_desc',
            sc_item_long_desc = '$this->sc_item_long_desc',
            sc_item_date = '$this->sc_item_date',
            sc_item_status = '$this->sc_item_status'
          WHERE mod_showcase_item.sc_item_id = '$this->sc_item_id';";

          if(!$this->queryExec($query)){
              return FALSE;
          }else{
              return TRUE;
          }
    }


    function delete($sc_item_id=NULL){
        $item = $this->getItemById($sc_item_id);
        $this->loadByObject( $item );

        $res_images_unlink = TRUE;
        foreach ($this->images as $img)
        {
            $img_abs_path = Config::$abs_path . '/themes/' . Config::$theme . '/images' . $img->sc_image_src;
            if(!unlink($img_abs_path)){
                $res_images_unlink = FALSE;
                break;
            }
        }

        $query_delete_images =
          "DELETE FROM mod_showcase_images WHERE fk_sc_item_id = '$this->sc_item_id';";

        $query_delete_categories =
          "DELETE FROM mod_showcase_item_has_category WHERE fk_sc_item_id = '$this->sc_item_id';";

        $query_delete_item =
          "DELETE FROM mod_showcase_item WHERE sc_item_id = '$this->sc_item_id';";

        $res_del_images = $this->queryExec($query_delete_images);
        $res_del_categories = $this->queryExec($query_delete_categories);
        $res_del_item = $this->queryExec($query_delete_item);

        if(!$res_images_unlink){
            return FALSE;
        }else if(!$res_del_categories){
            return FALSE;
        }else if(!$res_del_images){
            return FALSE;
        }else if(!$res_del_item){
            return FALSE;
        }else{
            return TRUE;
        }
    }


    function getItemById($sc_item_id){
        $query_item = "SELECT * FROM mod_showcase_item WHERE sc_item_id = $sc_item_id;";
        $item = $this->getObjectData($query_item);
        if($item)
        {
            // Get/Append Current Item Images
            $query_images = "SELECT * FROM mod_showcase_images WHERE fk_sc_item_id = $item->sc_item_id;";
            $item->images = $this->getObjectsList($query_images);

            // Get/Append Current Item Categories
            $query_categories =
              "SELECT * FROM mod_showcase_category
              LEFT JOIN mod_showcase_item_has_category ON mod_showcase_item_has_category.fk_sc_category_id = mod_showcase_category.sc_category_id
              WHERE fk_sc_item_id = $item->sc_item_id;";
            $item->categories = $this->getObjectsList($query_categories);

            return $item;
        }else{
            return FALSE;
        }
    }

    function getAll(){
        $query_items = "SELECT * FROM mod_showcase_item";
        $items = $this->getObjectsList($query_items);
        if($items)
        {
            foreach ($items as $key => $item)
            {
                // Get/Append Current Item Images
                $query_images = "SELECT * FROM mod_showcase_images WHERE fk_sc_item_id = $item->sc_item_id;";
                $item->images = $this->getObjectsList($query_images);

                // Get/Append Current Item Categories
                $query_categories =
                  "SELECT * FROM mod_showcase_category
                  LEFT JOIN mod_showcase_item_has_category ON mod_showcase_item_has_category.fk_sc_category_id = mod_showcase_category.sc_category_id
                  WHERE fk_sc_item_id = $item->sc_item_id;";
                $item->categories = $this->getObjectsList($query_categories);
            }
            return $items;
        }else{
            return FALSE;
        }
    }

}
