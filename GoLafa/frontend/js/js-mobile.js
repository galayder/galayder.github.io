$(document).ready(function() {
// SELECT FILTER
    var selectableFilter = $('.js-selectable');
    selectableFilter.click( function () {
        $(this).addClass('is-selected').siblings().removeClass('is-selected');
    });
//     // Set variables for filter panel
//     var filter = $('.js-filter');
//         filterCollection = $('.filter-block__inner')
//         subFilter = $('.js-sub-filter');

//     filter.click( function() {
//         // make clicked tab current and make other tabs inactive
//         if (filter.hasClass('is-current')) {
//             $(this).removeClass('is-current');
//             subFilter.hide();
//         } else {
//             $(this).addClass('is-current').siblings().removeClass('is-current');
//             subFilter.show();
//         }
//     });

//     // close filter panel with close button and clicking dimmed background
//     $('.js-dimm, .js-close').click( function() {
//         $('.js-dimm').removeClass('is-dimmed');
//         tabContent.removeClass('is-revealed');
//         tabWrapper.removeClass('is-active');
//     });

//     // select filter logic (only one filter per click will be selected)
    
//     // select subfilter logic
//     // subFilterItem.click( function() {
//     //     $(this).addClass('is-selected').siblings().removeClass('is-selected');
//     // });

//     // Avoid 'bubbling' effect (to prevent a click of element which is under aimed element)
//     $('.js-link').click( function(event) {
//         event.preventDefault();
//     });


//     // SPLIT LARGE NUMBERS in prices with custom narrow space 'u200A'
//     $('.js-charsplit').each(function() {
//         var split = $(this).text();
//         $(this).text(split.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1\u200A'));
//     });
});