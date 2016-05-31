<div class="login">

    <?php if( Session::get("auth") ): ?>
        <!-- Utente autenticato -->
        <!--h4>Cliccando sul bottone "Esci" sospenderai la tua sessione come utente.</h4-->
        <a href="<?=Config::$web_path?>/User/logout" class="btn btn-danger">
            <span class="glyphicon glyphicon-log-out"></span> Esci
        </a>
    <?php else: ?>

    <!-- Utente non autenticato, mostra il form di accesso -->

    <form role="form" action="<?=Config::$web_path?>/User/login" method="post">

        <input type="hidden" name="redirect"
        value="<?php if(isset($data->args[0]) && $data->args[0]=='redirect')
                        foreach($data->args as $key=>$value){ if($key>0) echo '/'.$value; } 
                ?>" />

        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="user_email">E-Mail</label>
                    <input type="email" id="user_email" name="user_email" class="form-control" placeholder="E-Mail"/>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="user_password">Password</label>
                    <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password"/>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="text-align: center;">
                <div class="form-group" style="margin-bottom: 3px;">
                    <label><br/></label>
                    <button type="submit" class="form-control btn-warning">
                        <span class="glyphicon glyphicon-log-in"></span> Accedi
                    </button>
                </div>
                <a href="<?=Config::$web_path?>/User/register" target="_self">Non ancora registrato? <span class="glyphicon glyphicon-user"></span></a>
            </div>
        </div>
        
    </form>

    <!--a href="<?=Config::$web_path?>/User/restore">Recupera password dimenticata</a-->
    <?php endif; ?>

</div>