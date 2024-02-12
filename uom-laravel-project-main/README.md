
### Local Setup Requirements

- PHP >= 8.1
- [Compser](https://getcomposer.org) for package management

***Note**: To install the PHP & MySQL, better to use Xampp or Wamp server*

### Local Setup Steps

Install dependencies using the following command.
`composer install`

Create env file using the following command.
`copy .env.example .env`

Generate App Key using the following command.
`php artisan key:generate`

Create a three database through phpMyAdmin.

Update your database credentials in the `.env`

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your database name
    DB_USERNAME=your database username
    DB_PASSWORD=your database password

Create [Mailtrap](https://mailtrap.io) Account by clicking this URL. This is used to simulate the E-mail functionality.

Update your email credentials in the `.env`

    MAIL_MAILER=smtp
    MAIL_HOST=your email host
    MAIL_PORT=your email post
    MAIL_USERNAME=your email username
    MAIL_PASSWORD=your email password
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"

  
Cache your configs using the following command.
`php artisan optimize`

Create database tables and add dummy data using the following command.
`php artisan migrate:fresh --seed`

To run the project, run following command.
`php artisan serve`
