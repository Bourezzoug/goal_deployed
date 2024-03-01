    <div class="bg-black opacity-30 fixed top-0 left-0 w-full h-full z-[1000] "></div>
    <section class="bg-white  fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[9999] p-4 md:p-10 rounded w-[95%] md:w-[680px]">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 relative">
        <div class="mx-auto max-w-screen-md sm:text-center ">
            <h2 class=" text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl mb-6">Inscrivez vous à la newsletter</h2>
            <form method="POST" action="/" id="newsLetterForm">
                @csrf
                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0 mt-6">
                    <div class="relative w-full">
                        <label for="email" class="hidden mb-2 text-sm font-medium text-gray-900 ">Email address</label>
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                        </div>
                        <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-r-0 border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500" placeholder="Votre address email" name="email" type="email" id="email" style="box-shadow: none" required>
                        
                    </div>
                    
                    <div>
                        <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-main-color border-primary-600 sm:rounded-none sm:rounded-r-lg focus:ring-4 focus:ring-primary-300 " style="box-shadow: none">Subscribe</button>
                    </div>
                </div>
                <div class="mx-auto max-w-screen-sm text-sm text-left text-gray-500 newsletter-form-footer mt-6">
                    <input type="checkbox" name="conditions" id="condition" class="w-4 h-4 text-main-color bg-gray-100 border-gray-300 rounded focus:ring-main-color" required> 
                    J’ai lu et j’accepte <a href="#" class="text-main-color">la note légale Goal.ma</a> , notamment la mention relative à la protection des données personnelles.
                </div>
            </form>
        </div>
        <div class="absolute top-0 right-0 close-newsletter">
            <img src="{{ asset('storage/x-mark.png') }}" class="w-8 cursor-pointer" alt="">
        </div>
        </div>
        </section> 
    </div>
    <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Wait for the page to load
                setTimeout(function() {
                    var popup = document.querySelector(".bg-black");
                    var body = document.querySelector("body");
    
                    popup.style.display = "block";
                    body.classList.add("overflow-hidden");
    
                    // Add event listener to close the popup
                    var closeButton = document.querySelector(".close-newsletter img");
                    closeButton.addEventListener("click", function() {
                        popup.style.display = "none";
                        body.classList.remove("overflow-hidden");
                    });
                    document.querySelector('.close-newsletter').addEventListener('click',function() {
                        document.querySelector('body').classList.remove('overflow-hidden') // Remove the 'hidden' overflow style
                        document.querySelector('.bg-black').style.display = 'none'; // Hide the overlay
                        document.querySelector('.close-newsletter').style.display = 'none'; // Hide the close button
                        document.querySelector('section').style.display = 'none'; // Hide the newsletter section
                    })
                    }, 1); // 1 second delay
                    });
    </script>
    <script>
        var newsLetterForm = document.getElementById('newsLetterForm');
var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

newsLetterForm.addEventListener('submit', function(e) {
  e.preventDefault();
  var formData = new FormData(newsLetterForm);

  var xhr = new XMLHttpRequest();
  xhr.open(newsLetterForm.method, newsLetterForm.action);
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
            text: 'Email déjà utilisée',
            duration: 3000, 
            gravity: 'top', 
            position: 'center', 
            backgroundColor: '#ef4444', 
            stopOnFocus: true, 
            className:'custom-toast'
          }).showToast();
    }
    }
 else if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        Toastify({
            text: 'Merci pour votre inscription',
            duration: 3000, 
            gravity: 'top', 
            position: 'center', 
            backgroundColor: '#06a49c', 
            stopOnFocus: true, 
          }).showToast();
          setTimeout(function() {
            document.querySelector('body').classList.remove('overflow-hidden') // Remove the 'hidden' overflow style
            document.querySelector('.bg-black').style.display = 'none'; // Hide the overlay
            document.querySelector('.close-newsletter').style.display = 'none'; // Hide the close button
            document.querySelector('section').style.display = 'none'; // Hide the newsletter section
          },600)

      }
    }
  };
  xhr.send(formData);
});
    </script> 