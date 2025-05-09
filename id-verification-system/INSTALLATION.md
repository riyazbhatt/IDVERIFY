# Installation Guide for id-verification-system Laravel Project

This guide will help you quickly set up and install the Laravel "id-verification-system" project on your local machine or server.

## Prerequisites

- PHP >= 8.0
- Composer
- MySQL or compatible database
- Web server (Apache, Nginx, or Laravel built-in server)
- Node.js and npm (optional, for frontend asset compilation)

## Installation Steps

1. **Clone or Download the Project**

   ```bash
   git clone <repository-url>
   cd id-verification-system
   ```

2. **Install PHP Dependencies**

   ```bash
   composer install
   ```

3. **Copy Environment File**

   ```bash
   cp .env.example .env
   ```

4. **Configure Environment Variables**

   Edit the `.env` file and set your database credentials and other necessary configurations:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password

   APP_URL=http://localhost:8000
   ```

5. **Generate Application Key**

   ```bash
   php artisan key:generate
   ```

6. **Run Database Migrations**

   ```bash
   php artisan migrate
   ```

7. **(Optional) Seed the Database**

   If seeders are available and you want to populate initial data:

   ```bash
   php artisan db:seed
   ```

8. **Serve the Application**

   To start the development server:

   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

9. **Access the Application**

   Open your browser and navigate to:

   ```
   http://localhost:8000
   ```

## Additional Notes

- For production deployment, configure your web server to point to the `public` directory.
- Set proper permissions for `storage` and `bootstrap/cache` directories.
- Configure mail and other services in `.env` as needed.
- For frontend asset compilation, run:

  ```bash
  npm install
  npm run build
  ```

## Troubleshooting

- If you encounter permission issues, ensure `storage` and `bootstrap/cache` are writable.
- Check your PHP version and extensions.
- Review Laravel logs in `storage/logs/laravel.log` for errors.

---

This completes the installation of the "id-verification-system" Laravel project. For further assistance, refer to the Laravel documentation or contact the project maintainer.
