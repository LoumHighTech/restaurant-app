

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
    setupMobileMenu();
    setupAuthModal();
    setupAccountTypeSelect();
    setupBackToTop();
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

// Gestion de la modale d'authentification // Gestion de la modale
        const authModal = document.getElementById('auth-modal');
        const loginButton = document.getElementById('login-button');
        const signupButton = document.getElementById('signup-button');
        const modalLoginTab = document.getElementById('modal-login-tab');
        const modalSignupTab = document.getElementById('modal-signup-tab');
        const modalLoginForm = document.getElementById('modal-login-form');
        const modalSignupForm = document.getElementById('modal-signup-form');

        // Ouvrir modale de connexion
        loginButton.addEventListener('click', () => {
            authModal.classList.remove('hidden');
            setTimeout(() => {
                authModal.classList.add('modal-open');
            }, 10);
            modalLoginTab.classList.add('active');
            modalSignupTab.classList.remove('active');
            modalLoginForm.classList.remove('hidden');
            modalSignupForm.classList.add('hidden');
        });

        // Ouvrir modale d'inscription
        signupButton.addEventListener('click', () => {
            authModal.classList.remove('hidden');
            setTimeout(() => {
                authModal.classList.add('modal-open');
            }, 10);
            modalSignupTab.classList.add('active');
            modalLoginTab.classList.remove('active');
            modalSignupForm.classList.remove('hidden');
            modalLoginForm.classList.add('hidden');
        });

        // Fermer la modale
        authModal.addEventListener('click', (e) => {
            if (e.target === authModal) {
                authModal.classList.remove('modal-open');
                setTimeout(() => {
                    authModal.classList.add('hidden');
                }, 300);
            }
        });

        // Gestion des onglets
        modalLoginTab.addEventListener('click', () => {
            modalLoginTab.classList.add('active');
            modalSignupTab.classList.remove('active');
            modalLoginForm.classList.remove('hidden');
            modalSignupForm.classList.add('hidden');
        });

        modalSignupTab.addEventListener('click', () => {
            modalSignupTab.classList.add('active');
            modalLoginTab.classList.remove('active');
            modalSignupForm.classList.remove('hidden');
            modalLoginForm.classList.add('hidden');
        });

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



function setupActiveNavigation() {
  const allNavLinks = [
    ...document.querySelectorAll('.nav-link'),
    ...document.querySelectorAll('.mobile-menu .nav-link')
  ];

  function setActiveLink(targetId) {
    allNavLinks.forEach(link => {
      link.classList.toggle('active-link', link.getAttribute('href') === targetId);
    });
  }

  // Gestion du clic
  allNavLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      
      if (targetId.startsWith('#')) {
        e.preventDefault();
        setActiveLink(targetId);
        
        const targetSection = document.querySelector(targetId);
        if (targetSection) {
          window.scrollTo({
            top: targetSection.offsetTop - 80,
            behavior: 'smooth'
          });
        }
        
        // Ferme le menu mobile si on clique dedans
        if (this.closest('.mobile-menu')) {
          document.getElementById('mobile-menu').classList.add('translate-x-full');
          document.body.style.overflow = '';
        }
      }
    });
  });

  // Gestion du scroll
  window.addEventListener('scroll', throttle(function() {
    const fromTop = window.scrollY + 100;
    
    allNavLinks.forEach(link => {
      const targetId = link.getAttribute('href');
      if (targetId.startsWith('#')) {
        const section = document.querySelector(targetId);
        if (section) {
          if (section.offsetTop <= fromTop && 
              section.offsetTop + section.offsetHeight > fromTop) {
            setActiveLink(targetId);
          }
        }
      }
    });
  }, 100));
}

// Helper pour limiter les appels au scroll
function throttle(func, limit) {
  let lastFunc;
  let lastRan;
  return function() {
    const context = this;
    const args = arguments;
    if (!lastRan) {
      func.apply(context, args);
      lastRan = Date.now();
    } else {
      clearTimeout(lastFunc);
      lastFunc = setTimeout(function() {
        if ((Date.now() - lastRan) >= limit) {
          func.apply(context, args);
          lastRan = Date.now();
        }
      }, limit - (Date.now() - lastRan));
    }
  }
}

// Initialisation
document.addEventListener('DOMContentLoaded', setupActiveNavigation);