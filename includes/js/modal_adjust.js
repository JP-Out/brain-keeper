$(document).on('show.bs.modal', function () {
    var scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
    $('header').css('padding-right', scrollbarWidth + 'px');
});

$(document).on('hidden.bs.modal', function () {
    $('header').css('padding-right', '');
});
