import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

let dropdown = document.getElementById('menu-button');
dropdown.addEventListener('click', function(event) {
    event.stopPropagation(); // Prevent the click event from bubbling up to the window
    document.querySelector('.dropdown').classList.remove('hidden');
    document.querySelector('.dropdown').classList.add('flex');
});

window.addEventListener('click', function(event) {
    const dropdown = document.querySelector('.dropdown');
    if (!dropdown.contains(event.target)) {
        dropdown.classList.add('hidden');
        dropdown.classList.remove('flex');
    }
});


window.addEventListener('scroll',function() {
    document.querySelector('.dropdown').classList.add('hidden')
})

document.addEventListener("DOMContentLoaded", function(event) {
document.getElementById("share").onclick = function() {
var share_icons = document.querySelector("#share_icons");
check_opacity = share_icons.classList.contains('opacity-0');
if (check_opacity) {
share_icons.classList.remove('opacity-0');
share_icons.classList.add('opacity-1');
} else {
share_icons.classList.remove('opacity-1');
share_icons.classList.add('opacity-0');
}
};

});

// Checking inscription records if already exist in the db with ajax

var inscriptionForm = document.getElementById('inscription-form');
var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

inscriptionForm.addEventListener('submit', function(e) {
  e.preventDefault();
  var formData = new FormData(inscriptionForm);

  var xhr = new XMLHttpRequest();
  xhr.open(inscriptionForm.method, inscriptionForm.action);
  xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
if (xhr.status === 422) { 
    var errorObj = JSON.parse(xhr.responseText);
    var errors = errorObj.errors || {};
    for (var field in errors) {
        var inputField = document.querySelector('[name="' + field + '"]');
        inputField.classList.add('is-invalid');
        var errorElement = inputField.nextElementSibling;
        errorElement.innerHTML = errors[field][0];
        errorElement.style.display = 'block';
    }
    // alert("Failed")
    var message = errorObj.message || "Error";

    if(message.includes('The email has already been taken.')) {
        Toastify({
            text: 'Cet e-mail est déjà inscrit',
            duration: 3000, 
            gravity: 'top', 
            position: 'center', 
            backgroundColor: '#ef4444', 
            stopOnFocus: true, 
          }).showToast();
    }
    else if(message.includes('The telephone has already been taken.')) {
        // document.getElementById('tel-error').innerText = ""
        Toastify({
            text: 'Cet numéro est déjà inscrit',
            duration: 3000, 
            gravity: 'top', 
            position: 'center', 
            backgroundColor: '#ef4444', 
            stopOnFocus: true, 
          }).showToast();
    }
}
else if (xhr.status === 200) {
    var response = JSON.parse(xhr.responseText);
    Toastify({
      text: 'Merci pour votre inscription!',
      duration: 3000,
      gravity: 'top',
      position: 'center',
      backgroundColor: '#06a49c',
      stopOnFocus: true,
    }).showToast();
  
    setTimeout(function() {
      location.reload();
    }, 800); // Delay the reload by 3 seconds (3000 milliseconds)
  }
  
    }
  };
  xhr.send(formData);
});


