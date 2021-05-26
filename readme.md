<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>           
            
## About Project

This is a small project with the capabilities of an online store. You can put a look at the list of products, put the product in the basket and place an order.
   
## How to run project
         
-  In the root folder run ``` $ cp .env.example .env ``` and replace data from example with you data.                                                            

    ```
    DB_DATABASE = shop
    DB_USERNAME = user_name
    DB_PASSWORD = pass
    ```
- Run ```$ composer install```.
- Run ```$ php artisan key:generate```.
- Create database with database name from .env file.
- Check that all migrations are done (```$ php artisan migrate: status``` should
  show all items completed, otherwise run migrations with the command
  ```$ php artisan migrate```).
- Run ```$ php artisan db:seed```.
- Run project ```$ php artisan serve```.
- Go to endpoint /products.

## Notes

The project has an admin panel in which you can create and change data, you can reach the admin panel
on the route /admin. **Login**: admin, **password**: admin.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1400 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
