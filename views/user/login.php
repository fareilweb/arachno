<div class="login">
    
<?php if( Session::get("auth") ): ?>
<!-- =========================================================================== 
    Utente autenticato 
============================================================================ -->
    <div class="form-group row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h3><?=Lang::$hello . " <strong><i>" . Session::get("user_data")["user_name"] . "</i></strong>";?></h3>
            <a href="<?=Config::$web_path?>/User/logout" class="btn btn-default">
                <span class="glyphicon glyphicon-log-out"></span> Esci
            </a>
        </div>
    </div>
    
<?php else: ?>

<!-- =========================================================================== 
    Utente non autenticato, mostra il form di accesso 
============================================================================ -->
<form role="form" action="<?=Config::$web_path?>/User/loginProcess" method="post">
<!-- Hidden Data -->
    <input 
        type="hidden" 
        name="redirect"
        value="<?php 
            if(isset($this->args) && in_array("redirect", $this->args)){
                foreach($this->args as $key=>$value){ if($key>0){echo '/'.$value;} }
            }?>"
    />
<!-- Data -->
    <div class="form-group">
        <label for="user_email">E-Mail</label>
        <input type="email" id="user_email" name="user_email" class="form-control" placeholder="E-Mail"/>
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password"/>
    </div>
    <div class="form-group" style="margin-bottom: 3px;">
        <label><br/></label>
        <button type="submit" class="form-control btn btn-default">
            <span class="glyphicon glyphicon-log-in"></span> Accedi
        </button>
    </div>
    <div class="form-group" style="margin-bottom: 3px; text-align: center;">
        <label><br/></label>
        <a href="<?=Config::$web_path?>/User/register" target="_self">Non ancora registrato? <span class="glyphicon glyphicon-user"></span></a>
    </div>
    <!--div class="form-group">
        <label><br/></label>
        <a href="/User/restore">Recupera password dimenticata</a>
    </div-->
</form>
<?php endif; ?>
</div>