document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modal');
    const modalOverlay = document.getElementById('modalOverlay');
    const closeModalButton = document.getElementById('closeModal');
    const confirmLogoutButton = document.getElementById('confirmLogout');

    const openModal = () => {
        modal.classList.remove('hidden');
        modalOverlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    };

    const closeModal = () => {
        modal.classList.add('hidden');
        modalOverlay.classList.add('hidden');
        document.body.style.overflow = 'auto';
    };

    document.querySelectorAll('.open-modal').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); 
            openModal();
        });
    });

    closeModalButton.addEventListener('click', closeModal);

    confirmLogoutButton.addEventListener('click', function() {
        window.location.href = '?router=AuthLogin/logout';
    });

    modalOverlay.addEventListener('click', function(event) {
        if (event.target === modalOverlay) {
            closeModal();
        }
    });

    modal.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});