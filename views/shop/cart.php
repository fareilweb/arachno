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
                                    <input type="number" id="item_quantity" value="<?=$item_val->quantity;?>" min="1" data-item_key="<?=$item_key;?>" class="form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?=Config::$web_path;?>/Shop/removeFromCart/<?=$item_key;?>/redirect/Shop/cart" data-item_key="<?=$item_key;?>" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        Rimuovi
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
            
        <?php endif;?>
        
    </div>

    <div class="row"><hr/>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <a href="#" class="btn btn-info">
                <span class=""></span>
                Torna Allo Shop
            </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <a href="#" class="btn btn-info">
                <span class=""></span>
                Concludi Acquisto
            </a>
        </div>
    </div>
    
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
            if(res.status == false || res.status == 0){
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