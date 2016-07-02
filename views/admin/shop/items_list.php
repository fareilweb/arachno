<div class="items_list">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Lista Prodotti</h2>
        </div>
    </div><hr/>
    
    <div class="row">
        <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
            <div class="form-group">
                <select name="items_list_filter" id="items_list_filter" class="form-control">
                    <option value="NULL">Filtra...</option>
                    <option value="">Solo Prodotti Pubblicati</option>
                    <option value="">Solo Prodotti Non Pubblicati</option>
                </select>
                <script>
                    jQuery("#items_list_filter").change(function(){
                        swal({
                           title: "Presto Disponibile",
                           text: "",
                           type: "success"
                        });
                    });
                </script>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
            <div class="form-group">
                <a href="<?=Config::$web_path;?>/Admin/addItem" class="btn btn-default form-control">
                    <span class="glyphicon glyphicon-plus"></span> Aggiungi Prodotto
                </a>
            </div>
        </div>
    </div>
    
    <?php if(isset($this->items) && $this->items!==FALSE):?>
    <table>
        <tbody>
            <tr>
                <th>ID</th>
                <th>Codice</th>
                <th>Titolo/Nome</th>
                <th>Categoria</th>    
                <th>Disponibilit&agrave;</th>
                <th>Qt&agrave;. Magazzino</th>
                <th>Prezzo</th>
                <th>Lingua</th>
                <th>Azioni</th>
            </tr>
            <?php foreach($this->items as $item_val):?>
                <tr>
                    <td><?=$item_val->item_id;?></td>
                    <td><?=$item_val->item_code;?></td>
                    <td><?=$item_val->item_title;?></td>
                    <td><?=$item_val->fk_category_id;?><!--?=$item_val->category_name;?--><!--?=$item_val->category_status;?--></td>
                    <td><?=$item_val->item_status;?></td>
                    <td><?=$item_val->item_stock;?></td>
                    <td><?=$item_val->item_price;?></td>
                    <td><?=$item_val->fk_lang_id;?></td>
                    <td>
                        <a href="<?=Config::$web_path;?>/Admin/editItem/<?=$item_val->item_id;?>" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Modifica</a>
                        <a href="<?=Config::$web_path;?>/Admin/deleteItem/<?=$item_val->item_id;?>" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Elimina</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>       
    </table>
    <?php endif;?>
</div>