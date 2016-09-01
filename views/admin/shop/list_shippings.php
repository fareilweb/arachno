<div class="container-fluid list_shippings">
    
    <h2>
        <span class="glyphicon glyphicon-send"></span>
        <?=Lang::$shippings;?>
        <a href="<?=Config::$web_path;?>/Admin/editShipping" class="btn btn-info">
            <span class="glyphicon glyphicon-plus"></span>
            <?=Lang::$add;?>
        </a>
    </h2><hr/>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
                <table>
                    <tbody>
                        <tr>
                            <th>
                                <?=Lang::$id;?>
                            </th>
                            <th>
                                <?=Lang::$name;?>
                            </th>
                            <th>
                                <?=Lang::$price;?>
                            </th>
                            <th>
                                <?=Lang::$status;?>
                            </th>
                            <th>
                                <?=Lang::$details;?>
                            </th>
                            <th>
                                <?=Lang::$actions;?>
                            </th>
                        </tr>
                        
                        <?php foreach($this->ship_methods as $ship_key=>$ship_val):?>
                        <tr>
                            <td>
                                <?=$ship_val->shipping_id;?>
                            </td>
                            <td>
                                <?=$ship_val->shipping_name;?>
                            </td>
                            <td>
                                <?=$ship_val->shipping_cost;?>
                            </td>
                            <td>
                                <?php if($ship_val->shipping_status):?>
                                    <span class="glyphicon glyphicon-ok-circle"></span>
                                    <?=Lang::$available;?>
                                <?php else:?>
                                    <span class="glyphicon glyphicon-ban-circle"></span>
                                    <?=Lang::$unavailable;?>
                                <?php endif;?>
                            </td>
                            <td>
                                <?=$ship_val->shipping_details;?>
                            </td>
                            <td>
                                <a href="<?=Config::$web_path;?>/Admin/editShipping/<?=$ship_val->shipping_id;?>" class="btn btn-info">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    <?=Lang::$edit;?>
                                </a>
                                
                                <a href="<?=Config::$web_path;?>/Admin/removeShipping/<?=$ship_val->shipping_id;?>/redirect/<?=$this->get['url'];?>" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove-sign"></span>
                                    <?=Lang::$delete;?>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        
                    </tbody>
                </table>
            
            
        </div>
    </div>
    
    
</div>