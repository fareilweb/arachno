<div class="edit_item">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Aggiungi/Modifica Oggetto</h2>
        </div>
    </div><hr/>
    
    <form name="edit_item_form" method="post" action="<?=Config::$web_path?>/Admin/itemProcess">
        <!-- Hidden Data -->
        <input type="hidden" name="item_id" value="<?=$this->item->item_id;?>" />
        
        <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Codice</label>
                    <input type="text" name="item_code" value="<?=$this->item->item_code;?>" class="form-control" />
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Categoria</label>
                    <select name="fk_category_id" class="form-control" >
                        <option value="1">Seleziona Categoria...</option>
                        <?php foreach($this->shop_categories as $cat_val):?>
                            <option value="<?=$cat_val->category_id;?>" <?=($this->item->fk_category_id==$cat_val->category_id) ? " selected" : "";?>>
                                <?=$cat_val->category_name;?>
                            </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Oggetto Disponibile</label><br/>
                    <label>
                        <input type="radio" name="item_status" value="1" <?=($this->item->item_status==1) ? "checked" : "";?> /> 
                        S&igrave;
                    </label>
                    <label>
                        <input type="radio" name="item_status" value="0" <?=($this->item->item_status==0) ? "checked" : "";?> /> 
                        No
                    </label>
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Qt&agrave; Magazzino</label>
                    <input type="text" name="item_stock" value="<?=$this->item->item_stock;?>" class="form-control" />
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Prezzo</label>
                    <input type="text" name="item_price" value="<?=$this->item->item_price;?>" class="form-control" />
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Titolo/Nome</label>
                    <input type="text" name="item_title" value="<?=$this->item->item_title;?>" class="form-control" />
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Peso</label>
                    <input type="text" name="item_weight" value="<?=$this->item->item_weight;?>" class="form-control" />
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Colore</label>
                    <input type="text" name="item_color" value="<?=$this->item->item_color;?>" class="form-control" />
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Riepilogo</label>
                    <textarea name="item_short_desc" class="form-control"><?=$this->item->item_short_desc;?></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Descrizione</label>
                    <textarea name="item_long_desc" class="form-control"><?=$this->item->item_long_desc;?></textarea>
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Parole Chiave (meta tag)</label>
                    <textarea name="item_meta_keywords" class="form-control"><?=$this->item->item_meta_keywords;?></textarea>
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Descrizione (meta tag)</label>
                    <textarea name="item_meta_description" class="form-control"><?=$this->item->item_meta_description;?></textarea>
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label>Lingua</label>
                    <select name="fk_lang_id" class="form-control">
                        <option value="0">Seleziona Lingua...</option>
                        <?php foreach($this->languages as $lang):?>
                            <option value="<?=$lang->lang_id;?>" <?=$lang->lang_id == $this->item->fk_lang_id ? "selected" : "";?>>
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