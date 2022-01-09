// show hidden update field

// VARFÖR FUNGERAR DET INTE NÄR JAG KÖR MED GETELEMENTBYCLASSNAME??? DET ÄR LÖJLIGT VARFÖR MÅSTE JAG ANVÄNDA ID

const showButton = document.getElementById('show-button');

function display() {
  const hiddenUpdate = document.querySelector('.hidden-update-field');
  hiddenUpdate.classList.toggle('open-update-field');
}

showButton.addEventListener('click', function (e) {
  display();
});

// funkar bara på första knappen. måste jag använda någon slags for-loop?
