document.addEventListener('DOMContentLoaded', (event) => {
    // Récupérer les éléments de la page
    const modal = document.getElementById("myModal");
    const btn = document.getElementById("openModalBtn");
    const span = document.getElementsByClassName("close")[0];

    // Quand l'utilisateur clique sur le bouton, ouvrir la fenêtre modale
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Quand l'utilisateur clique sur <span> (x), fermer la fenêtre modale
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Quand l'utilisateur clique n'importe où en dehors de la fenêtre modale, la fermer
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});