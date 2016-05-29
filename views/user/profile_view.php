<?php $user_data = $data->user_data; ?>

<ul class="nav nav-tabs">
    <li class="active">
        <a data-toggle="tab" href="#dati_utente">Informazioni di Contatto</a>
    </li>
    <li>
        <a data-toggle="tab" href="#scheda_associato">Scheda Associato - Dati Personali</a>
    </li>
    <li class="hidden" id="link-scheda-tutore">
        <a data-toggle="tab" href="#scheda_tutore">
            Scheda Tutore <span style="color:red;">(obbligatoria per i minori)</span>
        </a>
    </li>
</ul>

<div class="tab-content">

    <!--========================================
        TAB Informazioni di Contatto
    ========================================-->
    <div id="dati_utente" class="tab-pane fade in active">
    
        <h3>Informazioni di Contatto</h3>

        <form method="post" action="<?=Config::$web_path?>/User/profile" name="as_users_form" id="as_users_form">

            <!-- Hidden Data - ID Utente -->
            <input type="hidden" name="user_id" value="<?=$user_data->user_id?>" />

            <!-- Hidden Data - Redirect Flag/Url -->
            <input type="hidden" name="redirect"
                    value="<?php if(isset($data->args[0]) && $data->args[0]=='redirect')
                            foreach($data->args as $key=>$value){ if($key>0) echo '/'.$value; }
                    ?>" />

            <div class="row">
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_name">Nome</label>
                    <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Nome" value="<?=$user_data->user_name?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_surname">Cognome</label>
                    <input type="text" id="user_surname" name="user_surname" class="form-control" placeholder="Cognome" value="<?=$user_data->user_surname?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_email">E-Mail</label>
                    <input type="email" id="user_email" name="user_email" class="form-control" placeholder="E-Mail" value="<?=$user_data->user_email ?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_phone">Telefono</label>
                    <input type="text" id="user_phone" name="user_phone" class="form-control" placeholder="Telefono" value="<?=$user_data->user_phone?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_mobile_phone">Cellulare</label>
                    <input type="text" id="user_mobile_phone" name="user_mobile_phone" class="form-control" placeholder="Cellulare" value="<?=$user_data->user_mobile_phone?>" required="required" />
                </div>
            </div>

            <div class="row">
                <!-- Submit Button - Informazioni di Contatto -->
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <button type="submit" class="btn btn-warning" name="as_users_submit">
                        Salva e Continua <span class="glyphicon glyphicon-forward"></span>
                    </button>
                </div>
            </div>
        </form>

    </div>


    <!--========================================
        TAB Scheda Associato - Dati Personali
    ========================================-->
    <div id="scheda_associato" class="tab-pane fade">
        
        <h3>Scheda Associato - Dati Personali</h3>

        <form method="post" action="<?=Config::$web_path?>/user/profile" name="as_users_data_form" id="as_users_data_form">

            <!-- Hidden Data - ID Utente -->
            <input type="hidden" name="user_id" value="<?=$user_data->user_id?>" />

            <!-- Hidden Data - Redirect Flag/Url -->
            <input type="hidden" name="redirect"
                    value="<?php if(isset($data->args[0]) && $data->args[0]=='redirect')
                            foreach($data->args as $key=>$value){ if($key>0) echo '/'.$value; }
                    ?>" />

            <div class="row">
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_gender">Sesso</label><br/>
                    <label><input type="radio" name="user_gender" value="M" <?php if(isset($user_data->user_gender) && $user_data->user_gender=="M")echo 'checked="checked"';?> required="required" /> Maschio </label>
                    <label><input type="radio" name="user_gender" value="F" <?php if(isset($user_data->user_gender) && $user_data->user_gender=="F")echo 'checked="checked"';?> required="required" /> Femmina</label>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_birth_date">Data di Nascita</label><br />
                    <input type="text" name="user_birth_date" id="user_birth_date" value="<?=$user_data->user_birth_date?>" style="width:136px;" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_birth_place">Luogo di Nascita</label>
                    <input type="text" class="form-control" name="user_birth_place" id="user_birth_place" value="<?=$user_data->user_birth_place?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_address">Indirizzo</label>
                    <input type="text" class="form-control" name="user_address" id="user_address" value="<?=$user_data->user_address?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_city">Citt&agrave;</label>
                    <input type="text" class="form-control" name="user_city" id="user_city" value="<?=$user_data->user_city?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_province">Provincia</label>
                    <input type="text" class="form-control" name="user_province" id="user_province" value="<?=$user_data->user_province?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_zipcode">C.A.P.</label>
                    <input type="text" class="form-control" name="user_zipcode" id="user_zipcode" value="<?=$user_data->user_zipcode?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_document_name">Tipo Documento</label>
                    <input type="text" class="form-control" name="user_document_name" id="user_document_name" value="<?=$user_data->user_document_name?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_document_number">Numero Documento</label>
                    <input type="text" class="form-control" name="user_document_number" id="user_document_number" value="<?=$user_data->user_document_number?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_document_entity">Ente Emittente Documento</label>
                    <input type="text" class="form-control" name="user_document_entity" id="user_document_entity" value="<?=$user_data->user_document_entity?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_tax_code">Codice Fiscale</label>
                    <input type="text" class="form-control" name="user_tax_code" id="user_tax_code" value="<?=$user_data->user_tax_code?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="user_underage">Utente Minore</label><br />
                    <label><input type="radio" name="user_underage" value="0" <?php if(isset($user_data->user_underage) && $user_data->user_underage=="0"){echo 'checked="checked"';}?> required="required" /> No</label>
                    <label><input type="radio" name="user_underage" value="1" <?php if(isset($user_data->user_underage) && $user_data->user_underage=="1"){echo 'checked="checked"';}?> required="required" /> S&igrave;</label>
                </div>
            </div>

            <!-- Submit Button - Scheda Associato - Dati Personali -->
            <div class="form-group">
                <button type="submit" class="btn btn-warning" name="as_users_data_submit">
                    Salva e Continua <span class="glyphicon glyphicon-forward"></span>
                </button>
            </div>
        </form>

    </div>



    <!--========================================
            TAB Scheda Tutore
    ========================================-->
    <div id="scheda_tutore" class="tab-pane fade">
        
        <h3>Scheda Tutore</h3>

        <form method="post" action="<?=Config::$web_path?>/user/profile" name="as_parental_form" id="as_parental_form">
        
            <!-- Hidden Data - ID Utente -->
            <input type="hidden" name="user_id" value="<?=$user_data->user_id?>" />

            <!-- Hidden Data - Redirect Flag/Url -->
            <input type="hidden" name="redirect"
                    value="<?php if(isset($data->args[0]) && $data->args[0]=='redirect')
                            foreach($data->args as $key=>$value){ if($key>0) echo '/'.$value; }
                    ?>" />

            <div class="row">
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_name">Nome</label>
                    <input type="text" class="form-control" name="parental_name" id="parental_name" value="<?=$user_data->parental_name?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_surname">Cognome</label>
                    <input type="text" class="form-control" name="parental_surname" id="parental_surname" value="<?=$user_data->parental_surname?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_birth_date">Data di Nascita</label><br />
                    <input type="text" name="parental_birth_date" id="parental_birth_date" value="<?=$user_data->parental_birth_date?>" style="width: 136px;" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_gender">Sesso</label><br />
                    <label><input type="radio" name="parental_gender" value="M" <?php if(isset($user_data->parental_gender) && $user_data->parental_gender=="M")echo 'checked="checked"';?> required="required" /> Maschio</label>
                    <label><input type="radio" name="parental_gender" value="F" <?php if(isset($user_data->parental_gender) && $user_data->parental_gender=="F")echo 'checked="checked"';?> required="required" /> Femmina</label>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_birth_place">Luogo di Nascita</label>
                    <input type="text" class="form-control" name="parental_birth_place" id="parental_birth_place" value="<?=$user_data->parental_birth_place?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_address">Indirizzo</label>
                    <input type="text" class="form-control" name="parental_address" id="parental_address" value="<?=$user_data->parental_address?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_city">Citt&agrave;</label>
                    <input type="text" class="form-control" name="parental_city" id="parental_city" value="<?=$user_data->parental_city?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_phone">Telefono</label>
                    <input type="text" class="form-control" name="parental_phone" id="parental_phone" value="<?=$user_data->parental_phone?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_mobile_phone">Cellulare</label>
                    <input type="text" class="form-control" name="parental_mobile_phone" id="parental_mobile_phone" value="<?=$user_data->parental_mobile_phone?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_email">E-Mail</label>
                    <input type="email" class="form-control" name="parental_email" id="parental_email" value="<?=$user_data->parental_email?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_document_name">Tipo Documento</label>
                    <input type="text" class="form-control" name="parental_document_name" id="parental_document_name" value="<?=$user_data->parental_document_name?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_document_number">Numero Documento</label>
                    <input type="text" class="form-control" name="parental_document_number" id="parental_document_number" value="<?=$user_data->parental_document_number?>" required="required" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="parental_role">Ruolo</label>
                    <input type="text" class="form-control" name="parental_role" id="parental_role" value="<?=$user_data->parental_role?>" required="required" />
                </div>
            </div>

            <!-- Submit Button - Scheda Tutore -->
            <div class="form-group">
                <button type="submit" class="btn btn-warning" name="as_parental_submit">
                    Salva e Continua <span class="glyphicon glyphicon-forward"></span>
                </button>
            </div>

        </form>
        
    </div>
</div><!-- .tab-content END -->

<script>

    // Attivazione/Disattivazione Scheda Tutore
    jQuery(document).ready(function(){
        var user_underage = <?php if(isset($user_data->user_underage)){echo $user_data->user_underage;}else{echo 0;}?>;
        if(user_underage===0){
            jQuery("#link-scheda-tutore").addClass("hidden");
        }else if(user_underage===1){
            jQuery("#link-scheda-tutore").removeClass("hidden");
        }
    });
    
    jQuery('[name="user_underage"]').change(function(){
        if(jQuery(this).val()==='0'){
            jQuery("#link-scheda-tutore").addClass("hidden");
        }else if(jQuery(this).val()==='1'){
            jQuery("#link-scheda-tutore").removeClass("hidden");
        }
    });

    jQuery(document).ready(function(){
        jQuery('#user_birth_date, #parental_birth_date').datepicker({
            showOn: "button",
            buttonImage: "<?=Config::$web_path?>/themes/<?=Config::$theme?>/images/calendar.gif",
            buttonImageOnly: false,
            buttonText: "Seleziona la Data",
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1,
            showButtonPanel: true,
            regional: ["it"]
        });
    });

</script>
