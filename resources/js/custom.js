// Header JS
document.getElementById('close-social').addEventListener('click',function() {
    document.querySelector('.social-media').classList.add('-right-96')
    document.querySelector('.social-media').classList.remove('right-0')
    document.querySelector('.header-overlay').classList.add('hidden')
    document.querySelector('.header-overlay').classList.remove('block')
})
document.getElementById('burger-social').addEventListener('click',function() {
    document.querySelector('.social-media').classList.remove('-right-96')
    document.querySelector('.social-media').classList.add('right-0')
    document.querySelector('.header-overlay').classList.add('block')
    document.querySelector('.header-overlay').classList.remove('hidden')
})

document.getElementById('header-overlay').addEventListener('click',function() {
    document.querySelector('.social-media').classList.add('-right-96')
    document.querySelector('.social-media').classList.remove('right-0')
    document.querySelector('.header-overlay').classList.add('hidden')
    document.querySelector('.header-overlay').classList.remove('block')
    if(document.getElementById('search-form').classList.contains('block')) {
        document.getElementById('search-form').classList.add('hidden');
        document.getElementById('search-form').classList.remove('block');
    }
})
// Scroll Up JS
const popup = document.getElementById('popup');
window.addEventListener('scroll',function() {
    if(this.window.scrollY > 100) {
        popup.classList.remove('hidden')
        popup.classList.add('flex')
    }
    else{
        popup.classList.add('hidden')
        popup.classList.remove('flex')
    }
})

// Search Component
document.getElementById('search-icon').addEventListener('click',function() {
    // document.getElementById('search-ipt-header').classList.toggle('w-56')
    // this.classList.toggle('fa-xmark')
    // document.getElementById('search-ipt-header').classList.toggle('p-0')
    // this.classList.toggle('fa-magnifying-glass')
    document.getElementById('search-form').classList.add('block');
    document.getElementById('search-form').classList.remove('hidden');
    document.querySelector('.header-overlay').classList.add('block')
    document.querySelector('.header-overlay').classList.remove('hidden')
})
    document.getElementById('search-icon-2').addEventListener('click',function() {
    document.getElementById('search-ipt-header-2').classList.toggle('w-56')
    this.classList.toggle('fa-xmark')
    document.getElementById('search-ipt-header-2').classList.toggle('p-0')
    this.classList.toggle('fa-magnifying-glass')
})

