<div class="edit_item">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Aggiungi/Modifica Oggetto</h2>
        </div>
    </div><hr/>
    
    <form name="edit_item_form" method="post" action="<?=Config::$web_path?>/Admin/addItemProcess">
       
        <!-- Hidden Data -->
        <input type="hidden" name="item_id" value="<?=isset($this->item->item_id) ? $this->item->item_id : "";?>" />
        
        <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Codice</label>
                    <input type="text" name="item_code" value="" class="form-control" />
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Categoria</label>
                    <select name="fk_category_id" class="form-control" >
                        <option value="1">Seleziona Categoria...</option>
                        <?php foreach($this->shop_categories as $cat_val):?>
                            <option value="<?=$cat_val->category_id;?>">
                                <?=$cat_val->category_name;?>
                            </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Oggetto Disponibile</label><br/>
                    <label><input type="radio" name="item_status" value="0" /> S&igrave;</label>
                    <label><input type="radio" name="item_status" value="1" /> No</label>
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Qt&agrave; Magazzino</label>
                    <input type="text" name="item_stock" value="" class="form-control" />
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Prezzo</label>
                    <input type="text" name="item_price" value="" class="form-control" />
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Titolo/Nome</label>
                    <input type="text" name="item_title" value="" class="form-control" />
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Peso</label>
                    <input type="text" name="item_weight" value="" class="form-control" />
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Colore</label>
                    <input type="text" name="item_color" value="" class="form-control" />
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Riepilogo</label>
                    <textarea name="item_short_desc" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Descrizione</label>
                    <textarea name="item_long_desc" class="form-control"></textarea>
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Parole Chiave (meta tag)</label>
                    <textarea name="item_meta_keywords" class="form-control"></textarea>
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Descrizione (meta tag)</label>
                    <textarea name="item_meta_description" class="form-control"></textarea>
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Lingua</label>
                    <select name="fk_lang_id" class="form-control">
                        <option value="1" selected>Seleziona Lingua...</option>
                        <?php foreach($this->languages as $lang):?>
                            <option value="<?=$lang->lang_id;?>">
                                <?=$lang->lang_name?> (<?=$lang->lang_internal_code;?>)
                            </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <button type="submit" value="edit_item_submit" class="btn btn-default form-control">
                        Salva
                    </button>
                </div>
            </div>
            
        </div>
    </form>
    
</div>