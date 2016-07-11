<div class="products">
    
    <h1><?=Lang::$products?></h1>
    
    <div class="items_list">
        <div class="row">
        <?php if(count($this->items) > 0):?>
            
            <?php foreach($this->items as $curr_item):?>
                
                <?=$curr_item->item_id;?>
                <?=$curr_item->item_status;?>
                <?=$curr_item->item_stock;?>
                <?=$curr_item->item_price;?>
                <?=$curr_item->item_title;?>
                <?=$curr_item->item_short_desc;?>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 item_wrapper">
                    <a href="<?=Config::$web_path?>/Shop/showItem/">
                    <table>
                    <tbody>
                        <tr>
                            <th class="category_title">
                            </th>    
                        </tr>
                        <tr>
                            <td class="category_image">
                                <img src="<!--?=$curr_item->category_images[0]->image_src;?-->" alt="" title="" />
                            </td>
                        </tr>
                    </tbody>
                    </table>
                    </a>
                </div>

            <?php endforeach;?>
            
        <?php endif;?>
        </div>
    </div>
    
</div>