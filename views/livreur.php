<?php
session_start();

// Redirection si non connecté
if (!isset($_SESSION['auth'])) {
    header('Location: accueil.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Livreur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    
</head>

<body class="font-poppins bg-gray-50 dark:bg-darkbg">
    <!-- Header Livreur -->
    <header class="bg-delivery text-white shadow-md dark:bg-green-900">
        <div class="container mx-auto px-4">
            <div
                class="flex flex-col sm:flex-row justify-between items-start sm:items-center py-4 space-y-4 sm:space-y-0">
                <!-- Logo + titre -->
                <div class="flex flex-col sm:flex-row sm:items-center w-full sm:w-auto">
                    <div
                        class="bg-accent text-white w-12 h-12 rounded-lg flex items-center justify-center mb-2 sm:mb-0 sm:mr-3">
                        <i class="fas fa-motorcycle text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl md:text-2xl font-bold">Tableau de bord Livreur</h1>
                        <?php if (isset($_SESSION['auth'])): ?>
                            <p class="text-gray-300 text-sm md:text-base">Bienvenue, <?php echo htmlspecialchars($_SESSION['auth']['nom']); ?></p>
                        <?php else: ?>
                            <p class="text-gray-300 text-sm md:text-base">Bienvenue</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Menu utilisateur avec toggle dark mode -->
                <div class="w-full sm:w-auto flex justify-end items-center space-x-4">
                    <!-- Dark mode toggle -->
                    <button id="darkModeToggle" class="dark-mode-toggle p-2 rounded-full hover:bg-white/20">
                        <i id="darkModeIcon" class="fas fa-moon text-lg"></i>
                    </button>

                    <!-- Menu utilisateur -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 w-full sm:w-auto justify-between sm:justify-start">
                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center">
                                <i class="fas fa-user"></i>
                            </div>
                            <span class="text-sm sm:text-base">Mon compte</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>
                        <div
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg py-2 hidden group-hover:block z-10">
                            <a href="#" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700">Mon profil</a>
                            <a href="#" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700">Paramètres</a>
                            <a href="#" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700">Aide</a>
                            <a href="#"
                                class="block px-4 py-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 border-t border-gray-200 dark:border-gray-700">Déconnexion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
            <!-- Livraisons aujourd'hui -->
            <div class="dashboard-card bg-white dark:bg-gray-800 rounded-xl p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 dark:text-gray-300 mb-1">Livraisons aujourd'hui</p>
                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white">8</h3>
                        <p class="text-green-600 dark:text-green-400 text-sm mt-1">
                            <i class="fas fa-arrow-up mr-1"></i>2 par rapport à hier
                        </p>
                    </div>
                    <div class="bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 w-12 h-12 rounded-lg flex items-center justify-center">
                        <i class="fas fa-box text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Gains du jour -->
            <div class="dashboard-card bg-white dark:bg-gray-800 rounded-xl p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 dark:text-gray-300 mb-1">Gains du jour</p>
                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white">12 000 FCFA</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mt-1">
                            1300 FCFA par livraison
                        </p>
                    </div>
                    <div class="bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 w-12 h-12 rounded-lg flex items-center justify-center">
                        <i class="fas fa-money-bill-wave text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Temps moyen -->
            <div class="dashboard-card bg-white dark:bg-gray-800 rounded-xl p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 dark:text-gray-300 mb-1">Temps moyen</p>
                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white">15 min</h3>
                        <p class="text-green-600 dark:text-green-400 text-sm mt-1">
                            <i class="fas fa-arrow-down mr-1"></i>2 min de moins
                        </p>
                    </div>
                    <div class="bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300 w-12 h-12 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Note moyenne -->
            <div class="dashboard-card bg-white dark:bg-gray-800 rounded-xl p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 dark:text-gray-300 mb-1">Note moyenne</p>
                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white">4.8/5</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mt-1">
                            Basé sur 45 avis
                        </p>
                    </div>
                    <div class="bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300 w-12 h-12 rounded-lg flex items-center justify-center">
                        <i class="fas fa-star text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Titre section livraisons -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Mes livraisons assignées</h2>
            <div class="text-gray-600 dark:text-gray-300">
                <i class="fas fa-sync-alt mr-2"></i>Dernière mise à jour: 14:30
            </div>
        </div>

        <!-- Grille des livraisons -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Livraison 1 -->
            <div class="delivery-card bg-white dark:bg-gray-800 rounded-xl p-6">
                <div class="flex justify-between items-start mb-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white">Commande #1</h3>
                    <span class="status-badge status-pending">En attente</span>
                </div>

                <div class="mb-6">
                    <h4 class="font-bold text-gray-800 dark:text-white mb-3">Client</h4>
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-gray-600 dark:text-gray-300"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800 dark:text-white">Jean Dupont</h4>
                            <p class="text-gray-600 dark:text-gray-300">
                                <i class="fas fa-phone mr-1"></i>221 77 123 43 07
                            </p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-bold text-gray-800 dark:text-white mb-2">Adresse de livraison</h4>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-map-marker-alt mr-3 text-red-500"></i>
                            <span>Résidence A, Chambre 13</span>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h4 class="font-bold text-gray-800 dark:text-white mb-3">Articles commandés</h4>
                    <ul class="list-disc pl-5 text-gray-600 dark:text-gray-300">
                        <li>Thiéboudienne</li>
                        <li>Jus d'orange</li>
                    </ul>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <p class="text-gray-600 dark:text-gray-300 mb-1">Heure de commande</p>
                        <p class="font-bold dark:text-white">12:50</p>
                    </div>
                    <div>
                        <p class="text-gray-600 dark:text-gray-300 mb-1">Livraison estimée</p>
                        <p class="font-bold dark:text-white">13:15</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-gray-600 dark:text-gray-300 mb-1">Total</p>
                        <p class="font-bold text-xl dark:text-white">3500 FCFA</p>
                    </div>
                </div>

                <div class="flex flex-col space-y-3">
                    <button
                        class="px-4 py-3 bg-primary text-white rounded-lg hover:bg-secondary transition flex items-center justify-center">
                        <i class="fas fa-phone-alt mr-2"></i> Appeler le client
                    </button>
                    <button class="start-delivery-btn px-4 py-3 bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 rounded-lg hover:bg-green-200 dark:hover:bg-green-800 transition flex items-center justify-center">
                        <i class="fas fa-play-circle mr-2"></i> Démarrer la livraison
                    </button>
                </div>
            </div>

            <!-- Livraison 2 -->
            <div class="delivery-card bg-white dark:bg-gray-800 rounded-xl p-6">
                <div class="flex justify-between items-start mb-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white">Commande #2</h3>
                    <span class="status-badge status-in-progress">En cours</span>
                </div>

                <div class="mb-6">
                    <h4 class="font-bold text-gray-800 dark:text-white mb-3">Client</h4>
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-gray-600 dark:text-gray-300"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800 dark:text-white">Marie Diallo</h4>
                            <p class="text-gray-600 dark:text-gray-300">
                                <i class="fas fa-phone mr-1"></i>221 78 987 03 43
                            </p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-bold text-gray-800 dark:text-white mb-2">Adresse de livraison</h4>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-map-marker-alt mr-3 text-red-500"></i>
                            <span>Résidence B, Chambre 8</span>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h4 class="font-bold text-gray-800 dark:text-white mb-3">Articles commandés</h4>
                    <ul class="list-disc pl-5 text-gray-600 dark:text-gray-300">
                        <li>Poulet Yassa</li>
                        <li>Salade</li>
                    </ul>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <p class="text-gray-600 dark:text-gray-300 mb-1">Heure de commande</p>
                        <p class="font-bold dark:text-white">12:53</p>
                    </div>
                    <div>
                        <p class="text-gray-600 dark:text-gray-300 mb-1">Livraison estimée</p>
                        <p class="font-bold dark:text-white">13:23</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-gray-600 dark:text-gray-300 mb-1">Total</p>
                        <p class="font-bold text-xl dark:text-white">3500 FCFA</p>
                    </div>
                </div>

                <!-- Suivi de livraison -->
                <div class="mb-6">
                    <h4 class="font-bold text-gray-800 dark:text-white mb-3">Progression de la livraison</h4>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm text-gray-600 dark:text-gray-300">Départ</span>
                        <span class="text-sm text-gray-600 dark:text-gray-300">En route</span>
                        <span class="text-sm text-gray-600 dark:text-gray-300">Arrivé</span>
                    </div>
                    <div class="relative h-2 bg-gray-200 dark:bg-gray-700 rounded-full mb-1">
                        <div class="absolute top-0 left-0 h-full bg-green-500 rounded-full" style="width: 60%"></div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col items-center">
                            <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-xs mt-1 dark:text-gray-300">Préparé</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-xs mt-1 dark:text-gray-300">En route</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-6 h-6 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                                <span class="text-gray-600 dark:text-gray-300 text-xs">3</span>
                            </div>
                            <span class="text-xs mt-1 dark:text-gray-300">Livré</span>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-3">
                    <button
                        class="flex-1 px-4 py-3 bg-primary text-white rounded-lg hover:bg-secondary transition flex items-center justify-center">
                        <i class="fas fa-phone-alt mr-2"></i> Appeler
                    </button>
                    <button class="complete-delivery-btn flex-1 px-4 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center justify-center">
                        <i class="fas fa-check-circle mr-2"></i> Livré
                    </button>
                </div>
            </div>
        </div>

        <!-- Livraisons complétées -->
        <div class="mt-12 bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Livraisons complétées</h2>
                <button class="text-primary hover:text-secondary dark:text-blue-300 dark:hover:text-blue-200">
                    <i class="fas fa-history mr-1"></i> Voir tout l'historique
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">N° Commande</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">Client</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">Heure</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">Montant</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">Temps</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">Note</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <tr>
                            <td class="py-4 px-4 font-medium dark:text-white">#CMD-788</td>
                            <td class="py-4 px-4 dark:text-gray-300">Khadim Diop</td>
                            <td class="py-4 px-4 dark:text-gray-300">11:30 - 11:50</td>
                            <td class="py-4 px-4 font-bold dark:text-white">4200 FCFA</td>
                            <td class="py-4 px-4 dark:text-gray-300">20 min</td>
                            <td class="py-4 px-4">
                                <div class="flex items-center text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-600 dark:text-gray-300 ml-2">5.0</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 font-medium dark:text-white">#CMD-784</td>
                            <td class="py-4 px-4 dark:text-gray-300">Ousmane Ndiaye</td>
                            <td class="py-4 px-4 dark:text-gray-300">11:45 - 12:05</td>
                            <td class="py-4 px-4 font-bold dark:text-white">3800 FCFA</td>
                            <td class="py-4 px-4 dark:text-gray-300">20 min</td>
                            <td class="py-4 px-4">
                                <div class="flex items-center text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="text-gray-600 dark:text-gray-300 ml-2">4.5</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 font-medium dark:text-white">#CMD-780</td>
                            <td class="py-4 px-4 dark:text-gray-300">Aminata Sow</td>
                            <td class="py-4 px-4 dark:text-gray-300">12:00 - 12:25</td>
                            <td class="py-4 px-4 font-bold dark:text-white">3500 FCFA</td>
                            <td class="py-4 px-4 dark:text-gray-300">25 min</td>
                            <td class="py-4 px-4">
                                <div class="flex items-center text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span class="text-gray-600 dark:text-gray-300 ml-2">4.0</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Livraison Express</h3>
                    <p class="text-gray-400">Service de livraison rapide et fiable pour les commandes de restaurant.</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-4">Liens rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Tableau de bord</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Mes livraisons</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Historique</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Statistiques</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-4">Support</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-headset mt-1 mr-3"></i>
                            <span>Support technique: +221 33 800 00 00</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-3"></i>
                            <span>support@livraisonexpress.sn</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                            <span>Dakar, Sénégal</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Livraison Express. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

</body>

</html>