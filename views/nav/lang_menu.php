<div class="lang_menu">
    
    <form id="selectLanguage" name="select_language" method="POST" action="<?=Config::$web_path?>/Lang/setLanguage">
        <!-- Hidden Data -->
        <?php
            $return_page = 'http://';
            $return_page.= filter_input(INPUT_SERVER, 'SERVER_NAME', FILTER_SANITIZE_URL);
            $return_page.= filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);
        ?>
        <input type="hidden" name="redirect" value="<?=$return_page?>" />
        
        <div class="form-group">
            <select id="languageCode" name="language_code" class="form-control">
                <option value="it-IT" <?=Session::get('lang')==="it-IT" ? 'selected' : ''; ?>>
                    Italiano (it-IT)
                </option>
                <option value="en-GB" <?=Session::get('lang')==="en-GB" ? 'selected' : ''; ?>>
                    English (en-GB)
                </option>                
            </select>
        </div>
    </form>

</div>


<!-- Java Scripts -->
<script>
    
    jQuery("#languageCode").change(function(){
        jQuery("#selectLanguage").submit();
    });
    
</script>