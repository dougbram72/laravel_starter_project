<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Starter Project

This is a Laravel starter project with pre-configured authentication, UI components, and user management functionality. It provides a solid foundation for building web applications with modern tools and best practices.

## Features

- **User Authentication**: Complete login, registration, email verification, and password reset functionality
- **User Management**: CRUD operations for managing users
- **Responsive Design**: Mobile-friendly interface with dark mode support
- **Form Validation**: Server-side validation with clear error messaging
- **Confirmation Dialogs**: User-friendly confirmation for destructive actions

## Implemented Packages

### [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)
A lightweight authentication implementation including login, registration, password reset, email verification, and password confirmation features.

### [Flowbite](https://flowbite.com/)
A UI component library built on top of Tailwind CSS that provides ready-to-use components like modals, dropdowns, tables, and forms.

### [Tailwind CSS](https://tailwindcss.com/)
A utility-first CSS framework for rapidly building custom user interfaces with responsive design and dark mode support.

## Getting Started

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js and NPM
- MySQL or another database supported by Laravel

### Installation

1. Clone the repository
   ```bash
   git clone https://github.com/yourusername/laravel-starter.git
   ```

2. Install PHP dependencies
   ```bash
   composer install
   ```

3. Install and compile frontend dependencies
   ```bash
   npm install && npm run dev
   ```

4. Configure your environment
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Set up your database in the `.env` file
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. Run migrations
   ```bash
   php artisan migrate
   ```

7. Start the development server
   ```bash
   php artisan serve
   ```

## Documentation

Detailed documentation for user management and features can be found in the `documentation.md` file.

## Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Flowbite Documentation](https://flowbite.com/docs/getting-started/introduction/)

## License

This Laravel starter project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
