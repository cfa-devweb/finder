<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## INSTALL PROJECT

**npm install**

**composer install**

## DATABASE

Create a new Database named : ***Kinder*** in mysql or PhpMyAdmin

Sql request : ***CREATE DATABASE kinder***

The database connection is :

DB_HOST= **127.0.0.1** \
DB_PORT= **3306** \
DB_DATABASE= **kinder** \
DB_USERNAME= **root** \
DB_PASSWORD= **root** 

## To migrate :

Run the migration with this command ***php artisan migrate:fresh***

## To use our seeds :

Run the database's seed with this command ***php artisan db:seed***

## If you want to run both :

Run this command ***php artisan migrate:fresh --seed***

## CSS/SCSS

To compile scss to css, run this command ***npm run watch***

## To launch the application

Copy the file **.env.example** and create a new file named ***.env*** and paste all the code in.
Change your access to your database.


Run the artisan command **php artisan serve**

To connect to the site : 

username : DevWeb2022
Password : FinderPassword2022

The user test is : mail : student@test.nc      pwd : test

The adviser test is : mail : adviser@test.nc   pwd : test
