$(".show-sidebar").click(function () {
   $(".left-side").animate({
       marginLeft : 0
   });
});

$(".hide-sidebar").click(function () {
   $(".left-side").animate({
       marginLeft : "-1000px"
   });
});

function otherLink(url) {
   setTimeout(() => {
       location.href = `${url}`;
   }, 700);
}

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
 return new bootstrap.Popover(popoverTriggerEl)
});

$(".full-btn").click(function () {
   let current = $(this).closest(".card");
   current.toggleClass("full-screen");

   if (current.hasClass("full-screen")) {
       $(this).html(`<img src="assets/vendor/img/minimize-2.svg">`)
   }
   else{
       $(this).html(`<img src="assets/vendor/img/maximize-2.svg">`)

   }
});


let currentPage = location.href;
$(".menu-link").each(function () {
    let link = $(this).attr("href");
    if (currentPage == link) {
        $(this).addClass('active');
    }
});

