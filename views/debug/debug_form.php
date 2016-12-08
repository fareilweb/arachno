


<form id="debug_form" method="post" target="_blank" action="<?=Config::$web_path;?>/views/debug/debug_page.php">
    <input type="hidden" name="print_r" value="<?=$this->print_r;?>" />
</form>

<script>
    document.getElementById("debug_form").submit();
    jQuery("#page-preloader").hide();
</script>