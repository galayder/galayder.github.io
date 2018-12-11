
let tab = document.querySelectorAll('.js-tab');
let tabCollection = document.querySelector('.tab__collection');
let bgDimmer = document.querySelector('.js-dimmer');
console.log(tab);

for(var i = 0; i < tab.length; i++) {
    tab[i].addEventListener("click", function() {
        window.scrollTo({
            top: 300,
            behavior: "smooth"
        });
        tabCollection.classList.add('is-active');
        bgDimmer.classList.add('is-active');
        // document.body.classList.add('stop-scroll');
        if (this.classList.contains('is-active')) {
            this.classList.toggle('is-current'); 
        } else {
            this.classList.add('is-current'); 
        }
    });
}

bgDimmer.addEventListener('click', function() {
    this.classList.remove('is-active');
    tabCollection.classList.remove('is-active');
    document.body.classList.remove('stop-scroll')
});
