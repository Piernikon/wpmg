# Motyw WordPress - Modelarnia Gdańska

## Opis

Profesjonalny motyw WordPress stworzony specjalnie dla Modelarni Gdańskiej. Zawiera wszystkie funkcjonalności niezbędne dla firmy zajmującej się drukiem 3D i modelowaniem.

## Funkcjonalności

### 🎨 Design & UX
- **Dark/Light Mode** - Automatyczne wykrywanie preferencji systemowych + przełącznik
- **Responsive Design** - Mobile-first approach, działa na wszystkich urządzeniach
- **WCAG 2.1 AA Compliance** - Pełna dostępność dla osób niepełnosprawnych
- **Modern UI** - Nowoczesny interfejs z płynnymi animacjami

### 🔧 Techniczne
- **ACF Pro Integration** - Flexible Content Fields dla łatwego zarządzania treścią
- **Gravity Forms Ready** - Gotowa integracja z formularzami kontaktowymi
- **Google Drive Upload** - Automatyczne przesyłanie plików 3D do chmury
- **HTTP Security Headers** - Pełne zabezpieczenia (HSTS, CSP, etc.)
- **SEO Optimized** - Schema.org, meta tags, performance

### 📁 Obsługa plików 3D
- **Obsługiwane formaty**: STL, OBJ, ZIP, RAR, 3DS, FBX
- **Walidacja plików** - Automatyczna kontrola rozmiaru i formatu
- **Drag & Drop Upload** - Intuicyjny upload plików
- **Cloud Storage** - Integracja z Google Drive

### 🛡️ Bezpieczeństwo & GDPR
- **HTTP Security Headers** - HSTS, CSP, X-Frame-Options
- **GDPR Compliance** - Banner cookies, polityka prywatności
- **File Upload Security** - Walidacja i sanityzacja plików
- **SQL Injection Protection** - Zabezpieczenia formularzy

## Wymagania

- WordPress 6.0+
- PHP 8.0+
- MySQL 8.0+
- ACF Pro (licencja wymagana)
- Gravity Forms Pro (licencja wymagana)

## Instalacja

1. **Pobierz motyw** - Rozpakuj archiwum ZIP
2. **Upload przez WordPress Admin**:
   - Przejdź do `Wygląd → Motywy`
   - Kliknij `Dodaj nowy → Wyślij motyw`
   - Wybierz plik ZIP i zainstaluj
   - Aktywuj motyw

3. **Wymagane wtyczki**:
   ```
   - Advanced Custom Fields Pro
   - Gravity Forms Pro  
   - Gravity Forms Google Drive Integration
   - Headers Security Advanced (opcjonalne)
   ```

4. **Import pól ACF**:
   - Przejdź do `Custom Fields → Tools`
   - Wybierz `Import Field Groups`
   - Zaimportuj plik `acf-export.json`

5. **Konfiguracja Gravity Forms**:
   - Utwórz formularz kontaktowy z polami:
     - Imię i nazwisko
     - Email
     - Telefon
     - Opis projektu  
     - Upload plików (STL/OBJ/ZIP)
   - Skonfiguruj Google Drive Integration

## Konfiguracja

### Ustawienia motywu (Customizer)
- `Wygląd → Dostosuj → Dane kontaktowe`
- Numer telefonu
- Adres email  
- Adres firmy

### Strona główna
- Utwórz stronę "Strona główna"
- Ustaw jako stronę główną w `Ustawienia → Czytanie`
- Dodaj sekcje przez ACF Flexible Content:
  - Hero Banner
  - Sekcja O nas
  - Siatka usługi
  - FAQ

### Menu nawigacyjne
- `Wygląd → Menu`
- Utwórz menu i przypisz do lokalizacji "Primary Menu"

### Konfiguracja PHP (wymagane dla uploadu plików 3D)
```php
upload_max_filesize = 100MB
max_execution_time = 300
post_max_size = 120MB
memory_limit = 256MB
```

## Personalizacja

### Kolory (CSS Variables)
```css
:root {
  --color-primary: #2563eb;
  --color-primary-dark: #1d4ed8;
  --color-secondary: #64748b;
  --color-accent: #f59e0b;
}
```

### Dodawanie nowych sekcji ACF
1. Edytuj plik `functions.php`
2. Dodaj nowy layout w `modelarnia_acf_fields()`
3. Utwórz odpowiedni template part w `template-parts/`

### Customowy CSS
- Dodaj style w `Wygląd → Dostosuj → Dodatkowy CSS`
- Lub edytuj plik `assets/css/theme.css`

## Wsparcie & Aktualizacje

### Rozwiązywanie problemów
1. **Motyw nie wyświetla się poprawnie**
   - Sprawdź czy ACF Pro jest aktywny
   - Zweryfikuj importowanie pól ACF

2. **Upload plików nie działa**
   - Sprawdź parametry PHP
   - Zweryfikuj uprawnienia folderów

3. **Dark mode nie działać**
   - Wyczyść cache przeglądarki
   - Sprawdź JavaScript w konsoli

### Performance  
- Włącz cache Redis (jeśli dostępne)
- Użyj WebP dla obrazów
- Minifikacja CSS/JS w produkcji

## Licencja

Ten motyw jest licencjonowany na potrzeby Modelarni Gdańskiej. 

## Changelog

### v1.0.0
- Pierwsza wersja motywu
- Wszystkie podstawowe funkcjonalności
- WCAG AA compliance
- Dark mode
- Integracja z ACF Pro i Gravity Forms
- HTTP Security Headers
- GDPR compliance
