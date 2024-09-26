
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prolab Afrik</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="output.css">
    <script src="https://unpkg.com/scrollreveal@4.0.7/dist/scrollreveal.min.js"></script>
</head>
<body class="bg-black relative">
<?php 
if ( empty(session_id()) ) session_start();

try {
    // Connexion à la base de données (assuming standard port 3306)
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8;', 'root', 'your_password');
  } catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    exit; // Stop execution
  }
// Vérification si le formulaire est soumis
if (isset($_POST['envoi'])) {
    // Vérification si tous les champs sont remplis
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $mdp = sha1($_POST['password']);

        // Préparation de la requête SQL
        $recupUser = $bdd->prepare('SELECT * FROM user WHERE email = ? AND mdp = ?');
        $recupUser->execute(array($email, $mdp));

        // Vérification si un utilisateur correspond
        if ($recupUser->rowCount() > 0) {
            // Récupération des informations utilisateur
            $user = $recupUser->fetch();
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['mdp'] = $user['mdp'];

            // Redirection vers la page d'accueil après connexion réussie
            header('Location: connecter.html');
            exit; // Stopper l'exécution après la redirection
        } else {
            echo "<p style='color:red;'>Votre email ou mot de passe est incorrect.</p>";
        }
    } else {
        echo "<p style='color:red;'>Veuillez compléter tous les champs...</p>";
    }
}
?>

    <div class="flex items-center justify-center h-screen bg-gray-900 bg-opacity-50">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-semibold mb-2">Portail de connexion</h2>
            <p class="text-sm text-gray-600 mb-6">Responsable RH</p>

            <!-- Formulaire avec méthode POST -->
            <form method="POST" action="">
                <div class="mb-4">
                    <label for="email" class="block text-primary text-sm mb-2">Email</label>
                    <input type="email" name="email" id="email" placeholder="huguespatrickwora@transform-giat.com" autocomplete="off" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:primary">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-primary text-sm mb-2">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="********************" autocomplete="off" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                </div>

                <div class="mb-4 text-right">
                    <a href="#" class="text-sm text-primary hover:underline">Mot de passe oublié ?</a>
                </div>

                <button type="submit" name="envoi" class="w-full bg-primary text-white py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <a href="connecter.html">CONNEXION</a>
                </button>
            </form>
        </div>
    </div>
    
    
</body>
</html>
