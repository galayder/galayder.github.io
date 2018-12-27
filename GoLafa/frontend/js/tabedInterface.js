$(document).ready(function() {
    // Set variables for filter panel
    var tab = $('.js-tab');
        tabWrapper = $('.tab__wrapper');
        tabContent = $('.tab__content');
        outOfView = $('.is-out-of-view');
        filterItem = $('.js-filter');
        subFilterItem = $('.js-subfilter-item');
        resetFilters = $('.js-reset');

    tab.click( function() {
        // scroll opened filter panel into view on clicking tab
        window.scrollTo({
            top: 320,
            behavior: "smooth"
        });

        // make clicked tab current and make other tabs inactive
        $(this).addClass('is-current').siblings().removeClass('is-current');
        
        // mark filter panel as activated and show content of each tab
        tabContent.addClass('is-revealed'); // classes with 'is-' prefix are used to add styles to element with js
        tabWrapper.addClass('is-active');

        // activate dimmed background when filter is opened        
        $('.js-dimm').addClass('is-dimmed');

        // remove dimmed background and close filter panel when scrolled out of view
        window.onscroll = function () {
            if (tabWrapper.visible() === false) {
                tabContent.removeClass('is-revealed');
                tabWrapper.removeClass('is-active');
                $('.js-dimm').removeClass('is-dimmed');
            }
        }
    });

    // close filter panel with close button and clicking dimmed background
    $('.js-dimm, .js-close').click( function() {
        $('.js-dimm').removeClass('is-dimmed');
        tabContent.removeClass('is-revealed');
        tabWrapper.removeClass('is-active');
    });

    // select filter logic (only one filter per click will be selected)
    filterItem.click( function() {
        $(resetFilters).show();
        $(this).addClass('is-selected').siblings().removeClass('is-selected');
        // show subfilter when main is selected
        $('.js-subcollection').show();
    });
    // select subfilter logic
    subFilterItem.click( function() {
        $(this).addClass('is-selected').siblings().removeClass('is-selected');
    });

    resetFilters.click( function() {
        if (filterItem.hasClass('is-selected')) {
            $(filterItem).removeClass('is-selected');
            $(subFilterItem).removeClass('is-selected');
        }
        resetFilters.hide();
    });

    // Avoid 'bubbling' effect (to prevent a click of element which is under aimed element)
    $('.js-link').click( function(event) {
        event.preventDefault();
    });

    // Hide subfilters by default
    $('.js-subcollection').hide();
    
    // Hide filters if more than 10 and show 'Show more' link
    if (filterItem.length > 10) {
        $('.js-filter').slice(9).hide();
        $('.service-link--more').show();
        $('.service-link--more').click( function() {
            $('.js-filter').slice(9).show();
            $('.service-link--more').hide();
        })
    }

    // SPLIT LARGE NUMBERS in prices with custom narrow space 'u200A'
    $('.js-charsplit').each(function() {
        var split = $(this).text();
        $(this).text(split.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1\u200A'));
    });
});