<?php
// Connexion à la base de données (à personnaliser avec vos informations)
$mysqli = new mysqli('localhost', 'root', 'Achille59+', 'Base');

// Vérification de la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}

// Récupération de la requête de recherche depuis le formulaire HTML
if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Requête SQL pour rechercher dans la table "donnée"
    $sql = "SELECT * FROM users WHERE name LIKE '%$query%' OR desc LIKE '%$query%'";
    
    // Exécution de la requête
    $result = $mysqli->query($sql);

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