$(document).ready(function() {
	var tab = $(".js-tab");
		tabWrapper = $(".tab__wrapper");
		tabContent = $(".tab__content");
		outOfView = $(".is-out-of-view");
		filterBlock = $('.filter__block');
		filterCollection = $(".js-filter-collection");
		filterItem = $(".filter-item");
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

	// --------------------------------------------------------------------------------------------	
	// OPEN TAB -----------------------------------------------------------------------------------	
	function tabOpen(dataTab) {
		dataTab = $(this).attr("data-tab");
		if (!tabWrapper.hasClass("is-active")) {
			window.scrollTo({
				top: 320,
				behavior: "smooth"
			});
		}		

    	// make clicked tab current and make other tabs inactive
		tab.removeClass("is-current");
		$(this).addClass("is-current");
		
		// Show firstLevelFilters
		$("nav ul").hide().removeClass('is-current-filter-collection');
		$("#v" + dataTab + "r").show().addClass('is-current-filter-collection');

		tabWrapper.addClass('is-current');
		tabContent.show();

		const currentBlock = $('.filter__block.is-current-block');

		// if (currentBlock.hasClass('is-current-block')) {
		// 	const filterInCurrentBlock = filterItem.addClass('in-current-block')
		// 	filterInCurrentBlock.slice(9).hide();
		// 	$('.service-link--more').show();
		// 	$('.service-link--more').click(function () {
		// 		filterInCurrentBlock.slice(0).show();
		// 		$('.service-link--more').hide();
		// 	})
		// }

		filterCollection.addClass('unsorted');

		// activate dimmed background when filter is opened
		$('.js-dimm').addClass('is-dimmed');
	};
	tab.click(tabOpen);

	// --------------------------------------------------------------------------------------------
	// Select and Remember flters -----------------------------------------------------------------

	
	function filterSelection(dataFilter) {
		// ["v","<?php echo $n; ?>","mm1","v<?php echo $m; ?>r","<?php echo $m; ?>"]
		$('.js-init-state').hide();
		resetAllFilters.show();
		// // subFilters.show();
		resetFilters.show();
		$(this).addClass('is-selected').siblings().removeClass('is-selected');

		dataFilter = $('.filter-item').data('filter');
		mm = dataFilter[0];
		vv = dataFilter[1];
		cc = dataFilter[2];
		nn = dataFilter[3];
		rr = dataFilter[4];
		console.log(dataFilter);
		
        console.log ('iv'+rr+'r');
		filt = $('#iv'+rr+'r').html();
		suFfilt = $('#v'+rr+vv).html();
		filt = suFfilt;
    
        $('#n2'+rr+'r').hide();
        if (rr<2){
        vv=0;
        }
        if (rr==4){
		console.log('hh');
        vv=0;
        }
        $('#n'+rr+vv+'r').slideDown(500);

	};

	function filterRemember() {

		for (let i = 0; i < filterCollection.length; i++) {
			var currentFilterArray = filterCollection[i];
			currentFilterArray.length;
		}
		// var aim = filterCollection[0].filterItem;
		// aim.text().replace(/\s/g, '');
		// filterItemSelected.append($(this));
		// console.log(aim);
		// if (filterItemSelected) {
		// }
	}
	filterItem.click(filterSelection);
	filterItem.click(filterRemember);



	// function u2(mm,vv,cc,nn,rr){
    //     $('span li a').css('background', 'white');
    //     $('span li a').css('color', 'black');

    //     $('#'+mm+rr+vv).css('background', '#9933cc');
    //     $('#'+mm+rr+vv).css('color', 'white');
    //     console.log('in'+rr+'r');
    //     $('in'+cc+'r').html() = $(mm+rr+vv).html();
    // }

	function secondLevel(dataFilter) {
		dataFilter = $('.filter-item').data('filter');
		console.log(dataFilter);
		document.getElementById("iv" + dataFilter[2] + "r").innerHTML = document.getElementById(dataFilter[0][2][4]).innerHTML;
		$("span ul").hide();
		if (rr < 2) {vv = 0;}
		if (rr == 4) {vv = 0;}
		$("#n" + rr + vv + "r").show();
	};
	filterItem.click(u2);


	// --------------------------------------------------------------------------------------------
	// Select subfilter logic ---------------------------------------------------------------------
	function subFilterSelection() {
		$(this).addClass('is-selected').siblings().removeClass('is-selected');
	};
		
	// close filter panel with close button and clicking dimmed background
	function closeFilterPanel() {
		tabWrapper.removeClass("is-current");
		$(".js-dimm").removeClass("is-dimmed");
		tabContent.hide();
		tab.removeClass('is-current');
	}
	$(".js-dimm, .js-close").click(closeFilterPanel);

	// --------------------------------------------------------------------------------------------
	// Reset all filters --------------------------------------------------------------------------
	function resetFunc() {
		$('.js-init-state').show();
		tab.removeClass('is-current');
		$(filterItem).removeClass('is-selected');
		subFilters.hide();
		resetFilters.hide();
		tabContent.hide();
		resetAllFilters.hide();
		// filtersToRemember.empty();
		subFiltersToRemember.empty();
	}
	function resetAllFunc() {
		closeFilterPanel();
		resetFunc();
		$('.js-init-state').show();
		resetAllFilters.hide();
	};
	resetAllFilters.click(resetAllFunc);

	// --------------------------------------------------------------------------------------------
	// SORT Alphabetically/Popular ----------------------------------------------------------------
	function sortDesc() {
		sortPopular.hide();
		sortAlphabet.show();
	// 	if (filterBlock.hasClass('is-current-filter-collection')) {
	// 		for (let i = 0; i < filterCollection.children().length; i++) {
	// 			// dataSort = $(filterItem[i]).data("sort");
	// 			// filterInSet = $("#v" + dataSort[1] + dataSort[2]);

	// 			var filterInSet = $('#v1' + i);

	// 			filterInSet.sort(function(a, b) {
	// 				return $(a).text().toUpperCase().localeCompare($(b).text().toUpperCase());
	// 			});
				
	// 			$.each(filterInSet, function(idx, itm) { 
	// 				filterCollection.append(itm);
	// 			});
	// 			// if (mylist.hasClass('unsorted')) {
	// 			// 	mylist.addClass('sorted').removeClass('unsorted');
	// 			// } else {
	// 			// 	filterInSet.reverse();
	// 			// 	$.each(filterInSet, function(idx, itm) { 
	// 			// 		filterInSet.append(itm);
	// 			// 	});
	// 			// }
	// 		}
	// 	}
	}
	function switchToPopular() {
		sortAlphabet.hide()
		sortPopular.show();
	}
	sortAlphabet.click(switchToPopular);
	sortPopular.click(sortDesc);


	// remove dimmed background and close filter panel when scrolled out of view
	window.onscroll = function () {
		if ($('.js-hide-trigger').visible() === false) {
			tabContent.removeClass('is-revealed');
			tabWrapper.removeClass('is-current');
			$('.js-dimm').removeClass('is-dimmed');
		}
	}

	// SPLIT LARGE NUMBERS in prices with custom narrow space 'u200A'
	$('.js-charsplit').each(function() {
		var split = $(this).text();
		$(this).text(split.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1\u200A'));
	});
});
