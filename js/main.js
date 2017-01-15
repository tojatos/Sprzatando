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

 sendPostDataOnSubmit('.login_form', 'Login/zaloguj', true);
 sendPostDataOnSubmit('.logout_form', 'Login/wyloguj', true);
 sendPostDataOnSubmit('.register_form', 'Register/zarejestruj');
});
