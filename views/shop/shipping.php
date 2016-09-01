<div class="shipping container-fluid">
    
    <h3><?=Lang::$select;?> <?=Lang::$shipping;?></h3>

    <?php foreach($this->shippings as $ship_val):?>
        <?php if($ship_val->shipping_status):?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <hr/>
                    <label>
                    <h4>
                        <input type="radio" name="shipping_radio" value="<?=$ship_val->shipping_id;?>" <?php if($this->cart->shipping_id === $ship_val->shipping_id):?>checked<?php endif;?> />
                        
                        <strong><?=$ship_val->shipping_name;?></strong>
                         
                        ( &euro; <?=$ship_val->shipping_cost;?> )
                         
                        <?=$ship_val->shipping_details;?>
                    </h4>
                    </label>
                </div>
            </div>
        <?php endif;?>
    <?php endforeach;?>

    <hr/>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="#" class="btn btn-info" id="link_continue" disabled>
                <?=Lang::$continue;?>
                <span class="glyphicon glyphicon-fast-forward"></span>
            </a>
        </div>
    </div>

</div>


<script>
jQuery(document).ready(function(){

    function unLockContinue()
    {
        jQuery("#link_continue").removeAttr("disabled");
        jQuery("#link_continue").attr("href", "<?=Config::$web_path;?>/Shop/payment");
    }

    <?php if( isset( Session::get("cart")->shipping_id )): ?>
        unLockContinue();
    <?php endif;?>

    jQuery("input[name='shipping_radio']").change(function(e){
        jQuery("#page-preloader").show();
        var _shipping_id = jQuery(this).val();

        jQuery.post("<?=Config::$web_path;?>/Shop/setShipping", {
            shipping_id: _shipping_id
        }).done(function(data){

            var data = JSON.parse(data);
            if(data.status !== false && data.status !== 0 && data.status !== undefined){
                // OK!
                unLockContinue();
            }else{
                swal({
                    title: "<?=Lang::$error;?>",
                    text: "<?=Lang::$update_fail;?>",
                    type: "error",
                    html: true
                });
            }
            console.log(data);

        }).fail(function(data){

            var data = JSON.parse(data);
            swal({
                title: "<?=Lang::$error;?>",
                text: "<?=Lang::$update_fail;?>",
                type: "error",
                html: true
            });
            console.log(data);

        }).always(function(){
            jQuery("#page-preloader").hide();
        });

    });

    jQuery("#link_continue").click(function(e){
        var link_href = jQuery(this).attr("href");
        var link_status = jQuery(this).prop("disabled");
        if(link_href === "#" || link_status){
            e.preventDefault();
            swal({
                title: "<?=Lang::$warning;?>!",
                text: "<?=Lang::$select_before;?>",
                type: "warning",
                html: true
            });
            return false;
        }
    });

});
</script>