<div class="shipping_address container-fluid">
        
    <h3><?=Lang::$shipping_address;?></h3>
    
    <form name="shipping_address_form" >
        
        shipping_address
        shipping_zip
        shipping_city
        shipping_state
        
        <input type="text" name="" id="" class="form-control" />
        
    </form>
    
    <hr/>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="#" class="btn btn-info" id="link_continue">
                <?=Lang::$continue;?>
                <span class="glyphicon glyphicon-fast-forward"></span>
            </a>
        </div>
    </div>
    
</div>



<?=Config::$web_path;?>/Shop/review