// submit checkbox-form

const form = document.querySelector('form');
const task = document.querySelector('input[type=checkbox]');

// When the user clicks on the checkbox the form will automagically submit.
task.addEventListener('click', () => form.submit());
