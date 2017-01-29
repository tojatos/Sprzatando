/*jshint esversion: 6 */
var baseUrl = "http://localhost/Sprzatando/";
$(document).ajaxStart(function() {
 $(".loading").delay(1000).show(0); //jeżeli ajax się nie wykona po 1 sekundzie, pokaż loading
});

$(document).ajaxStop(function() {
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
  success: function(serverResponse, refresh) {
   showResponse(serverResponse, refresh);
  },
  error: function() {
   showResponse('Błąd związany z wysyłaniem danych.<br>Sprawdź swoje połączenie internetowe.');
  }
 });
}

function sendPostDataOnSubmit(handler, url, refresh = false) {

 $(document).on("submit", handler, function(e) { //$(document) na początku żeby działało dla dynamicznych elementów
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
$(function() {

 $('.accept-response').on("click", function() {
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
 sendPostDataOnSubmit('.login_form', 'Login/zaloguj', true);
 sendPostDataOnSubmit('.logout_form', 'Login/wyloguj', true);
 sendPostDataOnSubmit('.register_form', 'Register/zarejestruj');
 sendPostDataOnSubmit('.offer_form', 'Offers/addOffer');
 sendPostDataOnSubmit('.participate_form', 'Participants/participate');
 sendPostDataOnSubmit('.accept_participant_form', 'Participants/acceptParticipant', true);
});
