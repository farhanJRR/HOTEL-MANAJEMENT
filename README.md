# StayView360 — Hotel Reservation & Virtual Tour

StayView360 is a hotel reservation web application developed as a portfolio project using Laravel. It combines room information, booking management, and an interactive 360° virtual tour experience.

## Features

### Guest Experience
- Hotel landing page with room information and pricing.
- Room reservation form with input validation.
- Room availability checking based on selected dates.
- Booking status lookup using booking code and phone number.
- Interactive 360° virtual tour using Pannellum.

### Admin Dashboard
- Admin authentication.
- Reservation and booking status management.
- Room assignment and room changes.
- Payment status management and payment receipts.
- Guest check-in and check-out management.
- Room inventory management.
- Booking calendar and reports.
- Revenue summary and report export.
- Admin notifications.

## Tech Stack

- **Backend:** PHP, Laravel
- **Frontend:** Blade, HTML, CSS, JavaScript
- **Database:** SQLite or another supported database configured for the environment
- **Virtual Tour:** Pannellum.js
- **Development Tools:** Composer, Node.js, npm, Git

## Requirements

- PHP 8.3 or newer
- Composer
- Node.js and npm
- A database supported by the project's Laravel configuration

## Local Installation

1. Clone this repository:

   ```bash
   git clone https://github.com/USERNAME/stayview360.git
   cd stayview360
   ```

   Replace `USERNAME` with your GitHub username.

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Create the local environment file:

   ```powershell
   Copy-Item .env.example .env
   ```

4. Configure the database settings in `.env`. Create the database if needed, then run:

   ```bash
   php artisan key:generate
   php artisan migrate
   ```

5. Install frontend dependencies and build assets:

   ```bash
   npm install
   npm run build
   ```

6. Start the development server:

   ```bash
   php artisan serve
   ```

7. Open the local website at:

   `http://127.0.0.1:8000`

## Running Tests

Run the automated test suite with:

```bash
php artisan test
```

The project includes tests for the home page and room availability scenarios.

## Security Notes

- Keep `.env` out of version control.
- Never commit real passwords, API keys, or private guest information.
- Before production deployment, configure HTTPS, production environment variables, database access, and appropriate application security settings.
- This is a portfolio project and requires further production validation before being used for real hotel operations.

## Project Status

Portfolio development and testing.

## Author

Developed by Muhammad Farhan.