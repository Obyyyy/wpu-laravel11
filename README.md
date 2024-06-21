# WPU - Laravel 11 Project

## What's inside of this repos??

This repository contains the Laravel 11 project development process following the Laravel 11 learning playlist on the Web Programming Unpas YouTube channel. This project uses Taildwind for developing the front-end and SQLlite as the database.

Playlist's YT link: [Tutorial LARAVEL 11](https://youtube.com/playlist?list=PLFIM0718LjIW1Xb7cVj7LdAr32ATDQMdr&si=nuMqFMzLgE6dyA7p)

## How can you clone the project??:

You can clone this repository with this methods:

-   HTTPS: Use Git checkout by making use of this URL: https://github.com/Obyyyy/wpu-laravel11.git
    ```sh
    git clone https://github.com/Obyyyy/wpu-laravel11.git
    ```

## Setup the Database

-   Start your web server and sql using XAMPP, Laragon, Laravel Herd, etc.
-   Open the repository in VSCode, and run this command in terminal to create the database schema and add data to the database tables
    ```sh
    php artisan migrate --seed
    ```

## Run the Application

-   In terminal type `npm install` to download all the Libraries.
-   After that, type `npm run dev`
-   Open a another terminal tab, and run `php artisan serve` to run the application
