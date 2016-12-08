<div class="modules_list">

    <h2>
      <span class="glyphicon glyphicon-th-large"></span>
      <?=Lang::$modules;?>
    </h2>

    <div class="row">
        <?php foreach($this->modules as $module):?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="<?=Config::$web_path;?>/Admin/module/<?=$module?>" target="_self">
                <h4><span class="glyphicon glyphicon-wrench"></span><?=$module?></h4>
            </a>
        </div>
      <?php endforeach;?>
    </div>

</div>
