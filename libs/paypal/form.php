<?php
// Set to 0 once you're ready to go live
define("USE_SANDBOX", 1);

if(USE_SANDBOX == 1) {
     //sandbox
    $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
    $paypal_email = "fareilweb-facilitator@gmail.com";
} else {
    //produzione
    $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
    $paypal_email = "renato@sunflyers.it";
}


// Impostazioni URIs
$confirm_url = Config::$web_path.'/Shop/paypal/confirm';
$cancel_url = Config::$web_path.'/Shop/paypal/cancel';
$ipn_url = Config::$web_path.'/Shop/paypal/ipn';

// Dati Transazione
$item_name = ""; // Item Name (Subject)
$item_price = 0; // Total Price
$shipping_price = ""; // Shipping Pricw
$custom_info = ""; // Sale ID

// Client Data
$first_name = "";
$last_name = "";
$address1 = "";
$city = "";
$state = "";
$zip = "";
$email = "";


// So can link images or object in this folder without change anything bottom
$this_folder_web_path = Config::$web_path.'/libs/paypal';

?>

<form method="post" name="paypal_form" id="paypal_form" action="<?=$paypal_url; ?>">

    <input type="hidden" name="business" value="<?=$paypal_email; ?>" />
    <input type="hidden" name="cmd" value="_xclick" />

    <!-- Settings -->

    <!-- Where Return After Pay -->
    <input type="hidden" name="return" value="<?=$confirm_url?>" />
    <!-- Where Return After Cancel -->
    <input type="hidden" name="cancel_return" value="<?=$cancel_url?>" />
    <!-- Where PayPal Send IPN Transation Info -->
    <input type="hidden" name="notify_url" value="<?=$ipn_url?>" />
    <!--===-->
    <input type="hidden" name="rm" value="2" />
    <input type="hidden" name="currency_code" value="EUR" />
    <input type="hidden" name="lc" value="IT" />
    <input type="hidden" name="cbt" value="Continua..." />

    <!-- informazioni sul pagamento -->
    <input type="hidden" name="shipping" value="<?=$shipping_price?>" />
    <input type="hidden" name="cs" value="1" />

    <!-- informazioni sul prodotto -->
    <input type="hidden" name="item_name" value="<?=$item_name?>" />
    <input type="hidden" name="amount" value="<?=$item_price?>" />

    <!-- informazioni sulla vendita -->
    <input type="hidden" name="custom" value="<?=$custom_info?>" />

    <!-- informazioni sull'acquirente -->
    <input type="hidden" name="first_name" value="<?=$first_name?>" />
    <input type="hidden" name="last_name" value="<?=$last_name?>" />
    <input type="hidden" name="address1" value="<?=$address1?>" />
    <input type="hidden" name="city" value="<?=$city?>" />
    <input type="hidden" name="state" value="<?=$state?>" />
    <input type="hidden" name="zip" value="<?=$zip?>" />
    <input type="hidden" name="email" value="<?=$email?>" />

    <!-- pulsante pagamento -->
	<input type="image" src="<?=$this_folder_web_path?>/paybtn.png" border="0" name="submit" alt="Paga subito con PayPal" id="btnPpPayNow" />

</form>

<!-- Auto Submit -->
<script>
	jQuery(document).ready(function(){
	//	jQuery("#paypal_form").submit();	
	});
</script>

