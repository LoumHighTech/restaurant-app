<?php
// Connexion à la base de données (à adapter à ton environnement)
$host = 'localhost';
$dbname = 'restaurant_UGB';
$user = 'root';
$pass = ''; // Change ceci si tu as un mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération et sécurisation des données
    $nom_complet = htmlspecialchars(trim($_POST["nom_complet"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $telephone = htmlspecialchars(trim($_POST["telephone"]));
    $adresse = isset($_POST["adresse"]) ? htmlspecialchars(trim($_POST["adresse"])) : null;
    $mot_de_passe = $_POST["mot_de_passe"];
    $role = $_POST["account_type"]; // 'client' ou 'livreur'

    // Hachage du mot de passe (plus sécurisé que SHA2)
    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    try {
        // Préparer la requête
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom_complet, email, mot_de_passe, telephone, adresse, role)
                               VALUES (:nom_complet, :email, :mot_de_passe, :telephone, :adresse, :role)");

        $stmt->bindParam(':nom_complet', $nom_complet);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe_hash);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':role', $role);

        $stmt->execute();

        // Rediriger ou afficher un message
        header("Location: ../views/accueil.php");
        exit;

    } catch (PDOException $e) {
        // Gestion des erreurs (ex: email déjà existant)
        if ($e->getCode() == 23000) {
            echo "Erreur : un compte avec cet email existe déjà.";
        } else {
            echo "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }
} else {
    echo "Méthode non autorisée.";
}
?>
