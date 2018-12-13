$(document).ready(function() {
    var tab = $('.js-tab');
        tabWrapper = $('.tab__wrapper')
        tabContent = $('.tab__content')

    tab.click( function() {
        window.scrollTo({
            top: 320,
            behavior: "smooth"
        });
        $(this).addClass('is-current').siblings().removeClass('is-current');
        tabContent.addClass('is-revealed');
        tabWrapper.addClass('is-active');
        $('.js-dimm').addClass('is-dimmed');
    });
    $('.js-dimm, .js-close').click( function() {
        $('.js-dimm').removeClass('is-dimmed');
        tabContent.removeClass('is-revealed');
        tabWrapper.removeClass('is-active');
    });
    // $('.js-close').click( function() {

    // });

    var filterItem = $('.js-filter');
    filterItem.click( function(event) {
        $(this).toggleClass('is-selected');
    });
    $('.js-link').click( function(event) {
        event.preventDefault();
    });
});
