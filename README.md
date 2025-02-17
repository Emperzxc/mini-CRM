# **Mini CRM**
## Project Overview

Mini CRM is a mini Customer Relationship Management system built using Laravel 11 and MongoDB. This application is designed to manage companies and their employees efficiently, with features including CRUD operations, multi-language support, and email notifications.

## Table of contents

* Installation
* Configuration
* Usage
* Features
* License

## Installation
### Prerequisites

* PHP 8.1 or higher
* Composer
* MongoDB
* Admin LTE

### Steps
1. Clone the Repository
   ```bash
   git clone https://github.com/Emperzxc/mini-CRM
   cd mini-crm
   ```

2. Install Dependencies
   ```bash
   composer install
   ```
   Incase composer install produce errors. Try running this command:
             ```
                sudo pecl install mongodb
             ```

   ```bash
   composer require mongodb/laravel-mongodb
   ```
            
   Require Admin LTE package using composer.
   ```bash
   composer require jeroennoten/laravel-adminlte
   ```
    
    Install the required package resources using the next command.

    ```bash
    php artisan adminlte:install
    ```
3. Set Up Environment File

   Copy the example environment file and update the configurations:
   ```bash
   cp .env.example .env
   ```

    Update .env with your MongoDB connection details:
   
    ```env
    DB_CONNECTION=mongodb
    DB_HOST=127.0.0.1
    DB_PORT=27017
    DB_DATABASE=mini-crm
    DB_USERNAME=
    DB_PASSWORD=
    DB_URI=mongodb://localhost:27017

    SESSION_DRIVER=file
    SESSION_LIFETIME=120
    SESSION_ENCRYPT=false
    SESSION_PATH=/
    SESSION_DOMAIN=null
    ```
4. Generate Application Key
   
    ```bash
    php artisan key:generate
    ```
5. Run Migrations
   
    ```bash
    php artisan migrate:refresh
    ```
     
6. Seed the database
    ```bash
    php artisan db:seed --class=AdminUserSeeder
    php artisan db:seed --class=CompanySeeder
    ```
7. Link the storage to view image
```bash
php artisan storage:link
```
8. Serve the Application
   
    ```bash
    php artisan serve
    ```
     ```bash
    npm run dev
    ```


## Configuration

* **Email Notifications**: Configure Mailtrap in your .env file for sending email notifications.
    Sample email configuration:
    ```bash
    MAIL_MAILER=smtp
    MAIL_HOST=sandbox.smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=1a59c0cfbc97d6
    MAIL_PASSWORD=********c7b1
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="MiniCRM@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
    ```

## Usage

* **Dashboard**: View and manage companies and their employees. Access the dashboard at /dashboard.
* **Companies**: Create, read, update, and delete companies.
* **Employees**: Manage employees associated with companies.
* **File Storage**: Upload company logos and other files through the application interface.

## Features

* **CRUD Operations** for companies and employees
* **Admin Authentication** with username and password
* **Email Notifications** using Mailtrap
* **Multi-language Support** using Laravel's lang folder
* **Pagination and Datatables Integration** for managing large datasets
* **AdminLTE Front-end** for a responsive and user-friendly interface

## License

This project is licensed under the [MIT license](https://opensource.org/licenses/MIT).
