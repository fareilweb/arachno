<div class="cart container-fluid">
    
    <div class="row">
        
        <h2><?=Lang::$cart;?></h2>
        
        
            <?php if(!$this->cart):?>
        
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?=Lang::$empty_cart;?>
                </div>
        
            <?php else:?>
                
                <?php foreach($this->cart->items as $item_key => $item_val):?>
        
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

                        <table>
                            <tbody>
                                <tr>
                                    <th>
                                        <?=$item_val->item_title;?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <label><?=Lang::$item_price;?></label>
                                        <?=$item_val->item_price;?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label><?=Lang::$quantity;?></label>
                                        <input type="number" name="item_quantity" value="0" min="0" max="" class="form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="btn btn-danger" data-item_key="<?=$item_key;?>">
                                            <span class="glyphicon glyphicon-remove"></span>
                                            Rimuovi
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!--<?=$item_val->item_id;?>-->
                        <!--<?=$item_val->item_code;?>-->
                        <!--?=$item_val->item_categories;?-->
                        <!--?=$item_val->item_images;?-->
                        
                    </div>
                <?php endforeach;?>
                
            <?php endif;?>
        
        
    </div>
    
</div>