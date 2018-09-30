<?php
/**
 * @package Client_Data
 * @version 0.1
 */
/*
Plugin Name: Client Data
Plugin URI: https://github.com/Mimaitek/wordpress-client-data
Description: Plugin para hacer disponibles mediante shortcodes datos del cliente
Author: Maria Teresa Ortube
Version: 0.1
Author URI: https://github.com/Mimaitek/
*/

/* Global keys for use */
$name_key = 'client_data_name_key';
$last_name_key = 'client_data_last_name_key';
$address_key = 'client_data_address_key';
$dni_cif_key = 'client_data_dni_cif_key';
$domain_key = 'client_data_domain_key';
$email_key = 'client_data_email_key';
$wegpage_name_key = 'client_data_wegpage_name_key';



// Hook for adding admin menus
add_action('admin_menu', 'mt_add_pages');

// action function for above hook
function mt_add_pages() {
    // Add a new submenu under Settings:
    add_options_page('Client Data', 'Client Data', 'manage_options', 'clientdata', 'client_data_page');

    // Add a new submenu under Tools:
    // add_management_page( __('Test Tools','menu-test'), __('Test Tools','menu-test'), 'manage_options', 'testtools', 'mt_tools_page');

    // Add a new top-level menu (ill-advised):
    // add_menu_page(__('Test Toplevel','menu-test'), __('Test Toplevel','menu-test'), 'manage_options', 'mt-top-level-handle', 'mt_toplevel_page' );

    // Add a submenu to the custom top-level menu:
    // add_submenu_page('mt-top-level-handle', __('Test Sublevel','menu-test'), __('Test Sublevel','menu-test'), 'manage_options', 'sub-page', 'mt_sublevel_page');

    // Add a second submenu to the custom top-level menu:
    // add_submenu_page('mt-top-level-handle', __('Test Sublevel 2','menu-test'), __('Test Sublevel 2','menu-test'), 'manage_options', 'sub-page2', 'mt_sublevel_page2');
}



function client_data_page() {


    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }
    
    global $name_key, $last_name_key, $address_key, $dni_cif_key, $domain_key, $email_key, $wegpage_name_key;
 

    // variables for the field and option names
    $name = get_option($name_key, '');
    $last_name = get_option($last_name_key, '');
    $address = get_option($address_key, '');
    $dni_cif = get_option($dni_cif_key, '');
    $domain = get_option($domain_key, '');
    $email = get_option($email_key, '');
    $wegpage_name = get_option($wegpage_name_key, '');



    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST['client_data_submit_hidden_key']) && $_POST['client_data_submit_hidden_key'] == 'Y' ) {
        $name = $_POST[ $name_key ];
        update_option( $name_key, $name );

        $last_name = $_POST[ $last_name_key ];
        update_option( $last_name_key, $last_name );

        $address = $_POST[ $address_key ];
        update_option( $address_key, $address );

        $dni_cif = $_POST[ $dni_cif_key ];
        update_option( $dni_cif_key, $dni_cif );

        $domain = $_POST[ $domain_key ];
        update_option( $domain_key, $domain );

        $email = $_POST[ $email_key ];
        update_option( $email_key, $email );

        $wegpage_name = $_POST[ $wegpage_name_key ];
        update_option( $wegpage_name_key, $wegpage_name );

        // Put a "settings saved" message on the screen

?>
<div class="updated"><p><strong><?php echo "Datos guardados"; ?></strong></p></div>
<?php

    }

    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>Informacion del cliente</h2>";

    // settings form
    
?>

<form name="client-data-form" method="post" action="">

<input type="hidden" name="client_data_submit_hidden_key" value="Y">

<label>Nombre del cliente</label>
<input type="text" name="<?php echo $name_key; ?>" value="<?php echo $name; ?>" size="20">

<label>Apellidos del cliente</label>
<input type="text" name="<?php echo $last_name_key; ?>" value="<?php echo $last_name; ?>" size="20">

<label>Dirección del cliente</label>
<input type="text" name="<?php echo $address_key; ?>" value="<?php echo $address; ?>" size="20">

<label>DNI/CIF Cliente</label>
<input type="text" name="<?php echo $dni_cif_key; ?>" value="<?php echo $dni_cif; ?>" size="20">

<label>Dominio del Cliente</label>
<input type="text" name="<?php echo $domain_key; ?>" value="<?php echo $domain; ?>" size="20">

<label>Email del cliente</label>
<input type="text" name="<?php echo $email_key; ?>" value="<?php echo $email; ?>" size="20">

<label>Nombre de la página</label>
<input type="text" name="<?php echo $wegpage_name_key; ?>" value="<?php echo $wegpage_name; ?>" size="20">


</p><hr />

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="submit" />
</p>

</form>
</div>

<?php



}




/* SHORTCODES */
function shortcode_client_data_name() {
    global $name_key;
    $name = get_option($name_key, '');
	return $name;
}
add_shortcode('client-data-name', 'shortcode_client_data_name');

