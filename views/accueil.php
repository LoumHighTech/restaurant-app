<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le bon coin - Restaurant Universitaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="acceuil.css">
    <script src="acceuil.js" defer></script>
</head>

<body class="font-poppins">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50 dark:bg-gray-800">
        <div class="container max-w-screen-lg mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="bg-orange-500 text-white w-12 h-12 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-utensils text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Le Bon</h1>
                        <p class="text-lg font-medium text-accent mt-[-5px]">Coin</p>
                    </div>
                </div>

                <!-- Navigation Desktop (visible seulement à partir de lg) -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="#accueil" class="nav-link active-link font-medium text-gray-700 hover:text-primary dark:text-gray-300 dark:hover:text-blue-400">Accueil</a>
                    <a href="#abonnements" class="nav-link font-medium text-gray-700 hover:text-primary dark:text-gray-300 dark:hover:text-blue-400">Abonnements</a>
                    <a href="#menu" class="nav-link font-medium text-gray-700 hover:text-primary dark:text-gray-300 dark:hover:text-blue-400">Menu</a>
                    <a href="#fonctionnement" class="nav-link font-medium text-gray-700 hover:text-primary dark:text-gray-300 dark:hover:text-blue-400">Fonctionnement</a>
                    <a href="#contact" class="nav-link font-medium text-gray-700 hover:text-primary dark:text-gray-300 dark:hover:text-blue-400 mr-4">Contact</a>
                    <!-- Bouton de changement de thème -->
                    <div class="theme-toggle mr-4" id="themeToggle">
                        <i class="fas fa-sun" id="sunIcon"></i>
                        <i class="fas fa-moon hidden" id="moonIcon"></i>
                    </div>
                    
                    <!-- Boutons de connexion/inscription -->
                    <button id="login-button" class="px-5 py-2 border-2 border-primary text-primary font-semibold rounded-lg hover:bg-blue-50 transition duration-300 dark:border-blue-400 dark:text-blue-400 dark:hover:bg-blue-900/30">
                        Se connecter
                    </button>
                    <button id="signup-button" class="px-5 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-secondary transition duration-300 shadow-md dark:bg-blue-600 dark:hover:bg-blue-700">
                        S'inscrire
                    </button>
                </div>

                <!-- Menu hamburger (visible jusqu’à lg) -->
                <div class="lg:hidden flex items-center space-x-3">
                    <!-- Bouton de basculement du thème pour mobile -->
                    <div class="theme-toggle" id="themeToggleMobile">
                        <i class="fas fa-sun" id="sunIconMobile"></i>
                        <i class="fas fa-moon hidden" id="moonIconMobile"></i>
                    </div>
                    
                    <button id="mobile-menu-button" class="hamburger flex flex-col justify-center items-center w-10 h-10" aria-label="Ouvrir le menu mobile" title="Ouvrir le menu mobile">
                        <div class="w-6 h-0.5 bg-gray-700 mb-1.5 dark:bg-gray-300"></div>
                        <div class="w-6 h-0.5 bg-gray-700 mb-1.5 dark:bg-gray-300"></div>
                        <div class="w-6 h-0.5 bg-gray-700 dark:bg-gray-300"></div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu Mobile (avec transition possible) -->
        <div id="mobile-menu" class="mobile-menu lg:hidden fixed top-0 right-0 h-full w-64 bg-white shadow-lg z-50 transform translate-x-full transition-transform duration-300 ease-in-out dark:bg-gray-800">
            <div class="p-6">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Menu</h2>
                    <button id="close-menu" class="text-gray-600 dark:text-gray-300" aria-label="Fermer le menu">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <!-- Dans votre menu mobile -->
                <nav class="flex flex-col space-y-6">
                    <a href="#accueil" class="text-gray-700 font-medium py-2 border-b border-gray-100 dark:text-gray-300 dark:border-gray-700 nav-link">Accueil</a>
                    <a href="#abonnements" class="text-gray-700 font-medium py-2 border-b border-gray-100 dark:text-gray-300 dark:border-gray-700 nav-link">Abonnements</a>
                    <a href="#menu" class="text-gray-700 font-medium py-2 border-b border-gray-100 dark:text-gray-300 dark:border-gray-700 nav-link">Menu</a>
                    <a href="#fonctionnement" class="text-gray-700 font-medium py-2 border-b border-gray-100 dark:text-gray-300 dark:border-gray-700 nav-link">Fonctionnement</a>
                    <a href="#contact" class="text-gray-700 font-medium py-2 border-b border-gray-100 dark:text-gray-300 dark:border-gray-700 nav-link">Contact</a>
                </nav>

                <div class="mt-10 flex flex-col space-y-4">
                    <button class="w-full py-3 border-2 border-primary text-primary font-semibold rounded-lg hover:bg-blue-50 transition duration-300 dark:border-blue-400 dark:text-blue-400 dark:hover:bg-blue-900/30">
                        Se connecter
                    </button>
                    <button class="w-full py-3 bg-primary text-white font-semibold rounded-lg hover:bg-secondary transition duration-300 shadow-md dark:bg-blue-600 dark:hover:bg-blue-700">
                        S'inscrire
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Section Hero -->
    <section id="accueil" class="hero-bg py-32 text-white">
        <div class="container mx-auto px-4 max-w-6xl text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Votre restaurant universitaire en ligne</h1>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">Commandez vos repas favoris, gérez vos abonnements et
                profitez d'une livraison rapide sur le campus</p>

            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-16">
                <a href="#menu" id="commander-btn" class="px-8 py-3 bg-accent text-white font-semibold rounded-lg hover:bg-orange-700 transition shadow-lg inline-block text-center">
                    Commander maintenant
                </a>
                <a href="#abonnements">
                    <button
                        class="px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:bg-opacity-10 transition">
                        Découvrir nos abonnements
                    </button>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4">
                    <i class="fas fa-bolt text-3xl mb-3"></i>
                    <p class="font-bold">Commande rapide</p>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4">
                    <i class="fas fa-motorcycle text-3xl mb-3"></i>
                    <p class="font-bold">Livraison campus</p>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4">
                    <i class="fas fa-calendar-alt text-3xl mb-3"></i>
                    <p class="font-bold">Abonnements flexibles</p>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4">
                    <i class="fas fa-percent text-3xl mb-3"></i>
                    <p class="font-bold">Économies garanties</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Fonctionnement -->
    <section id="fonctionnement" class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">Comment ça marche ?</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Découvrez en 3 étapes comment commander vos repas sur le campus</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="step-card bg-gray-50 p-8 rounded-xl border border-gray-200 text-center dark:bg-gray-800 dark:border-gray-700">
                    <div
                        class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold">
                        1</div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Choisissez votre formule</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Sélectionnez l'abonnement qui correspond à vos besoins parmi nos
                        formules 7, 15 ou 30 jours.</p>
                    <div class="text-primary text-4xl dark:text-blue-400">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                </div>

                <div class="step-card bg-gray-50 p-8 rounded-xl border border-gray-200 text-center dark:bg-gray-800 dark:border-gray-700">
                    <div
                        class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold">
                        2</div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Commandez vos repas</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Parcourez notre menu du jour et commandez vos plats préférés en
                        quelques clics.</p>
                    <div class="text-primary text-4xl dark:text-blue-400">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                </div>

                <div class="step-card bg-gray-50 p-8 rounded-xl border border-gray-200 text-center dark:bg-gray-800 dark:border-gray-700">
                    <div
                        class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold">
                        3</div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Recevez votre commande</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Récupérez votre repas au point de retrait ou profitez de la livraison
                        sur le campus.</p>
                    <div class="text-primary text-4xl dark:text-blue-400">
                        <i class="fas fa-utensils"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Abonnements -->
    <section id="abonnements" class="py-16 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/30 dark:to-indigo-900/30">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">Nos formules d'abonnement</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Économisez avec nos abonnements adaptés à votre rythme</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Formule 7 jours -->
                <div class="plan-card bg-white p-8 rounded-xl shadow-sm border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <h3 class="text-2xl font-bold text-center mb-4 dark:text-white">7 jours</h3>
                    <p class="text-3xl font-bold text-center mb-2 dark:text-white">15 000 FCFA</p>
                    <p class="text-center text-green-600 font-semibold mb-6 dark:text-green-400">Économisez 5%</p>

                    <ul class="space-y-3 mb-8 dark:text-gray-300">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Accès illimité au menu</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Livraison gratuite</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Support prioritaire</span>
                        </li>
                    </ul>

                    <button
                        class="w-full py-3 bg-gray-200 text-gray-800 font-semibold rounded-lg hover:bg-gray-300 transition dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                        Choisir cette formule
                    </button>
                </div>

                <!-- Formule 15 jours (populaire) -->
                <div
                    class="plan-card relative bg-white p-8 rounded-xl shadow-md border-2 border-primary transform -translate-y-2 dark:bg-gray-800 dark:border-blue-500">
                    <div
                        class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-accent text-white px-4 py-1 rounded-full text-sm font-semibold">
                        Plus populaire
                    </div>

                    <h3 class="text-2xl font-bold text-center mb-4 dark:text-white">15 jours</h3>
                    <p class="text-3xl font-bold text-center mb-2 dark:text-white">28 000 FCFA</p>
                    <p class="text-center text-green-600 font-semibold mb-6 dark:text-green-400">Économisez 12%</p>

                    <ul class="space-y-3 mb-8 dark:text-gray-300">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Accès illimité au menu</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Livraison gratuite</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Support prioritaire</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>1 dessert offert par jour</span>
                        </li>
                    </ul>

                    <button
                        class="w-full py-3 bg-primary text-white font-semibold rounded-lg hover:bg-secondary transition dark:bg-blue-600 dark:hover:bg-blue-700">
                        Choisir cette formule
                    </button>
                </div>

                <!-- Formule 30 jours -->
                <div class="plan-card bg-white p-8 rounded-xl shadow-sm border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <h3 class="text-2xl font-bold text-center mb-4 dark:text-white">30 jours</h3>
                    <p class="text-3xl font-bold text-center mb-2 dark:text-white">50 000 FCFA</p>
                    <p class="text-center text-green-600 font-semibold mb-6 dark:text-green-400">Économisez 20%</p>

                    <ul class="space-y-3 mb-8 dark:text-gray-300">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Accès illimité au menu</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Livraison gratuite</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Support prioritaire</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>2 desserts offerts par jour</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Boisson offerte à chaque repas</span>
                        </li>
                    </ul>

                    <button
                        class="w-full py-3 bg-gray-200 text-gray-800 font-semibold rounded-lg hover:bg-gray-300 transition dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                        Choisir cette formule
                    </button>
                </div>
            </div>

            <div class="mt-12 text-center">
                <button
                    class="px-6 py-2 border-2 border-primary text-primary font-semibold rounded-lg hover:bg-blue-50 transition dark:border-blue-400 dark:text-blue-400 dark:hover:bg-blue-900/30">
                    Comparer toutes les formules
                </button>
            </div>
        </div>
    </section>

    <!-- Section Menu du jour -->
    <section id="menu" class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-white mb-4">Menu du jour</h1>
                <p class="inline-block bg-orange-100 text-orange-700 px-4 py-1 rounded-full text-sm font-semibold dark:bg-orange-900/30 dark:text-orange-400">
                    dimanche 1 juin 2025
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Plat 1 -->
                <div class="dish-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 dark:bg-gray-800">
                    <div class="h-56 bg-gray-200 relative">
                        <img src="../images/téléchargement.jpeg" alt="Poulet Yassa"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">Thiéboudienne</h3>
                            <span class="text-lg font-bold text-accent dark:text-orange-400">800 FCFA</span>
                        </div>
                        <p class="text-gray-600 mb-4 dark:text-gray-300"></p>
                        <div class="flex items-center justify-between">
                            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm dark:bg-blue-900/30 dark:text-blue-400">Plat principal</span>
                            <div class="flex space-x-2">
                                <button
                                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition flex items-center dark:bg-blue-600 dark:hover:bg-blue-700">
                                    <i class="fas fa-shopping-cart mr-2"></i>Commander
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Plat 2 -->
                <div class="dish-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 dark:bg-gray-800">
                    <div class="h-56 bg-gray-200 relative">
                        <img src="../images/image_yassa_poulet.jpeg" alt="Poulet Yassa"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">Poulet Yassa</h3>
                            <span class="text-lg font-bold text-accent dark:text-orange-400">800 FCFA</span>
                        </div>
                        <p class="text-gray-600 mb-4 dark:text-gray-300"></p>
                        <div class="flex items-center justify-between">
                            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm dark:bg-blue-900/30 dark:text-blue-400">Plat principal</span>
                            <div class="flex space-x-2">
                                <button
                                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition flex items-center dark:bg-blue-600 dark:hover:bg-blue-700">
                                    <i class="fas fa-shopping-cart mr-2"></i>Commander
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Plat 3 -->
                <div class="dish-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 dark:bg-gray-800">
                    <div class="h-56 bg-gray-200 relative">
                        <img src="../images/salade_de_fruit.jpeg" alt="Salade de fruits"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">Salade de fruits</h3>
                            <span class="text-lg font-bold text-accent dark:text-orange-400">1500 FCFA</span>
                        </div>
                        <p class="text-gray-600 mb-4 dark:text-gray-300"></p>
                        <div class="flex items-center justify-between">
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm dark:bg-green-900/30 dark:text-green-400">Végétarien</span>
                            <div class="flex space-x-2">
                                <button
                                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition flex items-center dark:bg-blue-600 dark:hover:bg-blue-700">
                                    <i class="fas fa-shopping-cart mr-2"></i>Commander
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bouton "Voir plus" -->
            <div class="mt-10 text-center">
                <button
                    class="px-6 py-2 border-2 border-primary text-primary font-semibold rounded-lg hover:bg-blue-50 transition dark:border-blue-400 dark:text-blue-400 dark:hover:bg-blue-900/30">
                    Voir plus de plats
                </button>
            </div>
        </div>
    </section>
    <!-- Section Témoignages -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">Ce que disent nos clients</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Découvrez les expériences des étudiants avec notre service</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4"></div>
                        <div>
                            <h3 class="font-bold text-gray-800 dark:text-white">Fatou Diop</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Étudiante en Informatique</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">"Le service est rapide et les plats sont toujours délicieux. J'adore
                        particulièrement le Thieboudienne du mercredi!"</p>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4"></div>
                        <div>
                            <h3 class="font-bold text-gray-800 dark:text-white">Moussa Diallo</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Étudiant en Droit</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">"Grâce à l'abonnement mensuel, j'économise du temps et de l'argent. La
                        livraison est toujours à l'heure."</p>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4"></div>
                        <div>
                            <h3 class="font-bold text-gray-800 dark:text-white">Aïssatou Ndiaye</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Étudiante en Médecine</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">"Les options végétariennes sont délicieuses et variées. Un vrai plaisir de
                        commander sur Le Bon Coin!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div
                            class="bg-orange-500 text-white w-10 h-10 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">Le Bon</h2>
                            <p class="text-accent">Coin</p>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-4">Votre restaurant universitaire en ligne, accessible 24h/24.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="#accueil" class="text-gray-400 hover:text-white">Accueil</a></li>
                        <li><a href="#abonnements" class="text-gray-400 hover:text-white">Abonnements</a></li>
                        <li><a href="#menu" class="text-gray-400 hover:text-white">Menu du jour</a></li>
                        <li><a href="#fonctionnement" class="text-gray-400 hover:text-white">Comment ça marche</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Heures d'ouverture</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>Lundi - Vendredi: 8h - 20h</li>
                        <li>Samedi: 9h - 18h</li>
                        <li>Dimanche: 10h - 16h</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                            <span>Campus Universitaire, campus 1, Saint-Louis</span>
                        </li> 
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt mt-1 mr-3"></i>
                            <span>+221 33 123 45 67</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-3"></i>
                            <span>contact@leboncoin.sn</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; 2025 Le Bon Coin. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Bouton de retour en haut -->
    <button id="backToTop"
        class="fixed bottom-6 right-6 bg-primary text-white p-3 rounded-full shadow-lg hover:bg-secondary transition hidden dark:bg-blue-600 dark:hover:bg-blue-700"
        title="Retour en haut">
        <i class="fas fa-arrow-up"></i>
    </button>

   <!-- Modal pour connexion/inscription -->
<div id="auth-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="w-full max-w-md mx-4">
        <div class="modal-content bg-white rounded-xl shadow-2xl overflow-hidden dark:bg-gray-800">
            <!-- Tabs -->
            <div class="flex border-b border-gray-200 dark:border-gray-700">
                <button type="button" id="modal-login-tab"
                    class="tab-btn flex-1 py-4 font-semibold text-gray-700 text-center active dark:text-gray-300"
                    data-tab="login">Connexion</button>
                <button type="button" id="modal-signup-tab" class="tab-btn flex-1 py-4 font-semibold text-gray-700 text-center dark:text-gray-300"
                    data-tab="signup">Inscription</button>
            </div>

            <!-- Contenu -->
            <div class="p-6">
                <!-- Connexion -->
                <div id="modal-login-form" class="space-y-6">
                    <form action="../controlleurs/connexion.php" method="POST">
                        <div class="text-center mb-6">
                            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Accédez à votre compte</h1>
                            <p class="text-gray-600 dark:text-gray-300">Gérez vos commandes et abonnements</p>
                        </div>

                        <div >
                            <label for="email" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Email</label>
                            <div class="relative">
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500"
                                    placeholder="votre@email.com"
                                    value="<?= isset($_SESSION['old_email']) ? htmlspecialchars($_SESSION['old_email']) : '' ?>">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="mot_de_passe" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Mot de passe</label>
                            <div class="relative">
                                <input type="password" id="mot_de_passe" name="mot_de_passe" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500"
                                    placeholder="••••••••">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                            </div>
                            <div class="mt-2 text-right">
                                <a href="#" class="text-sm text-primary hover:underline dark:text-blue-400">Mot de passe oublié ?</a>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-3 bg-primary text-white font-semibold rounded-lg hover:bg-secondary transition dark:bg-blue-600 dark:hover:bg-blue-700">
                            Se connecter
                        </button>

                        <div class="text-center mt-4">
                            <p class="text-gray-600 dark:text-gray-300">
                                Vous n'avez pas de compte ? 
                                <a href="#" id="switch-to-signup" class="text-primary font-medium hover:underline dark:text-blue-400" onclick="openModal('signup'); return false;">S'inscrire
                                </a>                         
                           </p>
                        </div>
                    </form>
                </div>

                <!-- Inscription -->
                <form id="modal-signup-form" class="space-y-6 hidden" method="POST" action="../controlleurs/inscription.php">
                    <div class="text-center mb-6">
                        <h1 class="text-1xl font-bold text-gray-800 mb-2 dark:text-white">Créez votre compte</h1>
                    </div>

                    <div class="relative">
                        <label for="account_type" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Type de compte</label>
                        
                        <div class="relative">
                            <select name="account_type" id="account_type" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg appearance-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    onchange="toggleAddressField(this)">
                                <option value="client" selected>
                                    <i class="fas fa-user text-blue-600 mr-2"></i> Client
                                </option>
                                <option value="livreur">
                                    <i class="fas fa-motorcycle text-orange-600 mr-2"></i> Livreur
                                </option>
                            </select>
                            
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nom_complet" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Nom complet</label>
                            <div class="relative">
                                <input type="text" id="nom_complet" name="nom_complet"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500"
                                    placeholder="John Doe" required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="telephone" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Téléphone</label>
                            <div class="relative">
                                <input type="tel" id="telephone" name="telephone"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500"
                                    placeholder="+221 XX XXX XX XX" required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-phone text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Email</label>
                        <div class="relative">
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500"
                                placeholder="votre@email.com" required>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <div id="delivery-address">
                        <label for="adresse" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Adresse de livraison</label>
                        <div class="relative">
                            <input type="text" id="adresse" name="adresse"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500"
                                placeholder="Chambre, G, Village.">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-home text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="mot_de_passe" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Mot de passe</label>
                        <div class="relative">
                            <input type="password" id="mot_de_passe" name="mot_de_passe"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500"
                                placeholder="••••••••" minlength="8" required>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-3 bg-primary text-white font-semibold rounded-lg hover:bg-secondary transition dark:bg-blue-600 dark:hover:bg-blue-700">
                        Créer mon compte
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>