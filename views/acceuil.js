

// Configuration de Tailwind
tailwind.config = {
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                primary: '#2563eb',
                secondary: '#1e40af',
                accent: '#f97316',
                campus: '#0f766e',
                dark: '#1e293b'
            },
            fontFamily: {
                poppins: ['Poppins', 'sans-serif']
            }
        }
    }
};

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



// Ajoutez cette fonction à votre initialisation
document.addEventListener('DOMContentLoaded', () => {
    setupThemeToggle();
    setupMobileMenu();
    setupAuthModal();
    setupAccountTypeSelect();
    setupBackToTop();
    setupActiveNavigation(); // Ajoutez cette ligne
});

// Gestion du menu mobile
function setupMobileMenu() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenuButton = document.getElementById('close-menu');

    if (mobileMenuButton && mobileMenu && closeMenuButton) {
        function toggleMenu() {
            mobileMenu.classList.toggle('translate-x-full');
            document.body.style.overflow = mobileMenu.classList.contains('translate-x-full') ? '' : 'hidden';
        }

        mobileMenuButton.addEventListener('click', toggleMenu);
        closeMenuButton.addEventListener('click', toggleMenu);

        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target) && !mobileMenu.classList.contains('translate-x-full')) {
                toggleMenu();
            }
        });
    }
}

// Gestion de la modale d'authentification
function setupAuthModal() {
    // Ajoutez cette ligne au début de votre fonction setupAuthModal
    window.openModal = openModal;
    const authModal = document.getElementById('auth-modal');
    const loginButton = document.getElementById('login-button');
    const signupButton = document.getElementById('signup-button');
    const modalLoginTab = document.getElementById('modal-login-tab');
    const modalSignupTab = document.getElementById('modal-signup-tab');
    const modalLoginForm = document.getElementById('modal-login-form');
    const modalSignupForm = document.getElementById('modal-signup-form');

    // Ajoutez ceci dans la fonction setupAuthModal
    const switchToSignupLink = document.getElementById('switch-to-signup');
    if (switchToSignupLink) {
        switchToSignupLink.addEventListener('click', (e) => {
            e.preventDefault();
            openModal('signup');
        });
    }

    function openModal(tab) {
        authModal.classList.remove('hidden');
        setTimeout(() => authModal.classList.add('modal-open'), 10);
        
        if (tab === 'login') {
            modalLoginTab.classList.add('active');
            modalSignupTab.classList.remove('active');
            modalLoginForm.classList.remove('hidden');
            modalSignupForm.classList.add('hidden');
        } else {
            modalSignupTab.classList.add('active');
            modalLoginTab.classList.remove('active');
            modalSignupForm.classList.remove('hidden');
            modalLoginForm.classList.add('hidden');
        }
    }

    function closeModal() {
        authModal.classList.remove('modal-open');
        setTimeout(() => authModal.classList.add('hidden'), 300);
    }

    if (loginButton) loginButton.addEventListener('click', () => openModal('login'));
    if (signupButton) signupButton.addEventListener('click', () => openModal('signup'));
    if (authModal) authModal.addEventListener('click', (e) => e.target === authModal && closeModal());
    if (modalLoginTab) modalLoginTab.addEventListener('click', () => openModal('login'));
    if (modalSignupTab) modalSignupTab.addEventListener('click', () => openModal('signup'));
    
}

// Gestion du menu déroulant de type de compte
function setupAccountTypeSelect() {
    const selectBtn = document.getElementById('select-btn');
    const selectOptions = document.getElementById('select-options');
    const options = document.querySelectorAll('.option');
    const selectedOption = document.getElementById('selected-option');
    const accountTypeHidden = document.getElementById('account-type-hidden');
    const addressField = document.getElementById('delivery-address');

    function selectOption(option) {
        const value = option.getAttribute('data-value');
        const text = option.textContent.trim();
        const iconClass = option.querySelector('i').className;
        
        selectedOption.innerHTML = `<i class="${iconClass}"></i> ${text}`;
        accountTypeHidden.value = value;
        
        // Gestion du champ adresse
        if (addressField) {
            if (value === 'client') {
                addressField.style.display = 'block';
                document.getElementById('email').required = true;
            } else {
                addressField.style.display = 'none';
                document.getElementById('email').required = false;
            }
        }
        
        selectOptions.classList.add('hidden');
    }

    if (selectBtn) {
        selectBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            selectOptions.classList.toggle('hidden');
        });
    }

    options.forEach(option => {
        option.addEventListener('click', () => selectOption(option));
    });

    document.addEventListener('click', () => selectOptions.classList.add('hidden'));
    if (selectOptions) selectOptions.addEventListener('click', (e) => e.stopPropagation());

    // Appliquer le bon état au chargement
    if (accountTypeHidden && addressField) {
        if (accountTypeHidden.value === 'livreur') {
            addressField.style.display = 'none';
            document.getElementById('email').required = false;
        }
    }
}

// Bouton de retour en haut
function setupBackToTop() {
    const backToTopButton = document.getElementById('backToTop');

    if (backToTopButton) {
        window.addEventListener('scroll', () => {
            backToTopButton.classList.toggle('hidden', window.pageYOffset <= 300);
        });

        backToTopButton.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
}

// Initialisation de toutes les fonctionnalités
document.addEventListener('DOMContentLoaded', () => {
    setupThemeToggle();
    setupMobileMenu();
    setupAuthModal();
    setupAccountTypeSelect();
    setupBackToTop();
    setupActiveNavigation(); // Un seul appel ici
});


function toggleAddressField(selectElement) {
    const addressField = document.getElementById('delivery-address');
    if (selectElement.value === 'livreur') {
        addressField.style.display = 'none';
        // Optionnel: rendre le champ non obligatoire
        if (addressField.querySelector('input')) {
            addressField.querySelector('input').required = false;
        }
    } else {
        addressField.style.display = 'block';
        // Optionnel: rendre le champ obligatoire
        if (addressField.querySelector('input')) {
            addressField.querySelector('input').required = true;
        }
    }
}

// Gestion de la navigation active// Gestion de la navigation active - Version corrigée
function setupActiveNavigation() {
    const navLinks = document.querySelectorAll('.nav-link');
    
    window.addEventListener('scroll', () => {
        const fromTop = window.scrollY + 200;
        
        navLinks.forEach(link => {
            const section = document.querySelector(link.getAttribute('href'));
            
            if (
                section.offsetTop <= fromTop &&
                section.offsetTop + section.offsetHeight > fromTop
            ) {
                link.classList.add('active-link');
            } else {
                link.classList.remove('active-link');
            }
        });
    });
}




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