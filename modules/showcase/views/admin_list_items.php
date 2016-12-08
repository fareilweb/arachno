<!-- Items List -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table>
            <tbody>
                <tr>
                    <th>Immagine</th>
                    <th>ID / Slug</th>
                    <th>Nome/Titolo</th>
                    <th>Categoria</th>
                    <th>Riepilogo</th>
                    <th>Data</th>
                    <th>Stato</th>
                    <th>Azioni</th>
                </tr>
                <?php foreach($this->showcase->items as $item): ?>
                <!-- Item -->
                <tr>
                    <td style="width: 120px;">
                        <img
                          src="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/<?=$item->images[0]->sc_image_src;?>"
                          alt="<?=$item->sc_item_name;?>"
                          title="<?=$item->sc_item_name;?>"
                          width="120" />
                    </td>
                    <td><?=$item->sc_item_id;?> / <?=$item->sc_item_slug;?></td>
                    <td><?=$item->sc_item_name;?></td>
                    <td><?=$item->categories[0]->sc_category_name;?></td>
                    <td><?=$item->sc_item_short_desc;?></td>
                    <td><?=$item->sc_item_date;?></td>
                    <td><?=$item->sc_item_status;?></td>
                    <td>
                        <div class="form-group">
                            <a href="<?=$this->showcase->mod_url;?>/editItem/<?=$item->sc_item_id;?>" class="btn btn-info form-control">
                                <span class="glyphicon glyphicon-edit"></span>
                                Modifica
                            </a>
                        </div>
                        <div class="form-group">
                            <a href="<?=$this->showcase->mod_url;?>/deleteItem/<?=$item->sc_item_id;?>" class="btn btn-danger form-control">
                                <span class="glyphicon glyphicon-remove-sign"></span>
                                Elimina
                            </a>
                        </div>
                    </td>
                </tr>
                <!-- Item END -->
                <?php endforeach;?>
            </tbody>
            </table>
        </div>
    </div>
</div>
