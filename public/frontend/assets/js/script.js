

/*============================= Nav Bar Fixed Top Vanilla Java Script ========================*/
// window.addEventListener('scroll', function () {
//     var menubar = document.querySelector("#mainNav");
//     menubar.classList.toggle("fixed-top", window.scrollY > 20);
// });

//sticky header
const header = document.querySelector('#mainNav');
window.addEventListener('scroll', () => {
    if (window.pageYOffset > 130 && document.documentElement.scrollHeight > 1200) {
        if (!header.classList.contains('sticky-header')) {
            header.style.top = "0";
            header.classList.add('sticky-header');
        }
    } else if (window.pageYOffset < 120) {
        header.style.transition = "top 0.5s ease, padding 0.5s ease"; 
        header.style.top = "0";
        header.classList.remove('sticky-header');
    }
});  

/*============================= Back To Top Button Script ========================*/
var mybutton = document.getElementById("backTop");
window.onscroll = function () { scrollFunction() };
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 120) {
        mybutton.style.display = "flex";
    } else {
        mybutton.style.display = "none";
    }
}
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}


// (function ($) {
//     // Main Header Nav links Active Class Genaretor
//     $("#mainNav .navbar-nav li a").filter(function () {
//         return this.href == location.href.replace(/#.*/, "");
//     }).parents("li").addClass("active");

  

// })(jQuery); 

document.addEventListener('DOMContentLoaded', (event) => {
    const btn = document.getElementById('cookieBtn');
    const storageKey = false;

    // Check localStorage to see if the div has been clicked
    if (localStorage.getItem(storageKey)) {
        // document.getElementById('cookieBox').classList.add('d-none');
        var box = document.getElementById('cookieBox');
        box.classList.add('hide');
        console.log('hi');
    }
   

    btn.addEventListener('click', () => {
        if (!localStorage.getItem(storageKey)) {
            localStorage.setItem(storageKey, 'true');
            document.getElementById('cookieBox').classList.add('d-none');
        }
    });

});
setTimeout(() => {
    document.getElementById('cookieBox').classList.remove('d-none');
    document.getElementById('cookieBox').classList.add('js--open'); 
}, 5000);