<?php

class Upload extends Controller
{
    
    function index($args)
    {
        // Dependencies
        require_once(Config::$abs_path . '/libs/php/FileUpload.php');
        
        // data
        $this->args = $args;
        $this->uplaod = new FileUpload();
        
        $this->debug($this);
    }
    
    
    function itemImagesProcess()
    {
        $images_arr = array();
        foreach($_FILES['images']['name'] as $key=>$val){
            //upload and stored images
            $target_dir = Config::$abs_path . "/views/shop/uploads/";
            $target_file = $target_dir.$_FILES['images']['name'][$key];
            if(move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)){
                $images_arr[] = $target_file;
            }
        }
        
        if(!empty($images_arr))
        { 
            ?>
                <table><tbody>
                    <tr>
                        <th><?=Lang::$preview?></th>
                        <th><?=Lang::$title?></th>
                        <th><?=Lang::$alt_text?></th>
                        <th><?=Lang::$main_image?></th>
                    </tr>
            <?php
                foreach($images_arr as $image_path)
                {
                    $image_src = Config::$web_path . "/views/shop/uploads/" . basename($image_path);
            ?>
                    <input type="hidden" name="images_src[]" value="<?=$image_src?>" />
                    <input type="hidden" name="images_name[]" value="<?=basename($image_path)?>" />
                    
                    <tr>
                        <td><img src="<?=$image_src?>" alt="Image Preview" ></td>
                        <td><input type="text" name="images_title[]" value="" class="form-control" /></td>
                        <td><input type="text" name="images_alt[]" value="" class="form-control" /></td>
                        <td>
                            <select name="images_is_main[]" class="form-control">
                                <option value="FALSE"><?=Lang::$no?></option>
                                <option value="TRUE"><?=Lang::$yes?></option>
                            <select>
                        </td>
                    </tr>
            <?php
                }
            ?>
                </tbody></table>
            <?php
        }
        
    }
    
}
