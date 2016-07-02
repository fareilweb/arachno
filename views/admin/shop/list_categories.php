<div class="list_categories">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2><?=Lang::$categories?></h2>
        </div>
    </div><hr/>
    
    <div class="row">
        <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
            <div class="form-group">
                <select name="list_categories_filter" id="list_categories_filter" class="form-control">
                    <option value="NULL">Filtra...</option>
                    <!--TODO-->
                    <option value="">Solo Categorie Pubblicate</option>
                    <option value="">Solo Categorie Non Pubblicate</option>
                </select>
                <script>
                    jQuery("#list_categories_filter").change(function(){
                        swal({
                           title: "Presto Disponibile",
                           text: "",
                           type: "success"
                        });
                    });
                </script>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
            <div class="form-group">
                <a href="<?=Config::$web_path;?>/Admin/editCategory" class="btn btn-default form-control">
                    <span class="glyphicon glyphicon-plus"></span> 
                    <?=Lang::$add_category?>
                </a>
            </div>
        </div>
    </div>
    
    <?php if(isset($this->categories) && count($this->categories) > 0):?>
        <table>
            <tbody>
                <tr>
                    <th><?=Lang::$id?></th>
                    <th><?=Lang::$name?></th>
                    <th><?=Lang::$status?></th>
                    <th><?=Lang::$language?></th>
                    <th><?=Lang::$category_parent?></th>
                    <th><?=Lang::$actions?></th>
                </tr>

                <?php foreach($this->categories as $category):?>
                    <tr>
                        <td><?=$category->category_id?></td>
                        <td><?=$category->category_name?></td>
                        <td>
                            <?=$category->category_status ? 
                            '<i class="glyphicon glyphicon-ok"></i> ' . Lang::$published : 
                            '<i class="glyphicon glyphicon-warning-sign"></i> ' . Lang::$suspended;?>
                        </td>
                        <td><?=$category->lang_name?></td>
                        <td><?=$category->category_parent_name?></td>
                        <td>
                            <a href="<?=Config::$web_path;?>/Admin/editCategory/<?=$category->category_id;?>" class="btn btn-default">
                                <span class="glyphicon glyphicon-edit"></span> 
                                <?=Lang::$edit?>
                            </a>
                            <a href="<?=Config::$web_path;?>/Admin/deleteCategory/<?=$category->category_id;?>" class="btn btn-default">
                                <span class="glyphicon glyphicon-remove"></span> 
                                <?=Lang::$delete?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>

            </tbody>
        </table>
    <?php endif;?>
    
</div>