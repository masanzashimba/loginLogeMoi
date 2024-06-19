<div id="myModal" class="modal">
 <div class="modal-content">
    <span class="close">&times;</span>
    <p id="modal-message"></p>
 </div>
</div>

















<script>
    document.addEventListener('DOMContentLoaded', function() {
 // Vérifie si un message de succès ou d'erreur est présent
 const successMessage = "{{ session('success') }}";
 const errorMessage = "{{ $errors->any() ? $errors->first() : '' }}";

 if (successMessage || errorMessage) {
    // Affiche le message dans la modale
    document.getElementById('modal-message').innerText = successMessage || errorMessage;
    // Affiche la modale
    document.getElementById('myModal').style.display = 'block';
 }

 // Gère le clic sur le bouton de fermeture de la modale
 const closeModal = document.getElementsByClassName('close')[0];
 closeModal.onclick = function() {
    document.getElementById('myModal').style.display = 'none';
 }

 // Gère le clic en dehors de la modale
 window.onclick = function(event) {
    if (event.target == document.getElementById('myModal')) {
      document.getElementById('myModal').style.display = 'none';
    }
 }
});

</script>