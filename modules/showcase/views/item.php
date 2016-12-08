<div class="showcase-item" data-sc_item_id="<?=$this->showcase->item->sc_item_id;?>">
    <div class="container-fluid">

        <!-- Top Box -->
        <div class="top-box row">
            <div class="image col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <img
                  alt="<?=$this->showcase->item->sc_item_name;?>"
                  title="<?=$this->showcase->item->sc_item_name;?>"
                  src="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/showcase/works/palazzo-petrucci/palazzo-petrucci.png"
                />
            </div>
            <div class="description custom-scroll col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="content">
                    <div class="title">
                      <h1><?=$this->showcase->item->sc_item_name;?></h1>
                      <h3><?=$this->showcase->item->categories[0]->sc_category_name;?></h3>
                    </div>
                    <div class="text">
                        <!--?=$this->showcase->item->sc_item_short_desc;?-->
                        <?=$this->showcase->item->sc_item_long_desc;?>
                    </div>
                    <div class="data">
                        <div class="field">
                            <div class="label">
                                <?=Lang::$typology;?>
                            </div>
                            <div class="value">
                                <?=$this->showcase->item->categories[0]->sc_category_name;?>
                            </div>
                        </div>
                        <div class="field">
                            <div class="label">
                                <?=Lang::$date;?>
                            </div>
                            <div class="values">
                                <?=$this->showcase->item->sc_item_date;?>
                            </div>
                        </div>
                        <div class="field">
                            <div class="label">
                                <?=Lang::$status;?>
                            </div>
                            <div class="values">
                                <?=$this->showcase->item->sc_item_status;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Box END -->

        <!-- Gallery -->
        <div class="gallery row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="row">

                <?php foreach($this->showcase->item->images as $image): ?>
                    <?php if($image->sc_is_main != TRUE):?>
                    <div class="gallery-image col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <img
                          alt="<?=$image->sc_image_alt;?>"
                          title="<?=$image->sc_image_title;?>"
                          src="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/<?=$image->sc_image_src;?>"
                        />
                    </div>
                  <?php endif;?>
                <?php endforeach;?>
                </div>
            </div>
        </div>
        <!-- Gallery END -->

        <p>&nbsp;</p>
    </div>
</div>

<script src="<?=Config::$web_path;?>/js/plugins/jquery.fib-slideshow/jquery.fib-slideshow.js" charset="utf-8"></script>
<script>
jQuery(document).ready(function($) {
    $(".gallery").slideshow({
        text: "ciao"
    });
});
</script>
