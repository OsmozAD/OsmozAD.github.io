<?php
// Connexion à la base de données (à personnaliser avec vos informations)
$mysqli = new mysqli('localhost', 'root', 'root', 'Base');

// Vérification de la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}

// Récupération de la requête de recherche depuis le formulaire HTML
if (isset($_POST['q'])) {
    $query = $_POST['q'];

    // Requête SQL pour rechercher dans la table "users"
    $sql = "SELECT * FROM users WHERE name LIKE '%$q%' OR desc LIKE '%$q%'";
    
    // Exécution de la requête
    $result = $mysqli->q($sql);

    // Affichage des résultats
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>Nom : " . $row['name'] . "</p>";
            echo "<p>Description : " . $row['desc'] . "</p>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }

    // Fermeture de la connexion à la base de données
    $mysqli->close();
}
?>