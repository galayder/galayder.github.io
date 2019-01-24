var tab = $(".js-tab");
	tabWrapper = $(".tab__wrapper");
	tabContent = $(".tab__content");
	outOfView = $(".is-out-of-view");
	filterBlock = $('.filter-block');
	filterCollection = $(".js-filter-collection");
	filterItem = $(".js-filter-item");
	filterItemSelected = $('.filter-item.is-selected')
	subFilters = $(".js-subfilter-collection");
	subFilterWrapper = $(".js-subfilter");
	subFilterItem = $(".js-subfilter-item");
	resetFilters = $(".js-reset");
	resetAllFilters = $(".js-reset-all").hide();
	sortAlphabet = $(".js-sort");
	sortPopular = $(".js-popular");

	placeHere = $("js-filters-selected");
	subFiltersToRemember = $(".js-subfilters-selected");

$('.filter-item--service').hide();
resetFilters.hide();
resetAllFilters.hide();

// TAB navigation
function me(mm){
	filterCollection.removeClass('is-current-filter-collection');
	subFilters.removeClass('is-current-filter-collection');
	tab.removeClass('is-current');
	$('#m'+mm).addClass('is-current');
	$('#v'+mm+'r').addClass('is-current-filter-collection');
	tabContent.show().addClass('is-revealed');
	$('.js-dimm').addClass('is-dimmed');
	if (!tabWrapper.hasClass("is-active")) {
		window.scrollTo({
			top: 320,
			behavior: "smooth"
		});
		tabWrapper.addClass('is-active');
	}
	$('#v33').removeClass('is-selected');
	$("#datepicker").hide();
	$('.date').hide();
	$('#m'+mm).each.length;
	
	// Hide more than 10 filters
	filterItem.removeClass('in-current-collection');
	// Scope of selected tab
	if (filterCollection.hasClass('is-current-filter-collection')) {
		$('.is-current-filter-collection').children('.filter-item').addClass('in-current-collection');
		if ($('.in-current-collection').length > 10) {
			$('.filter-item--service').show();
			$('.in-current-collection').slice(10).hide();
			$('.filter-item--service').click(function () {
				filterItem.slice(0).show();
				$('.filter-item--service').hide();
			})
		} else {
			$('.filter-item--service').hide();
		}	
	}
}

// SORTING MECHANICS
function sortDesc() {
	sortPopular.hide();
	sortAlphabet.show();
}
function switchToPopular() {
	sortAlphabet.hide()
	sortPopular.show();
}
sortAlphabet.click(switchToPopular);
sortPopular.click(sortDesc);

$('.title-block').show();
// Selecting subfilters
function u1(mm,vv,cc,nn,rr){
	document.getElementById('iv'+rr+'r').innerHTML = document.getElementById('v'+rr+vv).innerHTML;
	var split = $('#iv'+rr+'r').addClass('touch').text().trim();
	$('#iv'+rr+'r').text(split).append(','+'\u2000');
	// Scope of selected tab
	if (filterCollection.hasClass('is-current-filter-collection')) {
		$('.is-current-filter-collection').children('.filter-item').addClass('in-current-collection');
		$('#v'+rr+vv).addClass('is-selected');
		$('#v'+rr+vv).siblings().removeClass('is-selected');

		subFilters.removeClass('is-current-filter-collection');

		if ($('#v'+rr+vv).hasClass('is-selected')) {
			$('#n'+rr+vv+'r').addClass('is-current-filter-collection');
		};

		if (rr<2){
			vv=0;
		}
		if (rr==4){
			vv=0;
		}
		// show subfilters for filters in category
		$('#n'+rr+vv+'r').addClass('is-current-filter-collection');
		$("#datepicker").hide();
		$('.date').hide();
		
	}
	
	$('.title-block').hide();
	resetFilters.show();
	resetAllFilters.show();
}

function u2(mm,vv,cc,nn,rr){
	subFilterItem.removeClass('is-selected');
	$('#'+mm+rr+vv).addClass('is-selected');
	document.getElementById('in'+cc+'r').innerHTML=document.getElementById(mm+rr+vv).innerHTML;
	var split = $('#in'+cc+'r').addClass('touch').text().trim();
	$('#in'+cc+'r').text(split).append(', ');
}

// CLOSE FILTERS
function closeFilterPanel() {
	tabWrapper.removeClass("is-active");
	$(".js-dimm").removeClass("is-dimmed");
	tabContent.removeClass('is-revealed');
	tab.removeClass('is-current');
}

// Reset filter in scope
function resetFunc() {
	$(filterItem).removeClass('is-selected');
	subFilters.removeClass('is-current-filter-collection');
	subFilterItem.removeClass('is-selected');
	resetFilters.hide();
	$('.selected-filters__item').empty();
}
resetFilters.click(resetFunc);
// Reset all
function resetAllFunc() {
	$('.title-block').show();
	resetFunc();
	resetFilters.hide();
	resetAllFilters.hide();
	closeFilterPanel();
};
resetAllFilters.click(resetAllFunc);

$(".js-dimm, .js-close").click(closeFilterPanel);

// // Remove dimmed background and close filter panel when scrolled out of view
// window.onscroll = function () {
// 	if (outOfView.visible() === false) {
// 	tabContent.removeClass('is-revealed');
// 		tabWrapper.removeClass('is-active');
// 		$('.js-dimm').removeClass('is-dimmed');
// 	}
// }

// Datepicker functionallity
function showCalendar() {
	$("#datepicker").show();
	$("#datepicker").datepicker();
	$('.date').show();
};
$('#v33, #v34').click(showCalendar);

// Custom price block
tab.click(function() {
	$('.input-price').hide();
});
// $('.input-price').hide();
$('#m6').click(function() {
	$('.input-price').show();
});
$( "#v66" ).click(function() {
	$('input#priceMax').focus();
});
$( "input.input" ).focus(function() {
	$('#v66').addClass('is-selected').siblings().removeClass('is-selected');
});

// SPLIT LARGE NUMBERS in prices with custom narrow space 'u200A'
$('.js-charsplit').each(function() {
	var split = $(this).text();
	$(this).text(split.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1\u200A'));
});