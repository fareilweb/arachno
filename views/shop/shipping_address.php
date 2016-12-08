<div class="shipping_address container-fluid">
        
    <h3><?=Lang::$shipping_address;?></h3>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-md-offset-3 col-lg-offset-4">    
            <div class="form-group">
                <label for="shipping_address"><?=Lang::$address;?></label>
                <input type="text" placeholder="<?=Lang::$address;?>" id="shipping_address" class="form-control" />
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-md-offset-3 col-lg-offset-4">    
            <div class="form-group">
                <label for="shipping_zip"><?=Lang::$zip_code;?></label>
                <input type="text" placeholder="<?=Lang::$zip_code;?>" id="shipping_zip" class="form-control" />
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-md-offset-3 col-lg-offset-4">    
            <div class="form-group">
                <label for="shipping_city"><?=Lang::$city;?></label>
                <input type="text" placeholder="<?=Lang::$city;?>" id="shipping_city" class="form-control" />
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-md-offset-3 col-lg-offset-4">    
            <div class="form-group">
                <label for="shipping_province"><?=Lang::$province;?></label>
                <input type="text" placeholder="<?=Lang::$province;?>" id="shipping_province" class="form-control" />
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-md-offset-3 col-lg-offset-4">    
            <div class="form-group">
                <label for="shipping_state"><?=Lang::$state;?></label>
                <input type="text" placeholder="<?=Lang::$state;?>" id="shipping_state" class="form-control" />
            </div>
        </div>
    </div>

    <hr/>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="#" class="btn btn-info" id="link_continue">
                <?=Lang::$continue;?>
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
    
</div>

<script>
jQuery(document).ready(function(){

    jQuery("#link_continue").click(function(){    

        jQuery.post("<?=Config::$web_path;?>/Shop/setShippingAddress", {
            shipping_address: jQuery("#shipping_address").val(),
            shipping_zip: jQuery("#shipping_zip").val(),
            shipping_city: jQuery("#shipping_city").val(),
            shipping_province: jQuery("#shipping_province").val(),
            shipping_state: jQuery("#shipping_state").val()
        }).done(function(data){

            var data = JSON.parse(data);
            if(data.status !== false && data.status !== 0 && data.status !== undefined){
                // OK!
                window.location.href = "<?=Config::$web_path;?>/Shop/review";
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

});
</script>
