<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Restaurant Universitaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    <script src="admin.js" defer></script>
    
</head>

<body class="font-poppins bg-gray-50">
    <!-- Header Admin -->
    <header class="bg-admin text-white shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo + Titre -->
                <div class="flex items-center">
                    <div class="bg-orange-500 text-white w-12 h-12 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-utensils text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl md:text-2xl font-bold">Panneau d'administration</h1>
                        <p class="text-gray-300 text-sm md:text-base">Gérez votre restaurant universitaire</p>
                    </div>
                </div>

                <!-- Menu utilisateur + bouton mode sombre -->
                <div class="flex items-center space-x-4">
                    <!-- Bouton de basculement du thème -->
                    <div class="theme-toggle mr-4" id="themeToggle">
                        <i class="fas fa-sun" id="sunIcon"></i>
                        <i class="fas fa-moon hidden" id="moonIcon"></i>
                    </div>

                    <div class="hidden md:flex items-center space-x-4">
                        <div class="relative group">
                            <button class="flex items-center space-x-2">
                                <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>Admin</span>
                                <i class="fas fa-chevron-down text-sm"></i>
                            </button>
                            <div
                                class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden group-hover:block z-10 dark:bg-slate-800">
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-50 dark:text-gray-200 dark:hover:bg-slate-700">Mon profil</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-50 dark:text-gray-200 dark:hover:bg-slate-700">Paramètres</a>
                                <a href="accueil.html" class="block px-4 py-2 text-gray-800 hover:bg-blue-50 dark:text-gray-200 dark:hover:bg-slate-700">Retour au
                                    site</a>
                                <a href="#"
                                    class="block px-4 py-2 text-red-600 hover:bg-red-50 border-t border-gray-200 dark:text-red-400 dark:hover:bg-slate-700 dark:border-slate-700">Déconnexion</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Burger icon pour mobile -->
                <div class="md:hidden">
                    <button id="menuToggle" class="text-white focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation responsive -->
    <nav class="bg-white shadow-sm dark:bg-slate-800">
        <div class="container mx-auto px-4">
            <div class="md:flex space-x-0 md:space-x-8 py-3 flex-col md:flex-row hidden" id="navTabs">
                <button data-tab="dashboard" class="nav-tab active py-2 w-full md:w-auto text-left">Tableau de
                    bord</button>
                <button data-tab="orders" class="nav-tab py-2 w-full md:w-auto text-left">Commandes</button>
                <button data-tab="menu" class="nav-tab py-2 w-full md:w-auto text-left">Gestion menu</button>
                <button data-tab="drivers" class="nav-tab py-2 w-full md:w-auto text-left">Livreurs</button>
                <button data-tab="analytics" class="nav-tab py-2 w-full md:w-auto text-left">Analytiques</button>
            </div>
        </div>
    </nav>
    
    <!-- Contenu principal -->
    <main class="container mx-auto px-4 py-8">
        <!-- Tableau de bord -->
        <div id="dashboard-content" class="tab-content active">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="dashboard-card bg-white rounded-xl p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 mb-1">Commandes aujourd'hui</p>
                            <h3 class="text-3xl font-bold text-gray-800">23</h3>
                            <p class="text-green-600 text-sm mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>12.5% vs hier
                            </p>
                        </div>
                        <div class="bg-blue-100 text-blue-600 w-12 h-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-shopping-cart text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="dashboard-card bg-white rounded-xl p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 mb-1">Revenus du jour</p>
                            <h3 class="text-3xl font-bold text-gray-800">125 000 FCFA</h3>
                            <p class="text-green-600 text-sm mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>10.5% vs hier
                            </p>
                        </div>
                        <div class="bg-green-100 text-green-600 w-12 h-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-chart-line text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="dashboard-card bg-white rounded-xl p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 mb-1">Abonnements actifs</p>
                            <h3 class="text-3xl font-bold text-gray-800">45</h3>
                            <p class="text-green-600 text-sm mt-1">
                                <i class="fas fa-user-plus mr-1"></i>3 nouveaux cette semaine
                            </p>
                        </div>
                        <div
                            class="bg-purple-100 text-purple-600 w-12 h-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="dashboard-card bg-white rounded-xl p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 mb-1">Livreurs disponibles</p>
                            <h3 class="text-3xl font-bold text-gray-800">3</h3>
                            <p class="text-gray-600 text-sm mt-1">
                                sur 5 livreurs
                            </p>
                        </div>
                        <div
                            class="bg-orange-100 text-orange-600 w-12 h-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-motorcycle text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Commandes en attente -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Commandes en attente</h2>
                    <button class="text-primary hover:text-secondary">
                        <i class="fas fa-sync-alt mr-1"></i> Actualiser
                    </button>
                </div>

                <div class="space-y-4">
                    <!-- Commande 1 -->
                    <div class="order-card bg-white rounded-lg p-4 border border-gray-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-gray-800">Commande #001</h3>
                                <div class="flex items-center mt-2 text-sm">
                                    <div class="bg-black-200 text-gray-700 px-2 py-1 rounded-full mr-2">
                                        <i class="fas fa-user mr-1"></i> Assane Dupont
                                    </div>
                                    <div class="bg-black-200 text-gray-700 px-2 py-1 rounded-full">
                                        <i class="fas fa-clock mr-1"></i> 12:30
                                    </div>
                                </div>
                            </div>
                            <span class="text-lg font-bold text-orange-600">3000 FCFA</span>
                        </div>

                        <div class="mt-4">
                            <p class="font-medium text-gray-700 mb-2">Articles :</p>
                            <ul class="list-disc pl-5 text-gray-600">
                                <li>Thiéboudienne</li>
                                <li>Jus d'orange</li>
                            </ul>
                        </div>

                        <div class="mt-4 flex items-center">
                            <div class="bg-black-200 text-gray-700 px-3 py-1 rounded-full">
                                <i class="fas fa-home mr-1"></i> Livraison: Résidence A, Chambre 13
                            </div>
                        </div>

                        <div class="mt-4 flex space-x-3">
                            <button class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition">
                                Confirmer
                            </button>
                            <button class="px-4 py-2 bg-red-600 text-white-800 rounded-lg hover:bg-red-300 transition">
                                Annuler
                            </button>
                        </div>
                    </div>

                    <!-- Commande 2 -->
                    <div class="order-card bg-white rounded-lg p-4 border border-gray-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-gray-800">Commande #002</h3>
                                <div class="flex items-center mt-2 text-sm">
                                    <div class="bg-black-200 text-gray-700 px-2 py-1 rounded-full mr-2">
                                        <i class="fas fa-user mr-1"></i> Marième Diallo
                                    </div>
                                    <div class="bg-black-200 text-gray-700 px-2 py-1 rounded-full">
                                        <i class="fas fa-clock mr-1"></i> 12:45
                                    </div>
                                </div>
                            </div>
                            <span class="text-lg font-bold text-orange-600">3000 FCFA</span>
                        </div>

                        <div class="mt-4">
                            <p class="font-medium text-gray-700 mb-2">Articles :</p>
                            <ul class="list-disc pl-5 text-gray-600">
                                <li>Poulet Yassa</li>
                            </ul>
                        </div>

                        <div class="mt-4 flex items-center">
                            <div class="bg-black-200 text-gray-700 px-3 py-1 rounded-full">
                                <i class="fas fa-utensils mr-1"></i> À emporter
                            </div>
                        </div>

                        <div class="mt-4 flex space-x-3">
                            <button class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition">
                                Confirmer
                            </button>
                            <button class="px-4 py-2 bg-red-600 text-white-800 rounded-lg hover:bg-red-300 transition">
                                Annuler
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Commandes -->
        <div id="orders-content" class="tab-content px-4 md:px-6 lg:px-8 py-6">
            <!-- Filtres -->
            <div class="bg-white rounded-xl shadow-sm p-4 md:p-6 mb-6 md:mb-8">
                <div class="flex flex-col md:flex-row justify-between gap-4">
                    <h2 class="text-lg md:text-xl font-bold text-gray-800">Gestion des commandes</h2>
                    <div class="flex flex-col sm:flex-row sm:flex-wrap gap-3">
                        <select
                            class="w-full sm:w-auto px-4 py-2 border rounded-lg focus:ring-primary focus:outline-none">
                            <option>Tous les statuts</option>
                            <option>En attente</option>
                            <option>Confirmée</option>
                            <option>En préparation</option>
                            <option>En livraison</option>
                            <option>Livrée</option>
                            <option>Annulée</option>
                        </select>

                        <input type="date"
                            class="w-full sm:w-auto px-4 py-2 border rounded-lg focus:ring-primary focus:outline-none" />

                        <input type="text" placeholder="Rechercher commande..."
                            class="w-full sm:w-auto px-4 py-2 border rounded-lg focus:ring-primary focus:outline-none" />

                        <button
                            class="w-full sm:w-auto px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition">
                            <i class="fas fa-filter mr-2"></i> Filtrer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table de commandes -->
            <div class="bg-white rounded-xl shadow-sm p-4 md:p-6 mb-6 md:mb-8">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[600px] text-sm text-left text-gray-700">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 text-sm uppercase">
                                <th class="px-4 py-3">ID Commande</th>
                                <th class="px-4 py-3">Client</th>
                                <th class="px-4 py-3">Date/Heure</th>
                                <th class="px-4 py-3">Montant</th>
                                <th class="px-4 py-3">Type</th>
                                <th class="px-4 py-3">Statut</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Exemple de ligne -->
                            <tr class="border-t">
                                <td class="px-4 py-3 font-semibold">#CMD-001</td>
                                <td class="px-4 py-3">Assane Dupont</td>
                                <td class="px-4 py-3">01/06/2025 12:30</td>
                                <td class="px-4 py-3 font-semibold">3000 FCFA</td>
                                <td class="px-4 py-3">Livraison</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="inline-block px-2 py-1 text-sm rounded-full bg-yellow-100 text-yellow-600">En
                                        attente</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800"><i
                                                class="fas fa-eye"></i></button>
                                        <button class="text-green-600 hover:text-green-800"><i
                                                class="fas fa-check"></i></button>
                                        <button class="text-red-600 hover:text-red-800"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Ajoute les autres commandes ici -->
                            <!-- Commande 2 -->
                            <tr class="border-t">
                                <td class="px-4 py-3 font-semibold">#CMD-002</td>
                                <td class="px-4 py-3">Marième Diallo</td>
                                <td class="px-4 py-3">01/06/2025 12:45</td>
                                <td class="px-4 py-3 font-semibold">2500 FCFA</td>
                                <td class="px-4 py-3">À emporter</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="inline-block px-2 py-1 text-sm rounded-full bg-yellow-100 text-yellow-600">En
                                        attente</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-green-600 hover:text-green-800">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Commande 3 -->
                            <tr>
                                <td class="px-4 py-3 font-semibold">#CMD-003</td>
                                <td class="px-4 py-3">Ousmane Ndiaye</td>
                                <td class="px-4 py-3">01/06/2025 13:15</td>
                                <td class="px-4 py-3 font-semibold">4500 FCFA</td>
                                <td class="px-4 py-3">Livraison</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="inline-block px-2 py-1 text-sm rounded-full bg-yellow-100 text-yellow-600">Confirmée</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-yellow-600 hover:text-yellow-800">
                                            <i class="fas fa-truck"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Commande 4 -->
                            <tr class="border-t">
                            <tr class="border-t">
                                <td class="px-4 py-3 font-semibold">#CMD-004</td>
                                <td class="px-4 py-3">Aminata Sow</td>
                                <td class="px-4 py-3">01/06/2025 13:30</td>
                                <td class="px-4 py-3 font-semibold">1800 FCFA</td>
                                <td class="px-4 py-3">À emporter</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="inline-block px-2 py-1 text-sm rounded-full bg-blue-100 text-blue-600">Livrée</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-gray-600 hover:text-gray-800">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Commande 5 -->
                            <tr class="border-t">
                                <td class="px-4 py-3 font-semibold">#CMD-005</td>
                                <td class="px-4 py-3">Khadim Diop</td>
                                <td class="px-4 py-3">01/06/2025 14:00</td>
                                <td class="px-4 py-3 font-semibold">3200 FCFA</td>
                                <td class="px-4 py-3">Livraison</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="inline-block px-2 py-1 text-sm rounded-full bg-blue-100 text-blue-600">Livrée</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-gray-600 hover:text-gray-800">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="text-gray-600">Affichage de 1 à 5 sur 23 commandes</div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300"><i
                                class="fas fa-chevron-left"></i></button>
                        <button class="px-3 py-1 bg-primary text-white rounded">1</button>
                        <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded">2</button>
                        <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded">3</button>
                        <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded">4</button>
                        <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded">5</button>
                        <button class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300"><i
                                class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>

            <!-- Détails commande -->
            <div class="bg-white rounded-xl shadow-sm p-4 md:p-6">
                <div class="flex flex-col lg:flex-row justify-between items-start gap-4 mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Détails de la commande #CMD-001</h2>
                    <div class="flex flex-wrap gap-3">
                        <button class="px-4 py-2 bg-blue-100 text-blue-600 rounded hover:bg-blue-200"><i
                                class="fas fa-print mr-2"></i>Imprimer</button>
                        <button class="px-4 py-2 bg-green-100 text-green-600 rounded hover:bg-green-200"><i
                                class="fas fa-check mr-2"></i>Confirmer</button>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Client -->
                    <div>
                        <h3 class="font-bold text-gray-800 mb-3">Informations client</h3>
                        <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-user text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Assane Dupont</h4>
                                    <p class="text-gray-600 text-sm">Étudiant en Informatique</p>
                                </div>
                            </div>
                            <div class="text-sm space-y-2">
                                <p><strong>Téléphone:</strong> +221 77 123 45 67</p>
                                <p><strong>Email:</strong> assane.dupont@univ.edu.sn</p>
                                <p><strong>Adresse:</strong> Résidence A, Chambre 13, Campus Universitaire</p>
                            </div>
                        </div>
                    </div>

                    <!-- Commande -->
                    <div>
                        <h3 class="font-bold text-gray-800 mb-3">Détails de la commande</h3>
                        <div class="bg-gray-50 rounded-lg p-4 space-y-4 text-sm">
                            <div class="flex justify-between">
                                <div><span class="text-gray-500">Numéro:</span> <strong>#CMD-001</strong></div>
                                <div><span class="text-gray-500">Date:</span> <strong>01/06/2025 12:30</strong></div>
                                <div><span class="text-gray-500">Statut:</span> <span
                                        class="inline-block px-2 py-1 bg-yellow-100 text-yellow-600 rounded">En
                                        attente</span></div>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Articles</h4>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <div><strong>Thiéboudienne</strong>
                                            <div class="text-xs text-gray-500">Plat principal</div>
                                        </div>
                                        <div>1 × 2000 FCFA</div>
                                        <div><strong>2000 FCFA</strong></div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div><strong>Jus d'orange</strong>
                                            <div class="text-xs text-gray-500">Boisson</div>
                                        </div>
                                        <div>1 × 1000 FCFA</div>
                                        <div><strong>1000 FCFA</strong></div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t pt-4">
                                <div class="flex justify-between"><span>Sous-total:</span><span>3000 FCFA</span></div>
                                <div class="flex justify-between"><span>Livraison:</span><span>Gratuit</span></div>
                                <div class="flex justify-between font-bold text-lg"><span>Total:</span><span>3000
                                        FCFA</span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="mt-6 flex flex-col sm:flex-row gap-4">
                    <button class="flex-1 px-6 py-3 bg-primary text-white font-semibold rounded hover:bg-secondary">
                        <i class="fas fa-check mr-2"></i> Confirmer
                    </button>
                    <button
                        class="flex-1 px-6 py-3 bg-green-100 text-green-600 font-semibold rounded hover:bg-green-200">
                        <i class="fas fa-truck mr-2"></i> Assigner un livreur
                    </button>
                    <button class="flex-1 px-6 py-3 bg-red-100 text-red-600 font-semibold rounded hover:bg-red-200">
                        <i class="fas fa-times mr-2"></i> Annuler
                    </button>
                </div>
            </div>
        </div>


        <!-- Gestion du menu -->
        <div id="menu-content" class="tab-content container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Gestion du menu</h2>

                <div class="mb-8 p-6 bg-gray-50 rounded-lg max-w-screen-lg mx-auto">
                    <h3 class="font-bold text-gray-800 mb-4">Ajouter un nouveau plat</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nom du plat</label>
                            <input type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                placeholder="Ex: Thiéboudienne">
                        </div>

                        <div>
                            <label class="block text-black-700 font-medium mb-2">Catégorie</label>
                            <select
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                <option>Choisir une catégorie</option>
                                <option>Déjeuner</option>
                                <option>Dîner</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2">Description</label>
                            <textarea
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                placeholder="Description du plat..." rows="3"></textarea>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Prix (FCFA)</label>
                            <input type="number"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                placeholder="2500">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">URL de l'image</label>
                            <input type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                placeholder="https://images.unsplash.com/photo...">
                        </div>
                    </div>

                    <button
                        class="w-full sm:w-auto mt-6 px-6 py-3 bg-primary text-white font-semibold rounded-lg hover:bg-secondary transition">
                        Ajouter le plat
                    </button>
                </div>

                <h3 class="font-bold text-gray-800 mb-4">Plats disponibles</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Plat 1 -->
                    <div class="dish-card bg-white rounded-lg overflow-hidden border border-gray-200">
                        <div class="h-40 sm:h-56 bg-gray-200 relative">
                            <img src="./images/téléchargement.jpeg" alt="Thiéboudienne"
                                class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="font-bold text-gray-800 break-words truncate">Thiéboudienne</h4>
                                <span class="text-orange-600 font-bold">2500 FCFA</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-4 break-words">Plat traditionnel sénégalais avec poisson
                                et légumes frais</p>
                            <div class="flex flex-wrap gap-2">
                                <button
                                    class="w-full sm:w-auto px-3 py-1 bg-gray-200 text-black-700 rounded hover:bg-gray-300 text-sm">
                                    Rendre indisponible
                                </button>
                                <button
                                    class="w-full sm:w-auto px-3 py-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200 text-sm">
                                    Modifier
                                </button>
                                <button
                                    class="w-full sm:w-auto px-3 py-1 bg-red-100 text-red-600 rounded hover:bg-red-200 text-sm">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Plat 2 -->
                    <div class="dish-card bg-white rounded-lg overflow-hidden border border-gray-200">
                        <div class="h-40 sm:h-56 bg-gray-200 relative">
                            <img src="./images/image_yassa_poulet.jpeg" alt="Poulet Yassa"
                                class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="font-bold text-gray-800 break-words truncate">Poulet Yassa</h4>
                                <span class="text-orange-600 font-bold">2500 FCFA</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-4 break-words">Poulet mariné aux oignons et citron,
                                accompagné de riz</p>
                            <div class="flex flex-wrap gap-2">
                                <button
                                    class="w-full sm:w-auto px-3 py-1 bg-gray-200 text-black-700 rounded hover:bg-gray-300 text-sm">
                                    Rendre indisponible
                                </button>
                                <button
                                    class="w-full sm:w-auto px-3 py-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200 text-sm">
                                    Modifier
                                </button>
                                <button
                                    class="w-full sm:w-auto px-3 py-1 bg-red-100 text-red-600 rounded hover:bg-red-200 text-sm">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Plat 3 -->
                    <div class="dish-card bg-white rounded-lg overflow-hidden border border-gray-200">
                        <div class="h-40 sm:h-56 bg-gray-200 relative">
                            <img src="./images/salade_de_fruit.jpeg" alt="Salade de fruits"
                                class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="font-bold text-gray-800 break-words truncate">Salade de fruits</h4>
                                <span class="text-orange-600 font-bold">1500 FCFA</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-4 break-words">Mélange de fruits frais de saison avec
                                sirop léger</p>
                            <div class="flex flex-wrap gap-2">
                                <button
                                    class="w-full sm:w-auto px-3 py-1 bg-gray-200 text-black-700 rounded hover:bg-gray-300 text-sm">
                                    Rendre indisponible
                                </button>
                                <button
                                    class="w-full sm:w-auto px-3 py-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200 text-sm">
                                    Modifier
                                </button>
                                <button
                                    class="w-full sm:w-auto px-3 py-1 bg-red-100 text-red-600 rounded hover:bg-red-200 text-sm">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Gestion des livreurs -->
        <div id="drivers-content" class="tab-content">
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Gestion des livreurs</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Livreur 1 -->
                    <div class="driver-card bg-white rounded-lg p-6 border border-gray-200">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                <i class="fas fa-user text-2xl text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Amadou Ba</h3>
                                <p class="text-gray-600">Statut: <span
                                        class="text-green-600 font-medium">Disponible</span></p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="text-gray-700 font-medium">Commandes en cours: <span
                                    class="text-orange-600 font-bold">0</span></p>
                        </div>

                        <div class="flex space-x-3">
                            <button
                                class="flex-1 px-3 py-2 bg-blue-100 text-blue-600 rounded hover:bg-blue-200 text-sm">
                                <i class="fas fa-eye mr-1"></i> Voir détails
                            </button>
                            <button
                                class="flex-1 px-3 py-2 bg-green-100 text-green-600 rounded hover:bg-green-200 text-sm">
                                <i class="fas fa-phone mr-1"></i> Contacter
                            </button>
                        </div>
                    </div>

                    <!-- Livreur 2 -->
                    <div class="driver-card bg-white rounded-lg p-6 border border-gray-200">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                <i class="fas fa-user text-2xl text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Fatou Sow</h3>
                                <p class="text-gray-600">Statut: <span class="text-yellow-600 font-medium">En
                                        livraison</span></p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="text-gray-700 font-medium">Commandes en cours: <span
                                    class="text-orange-600 font-bold">2</span></p>
                        </div>

                        <div class="flex space-x-3">
                            <button
                                class="flex-1 px-3 py-2 bg-blue-100 text-blue-600 rounded hover:bg-blue-200 text-sm">
                                <i class="fas fa-eye mr-1"></i> Voir détails
                            </button>
                            <button
                                class="flex-1 px-3 py-2 bg-green-100 text-green-600 rounded hover:bg-green-200 text-sm">
                                <i class="fas fa-phone mr-1"></i> Contacter
                            </button>
                        </div>
                    </div>

                    <!-- Livreur 3 -->
                    <div class="driver-card bg-white rounded-lg p-6 border border-gray-200">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                <i class="fas fa-user text-2xl text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Moussa Diop</h3>
                                <p class="text-gray-600">Statut: <span
                                        class="text-green-600 font-medium">Disponible</span></p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="text-gray-700 font-medium">Commandes en cours: <span
                                    class="text-orange-600 font-bold">0</span></p>
                        </div>

                        <div class="flex space-x-3">
                            <button
                                class="flex-1 px-3 py-2 bg-blue-100 text-blue-600 rounded hover:bg-blue-200 text-sm">
                                <i class="fas fa-eye mr-1"></i> Voir détails
                            </button>
                            <button
                                class="flex-1 px-3 py-2 bg-green-100 text-green-600 rounded hover:bg-green-200 text-sm">
                                <i class="fas fa-phone mr-1"></i> Contacter
                            </button>
                        </div>
                    </div>
                </div>

                <button
                    class="mt-8 px-6 py-3 bg-primary text-white font-semibold rounded-lg hover:bg-secondary transition">
                    <i class="fas fa-plus mr-2"></i> Ajouter un livreur
                </button>
            </div>
        </div>

        <!-- Analytiques -->
        <div id="analytics-content" class="tab-content">
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Analytiques et rapports</h2>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-lg p-6 border border-gray-200">
                            <h3 class="font-bold text-gray-800 mb-4">Revenus hebdomadaires</h3>
                            <p class="text-3xl font-bold text-gray-800 mb-2">756,000 FCFA</p>
                            <p class="text-green-600">
                                <i class="fas fa-arrow-up mr-1"></i>1 750 FCFA par rapport à la semaine dernière
                            </p>

                            <div class="mt-8">
                                <!-- Graphique simplifié (représentation) -->
                                <div class="h-48 flex items-end space-x-2">
                                    <div class="flex-1 bg-blue-200 rounded-t" style="height: 30%"></div>
                                    <div class="flex-1 bg-blue-300 rounded-t" style="height: 50%"></div>
                                    <div class="flex-1 bg-blue-400 rounded-t" style="height: 70%"></div>
                                    <div class="flex-1 bg-blue-500 rounded-t" style="height: 90%"></div>
                                    <div class="flex-1 bg-blue-600 rounded-t" style="height: 80%"></div>
                                    <div class="flex-1 bg-blue-700 rounded-t" style="height: 60%"></div>
                                    <div class="flex-1 bg-blue-800 rounded-t" style="height: 40%"></div>
                                </div>
                                <div class="flex justify-between text-xs text-gray-500 mt-2">
                                    <span>Lun</span>
                                    <span>Mar</span>
                                    <span>Mer</span>
                                    <span>Jeu</span>
                                    <span>Ven</span>
                                    <span>Sam</span>
                                    <span>Dim</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="bg-white rounded-lg p-6 border border-gray-200">
                            <h3 class="font-bold text-gray-800 mb-4">Plats les plus vendus</h3>

                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="font-medium">Thiéboudienne</span>
                                        <span class="text-gray-600">43 ventes</span>
                                    </div>
                                    <div class="analytics-bar" style="width: 90%"></div>
                                </div>

                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="font-medium">Poulet Yassa</span>
                                        <span class="text-gray-600">32 ventes</span>
                                    </div>
                                    <div class="analytics-bar" style="width: 70%"></div>
                                </div>

                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="font-medium">Riz au poisson</span>
                                        <span class="text-gray-600">28 ventes</span>
                                    </div>
                                    <div class="analytics-bar" style="width: 60%"></div>
                                </div>

                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="font-medium">Salade de fruits</span>
                                        <span class="text-gray-600">22 ventes</span>
                                    </div>
                                    <div class="analytics-bar" style="width: 50%"></div>
                                </div>

                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="font-medium">Jus de bissap</span>
                                        <span class="text-gray-600">18 ventes</span>
                                    </div>
                                    <div class="analytics-bar" style="width: 40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistiques supplémentaires -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                    <div class="bg-white rounded-lg p-6 border border-gray-200">
                        <h3 class="font-bold text-gray-800 mb-4">Taux de satisfaction</h3>
                        <div class="flex items-center justify-center">
                            <div class="relative w-48 h-48">
                                <svg class="w-full h-full" viewBox="0 0 100 100">
                                    <!-- Cercle de fond -->
                                    <circle cx="50" cy="50" r="45" fill="none" stroke="#e5e7eb" stroke-width="8">
                                    </circle>
                                    <!-- Cercle de progression -->
                                    <circle cx="50" cy="50" r="45" fill="none" stroke="#10b981" stroke-width="8"
                                        stroke-dasharray="283" stroke-dashoffset="56.6" stroke-linecap="round"
                                        transform="rotate(-90 50 50)"></circle>
                                    <!-- Texte au centre -->
                                    <text x="50" y="50" text-anchor="middle" dy="7" font-size="20"
                                        font-weight="bold">80%</text>
                                </svg>
                            </div>
                        </div>
                        <p class="text-center text-gray-600 mt-4">Basé sur 125 avis clients</p>
                    </div>

                    <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-md">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">Répartition des commandes</h3>
                        <div class="flex flex-col items-center space-y-6">
                            <!-- Diagramme circulaire -->
                            <svg width="200" height="200" viewBox="0 0 36 36" class="rotate-[-90deg]">
                                <!-- Cercle de base transparent -->
                                <circle cx="18" cy="18" r="16" fill="none" stroke="#e5e7eb" stroke-width="4" />

                                <!-- Livraison: 65% -->
                                <circle cx="18" cy="18" r="16" fill="none" stroke="#3b82f6" stroke-width="4"
                                    stroke-dasharray="65 35" stroke-dashoffset="0" />

                                <!-- À emporter: 25% -->
                                <circle cx="18" cy="18" r="16" fill="none" stroke="#f97316" stroke-width="4"
                                    stroke-dasharray="25 75" stroke-dashoffset="-65" />

                                <!-- Sur place: 10% -->
                                <circle cx="18" cy="18" r="16" fill="none" stroke="#10b981" stroke-width="4"
                                    stroke-dasharray="10 90" stroke-dashoffset="-90" />
                            </svg>

                            <!-- Légende -->
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                                <div class="flex items-center space-x-2">
                                    <span class="w-4 h-4 rounded-full bg-blue-500"></span>
                                    <span class="text-gray-700">Livraison (65%)</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-4 h-4 rounded-full bg-orange-500"></span>
                                    <span class="text-gray-700">À emporter (25%)</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-4 h-4 rounded-full bg-green-500"></span>
                                    <span class="text-gray-700">Sur place (10%)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>