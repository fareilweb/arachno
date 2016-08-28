<div class="registration">
    <form role="form" action="<?=Config::$web_path?>/User/registerProcess" method="post">
        <!-- Hidden Data ========================================================= -->
        <!-- Redirect -->
        <?php 
            $red="";
            $red_url = Config::$web_path;
            $red_key = array_search('redirect', $this->args);
            
            echo $red_key;
            
            if($red_key !== FALSE){
                for($i=($red_key+1); $i < count($this->args); $i++){
                    $red_url.= '/' . $this->args[$i];
                }
                $red = $red_url;
            }
        ?>
        <input type="hidden" name="redirect" value="<?=$red;?>" />
        
        <!-- Data ================================================================ -->
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
            <button type="submit" class="form-control btn-default">Invia Registrazione</button>
        </div>
    </form>
</div>