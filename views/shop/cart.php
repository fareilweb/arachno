<div class="cart container-fluid">
    
    <h2>
        <span class="glyphicon glyphicon-shopping-cart"></span>
        <?=Lang::$cart;?>
    </h2>
    <hr/>

    <?php if(!$this->cart || count($this->cart->items)==0): ?>
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?=Lang::$empty_cart;?>
            </div>
        </div>

    <?php else:?>
        
        <!-- Top Items Row -->    
        <div class="row">
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
                                    <div class="row">
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            <h4><br/>
                                                <label><?=Lang::$item_price;?></label>
                                                <?=$item_val->item_price;?>
                                            </h4>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <label><?=Lang::$quantity;?>
                                                <input type="number" id="item_quantity" value="<?=$item_val->quantity;?>" min="1" data-item_key="<?=$item_key;?>" class="form-control" />
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?=Config::$web_path;?>/Shop/removeFromCart/<?=$item_key;?>/redirect/Shop/cart" data-item_key="<?=$item_key;?>" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        <?=Lang::$remove;?>
                                    </a>
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
        </div>
        
        <!-- Bottom Buttons Row -->
        <div class="row"><hr/>
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                <a href="<?=Config::$web_path;?>/Shop/home" class="btn btn-info">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <?=Lang::$back_to_shop_home;?>
                </a>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                <a href="<?=Config::$web_path;?>/Shop/shipping/" class="btn btn-success">
                    <span class="glyphicon glyphicon-ok"></span>
                    <?=Lang::$complete_purchase;?>
                </a>
            </div>
        </div>
    
    <?php endif;?>
 
</div>


<script>
// Update Cart Item Quantity
jQuery("#item_quantity").change(function(e){
    jQuery("#page-preloader").show();

    var _quantity = jQuery(this).val();
    var _key = jQuery(this).attr("data-item_key");
    
    jQuery.post("<?=Config::$web_path;?>/Shop/updateQuantity",{
        key: _key,
        quantity: _quantity
    }).done(function(data){
        var res = JSON.parse(data);
        if(res.status === false || res.status === 0){
            swal({
                title: "<?=Lang::$warning;?>",
                text: "<?=Lang::$update_fail;?>",
                type: "warning",
                html: true
            });
        }
    }).fail(function(data){
        console.log(data);
        swal({
            title: "<?=Lang::$warning;?>",
            text: "<?=Lang::$update_fail;?>",
            type: "warning",
            html: true
        });
    }).always(function(data){
        jQuery("#page-preloader").hide();
    });

});
</script>