$(document).ready(function() {
    var tab = $('.js-tab');
        tabWrapper = $('.tab__wrapper');
        tabContent = $('.tab__content');
        outOfView = $('.is-out-of-view');

    tab.click( function() {
        window.scrollTo({
            top: 320,
            behavior: "smooth"
        });
        $(this).addClass('is-current').siblings().removeClass('is-current');
        tabContent.addClass('is-revealed');
        tabWrapper.addClass('is-active');
        $('.js-dimm').addClass('is-dimmed');
        window.onscroll = function () {
            if (tabWrapper.visible() === false) {
                tabContent.removeClass('is-revealed');
                tabWrapper.removeClass('is-active');
                $('.js-dimm').removeClass('is-dimmed');
            }
        }
    });
    $('.js-dimm, .js-close').click( function() {
        $('.js-dimm').removeClass('is-dimmed');
        tabContent.removeClass('is-revealed');
        tabWrapper.removeClass('is-active');
    });

    // FILTER COLLECTIONS
    var filterItem = $('.js-filter');
    var subFilterItem = $('.js-filter-sub');
    var showFirstPortion = filterItem.slice(0, 9);

    filterItem.click( function() {
        $(this).addClass('is-selected').siblings().removeClass('is-selected');
        $('.js-subcollection').show();
    });

    subFilterItem.click( function() {
        $(this).addClass('is-selected').siblings().removeClass('is-selected');
    });

    $('.js-link').click( function(event) {
        event.preventDefault();
    });
    $('.js-subcollection').hide();
    // if (filterItem.hasClass('is-selected')) {
    //     $('.js-subcollection').show();
    // }
    if (filterItem.length > 10) {
        $('.js-filter').slice(9).hide();
        $('.service-link--more').show();
        $('.service-link--more').click( function() {
            $('.js-filter').slice(9).show();
            $('.service-link--more').hide();
        })
    }


    // SPLIT LARGE NUMBERS
    $('.js-charsplit').each(function() {
        var split = $(this).text();
        $(this).text(split.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1\u2009'));
    });
});

// var priceSplit = $('.js-charsplit').text();
