<div class="categories">
    
    <h1><?=Lang::$categories?></h1>
    
    <div class="categories_list">
        <div class="row">
        <?php if(count($this->categories) > 0) :?>
            
            <?php foreach($this->categories as $curr_category): ?>
            
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 category_wrapper">
                    <a href="<?=Config::$web_path?>/Shop/showItems/<?=$curr_category->category_id;?>">
                    <table>
                    <tbody>
                        <tr>
                            <th class="category_title">
                                <?=$curr_category->category_name;?>
                            </th>    
                        </tr>
                        <tr>
                            <td class="category_image">
                                <img src="<?=$curr_category->category_image_src;?>" alt="<?=$curr_category->category_name;?>" title="<?=$curr_category->category_name;?>" />
                            </td>
                        </tr>
                    </tbody>
                    </table>
                    </a>
                </div>
            
            <?php endforeach;?>
            
        <?php else:?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2><?=Lang::$categories_none;?></h2>
            </div>
        <?php endif;?>
        </div>
    </div>
    
</div>