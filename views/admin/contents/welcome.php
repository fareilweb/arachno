<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <h1>
            <strong>
                <i><?=Lang::$welcome;?>
                <?=Session::get("user_data")["user_name"];?></i>
            </strong>
        </h1>
        <p>
            <a href="<?=Config::$web_path;?>/User/logout" class="btn btn-warning">
                <span class="glyphicon glyphicon-log-out"></span>
                <?=Lang::$logout?>
            </a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <img src="<?=Config::$web_path;?>/views/images/logo.png" style="width:60%; margin: 1% auto 1% auto;"/>
    </div>
</div>
