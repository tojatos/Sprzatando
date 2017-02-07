#Sprzątando

Projekt mający na celu zwiększenie umiejętności z zakresu Web Development'u.
Technologie wykorzystane:
- CodeIgniter
- AngularJS
- Sass

#Założenia systemu

Opis: Platforma łącząca ludzi posiadający srogie hacjendy z ludźmi mającymi ręce i minimum zdolności manualnych, żeby posprzątać.

1. Użytkownik zakłada konto. Rejestracja wymaga potwierdzenia i aktywacji poprzez email. Użytkownik ma mieć możliwość przypomnienia (ustawienia) hasła – poprzez link wysyłany na email, prowadzący do właściwego ekrany w systemie.

2.  Użytkownik może dodać ofertę (Zgłaszający), użytkownik może zgłosić się do wykonania oferty (Wykonawca). Zgłaszający nie może być jednocześnie Wykonawcą swojej oferty.

3. Oferta ma zawierać informacje:

   a) Miejsce i czas planowanego sprzątania (zawsze pojedyncze zdarzenie)

   b) Telefon i email kontaktowy

   c) pokoje do sprzątania ( kuchnia, łazienka, salon, sypialnia) – do zaznaczenia np. checkbboksem

   d) czynności do wykonania – umycie samochodu, umycie okien – do zaznaczenia np. checkboksem

   e) cenę

   f) oferta musi zawierać minimum jedną opcję wybraną przez Zlecającego. Wszystkie pola są obowiązkowe.

4. System zawiera stroną-listę wystawionych ofert
  - Strona ta jest widoczna tylko dla zalogowanych użytkowników
  - widoczne są tylko oferty o czasie wykonania późniejszym niż czas przeglądania
  - To miejsce w systemie ma umożliwiać filtrowania wpisów: po cenie (dwa pola „od” i „do”) oraz klikane dla każdej z cech w pkt. 3.c. oraz 3.d. – jeśli użytkownik zaznaczy w filtrowaniu np. checkboksem „[v] mycie samochodu”, wyświetlamy oferty zawierające m.in. tą pozycję.

  b) Można zaznaczać dowolną liczbę pozycji z 3.c. i 3.d. celem filtrowania listy.
5. Każda oferta ma swoją stronę
  - Strona ta jest widoczna tylko dla zalogowanych użytkowników
  - Na tej stronie znajdują się informacje danej oferty:
    - czas
    - miejsce
    - cena
    - numer telefonu
    - użytkownik, który wystawił ofertę
    - pokoje do sprzątania
    - czynności do wykonania
  - Na tej stronie użytkownik, który nie wystawił oferty, może się do niej zgłosić
    - Formularz zgłoszenia zawiera pola:
      - proponowaną cenę (w zł) `type: number, max-length: 10`
      - opis `type: text, max-length: 1000`
5. Zlecający dla każdej wystawionej oferty widzi listę zgłoszonych wykonawców.

   a) Wybiera jednego z nich

  b) Po wybraniu Wykonawcy i potwierdzeniu przez Wykonawcę podjęcia się pracy (patrz 6.a.), pojawia się opcja „Potwierdź wykonanie zadania” – w rzeczywistym świecie Zlecający uaktywni ją  dopiero po wykonaniu czynności sprzątania

  c) Zlecający może wystawić opinię o Wykonawcy (ocena 1…6, krótki opis tekstowy)

6. Wykonawca widzi listę ofert do, których się zgłosił.

  a) Wykonawca widzi informacją o wybraniu go przez Zgłaszającego oraz ma możliwość potwierdzenia

  b) Wykonawca widzi listę opinii o osobie.

7. W systemie istnieje widok, który wyświetla ranking wykonawców bazując na średniej ocen. Wyświetla także opinie tekstowe

#Instalacja

##Po sklonowaniu repozytorium należy zmienić niektóre dane:
1. application/config/config.php
  - zmiana zawartości ``$config['base_url']`` na główny adres strony
2. public/js/main.php
  - zmiana zawartości ``var baseUrl`` na główny adres strony
2. application/config/database.php
  - zmiana zawartości ``$db['default']`` na dane swojej bazy danych
4. application/config/constants.php
  - zmiana zawartości ``'HASH_KEY'`` na inny tekst soli
