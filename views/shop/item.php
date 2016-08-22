<div class="container-fluid item">
    
    <?php if(isset($this->item) && $this->item->item_id!==NULL): ?>
    <div class="item_wrapper">
        <div class="row">
        <!-- ===============================================================
            First Col 
        ================================================================ -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                
                <?php if($this->item->item_title): ?>
                <div class="item_title">
                    <h3><?=$this->item->item_title;?></h3>
                </div>
                <?php endif;?>
                
                <hr/>

                <table>
                    <tbody>
                        <?php if($this->item->item_id): ?>
                        <tr class="item_id">
                            <th><?=Lang::$id;?>: </th>
                            <td><?=$this->item->item_id;?></td>
                        </tr>
                        <?php endif;?>

                        <?php if($this->item->item_code): ?>
                        <tr class="item_code">
                            <th><?=Lang::$item_code;?>: </th> 
                            <td><?=$this->item->item_code;?></td>   
                        </tr>
                        <?php endif;?>
                        
                        <?php if($this->item->item_category): ?>
                        <tr class="category_name">
                            <th><?=Lang::$item_category;?>: </th> 
                            <td><?=$this->item->category_name;?></td>
                        </tr>
                        <?php endif;?>

                        <?php if($this->item->item_status !== ""): ?>
                        <tr class="item_status">
                            <th><?=Lang::$status;?>: </th>
                            <td><?=$this->item->item_status ? Lang::$available : Lang::$unavailable;?></td>
                        </tr>
                        <?php endif;?>

                        <?php if($this->item->item_stock): ?>
                        <tr class="item_stock">
                            <th><?=Lang::$item_stock;?>: </th>
                            <td><?=$this->item->item_stock;?></td>
                        </tr>
                        <?php endif;?>

                        <?php if($this->item->item_price): ?>
                        <tr class="item_price">
                            <th><?=Lang::$item_price;?>: </th>
                            <td><?=$this->item->item_price;?></td>
                        </tr>
                        <?php endif;?>

                        <?php if($this->item->item_weight): ?>
                        <tr class="item_weight">
                            <th><?=Lang::$item_weight;?>: </th>
                            <td><?=$this->item->item_weight;?></td>
                        </tr>
                        <?php endif;?>

                        <?php if($this->item->item_colors): ?>
                        <tr class="item_colors">
                            <th><?=Lang::$item_colors;?>: </th>
                            <td><?=$this->item->item_colors;?></td>
                        </tr>
                        <?php endif;?>

                        <?php if($this->item->item_short_desc): ?>
                        <tr class="item_short_desc">
                            <th><?=Lang::$item_short_desc;?>: </th>
                            <td><?=$this->item->item_short_desc;?></td>
                        </tr>
                        <?php endif;?>

                        <?php if($this->item->item_long_desc): ?>
                        <tr class="item_long_desc">
                            <th><?=Lang::$item_long_desc;?>: </th>
                            <td><?=$this->item->item_long_desc;?></td>
                        </tr>
                        <?php endif;?>
                    </tbody>
                </table>

                <br/>

                <div class="buy_item">    
                    <a href="<?=Config::$web_path;?>/Shop/addToCart/<?=$this->item->item_id?>" class="btn btn-info">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <?=Lang::$add_to_cart;?>
                    </a>
                </div>
            </div>
        
        <!-- ===============================================================
            Second Col 
        ================================================================ -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="item_images">

                    <!-- Main Image ====================================== -->
                    <?php foreach($this->item->item_images as $item_image): ?>
                        <?php if($item_image->is_main==TRUE):?>
                        <div class="row">
                            <div class="item_main_image col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <img src="<?=Config::$web_path . $item_image->image_src;?>" alt="<?=$item_image->image_alt;?>" title="<?=$item_image->image_title;?>" />
                            </div>
                        </div>
                        <?php endif;?>
                    <?php endforeach;?>
                    
                    <!-- Images ========================================== -->
                    <div class="row"><hr/>
                    <?php foreach($this->item->item_images as $item_image): ?>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="item_image_wrapper">
                                <div class="item_image">
                                    <img src="<?=Config::$web_path . $item_image->image_src;?>" alt="<?=$item_image->image_alt;?>" title="<?=$item_image->image_title;?>" />
                                </div>
                                <div class="item_image_title">
                                    <?=$item_image->image_title;?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <!--div>
        <label></label>
        <?=$this->item->item_meta_keywords;?>
    </div-->
    <!--div>
        <label></label>
        <?=$this->item->item_meta_description;?>
    </div-->
        
    <?php endif; ?>
    
</div>


<!--JavaScript-->
<script>
jQuery(document).ready(function(){

    jQuery(".item_image img").click(function(e){
        var img_src = jQuery(this).attr("src");
        var img_title = jQuery(this).attr("title");
        var img_alt = jQuery(this).attr("alt");
        jQuery(".item_main_image img").attr("src", img_src);
        jQuery(".item_main_image img").attr("title", img_title);
        jQuery(".item_main_image img").attr("alt", img_alt);
    });

});
</script>