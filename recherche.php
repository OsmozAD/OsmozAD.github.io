<?php
// Connexion à la base de données (à personnaliser avec vos informations)
$mysqli = new mysqli('mysql:host=find-it.website;dbname=Base;', 'root', 'root');

// Vérification de la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}

// Récupération de la requête de recherche depuis le formulaire HTML
if (isset($_POST['query'])) {
    $query = $_POST['query'];

    // Requête SQL pour rechercher dans la table "users"
    $sql = "SELECT * FROM users WHERE name LIKE '%$query%' OR desc LIKE '%$query%'";
    
    // Exécution de la requête
    $result = $mysqli->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recherche de users</title>
</head>
<body>
    <h1>Recherche de données</h1>
    <form action="recherche.php" method="POST">
        <input type="text" name="query" placeholder="Recherche...">
        <button type="submit">Rechercher</button>
    </form>
    <section class="afficher_recherche">
	<?php
		if ($result->num_rows > 0) {
		    while ($row = $result->fetch_assoc()) {
        		echo "<p>Nom : " . $row['name'] . "</p>";
       			echo "<p>Description : " . $row['desc'] . "</p>";
    		    }
		} else {
    		    echo "Aucun résultat trouvé.";
		}

		$mysqli->close();
	?>
    </section>
</body>
</html>
