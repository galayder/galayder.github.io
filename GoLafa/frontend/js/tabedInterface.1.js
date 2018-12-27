// FILTER PANEL EXPLAINED:
// js-tab - pass here an array of main filters (где','что','когда','с кем','на чем','стоимость')
//        - click each to get an array of filters for each tab

$(document).ready(function() {
    // declare variables based on js classes of html elements
    var tab = $('.js-tab');
        tabWrapper = $('.js-tab-wrapper');
        tabContent = $('.tab__content');
        outOfView = $('.is-out-of-view');

    tab.click( function() {
        // scroll opened filter panel into view
        window.scrollTo({
            top: 320,
            behavior: "smooth"
        });

        // make clicked tab current and make other tabs inactive
        $(this).addClass('is-current').siblings().removeClass('is-current');
        var mainFilters = <?php echo '["' . implode('", "', $tabArray) . '"]' ?>;
        
        // mark filter panel as activated and show content of each tab
        tabWrapper.addClass('is-active');
        tabContent.addClass('is-revealed');

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

    // FILTER COLLECTIONS
    var filter = $('.js-filter');
    var filterItem = $('.js-filter-item');
    var subFilter = $('.js-subfilter');
    var subFilterItem = $('.js-subfilter-item');
    var showFirstPortion = filterItem.slice(0, 9);

    // select filter logic (only one filter per click could be selected)
    filter.click( function() {
        $(this).addClass('is-selected').siblings().removeClass('is-selected');
        // show subfilter when main is selected
        $('.js-subfilter').show();
    });

    subFilterItem.click( function() {
        $(this).addClass('is-selected').siblings().removeClass('is-selected');
    });

    $('.js-link').click( function(event) {
        event.preventDefault();
    });
    $('.js-subfilter').hide();
    // if (filterItem.hasClass('is-selected')) {
    //     $('.js-subfilter').show();
    // }
    if (filterItem.length > 10) {
        $('.js-filter').slice(9).hide();
        $('.service-link--more').show();
        $('.service-link--more').click( function() {
            $('.js-filter').slice(9).show();
            $('.service-link--more').hide();
        })
    }


    // SPLIT LARGE NUMBERS in prices
    $('.js-charsplit').each(function() {
        var split = $(this).text();
        $(this).text(split.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1\u200A'));
    });
});