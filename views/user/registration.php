<div class="registration">

    <form role="form" action="<?=Config::$web_path?>/User/register" method="post">

        <input type="hidden" name="redirect" 
               value="<?php 
                        if(isset($data->args[0]) && $data->args[0]=='redirect'){
                            foreach($data->args as $key=>$value){
                                if($key>0){
                                    echo '/'.$value;
                                }
                            }
                        }
                       ?>" />

        <div class="form-group">
            <label for="user_name">Nome</label>
            <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Nome" />
        </div>

        <div class="form-group">
            <label for="user_surname">Cognome</label>
            <input type="text" id="user_surname" name="user_surname" class="form-control" placeholder="Cognome" />
        </div>

        <div class="form-group">
            <label for="user_phone">Telefono</label>
            <input type="text" id="user_phone" name="user_phone" class="form-control" placeholder="Telefono" />
        </div>

        <div class="form-group">
            <label for="user_email">E-Mail</label>
            <input type="email" id="user_email" name="user_email" class="form-control" placeholder="E-Mail" />
        </div>

        <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password"/>
        </div>

        <div class="form-group">
            <input type="submit" value="Invia Registrazione" class="form-control btn-warning" />
        </div>

    </form>

</div>