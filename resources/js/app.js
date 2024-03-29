import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.getElementById('accord-toggle').addEventListener('click', function() {
    var content = document.getElementById('accord-content');
    if (content.style.display === 'none') {
      content.style.display = 'block';
      this.textContent = 'Reduire le contenu';
    } else {
      content.style.display = 'none';
      this.textContent = 'Voir plus';
    }
  });
  
