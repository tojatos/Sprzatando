/*jshint esversion: 6 */
function start_filter($offers) {
	var min_price = $('.filter_offers :input[name="min_price"]').val();
	var max_price = $('.filter_offers :input[name="max_price"]').val();
	var $rooms = $('.filter_offers :input[name="rooms[]"]');
	var $todos = $('.filter_offers :input[name="todos[]"]');
	var checked = [];
	var c_rooms = getChecked($rooms);
	var c_todos = getChecked($todos);
	checked = checked.concat(c_rooms);
	checked = checked.concat(c_todos);
	if (jQuery.isEmptyObject(min_price)) {
		min_price = 0;
	}
	if (jQuery.isEmptyObject(max_price)) {
		max_price = 0;
	}
	filter(min_price, max_price, checked, $offers);
}

function getChecked(array) {
	var checked = [];
	array.each(function() {
		if ($(this).is(':checked')) {
			checked.push($(this).val());
		}
	});
	return checked;
}

function filter(min_price, max_price, checked, $offers) {
	var valid_offers = [];
		$offers.each(function() {

			try {
			var offer = $(this);
			var price = offer.data('price');
			if (min_price > price) {
				throw 0;
			}
			if (max_price < price && max_price !== 0) {
				throw 0;
			}
			//console.log(jQuery.isEmptyObject(checked));
			if (!jQuery.isEmptyObject(checked)) {
				for (var i = 0; i < checked.length; i++) {
					console.log(checked[i], offer.data(checked[i]));
					if (offer.data(checked[i]) === 0) {
						throw 0;
					}
				}
			}
			valid_offers.push(offer);
		} catch (e) {}
		});
	$('.offers_container').html(valid_offers);

}
$(function() {
	var $offers = $('.offers_container > .offer');
	$('.filter_button').on("click", function() {
		start_filter($offers);
	});
});
