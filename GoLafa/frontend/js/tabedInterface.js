$(document).ready(function() {
    // Set variables for filter panel
    var tab = $('.js-tab');
        tabWrapper = $('.tab__wrapper');
        tabContent = $('.tab__content');
        outOfView = $('.is-out-of-view');
        filterCollection = $('.js-filter-collection');
        filterItem = $('.js-filter-item');
        subFilters = $('.js-subfilter-collection');
        subFilterWrapper = $('.js-subfilter');
        subFilterItem = $('.js-subfilter-item');
        resetFilters = $('.js-reset');
        resetAllFilters = $('.js-reset-all').hide();
        sortFIlters = $('.js-sort');

        filtersToRemember = $('.js-filters-selected');
        subFiltersToRemember = $('.js-subfilters-selected');

    // filterItem.text()[0].toUpperCase() + filterItem.text().substring(1);

    // Avoid 'bubbling' effect (to prevent a click of element which is under aimed element)
    $('.js-link').click( function(event) {
        event.preventDefault();
    });

    // SPLIT LARGE NUMBERS in prices with custom narrow space 'u200A'
    $('.js-charsplit').each(function() {
        var split = $(this).text();
        $(this).text(split.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1\u200A'));
    });

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
    function closeFilterPanel() {
        $('.js-dimm').removeClass('is-dimmed');
        tabContent.removeClass('is-revealed');
        tabWrapper.removeClass('is-active');
    };

    $('.js-dimm, .js-close').click(closeFilterPanel);

    // select filter logic (only one filter per click will be selected)
    subFilters.hide();
    filterItem.click( function() {
        $('.js-init-state').hide();
        resetAllFilters.show();
        subFilters.show();
        resetFilters.show();
        $(this).addClass('is-selected').siblings().removeClass('is-selected');
        // show subfilter when main is selected
        $('.js-subcollection').show();
    });
    // select subfilter logic
    subFilterItem.click( function() {
        $(this).addClass('is-selected').siblings().removeClass('is-selected');
    });

    
    // Hide subfilters by default
    $('.js-subcollection').hide();
    
    // Hide filters if more than 10 and show 'Show more' link
    if (filterItem.length > 10) {
        $('.js-filter-item').slice(9).hide();
        $('.service-link--more').show();
        $('.service-link--more').click( function() {
            $('.js-filter-item').slice(0).show();
            $('.service-link--more').hide();
        })
    }
    
    // SORT Alphabetically
    var mylist = $('.js-filter-collection');
    var listitems = mylist.children('.js-filter-item').get();
    listitems.sort(function(a, b) {
        return $(a).text().toUpperCase().localeCompare($(b).text().toUpperCase());
    });
    sortFIlters.click(function sortUnorderedList() {
        if (mylist.hasClass('unsorted')) {
            mylist.addClass('sorted').removeClass('unsorted');
            $.each(listitems, function(idx, itm) { 
                mylist.append(itm);
            });
        } else {
            listitems.reverse();
            $.each(listitems, function(idx, itm) { 
                mylist.append(itm);
            });
        }
    })

    // Remember selected filters 1st level
    function rememberFilter() {
        if ( filterItem.hasClass('is-selected') ) {
            var selectedFilter = $('.js-filter-item.is-selected').text();
            selectedFilter.replace(/\s/g, '');
            filtersToRemember.empty().append(selectedFilter);
        }
    };

    filterItem.click(rememberFilter);

    // Remember selected filters 2nd level
    function rememberSubFilter() {
        if ( subFilterItem.hasClass('is-selected') ) {
            var selectedFilter = $('.js-subfilter-item.is-selected').text();
            selectedFilter.replace(/\s/g, '');
            subFiltersToRemember.empty().append(', ' + selectedFilter);
        }
    };

    subFilterItem.click(rememberSubFilter);
    
    // reset filters
    function resetFunc() {
        if (filterItem.hasClass('is-selected')) {
            $(filterItem).removeClass('is-selected');
            $(subFilterItem).removeClass('is-selected');
        }
        subFilters.hide();
        resetFilters.hide();
        resetAllFilters.hide();
        filtersToRemember.empty();
        subFiltersToRemember.empty();
        $('.js-init-state').show();
        return;
    };

    // reset all filters
    function resetAllFunc() {
        resetFunc();
        resetAllFilters.hide();
        $('.js-init-state').show();
        closeFilterPanel();
    };
    
    resetFilters.click(resetFunc);
    resetAllFilters.click(resetAllFunc);
    
});