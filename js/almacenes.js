// Función para cambiar el contenido al hacer clic en una pestaña
function changeTab(tabId) {
    // Ocultar todos los contenidos
    const contentItems = document.querySelectorAll('.content-item');
    contentItems.forEach(item => {
        item.style.display = 'none';
    });

    // Mostrar el contenido correspondiente a la pestaña clicada
    const contentId = `content${tabId.slice(3)}`;
    document.getElementById(contentId).style.display = 'block';
}

// Agregar un event listener a cada pestaña
const tabs = document.querySelectorAll('.tab');
tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        changeTab(tab.id);
    });
});

// Mostrar el primer contenido por defecto
changeTab('tab1');