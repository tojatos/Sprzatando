/*jshint esversion: 6 */
var baseUrl = "http://localhost/Sprzatando/";
$(document).ajaxStart(function () {
	$(".loading").delay(1000).show(0); //jeżeli ajax się nie wykona po 1 sekundzie, pokaż loading
});

$(document).ajaxStop(function () {
	$(".loading").hide(0);
});

function showResponse(response) {
	$('.blur').show();
	$('.response').show();
	$('.response > .text').html(response);
}

function hideResponse() {
	$('.blur').hide();
	$('.response').hide();
}

function sendPostData(data, url) {
	$.ajax({
		url: baseUrl + url,
		type: 'POST',
		data: data,
		success: function (serverResponse, refresh) {
			showResponse(serverResponse, refresh);
		},
		error: function () {
			showResponse('Błąd związany z wysyłaniem danych.<br>Sprawdź swoje połączenie internetowe.');
		}
	});
}

function sendPostDataOnSubmit(handler, url, refresh = false) {

	$(document).on("submit", handler, function (e) { //$(document) na początku żeby działało dla dynamicznych elementów
		e.preventDefault();
		var data = $(this).serialize();
		sendPostData(data, url);
		if (refresh) {
			$('.accept-response').addClass("refresh");
		} else {
			$('.accept-response').removeClass("refresh");
		}
	});
}
$(function () {

	$('.accept-response').on("click", function () {
		if ($(this).hasClass('refresh')) {
			location.reload();
		} else {
			hideResponse();
		}
	});
	// $('.offers_container').on('click', function () {
	//   alert('test');
	//   $.ajax({
	//    url: baseUrl + 'Offers/showOffers',
	//    type: 'POST',
	//    data: data,
	//    success: function(serverResponse) {
	//     $('.offers_container').text(serverResponse);
	//    },
	//    error: function() {
	//     $('.offers_container').text('Błąd związany z wysyłaniem danych.<br>Sprawdź swoje połączenie internetowe.');
	//    }
	//   });
	// });
	sendPostDataOnSubmit('.login_form', 'Login/ajax_login', true);
	sendPostDataOnSubmit('.logout_form', 'Login/ajax_logout', true);
	sendPostDataOnSubmit('.register_form', 'Register/ajax_register');
	sendPostDataOnSubmit('.offer_form', 'Offers/ajax_addOffer');
	sendPostDataOnSubmit('.participate_form', 'Participants/ajax_participate');
	sendPostDataOnSubmit('.accept_participant_form', 'Participants/ajax_acceptParticipant', true);
	sendPostDataOnSubmit('.user_message_form', 'Users/ajax_changeUserMessage', true);
	sendPostDataOnSubmit('.confirm_form', 'Participants/ajax_confirmParticipation', true);
	sendPostDataOnSubmit('.finish_offer_form', 'Participants/ajax_finishOffer', true);
	sendPostDataOnSubmit('.opinion_form', 'Opinions/ajax_addOpinion', true);
	sendPostDataOnSubmit('.forgotten_password_form', 'Users/ajax_forgottenPassword', true);
	sendPostDataOnSubmit('.change_password_form', 'Users/ajax_changePassword', true);
});
