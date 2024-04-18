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

document.getElementById('accord-toggl').addEventListener('click', function() {
  var content = document.getElementById('accord-conten');
  if (content.style.display === 'none') {
    content.style.display = 'block';
    this.textContent = 'Reduire le contenu';
  } else {
    content.style.display = 'none';
    this.textContent = 'Voir plus';
  }
});














const nav = document.querySelector('.nav')
window.addEventListener('scroll', fixNav)


function fixNav(){
    if(window.scrollY > nav.offsetHeight + 150){
        nav.classList.add('active')
    }else{
        nav.classList.remove('active')
    }
}


const carouselContainer = document.querySelector('.carousel-container');
const leftButton = document.getElementById('left-button');
const rightButton = document.getElementById('right-button');

let currentIndex = 0;
const heroes = carouselContainer.querySelectorAll('.hero');
const totalHeroes = heroes.length;

// Fonction pour défiler vers la gauche
function scrollLeft() {
    currentIndex--;
    if (currentIndex < 0) {
        currentIndex = totalHeroes - 1; // Retour au dernier élément
    }
    carouselContainer.scrollLeft = heroes[currentIndex].offsetLeft;
}

// Fonction pour défiler vers la droite
function scrollRight() {
    currentIndex++;
    if (currentIndex >= totalHeroes) {
        currentIndex = 0; // Retour au premier élément
    }
    carouselContainer.scrollLeft = heroes[currentIndex].offsetLeft;
}

// Ajouter les écouteurs d'événements aux boutons
leftButton.addEventListener('click', scrollLeft);
rightButton.addEventListener('click', scrollRight);

// Défilement automatique
setInterval(() => {
    scrollRight();
}, 4000); // Défilement toutes les 3 secondes















const password = document.getElementById('password')
const bg = document.getElementById('bg')


password.addEventListener('input',(e) => {

  const input = e.target.value
  console.log(input)
  const length = input.length
  const blurValue = 20 - length * 2
  bg.style.filter = `blur(${blurValue}px)`
})





