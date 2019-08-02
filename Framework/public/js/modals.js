function openModal(id_modal) {
    let modalFormats = document.getElementById(id_modal);
    if (modalFormats.classList.contains('hidden')) {
        if (modalFormats.classList.contains('fadeOut')) {
            modalFormats.classList.remove('fadeOut');
        }
        modalFormats.classList.add('fadeIn');
        modalFormats.classList.remove('hidden');
    }
}

function closeModal(id_modal) {
    let modalFormats = document.getElementById(id_modal);
    modalFormats.classList.add('animated');
    modalFormats.classList.add('fadeOut');
    setTimeout(() => {
        modalFormats.classList.add('hidden');
    }, 500);
}