<div class="container-fluid list_items">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2><?=Lang::$products?></h2>
        </div>
    </div><hr/>
    
    <div class="row">
        <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
            <div class="form-group">
                <select name="list_items_filter" id="list_items_filter" class="form-control">
                    <option value="NULL">Filtra...</option>
                    <!--TODO-->
                    <option value="">Solo Prodotti Pubblicati</option>
                    <option value="">Solo Prodotti Non Pubblicati</option>
                </select>
                <script>
                    jQuery("#list_items_filter").change(function(){
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
                <a href="<?=Config::$web_path;?>/Admin/editItem" class="btn btn-default form-control">
                    <span class="glyphicon glyphicon-plus"></span> <?=Lang::$add_item?>
                </a>
            </div>
        </div>
    </div>
    
    <?php if(isset($this->items) && $this->items!==FALSE):?>
    <table>
        <tbody>
            <tr>
                <th><?=Lang::$id?></th>
                <th><?=Lang::$item_code?></th>
                <th><?=Lang::$item_title?></th>
                <th><?=Lang::$status?></th>
                <th><?=Lang::$item_stock?></th>
                <th><?=Lang::$item_price?></th>
                <th><?=Lang::$language?></th>
                <th><?=Lang::$actions?></th>
            </tr>
            <?php foreach($this->items as $item_val):?>
                <tr>
                    <td><?=$item_val->item_id;?></td>
                    <td><?=$item_val->item_code;?></td>
                    <td><?=$item_val->item_title;?></td>
                    <td>
                        <?=$item_val->item_status ? '<i class="glyphicon glyphicon-ok"></i> '.Lang::$available : '<i class="glyphicon glyphicon-warning-sign"></i> '.Lang::$unavailable;?>
                    </td>
                    <td><?=$item_val->item_stock;?></td>
                    <td><?=$item_val->item_price;?></td>
                    <td><?=$item_val->lang_name;?></td>
                    <td>
                        <a href="<?=Config::$web_path;?>/Admin/editItem/<?=$item_val->item_id;?>" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit"></span> 
                            <?=Lang::$edit?>
                        </a>
                        <a href="<?=Config::$web_path;?>/Admin/deleteItem/<?=$item_val->item_id;?>/redirect/" class="btn btn-default">
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