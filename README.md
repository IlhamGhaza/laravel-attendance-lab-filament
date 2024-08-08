# Laravel Attendance Lab Filament

This project is a backend system for a lab attendance mobile app using Laravel, featuring face detection and geolocation for attendance verification.

## Table of Contents

- [Laravel Attendance Lab Filament](#laravel-attendance-lab-filament)
  - [Table of Contents](#table-of-contents)
  - [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
  - [Features](#features)
  - [Database Schema](#database-schema)
  - [About Laravel](#about-laravel)
    - [Installation](#installation)
  - [API Documentation](#api-documentation)
  - [Docker](#docker)
  - [Contributing](#contributing)
  - [License](#license)

## Getting Started

To get started with this project, follow the instructions below.

### Prerequisites

Ensure you have the following software installed on your machine:

- PHP (version 8.0.0 or higher)
- Laravel (version 11.x)
- Composer

## Features

- **Face Detection**: Automatically verify attendance using face recognition technology.
- **Geolocation**: Confirm the presence of users at designated locations.
- **Admin Panel**: Manage attendance records and system configurations via the Filament admin panel.

## Database Schema

The database schema for this project is visualized in the following diagram:

![Database Schema](public/image.png)

For a detailed view and interaction with the schema, please refer to the [DrawSQL diagram](your-drawsql-link).

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. It simplifies common web development tasks, making development enjoyable and creative. Key features include:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.

For more information about Laravel, visit [About Laravel](laravel.md).

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/IlhamGhaza/laravel-attendance-lab-filament.git
    ```

2. Navigate to the project directory:

    ```bash
    cd laravel-attendance-lab-filament
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Configure the environment variables:
    - Rename the `.env.example` file to `.env`.

    ```bash
    cp .env.example .env
    ```

    - Update the necessary environment variables in the `.env` file.

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Create a database and update the database settings in the `.env` file.

   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE= attendace-lab-db
    DB_USERNAME= root (or your db username)
    DB_PASSWORD= (your password)
   ```

7. Run the database migrations:

    ```bash
    php artisan migrate
    ```

8. Start the development server:

    ```bash
    php artisan serve
    ```

9. Log in to the Filament admin panel at [http://localhost:8000/admin](http://localhost:8000/admin) to manage the system.

10. Use the following credentials to log in:
    - Email: `ilham@admin.com`
    - Password: `Secretp4ss`

    **Note:** You can edit in the database seeder at `database/seeders/DatabaseSeeder.php`.

11. To test the API, use the Postman collection file included in the project:

    ```bash
    Laravel Attendance Lab Filament.postman_collection.json
    ```

## API Documentation

API documentation is provided in the Postman collection file included in the project.

## Docker

Coming soon (＾▽＾)

## Contributing

Contributions are welcome! If you encounter any issues or have suggestions, please open an issue or submit a pull request.

## License

This project is licensed under the MIT License. You may not use this project for commercial purposes. See the [LICENSE](LICENSE) file for more details.
