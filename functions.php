<?php
/**
** activation theme
**/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

/**
** Fonction listant les utilisateurs WP
**/
function list_users() {
    global $wpdb;

    $result = $wpdb->get_results("SELECT * FROM `wp_users`");

    // $test = "Mon 1er short code";
    // var_dump($test, get_defined_vars());

    ob_start(); // On commence le rendu
    include('templates/list_user.php');
    $html = ob_get_contents();
    ob_end_clean();

    return $html;
}

function list_modify() {
    global $wpdb;

    // var_dump( $wpdb);

    if(isset( $_POST['submemb'] )) {

        $wpdb->update(
            'wp_users', // Nom de la table
            array(
                'user_login' => $_POST['login'],
                'user_email' => $_POST['email'],
            ), // Données à mettre à jour
            array('ID' => $_GET['id']), // Condition WHERE
            array(
                '%s', // Format pour user_login
                '%s'  // Format pour user_email
            ), // Format pour les données à mettre à jour
            array('%d') // Format pour la condition WHERE
        );

        update_user_meta($_GET["id"], "date_naiss", $_POST['dob']);
        update_user_meta($_GET["id"], "num_secu", $_POST['ssn']);
    }

    // $result = $wpdb->get_results("SELECT * FROM `wp_users` WHERE `ID` = " . $_GET['id']);
    // $u_data = get_user_by('ID', $_GET['id']);
    $user_data = get_userdata( $_GET['id']);

    ob_start();
    include('templates/list_modify.php');
    $html = ob_get_contents();
    ob_end_clean();

    return $html;
}
// Ajout d'un shortcode qui peut être utilisé sur les pages voulues
add_shortcode( 'list_user', 'list_users' );
add_shortcode( 'list_modify', 'list_modify' );

add_shortcode('updtusr', 'modif_user');