var header = $('.header-image');

//header.css('height', $(window).height() - 75);
header.css('height', 250);

$('header').hover(function() {
    header.animate({height: 560});
});

$('.category-list').height($(window).height() - 140);


$(".selected-category").mousewheel(function(event, delta) {

    this.scrollLeft -= (delta * 30);

    event.preventDefault();

});