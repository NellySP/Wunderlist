console.log('Hello World');

// show hidden update field

const showButton = document.getElementsByClassName('show-button');
const hiddenUpdate = document.getElementsByClassName('hidden-update-field');
showButton.addEventListener('click', function (e) {
  hiddenField.style.display = 'block';
});
