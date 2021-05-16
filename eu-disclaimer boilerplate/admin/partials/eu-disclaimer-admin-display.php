<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://sitetest.re/
 * @since      1.0.0
 *
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/admin/partials
 */
if(!empty($_POST['message_disclaimer']) && !empty($_POST['url_redirection'])){
    $text = new DisclaimerOptions();
    $text->setMessageDisclaimer(htmlspecialchars($_POST['message_disclaimer']));
    $text->setRedirectionko(htmlspecialchars($_POST['url_redirection']));
    $message = DisclaimerGestionTable::insererTable($text->getMessageDisclaimer(), $text->getRedirectionko()
    );
} 
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<h1>EU DISCLAIMER</h1>
<br>
<h2>Configuration</h2>
<p><?php if(isset($message)) echo $message; ?></p>
<form method="post" action="" novalidate="novalidate">
    <table class="form-table">
        <tr>
            <th scope="row"><label for="blogname">Message du disclaimer</label></th>
            <td><input name="message_disclaimer" type="text" id="message_disclaimer" value="" class="regular-text" placeholder="<?php echo DisclaimerGestionTable::getMessageDisclaimer() ?>" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="blogname">Url de redirection</label></th>
            <td><input name="url_redirection" type="text" id="url_redirection" value="" class="regular-text" placeholder="<?php echo DisclaimerGestionTable::getUrlRedirection() ?>" /></td>
        </tr>
    </table>
    <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Enregistrer les modifications"/></p>
</form>
<br>
<p>Exemple: La législation nous impose de vous informer sur la nocivité des produits à base de nicotine, vous devez avoir plus de 18 ans pour consulter ce site !</p>
<br>
<h3>Centre AFPA / session DWWM</h3>
<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) .'/img/layout_set_logo.png'; ?>" width="10%">
