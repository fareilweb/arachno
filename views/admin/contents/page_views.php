<!-- =====================================================================================
  Mini App - HTML
-->
<label for="included_views"><?=Lang::$included_views;?></label>
<div class="row">
    <label class="col-xs-5 col-sm-5 col-md-5 col-lg-5"><?=Lang::$slug;?></label>
    <label class="col-xs-5 col-sm-5 col-md-5 col-lg-5"><?=Lang::$position;?></label>
</div>

<div id="page_views">
    &nbsp;
</div>
<!-- HTML END
=====================================================================================-->


<!-- =====================================================================================
  Convert Stored Data To JSON
--><?="<script>var page_views_json = ".json_encode($this->page->page_views).";</script>"?>

<!-- =====================================================================================
  Get The MiniApp Script
--><script src="<?=Config::$web_path;?>/views/admin/contents/page_views.js"></script>

<!-- =====================================================================================
  MiniApp Usage Script:
-->
<script>
    jQuery(document).ready(function(){
        // Get, Init And Run PageViews Object Instance
        var pv = new PageViews("#page_views", page_views_json);
        pv.view_delete_service = "<?=Config::$web_path?>/Admin/removePageView";
        pv.draw();
    });
</script>
