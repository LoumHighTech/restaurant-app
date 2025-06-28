<?php
session_start();

// Configuration de la base de données
require_once 'configDatabase.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Erreur de connexion DB: " . $e->getMessage());
    die("Une erreur est survenue. Veuillez réessayer plus tard.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validation des entrées
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Format d'email invalide";
        header("Location: ../views/connexion.php");
        exit;
    }

    try {
        // Récupération de l'utilisateur
        $stmt = $pdo->prepare("SELECT id, nom_complet, mot_de_passe, role FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification que l'utilisateur existe
        if (!$user) {
            $_SESSION['error'] = "Identifiants incorrects";
            header("Location: ../views/connexion.php");
            exit;
        }


        // Vérification du mot de passe
        if (password_verify($mot_de_passe, $user['mot_de_passe'])) {
            session_regenerate_id(true);

            $_SESSION['auth'] = [
                'id' => $user['id'],
                'nom' => $user['nom_complet'],
                'email' => $email,
                'role' => $user['role'],
                'ip' => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT']
            ];

            $redirect = match($user['role']) {
                'admin' => '../views/admin.php',
                'livreur' => '../views/livreur.php',
                default => '../views/client.php'
            };

            header("Location: $redirect");
            exit;
        } else {
            $_SESSION['error'] = "Identifiants incorrects";
            header("Location: ../views/accueil.php");
            exit;
        }
    } catch (PDOException $e) {
        error_log("Erreur de connexion: " . $e->getMessage());
        $_SESSION['error'] = "Erreur technique. Veuillez réessayer.";
        header("Location: ../views/accueil.php");
        exit;
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    exit;
}