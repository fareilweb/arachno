<div class="showcase-items-list">

    <!-- Heading -->
    <div class="heading">
        <div class="heading-bg row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                &nbsp;
            </div>
        </div>
        <div class="icon-mouse">
            <img
              src="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/icon-mouse-white.png"
              alt=""
              title="" />
            <label style="position:relative; top: -118px; width: 100%; color: #ffffff;">
                scroll
            </label>
        </div>
        <div class="banner row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <img
                  src="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/best-western-plus.png"
                  alt=""
                  title="" />
            </div>
        </div>
    </div>


    <!-- Items List -->
    <div class="container-fluid">
        <div class="row">
            <?php foreach($this->showcase->items as $item): ?>
                <!-- Item -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" data-item_id="<?=$item->sc_item_id;?>">
                    <div class="content-item">

                        <a href="<?=Config::$web_path;?>/<?=$this->page->page_slug;?>/item/<?=$item->sc_item_id;?>">
                            <img
                            alt="<?=$item->sc_item_name;?>"
                            title="<?=$item->sc_item_name;?>"
                            src="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/<?=$item->images[0]->sc_image_src;?>"
                            />
                            <div class="caption-container">
                                <div class="caption-content">
                                    <h1 class="title">
                                        <?=$item->sc_item_name;?>
                                    </h1>
                                    <strong class="description">
                                        <?=$item->categories[0]->sc_category_name;?>
                                    </strong>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            <?php endforeach;?>
        </div>
    </div>

</div>
