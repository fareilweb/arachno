<div class="page_select">

    <h2>
        <span class="glyphicon glyphicon-folder-open"></span>
        &nbsp; <?=Lang::$select;?>
        o
        <a href="<?=Config::$web_path;?>/Admin/pageEdit" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span>
            <?=Lang::$add;?>            
        </a>
        <hr/>
    </h2>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="page_select_list">
                <table>
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Slug</th>
                            <th>Categoria</th>
                            <th>Autore</th>
                            <th>Lingua</th>
                            <th>Azioni</th>
                        </tr>
                        <?php foreach($this->pages as $page):?>
                            <tr>
                                <td><?=$page->page_id;?></td>
                                <td><?=$page->page_title;?></td>
                                <td><?=$page->page_slug;?></td>
                                <td><?=$page->category_name;?></td>
                                <td><?=$page->user_name;?> <?=$page->user_surname;?></td>
                                <td><?=$page->lang_name;?></td>
                                <td>
                                    <a href="<?=Config::$web_path;?>/Admin/pageEdit/<?=$page->page_id;?>" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        <?=Lang::$edit;?>
                                    </a>
                                    <a href="<?=Config::$web_path;?>/Admin/pageDelete/<?=$page->page_id;?>" class="btn btn-default">
                                        <span class="glyphicon glyphicon-trash"></span>
                                        <?=Lang::$delete;?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        
        </div>    
    </div>

</div>