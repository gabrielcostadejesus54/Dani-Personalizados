// Menu Mobile
let menuIcon = document.querySelector('.menu-mobile i');
let menuList = document.querySelector('.menu-mobile ul');

menuIcon.addEventListener('click', function() {
    $(menuList).slideToggle();

    if(menuIcon.classList.contains('fa-bars')) {
        menuIcon.classList.remove('fa-bars');
        menuIcon.classList.add('fa-xmark');
    } else {
        menuIcon.classList.remove('fa-xmark');
        menuIcon.classList.add('fa-bars');
    }
});


//Menu Mobile