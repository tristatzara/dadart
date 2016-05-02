$(document).load(function () {
    $('div div nav  div a').click(function (e) {

        $('div div nav div a').removeClass('MuseMenuActive');

        if (!$(this).hasClass('MuseMenuActive')) {
            $(this).addClass('MuseMenuActive');
        }
        e.preventDefault();
    });
})
