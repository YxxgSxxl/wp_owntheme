<?php
// // Assurez-vous que l'ID de l'utilisateur est passé correctement
// if (isset($_GET['id'])) {
//     $user_id = intval($_GET['id']); // Assurez-vous que l'ID est un entier

//     // Récupérer les informations de l'utilisateur (remplacez ceci par votre propre logique de récupération)
//     $user = get_userdata($user_id); // Exemple avec WordPress

//     if ($user) {
//         // Récuperation des données de l'utilisateur
//         $user_name = esc_attr($user->user_login); // Exemple pour le nom d'utilisateur
//         $user_email = esc_attr($user->user_email); // Exemple pour l'email
//     } else {
//         // Gérer le cas où l'utilisateur n'existe pas
//         echo 'Utilisateur non trouvé.';
//         exit;
//     }
// } else {
//     // Gérer le cas où l'ID de l'utilisateur n'est pas défini
//     echo 'ID utilisateur non fourni.';
//     exit;
// }
?>

<?php var_dump($user_data); ?>

<form action="" method="POST">
    <!-- Champ pour l'identifiant utilisateur (caché) -->
    <input type="hidden" name="user_id" value="<?php echo esc_attr($user_data->ID); ?>">

    <!-- Champ pour le nom -->
    <label for="nom">Nom:</label>
    <input type="text" id="login" name="login" value="<?php echo esc_attr($user_data->user_login); ?>" required><br><br>

    <!-- Champ pour l'adresse e-mail -->
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo esc_attr($user_data->user_email); ?>" required><br><br>

    <!-- Champ pour la date de naissance -->
    <label for="dob">Date de naissance:</label>
    <input type="date" id="dob" name="dob" value="<?php echo get_user_meta($_GET['id'], "date_naiss", true); ?>" required><br><br>

    <!-- Champ pour le num de sécu sociale -->
    <label for="ssn">N° Sécurité Sociale:</label>
    <input type="text" id="ssn" name="ssn" value="<?php echo get_user_meta($_GET['id'], "num_secu", true); ?>" required pattern="\d{15}" title="Le numéro de sécurité sociale doit comporter 15 chiffres"><br><br>

    <!-- Bouton pour soumettre le formulaire -->
    <input type="submit" id="submemb" name="submemb" value="Enregistrer les modifications">
</form>
