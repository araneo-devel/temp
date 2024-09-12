# Shopify Orders Importer

## Project Overview

This **Laravel** project is designed to import customers and orders from the **Shopify API** and display a list of orders with a total price greater than $100. It supports AJAX pagination without page reloads and utilizes **Nexaris** components for the user interface.

## Features

- Import customer and order data from Shopify API.
- AJAX pagination with 5 orders per page.
- Display orders filtered by total price greater than $100.
- Group orders by `financial_status`.
- Button to clear the database and re-import data.

## Requirements

- PHP >= 8.2
- Composer
- MySQL

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/Xsaven/test2.git
cd test2
```

### 2. Install dependencies
```bash
composer install
```

### 3. Set up the `.env` file
Create a `.env` file from the provided `.env.example`:
```bash
cp .env.example .env
```
Update the .env file with your database and Shopify API credentials:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

SHOPIFY_LOGIN=your_api_key
SHOPIFY_PASSWORD=your_api_password
SHOPIFY_URL=https://your-shop.myshopify.com/admin/orders.json
```

### 4. Generate the application key
```bash
php artisan key:generate
```

### 5. Run migrations
```bash
php artisan migrate
```

### 6. Start the development server
```bash
php artisan serve
```

## Usage

1. Open the application in your browser at http://localhost:8000.
2. Click the "Import Data" button to clear the existing database and import data from Shopify.
3. View and interact with the list of orders, which is paginated and sorted by financial_status.

## Testing
You can run tests using:
```bash
php artisan test
```

## License
This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

### Key Sections:
- **Project Overview**: Brief description of what the project does.
- **Features**: List of key functionalities.
- **Requirements**: Software and tools needed to run the project.
- **Installation**: Step-by-step instructions to get the project up and running.
- **Usage**: Basic instructions on how to use the application.
- **Testing**: How to run tests.
- **License**: Information about the project's license.

Feel free to adjust the repository URL, database credentials, and any other specifics to fit your project's requirements.
