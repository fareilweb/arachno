<div class="container-fluid list_shippings">
    
    <h2><?=Lang::$shippings;?></h2>
    
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
                                <?=$ship_val->shipping_status;?>
                            </td>
                            <td>
                                <?=$ship_val->shipping_details;?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info">
                                    <span class=""></span>
                                    <?=Lang::$edit;?>
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove-sign"></span>
                                    <?=Lang::$delete;?>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        
                    </tbody>
                </table>
            
            
        </div>
    </div>
    
    
</div>