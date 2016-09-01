<div class="delete_item">
    <h1><?=Lang::$delete_confirm_request?></h1>
    
    <a href="<?=Config::$web_path?>/Admin/deleteItem/<?=$this->args[0]?>/confirm_delete" class="btn btn-danger btn-lg">
        <span class="glyphicon glyphicon-ok"></span>
        <?=Lang::$action_confirm?>
    </a>
        
</div>