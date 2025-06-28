
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
                        client: '#0f766e',
                        darkbg: '#121826'
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

        // Boutons "Commander"
        document.querySelectorAll('.dish-card button').forEach(button => {
            button.addEventListener('click', function () {
                const dishCard = this.closest('.dish-card');
                const dishName = dishCard.querySelector('h3').textContent;

                // Animation
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check mr-2"></i> Ajouté au panier';
                this.classList.add('bg-green-500', 'text-white');

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('bg-green-500', 'text-white');
                }, 2000);

                // Notification
                const notification = document.createElement('div');
                notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center animate-fadeIn';
                notification.innerHTML = `
                    <i class="fas fa-check-circle mr-2"></i>
                    ${dishName} ajouté à votre panier
                `;
                document.body.appendChild(notification);

                setTimeout(() => {
                    notification.classList.add('animate-fadeOut');
                    setTimeout(() => {
                        notification.remove();
                    }, 500);
                }, 3000);
            });
        });

        // Animation CSS pour les notifications
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            @keyframes fadeOut {
                from { opacity: 1; transform: translateY(0); }
                to { opacity: 0; transform: translateY(20px); }
            }
            .animate-fadeIn {
                animation: fadeIn 0.3s ease-out forwards;
            }
            .animate-fadeOut {
                animation: fadeOut 0.3s ease-out forwards;
            }
        `;
        document.head.appendChild(style);

        document.getElementById('clientMenuToggle').addEventListener('click', function () {
            const nav = document.getElementById('clientNavTabs');
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
