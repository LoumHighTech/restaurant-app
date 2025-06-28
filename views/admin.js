
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#1e40af',
                        accent: '#f97316',
                        campus: '#0f766e',
                        dark: '#1e293b',
                        admin: '#1e3a8a'
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif']
                    }
                }
            }
        }



        // Gestion des onglets
        const tabs = document.querySelectorAll('.nav-tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Retirer la classe active de tous les onglets
                tabs.forEach(t => t.classList.remove('active'));
                // Ajouter la classe active à l'onglet cliqué
                tab.classList.add('active');

                // Cacher tous les contenus d'onglets
                tabContents.forEach(content => content.classList.remove('active'));

                // Afficher le contenu correspondant
                const tabName = tab.getAttribute('data-tab');
                document.getElementById(`${tabName}-content`).classList.add('active');
            });
        });

        // Sélection des commandes dans le tableau
        const orderRows = document.querySelectorAll('.order-table tbody tr');
        orderRows.forEach(row => {
            row.addEventListener('click', () => {
                orderRows.forEach(r => r.classList.remove('bg-blue-50'));
                row.classList.add('bg-blue-50');
            });
        });

        // Sélection des livreurs
        const drivers = document.querySelectorAll('.driver-card');
        drivers.forEach(driver => {
            driver.addEventListener('click', () => {
                drivers.forEach(d => d.classList.remove('border-blue-500', 'ring-2', 'ring-blue-200'));
                driver.classList.add('border-blue-500', 'ring-2', 'ring-blue-200');
            });
        });

        // Sélection des plats
        const dishes = document.querySelectorAll('.dish-card');
        dishes.forEach(dish => {
            dish.addEventListener('click', () => {
                dishes.forEach(d => d.classList.remove('border-blue-500', 'ring-2', 'ring-blue-200'));
                dish.classList.add('border-blue-500', 'ring-2', 'ring-blue-200');
            });
        });

        // Responsive menu
        document.getElementById('menuToggle').addEventListener('click', function () {
            const nav = document.getElementById('navTabs');
            nav.classList.toggle('hidden');
        });

        // Gestion du thème sombre/clair
        const themeToggle = document.getElementById('themeToggle');
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');
        const htmlElement = document.documentElement;

        // Vérifier la préférence utilisateur ou le localStorage
        const currentTheme = localStorage.getItem('theme') || 'light';
        
        if (currentTheme === 'dark') {
            htmlElement.classList.add('dark');
            sunIcon.classList.add('hidden');
            moonIcon.classList.remove('hidden');
        } else {
            htmlElement.classList.remove('dark');
            sunIcon.classList.remove('hidden');
            moonIcon.classList.add('hidden');
        }

        // Écouter le clic sur le bouton
        themeToggle.addEventListener('click', () => {
            htmlElement.classList.toggle('dark');
            
            if (htmlElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            } else {
                localStorage.setItem('theme', 'light');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            }
        });