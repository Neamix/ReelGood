document.onclick = function (e) {
    $('.selector .drop-nav.active').removeClass('active');
}
$('.selector,.selector .drop-nav.active').on({
    click: function(e) {
        e.stopPropagation();
        $('.selector .drop-nav.active').removeClass('active');
        $(this).children('ul').toggleClass('active');
    }
});

$('.navBtn').on({
    click: function () {
        $('aside').toggleClass('active');
        $(this).toggleClass('active');
    }
})


