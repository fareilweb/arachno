<div class="payment container-fluid">
    
    <h2><?=Lang::$select;?> <strong><?=Lang::$payment;?></strong></h2>

    <?php foreach($this->payments as $pay_val): ?>
        <?php if($pay_val->payment_status):?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <hr/>
                    <label>
                    <h4>
                        <input type="radio" name="payment_radio" value="<?=$pay_val->payment_id;?>" <?php if($this->cart->payment_id === $pay_val->payment_id):?>checked<?php endif;?> />
                        
                        <strong><?=$pay_val->payment_name;?></strong>
                         
                        ( &euro; <?=$pay_val->payment_cost;?> )
                         
                        <?=$pay_val->payment_details;?>
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
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>

</div>



<script>
jQuery(document).ready(function(){

    function unLockContinue()
    {
        jQuery("#link_continue").removeAttr("disabled");
        <?php if(Session::get('auth')): ?>
            jQuery("#link_continue").attr("href", "<?=Config::$web_path;?>/Shop/shipping_address");
        <?php else: ?>
            jQuery("#link_continue").attr("href", "<?=Config::$web_path;?>/User/register/redirect/Shop/shipping_address");
        <?php endif;?>
    }
    
    <?php if( isset( Session::get("cart")->payment_id )): ?>
        unLockContinue();
    <?php endif;?>

    jQuery("input[name='payment_radio']").change(function(e){
        jQuery("#page-preloader").show();
        var _payment_id = jQuery(this).val();

        jQuery.post("<?=Config::$web_path;?>/Shop/setPayment", {
            payment_id: _payment_id
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