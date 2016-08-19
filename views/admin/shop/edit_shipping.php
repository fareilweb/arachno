<div class="container-fluid edit_shipping">
    
    <h2><?=Lang::$edit_shipping;?></h2>
    
    <form method="post" action="<?=Config::$web_path;?>/Admin/saveShipping">
        
        <!-- Hidden Data -->
        <input type="hidden" name="shipping_id" value="<?=$this->shipping->shipping_id;?>" />
        
        <!-- Data -->
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-group">
                    <label><?=Lang::$name;?></label>
                    <input value="<?=$this->shipping->shipping_name;?>" type="text" name="shipping_name" class="form-control" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-group">
                    <label><?=Lang::$cost;?></label>
                    <input value="<?=$this->shipping->shipping_cost;?>" type="number" name="shipping_cost" class="form-control" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-group">
                    <label><?=Lang::$status;?></label>
                    
                    <div class="form-group">
                        <label>
                            <input type="radio" name="shipping_status" value="1" <?php if($this->shipping->shipping_status==1):?>checked<?php endif;?> />
                            <?=Lang::$available;?>
                        </label>
                        <label>
                            <input type="radio" name="shipping_status" value="0" <?php if($this->shipping->shipping_status==0):?>checked<?php endif;?> />
                            <?=Lang::$unavailable;?>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-group">
                    <label><?=Lang::$details;?></label>
                    <textarea name="shipping_details" class="form-control"><?=$this->shipping->shipping_details;?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <button type="submit" class="btn btn-info">
                    <span class="glyphicon glyphicon-save"></span>
                    <?=Lang::$save;?>
                </button>
            </div>
        </div>
    </form>

</div>
