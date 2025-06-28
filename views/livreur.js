
tailwind.config = {
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                primary: '#2563eb',
                secondary: '#1e40af',
                accent: '#f97316',
                delivery: '#0f766e',
                dark: '#1e293b',
                darkbg: '#121826'
            },
            fontFamily: {
                poppins: ['Poppins', 'sans-serif']
            }
        }
    }
}


        // Gestion du mode sombre
        const darkModeToggle = document.getElementById('darkModeToggle');
        const darkModeIcon = document.getElementById('darkModeIcon');
        const htmlElement = document.documentElement;
        
        // Vérifier la préférence système
        const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
        
        // Vérifier le localStorage pour le thème sauvegardé
        const currentTheme = localStorage.getItem('theme');
        
        if (currentTheme === 'dark' || (!currentTheme && prefersDarkScheme.matches)) {
            htmlElement.classList.add('dark');
            darkModeIcon.classList.remove('fa-moon');
            darkModeIcon.classList.add('fa-sun');
        } else {
            htmlElement.classList.remove('dark');
            darkModeIcon.classList.remove('fa-sun');
            darkModeIcon.classList.add('fa-moon');
        }
        
        darkModeToggle.addEventListener('click', function() {
            // Basculer la classe 'dark' sur l'élément html
            htmlElement.classList.toggle('dark');
            
            // Mettre à jour l'icône
            if (htmlElement.classList.contains('dark')) {
                darkModeIcon.classList.remove('fa-moon');
                darkModeIcon.classList.add('fa-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                darkModeIcon.classList.remove('fa-sun');
                darkModeIcon.classList.add('fa-moon');
                localStorage.setItem('theme', 'light');
            }
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
        
        // Animation pour le bouton "Démarrer la livraison"
        document.querySelectorAll('.start-delivery-btn').forEach(button => {
            button.addEventListener('click', function () {
                const deliveryCard = this.closest('.delivery-card');
                const statusBadge = deliveryCard.querySelector('.status-badge');
                
                // Changer le statut
                statusBadge.textContent = 'En cours';
                statusBadge.className = 'status-badge status-in-progress';
                
                // Mettre à jour le texte du bouton
                this.innerHTML = '<i class="fas fa-motorcycle mr-2"></i> En cours de livraison';
                this.classList.remove('bg-green-100', 'text-green-600', 'hover:bg-green-200', 'dark:bg-green-900', 'dark:text-green-300', 'dark:hover:bg-green-800');
                this.classList.add('bg-blue-100', 'text-blue-600', 'hover:bg-blue-200', 'dark:bg-blue-900', 'dark:text-blue-300', 'dark:hover:bg-blue-800');
                
                // Afficher une notification
                const notification = document.createElement('div');
                notification.className = 'fixed bottom-4 right-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center animate-fadeIn';
                notification.innerHTML = `
                    <i class="fas fa-motorcycle mr-2"></i>
                    Livraison #1 démarrée
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
        
        // Animation pour le bouton "Livré"
        document.querySelectorAll('.complete-delivery-btn').forEach(button => {
            button.addEventListener('click', function () {
                const deliveryCard = this.closest('.delivery-card');
                const statusBadge = deliveryCard.querySelector('.status-badge');
                
                // Changer le statut
                statusBadge.textContent = 'Livré';
                statusBadge.className = 'status-badge status-completed';
                
                // Mettre à jour le texte du bouton
                this.innerHTML = '<i class="fas fa-check-circle mr-2"></i> Livraison terminée';
                this.classList.remove('bg-green-600', 'hover:bg-green-700');
                this.classList.add('bg-green-500', 'hover:bg-green-600');
                this.disabled = true;
                
                // Afficher une notification
                const notification = document.createElement('div');
                notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center animate-fadeIn';
                notification.innerHTML = `
                    <i class="fas fa-check-circle mr-2"></i>
                    Livraison #2 complétée avec succès!
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
