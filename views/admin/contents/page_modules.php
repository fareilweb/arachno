<!-- =====================================================================================
  Mini App - HTML
-->
<label for="modules"><?=Lang::$modules;?></label>

<ul id="modules">
  <li>
    <div class="form-group">
      <label>
        <input
          type="radio"
          name="page_module"
          value="false"
          class="form-control left"
          <?=$this->page->page_module == 'false' ? 'checked' : '';?>
        />
        <?=Lang::$no_module;?>
      </label>
    </div>
  </li>
  <?php foreach($this->available_modules as $module): ?>
  <li>
    <div class="form-group">
      <label>
        <input
          type="radio"
          name="page_module"
          value="<?=$module?>"
          class="form-control left"
          <?=$this->page->page_module == $module ? 'checked' : '';?>
        />
        <?=Lang::$include_module;?>: "<?=$module?>"
      </label>
    </div>
  </li>
  <?php endforeach;?>
</ul>
