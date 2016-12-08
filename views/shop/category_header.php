<!-- Wide Box -->
<div class="wide-box row <?=$this->category->category_slug;?>">
    <div class="bg-wrapper col-xs-12 col-sm-12 col-md-12 col-lg-12">
        &nbsp;
    </div>
    <div class="icon-wrapper col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        &nbsp;
    </div>
</div>
<style>
.wide-box .bg-wrapper{
    background:url("<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/wide-<?=$this->category->category_slug;?>.png") no-repeat;    
}
.wide-box .icon-wrapper{
    background:url("<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/icon-<?=$this->category->category_slug;?>.png") no-repeat;
}
</style>

<!-- Title/Name -->
<div class="text-center">
    <h2>
        <?=Lang::$products?> in "<?=$this->category->category_name?>"
    </h2><hr/>
</div>