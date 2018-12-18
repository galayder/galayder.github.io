jQuery(document).ready(function () {
    $('.select-group').click(function () {
        $('.select-group').toggleClass('is-clicked');
    });
    
    $('.select__item').click(function () {
        $('.select__item').removeClass('is-current');
        $(this).addClass('is-current');
    });
});
