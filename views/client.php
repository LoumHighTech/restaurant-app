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
    <title>Client - Restaurant Universitaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="client.css">
        <script src="client.js" defer></script>
    
</head>

<body class="font-poppins bg-gray-50 dark:bg-darkbg">
    <!-- Header Client -->
    <header class="bg-client text-white shadow-md dark:bg-green-900">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo + titre -->
                <div class="flex items-center">
                    <div class="bg-accent text-white w-12 h-12 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-utensils text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl md:text-2xl font-bold">Tableau de bord client</h1>
                        <?php if (isset($_SESSION['auth'])): ?>
                            <p class="text-gray-300 text-sm md:text-base">Bienvenue, <?php echo htmlspecialchars($_SESSION['auth']['nom']); ?></p>
                        <?php else: ?>
                            <p class="text-gray-300 text-sm md:text-base">Bienvenue</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Dark mode toggle and profile -->
                <div class="flex items-center space-x-4">
                    <!-- Dark mode toggle -->
                    <div class="theme-toggle mr-4" id="themeToggle">
                        <i class="fas fa-sun" id="sunIcon"></i>
                        <i class="fas fa-moon hidden" id="moonIcon"></i>
                    </div>

                    <!-- Profil (Desktop) -->
                    <div class="hidden md:flex items-center space-x-4">
                        <div class="relative group">
                            <button class="flex items-center space-x-2">
                                <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>Mon compte</span>
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

                <!-- Burger menu (Mobile) -->
                <div class="md:hidden">
                    <button id="clientMenuToggle" class="text-white focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation responsive -->
    <nav class="bg-white shadow-sm dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div id="clientNavTabs" class="hidden md:flex flex-col md:flex-row md:space-x-8 py-3">
                <button data-tab="menu"
                    class="nav-tab active py-2 w-full md:w-auto text-left md:text-center whitespace-nowrap text-gray-800 dark:text-gray-200">Menu du
                    jour</button>
                <button data-tab="orders"
                    class="nav-tab py-2 w-full md:w-auto text-left md:text-center whitespace-nowrap text-gray-800 dark:text-gray-200">Mes
                    commandes</button>
                <button data-tab="subscription"
                    class="nav-tab py-2 w-full md:w-auto text-left md:text-center whitespace-nowrap text-gray-800 dark:text-gray-200">Mon
                    abonnement</button>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="container mx-auto px-4 py-8">
        <!-- Menu du jour -->
        <div id="menu-content" class="tab-content active">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
                <!-- Titre -->
                <h2 class="text-xl md:text-2xl font-bold text-gray-800 dark:text-white">Menu du jour</h2>

                <!-- Filtres : catégorie + recherche -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full md:w-auto">
                    <!-- Select Catégories -->
                    <div class="w-full sm:w-auto">
                        <select
                            class="w-full sm:w-auto px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent bg-white dark:bg-gray-700 dark:text-white">
                            <option class="dark:bg-gray-700">Toutes les catégories</option>
                            <option class="dark:bg-gray-700">Plats principaux</option>
                            <option class="dark:bg-gray-700">Entrées</option>
                            <option class="dark:bg-gray-700">Desserts</option>
                            <option class="dark:bg-gray-700">Boissons</option>
                        </select>
                    </div>

                    <!-- Champ de recherche -->
                    <div class="w-full sm:w-auto">
                        <input type="text" placeholder="Rechercher un plat..."
                            class="w-full sm:w-auto px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent bg-white dark:bg-gray-700 dark:text-white">
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Plat 1 -->
                <div class="dish-card bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md transition-all duration-300">
                    <div class="h-56 bg-gray-200 relative">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&q=80&w=1000" alt="Thiéboudienne"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">Thiéboudienne</h3>
                            <span class="text-lg font-bold text-accent">800 FCFA</span>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Riz au poisson traditionnel sénégalais avec légumes</p>
                        <div class="flex items-center justify-between">
                            <span class="bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 px-3 py-1 rounded-full text-sm">Plat principal</span>
                            <div class="flex space-x-2">
                                <button
                                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition flex items-center">
                                    <i class="fas fa-shopping-cart mr-2"></i>Commander
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Plat 2 -->
                <div class="dish-card bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md transition-all duration-300">
                    <div class="h-56 bg-gray-200 relative">
                        <img src="https://images.unsplash.com/photo-1562967914-608f82629710?auto=format&fit=crop&q=80&w=1000" alt="Poulet Yassa"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">Poulet Yassa</h3>
                            <span class="text-lg font-bold text-accent">800 FCFA</span>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Poulet mariné aux oignons et citron, spécialité sénégalaise</p>
                        <div class="flex items-center justify-between">
                            <span class="bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 px-3 py-1 rounded-full text-sm">Plat principal</span>
                            <div class="flex space-x-2">
                                <button
                                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition flex items-center">
                                    <i class="fas fa-shopping-cart mr-2"></i>Commander
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Plat 3 -->
                <div class="dish-card bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md transition-all duration-300">
                    <div class="h-56 bg-gray-200 relative">
                        <img src="https://images.unsplash.com/photo-1603569283847-aa295f0d016a?auto=format&fit=crop&q=80&w=1000" alt="Salade de fruits"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">Salade de fruits</h3>
                            <span class="text-lg font-bold text-accent">1500 FCFA</span>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Mélange de fruits frais de saison</p>
                        <div class="flex items-center justify-between">
                            <span class="bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 px-3 py-1 rounded-full text-sm">Végétarien</span>
                            <div class="flex space-x-2">
                                <button
                                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition flex items-center">
                                    <i class="fas fa-shopping-cart mr-2"></i>Commander
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Suggestions du chef -->
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Suggestions du chef</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gradient-to-r from-client to-green-800 rounded-xl p-6 text-white">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center mr-4">
                                <i class="fas fa-star"></i>
                            </div>
                            <h3 class="text-xl font-bold">Menu du jour</h3>
                        </div>
                        <p class="mb-4">Découvrez notre plat spécial du jour préparé avec des ingrédients frais et de
                            saison.</p>
                        <button class="px-4 py-2 bg-white text-client font-semibold rounded-lg dark:bg-gray-100">Découvrir</button>
                    </div>

                    <div class="bg-gradient-to-r from-accent to-orange-700 rounded-xl p-6 text-white">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center mr-4">
                                <i class="fas fa-fire"></i>
                            </div>
                            <h3 class="text-xl font-bold">Nouveautés</h3>
                        </div>
                        <p class="mb-4">Explorez nos dernières créations culinaires exclusivement disponibles cette
                            semaine.</p>
                        <button class="px-4 py-2 bg-white text-accent font-semibold rounded-lg dark:bg-gray-100">Explorer</button>
                    </div>

                    <div class="bg-gradient-to-r from-primary to-blue-800 rounded-xl p-6 text-white">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center mr-4">
                                <i class="fas fa-percent"></i>
                            </div>
                            <h3 class="text-xl font-bold">Offre spéciale</h3>
                        </div>
                        <p class="mb-4">Profitez de 15% de réduction sur votre première commande avec le code
                            BIENVENUE15.</p>
                        <button class="px-4 py-2 bg-white text-primary font-semibold rounded-lg dark:bg-gray-100">Utiliser</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mes commandes -->
        <div id="orders-content" class="tab-content">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Mes commandes en cours</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Commande en cours -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white">Commande #CMD-789</h3>
                        <span class="status-badge status-pending">En préparation</span>
                    </div>

                    <div class="mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center mr-4">
                                <i class="fas fa-clock text-blue-600 dark:text-blue-300"></i>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-300">Heure de commande</p>
                                <p class="font-medium dark:text-white">01/06/2025 à 12:45</p>
                            </div>
                        </div>

                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mr-4">
                                <i class="fas fa-motorcycle text-green-600 dark:text-green-300"></i>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-300">Livreur</p>
                                <p class="font-medium dark:text-white">Amadou Ba - Arrive dans 20 min</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h4 class="font-bold text-gray-800 dark:text-white mb-3">Articles commandés</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <div>
                                    <div class="font-medium dark:text-white">Poulet Yassa</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">Plat principal</div>
                                </div>
                                <div class="font-medium dark:text-white">1 × 3000 FCFA</div>
                            </div>
                            <div class="flex justify-between">
                                <div>
                                    <div class="font-medium dark:text-white">Eau minérale</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">Boisson</div>
                                </div>
                                <div class="font-medium dark:text-white">1 × 500 FCFA</div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                        <div class="flex justify-between mb-2">
                            <div class="text-gray-600 dark:text-gray-300">Sous-total:</div>
                            <div class="font-medium dark:text-white">3500 FCFA</div>
                        </div>
                        <div class="flex justify-between mb-2">
                            <div class="text-gray-600 dark:text-gray-300">Livraison:</div>
                            <div class="font-medium dark:text-white">Gratuit</div>
                        </div>
                        <div class="flex justify-between font-bold text-lg dark:text-white">
                            <div>Total:</div>
                            <div>3500 FCFA</div>
                        </div>
                    </div>

                    <div class="mt-6 flex space-x-3">
                        <button class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                            <i class="fas fa-phone mr-2"></i> Contacter le livreur
                        </button>
                        <button class="px-4 py-2 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition">
                            <i class="fas fa-times mr-2"></i> Annuler la commande
                        </button>
                    </div>
                </div>

                <!-- Suivi de commande -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-6">Suivi de votre commande</h3>

                    <div class="relative">
                        <!-- Timeline -->
                        <div class="absolute left-4 top-0 bottom-0 w-1 bg-gray-200 dark:bg-gray-700"></div>

                        <div class="relative pl-12 pb-8">
                            <!-- Étape 1 -->
                            <div class="mb-8">
                                <div
                                    class="absolute left-0 w-8 h-8 rounded-full bg-green-500 flex items-center justify-center">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 dark:text-white">Commande confirmée</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">01/06/2025 à 12:47</p>
                            </div>

                            <!-- Étape 2 -->
                            <div class="mb-8">
                                <div
                                    class="absolute left-0 w-8 h-8 rounded-full bg-green-500 flex items-center justify-center">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 dark:text-white">En préparation</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">01/06/2025 à 12:50</p>
                            </div>

                            <!-- Étape 3 -->
                            <div class="mb-8">
                                <div
                                    class="absolute left-0 w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center">
                                    <i class="fas fa-motorcycle text-white"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 dark:text-white">En livraison</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">En cours - Arrivée estimée: 13:15</p>
                                <div class="mt-2">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Livreur"
                                            class="w-10 h-10 rounded-full mr-3">
                                        <div>
                                            <p class="font-medium dark:text-white">Amadou Ba</p>
                                            <div class="flex items-center text-sm dark:text-gray-300">
                                                <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                <span>4.8 (126 avis)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="mt-3 px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-lg text-sm">
                                        <i class="fas fa-phone-alt mr-1"></i> Appeler le livreur
                                    </button>
                                </div>
                            </div>

                            <!-- Étape 4 -->
                            <div>
                                <div
                                    class="absolute left-0 w-8 h-8 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                                    <i class="fas fa-home text-gray-600 dark:text-gray-300"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 dark:text-white">Livraison</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">En attente</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Commandes récentes -->
            <div class="mt-12 bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white">Commandes récentes</h3>
                    <button class="text-primary hover:text-secondary dark:text-blue-300 dark:hover:text-blue-200">
                        <i class="fas fa-history mr-1"></i> Voir tout l'historique
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">N° Commande</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">Date</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">Plats</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">Montant</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">Statut</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr>
                                <td class="py-4 px-4 font-medium dark:text-white">#CMD-788</td>
                                <td class="py-4 px-4 dark:text-gray-300">31/05/2025</td>
                                <td class="py-4 px-4 dark:text-gray-300">Thiéboudienne, Jus d'orange</td>
                                <td class="py-4 px-4 font-bold dark:text-white">3000 FCFA</td>
                                <td class="py-4 px-4"><span class="status-badge status-delivered">Livrée</span></td>
                                <td class="py-4 px-4">
                                    <button class="text-primary hover:text-secondary dark:text-blue-300 dark:hover:text-blue-200">
                                        <i class="fas fa-redo mr-1"></i> Commander à nouveau
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-4 font-medium dark:text-white">#CMD-784</td>
                                <td class="py-4 px-4 dark:text-gray-300">30/05/2025</td>
                                <td class="py-4 px-4 dark:text-gray-300">Riz sauté aux légumes, Eau minérale</td>
                                <td class="py-4 px-4 font-bold dark:text-white">2500 FCFA</td>
                                <td class="py-4 px-4"><span class="status-badge status-delivered">Livrée</span></td>
                                <td class="py-4 px-4">
                                    <button class="text-primary hover:text-secondary dark:text-blue-300 dark:hover:text-blue-200">
                                        <i class="fas fa-redo mr-1"></i> Commander à nouveau
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-4 font-medium dark:text-white">#CMD-780</td>
                                <td class="py-4 px-4 dark:text-gray-300">29/05/2025</td>
                                <td class="py-4 px-4 dark:text-gray-300">Poulet Yassa, Salade de fruits</td>
                                <td class="py-4 px-4 font-bold dark:text-white">4000 FCFA</td>
                                <td class="py-4 px-4"><span class="status-badge status-delivered">Livrée</span></td>
                                <td class="py-4 px-4">
                                    <button class="text-primary hover:text-secondary dark:text-blue-300 dark:hover:text-blue-200">
                                        <i class="fas fa-redo mr-1"></i> Commander à nouveau
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Mon abonnement -->
        <div id="subscription-content" class="tab-content">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 mb-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Mon abonnement</h2>
                        <p class="text-gray-600 dark:text-gray-300">Gérez votre formule d'abonnement</p>
                    </div>

                    <div class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-6 py-3 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-crown text-xl mr-3"></i>
                            <div>
                                <p class="font-semibold">Formule Premium</p>
                                <p>Valide jusqu'au 30/06/2025</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="bg-gradient-to-br from-client to-green-800 rounded-xl p-6 text-white">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold">Premium</h3>
                                <p class="text-green-200">Votre formule actuelle</p>
                            </div>
                            <div class="text-3xl font-bold">15 000 FCFA<span class="text-lg">/mois</span></div>
                        </div>

                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i> 20 repas par mois
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i> Livraison gratuite
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i> Service prioritaire
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i> 10% de réduction sur extras
                            </li>
                        </ul>

                        <button class="w-full py-3 bg-white text-client font-semibold rounded-lg dark:bg-gray-100">
                            Renouveler l'abonnement
                        </button>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl p-6">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-6">Détails de l'abonnement</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                <div>
                                    <h4 class="font-bold text-gray-700 dark:text-gray-300 mb-3">Utilisation du mois</h4>
                                    <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4">
                                        <div class="flex justify-between mb-2 dark:text-gray-300">
                                            <span>Repas consommés</span>
                                            <span class="font-bold dark:text-white">12/20</span>
                                        </div>
                                        <div class="w-full bg-gray-300 dark:bg-gray-600 rounded-full h-2.5">
                                            <div class="bg-client h-2.5 rounded-full" style="width: 60%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-bold text-gray-700 dark:text-gray-300 mb-3">Prochain renouvellement</h4>
                                    <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-calendar-alt text-client text-xl mr-3"></i>
                                            <div>
                                                <p class="font-bold dark:text-white">30/06/2025</p>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">Dans 28 jours</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="font-bold text-gray-700 dark:text-gray-300 mb-3">Historique des paiements</h4>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="bg-gray-50 dark:bg-gray-800">
                                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Date
                                            </th>
                                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Montant
                                            </th>
                                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Méthode
                                            </th>
                                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Statut
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <tr>
                                            <td class="py-3 px-4 dark:text-gray-300">01/06/2025</td>
                                            <td class="py-3 px-4 font-medium dark:text-white">15 000 FCFA</td>
                                            <td class="py-3 px-4 dark:text-gray-300">Carte bancaire</td>
                                            <td class="py-3 px-4"><span
                                                    class="status-badge status-confirmed">Payé</span></td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 dark:text-gray-300">01/05/2025</td>
                                            <td class="py-3 px-4 font-medium dark:text-white">15 000 FCFA</td>
                                            <td class="py-3 px-4 dark:text-gray-300">Carte bancaire</td>
                                            <td class="py-3 px-4"><span
                                                    class="status-badge status-confirmed">Payé</span></td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 dark:text-gray-300">01/04/2025</td>
                                            <td class="py-3 px-4 font-medium dark:text-white">15 000 FCFA</td>
                                            <td class="py-3 px-4 dark:text-gray-300">Carte bancaire</td>
                                            <td class="py-3 px-4"><span
                                                    class="status-badge status-confirmed">Payé</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <!-- Grille responsive -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Logo + description -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Le Goût Authentique</h3>
                    <p class="text-gray-400">Service de restauration rapide et de qualité pour les étudiants
                        universitaires.</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Liens utiles -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Liens utiles</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">À propos de nous</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Menu complet</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Conditions d'utilisation</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Politique de confidentialité</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Centre d'aide</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Nous contacter</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Statut du service</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                            <span>Campus Universitaire, Dakar, Sénégal</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt mt-1 mr-3"></i>
                            <span>+221 33 123 45 67</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-3"></i>
                            <span>contact@goutauthentique.sn</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bas de page -->
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2025 Le Goût Authentique. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    
</body>

</html>