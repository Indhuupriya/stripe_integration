# 💳 Laravel Stripe Integration (Laravel Cashier)

A simple Laravel application built as part of the **Technical Assessment**.  
This project demonstrates how to list products, display product details, and process payments using **Stripe** with **Laravel Cashier**.

## 🚀 Features

- Product listing (Grid view)
- Product details page
- Stripe payment integration (Laravel Cashier)
- Secure checkout flow
- Database migration & seeding
- Authentication integrated (Laravel Breeze / Jetstream)

## 🛠️ Tech Stack

- **Backend:** PHP 8.0+, Laravel 10  
- **Database:** MySQL  
- **Payment Gateway:** Stripe (Laravel Cashier)  
- **Frontend:** Blade Templates, Bootstrap  
- **Package Manager:** Composer & NPM

### Package Installation steps
```bash
### 1️. Clone Repository
git clone https://github.com/Indhuupriya/stripe_integration.git
cd stripe_integration

### 2️. Install PHP Dependencies
composer install

### 3️. Generate Application Key
Rename .env.example to .env and update the following:
php artisan key:generate

### 4️. Configure Environment File
APP_NAME="Laravel Stripe Integration"
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stripe_integration
DB_USERNAME=root
DB_PASSWORD=

STRIPE_KEY=pk_test_xxxxxxxxxxxxxxxxxxxxxx
STRIPE_SECRET=sk_test_xxxxxxxxxxxxxxxxxxxxxx
 Note: You can create your test API keys at
https://dashboard.stripe.com/test/apikeys

### 5. Run Database Migrations and Seeders
php artisan migrate
php artisan db:seed

### 6️. Install Node Dependencies
npm install
npm run dev

### 7️. Start the Development Server
php artisan serve
Visit → http://127.0.0.1:8000

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

