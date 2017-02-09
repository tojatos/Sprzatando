#Sprzątando

Projekt mający na celu zwiększenie umiejętności z zakresu Web Development'u.
Technologie wykorzystane:
- CodeIgniter
<!--- AngularJS -->
- Sass

#Założenia systemu

Zgłaszający - użytkownik, który stworzył ofertę

Wykonawca - użytkownik, który zgłosił się do przyjęcia oferty

1. System zawiera formularz rejestracji
  - Rejestracja wymaga potwierdzenia i aktywacji poprzez email
  - Istnieje możliwość przypomnienia hasła poprzez link wysyłany na email
  - Formularz rejestracji zawiera pola:
    - e-mail `type: e-mail, max-length: 50, UNIQUE`
    - login `type: text, max-length: 50, UNIQUE`
    - hasło `type: text, max-length: 50`
    - potwierdzenie hasła `type: text, max-length: 50`
      - potwierdzenie hasła musi być takie same jak hasło
  - Wszystkie pola są obowiązkowe.

2. System zawiera formularz logowania
  - Formularz logowania zawiera pola:
    - login `type: login, max-length: 50`
    - hasło `type: text, max-length: 50`
  - Wszystkie pola są obowiązkowe.

3. System zawiera formularz dodania oferty:
  - Formularz dodania oferty zawiera pola:
    - data `type: date, max-length: 50`
    - czas `type: time, max-length: 50`
    - numer telefonu `type: number, max-length: 50`
    - e-mail kontaktowy `type: text, max-length: 50`
    - miejsce `type: text, max-length: 255`
    - cena (w zł) `type: text, max-length: 50`
    - pokoje do sprzątania (checkbox'y) `type: array`
      - kuchnia
      - łazienka
      - salon
      - sypialnia
    - czynności do wykonania (checkbox'y) `type: array`
      - umycie samochodu
      - umycie okien
  - Oferta musi zawierać minimum jedną opcję wybraną przez Zlecającego.
  - Wszystkie pola są obowiązkowe.

4. System zawiera stronę z listą wystawionych ofert
  - Strona ta jest widoczna tylko dla zalogowanych użytkowników
  - Widoczne są tylko oferty o czasie wykonania późniejszym niż czas przeglądania
  - To miejsce w systemie ma umożliwiać filtrowania wpisów:
    - po cenie (dwa pola „od” i „do”)
    - klikane dla każdego pokoju do sprzątania i czynności do wykonania
      - jeśli użytkownik zaznaczy w filtrowaniu np. checkboksem „[v] mycie samochodu”, wyświetlamy oferty zawierające m.in. tą pozycję.
      - jeśli nic nie jest zaznaczone, zachowanie jest, jakby zaznaczone było wszystko

5. Każda oferta ma swoją stronę
  - Strona ta jest widoczna tylko dla zalogowanych użytkowników
  - Na tej stronie znajdują się informacje danej oferty:
    - czas
    - miejsce
    - cena
    - e-mail
    - numer telefonu
    - użytkownik, który wystawił ofertę
    - pokoje do sprzątania
    - czynności do wykonania
  - Na tej stronie użytkownik, który nie wystawił oferty, może się do niej zgłosić
    - Formularz zgłoszenia zawiera pola:
      - proponowaną cenę (w zł) `type: number, max-length: 50`
      - opis `type: text, max-length: 255`
    - Nie można zgłosić się do nieaktualnej oferty
  - Na tej stronie użytkownik, który wystawił ofertę, może przejść do listy Wykonawców

6. Każda oferta ma stronę z listą Wykonawców
  - Strona ta jest widoczna tylko dla Zgłaszającego

7. Zgłaszający może zaakceptować dowolną ilość Wykonawców

8. Wykonawca może potwierdzić podjęcie się oferty po zaakceptowaniu
  - po potwierdzeniu podjęcia się oferty:
    - nie można zmienić Wykonawcy, zostaje tylko ten, który potwierdził podjęcie się oferty
    - oferta znika z listy ofert

9. Po wykonaniu zadania Zgłaszający może potwierdzić wykonanie zadania
  - po potwierdzeniu wykonania zadania Zgłaszający i Wykonawca mogą sobie wystawić opinię

10. Każdy użytkownik ma swoją stronę
  - Strona ta jest widoczna tylko dla zalogowanych użytkowników
  - Na tej stronie są widoczne opinie i średnia ocen z nich
  - Na tej stronie jest widoczny opis ustawiony przez użytkownika
  - Na swojej stronie użytkownik ma możliwość ustawić własny opis
    - Formularz opisu zawiera pola:
      - opis `type: text, max-length: 255`
  - Na swojej stronie użytkownik widzi wystawione przez siebie oferty, oraz oferty, do których się zgłosił

11. W systemie istnieje widok, który wyświetla ranking wykonawców bazując na średniej ocen.

#Instalacja

##Baza danych do wyeksportowania znajduje się w pliku `sprzatando.sql`

##Po sklonowaniu repozytorium należy zmienić niektóre dane:
1. `application/config/config.php`
  - zmiana zawartości `$config['base_url']` na główny adres strony
2. `public/js/main.php`
  - zmiana zawartości `var baseUrl` na główny adres strony
2. `application/config/database.php`
  - zmiana zawartości `$db['default']` na dane swojej bazy danych
4. `application/config/constants.php`
  - zmiana zawartości `'HASH_KEY'` na inny tekst soli
