<div class="container-fluid edit_payment">
    
    <h2><?=Lang::$edit_payment;?></h2>
    
    <form method="post" id="edit_payment_form">
        
        <!-- Hidden Data -->
        <input type="hidden" name="payment_id" id="payment_id" value="<?=$this->payment->payment_id;?>" />
        
        <!-- Data -->
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-group">
                    <label><?=Lang::$name;?></label>
                    <input value="<?=$this->payment->payment_name;?>" type="text" name="payment_name" class="form-control" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-group">
                    <label><?=Lang::$cost;?></label>
                    <input value="<?=$this->payment->payment_cost;?>" type="number" name="payment_cost" class="form-control" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-group">
                    <label><?=Lang::$status;?></label>
                    
                    <div class="form-group">
                        <label>
                            <input type="radio" name="payment_status" value="1" <?php if($this->payment->payment_status==1):?>checked<?php endif;?> />
                            <?=Lang::$available;?>
                        </label>
                        <label>
                            <input type="radio" name="payment_status" value="0" <?php if($this->payment->payment_status==0):?>checked<?php endif;?> />
                            <?=Lang::$unavailable;?>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-group">
                    <label><?=Lang::$details;?></label>
                    <textarea name="payment_details" class="form-control"><?=$this->payment->payment_details;?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <button id="save_payment" type="button" class="btn btn-info">
                    <span class="glyphicon glyphicon-save"></span>
                    <?=Lang::$save;?>
                </button>
            </div>
        </div>
    </form>

</div>


<script>
jQuery("#save_payment").click(function(){
    jQuery("#page-preloader").show();
    
    var _data = jQuery("#edit_payment_form").serialize();
    
    jQuery.post("<?=Config::$web_path;?>/Admin/savePayment", {
        data: _data
    }).done(function(data){
        var data = JSON.parse(data);
        if(data.status === 0 || data.status === false || data.status === undefined){
            swal({
                title: "<?=Lang::$warning;?>",
                text: "<?=Lang::$operation_fail;?><br/>" + data.message,
                type: "error",
                html:true
            });
        }else{
            jQuery("#payment_id").val(data.payment_id);
            swal({
                title: "<?=Lang::$operation_success;?>!",
                type: "success",
                html: true
            });
        }
        console.log(data);
    }).fail(function(data){
        swal({
            title: "<?=Lang::$warning;?>",
            text: "<?=Lang::$operation_fail;?><br/>",
            type: "error",
            html:true
        });
        console.log(data);
    }).always(function(){
        jQuery("#page-preloader").hide();
    });
});
</script>
