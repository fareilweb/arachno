<h2>
  <span class="glyphicon glyphicon-wrench"></span>
  Amministrazione "Showcase"
</h2>

<ul style="margin:12px;">
  <li>
      <a href="<?=Config::$web_path;?>/Admin/module/showcase/editItem">
        <label><span class="glyphicon glyphicon-wrench"></span>
          Aggiungi Elemento</label>
      </a>
  </li>
  <li>
      <a href="<?=Config::$web_path;?>/Admin/module/showcase/listItems">
          <label><span class="glyphicon glyphicon-wrench"></span>
          Elenca Elementi</label>
      </a>
  </li>
  <li>
      <a href="<?=Config::$web_path;?>/Admin/module/showcase/editCategory">
          <label><span class="glyphicon glyphicon-wrench"></span>
          Aggiungi Categoria</label>
      </a>
  </li>
  <li>
      <a href="<?=Config::$web_path;?>/Admin/module/showcase/listCategories">
          <label><span class="glyphicon glyphicon-wrench"></span>
          Elenca Categorie</label>
      </a>
  </li>
</ul>

<?=$this->print_ri($this->showcase);?>
