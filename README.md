# Vehicle Rent and Booking Management System study case Nickel Company

This application is designed to assist Field and central Admins in a nickel mining company to efficiently manage and track vehicle rentals and bookings.
Since i just do this project in 2 days(1 days in coding hehe),i cant put all off my idea in here cuz it time limitation,but i have learn something from  here.

## Key Features

### Booking Management

    This app can make Field Admin make proposal and approval for rent vehicle that come from worker/driver request,id Field Admin make approval it will be tranfer to Center Admin for double validation ,and if Center Admin approved then worker/drive can have acces to vehicle depend how long it time depend on field Admin proposal

### Fuel Management

    This app can make field Admin input fuel that already used in time of used vehicle that booked before,with this method Center Admin can get information how much fuel is need in every mine company have.

### Tracking Vehicle

    This app can track booking transaction with Admin-Field and Admin-Center approval(2 level approval),and also the history aba=out transaction can be download periodicly in app as excel.

###

## Tech Requiment

### 1. Laravel

        this app using laravel v.11 soo make sure you already have the requiment for this version
        for specific laravel requiment you can check:
        https://laravel.com/


### 2. Tailwind CSS
        this app using tailwind as it frond-end framework i use ,and i use some of componen that i ussually use in my project
        this app also usng datatable too, soo user can easly search the data they need.
### 3. Laravel Excel
        this app using laravel excel to export data to excel for more information you can check:
        https://laravel-excel.com/

## Installation Requirements

### requiment to install
- composer install
- npm install
- npm install flowbite
- composer require maatwebsite/excel
Note : maybe some people need to download more but this all i already install in this project,if you stuck you can see the documentation in tech i use in this project

## Hot To use 

### seed
- you can use use database with php artisan migrate --seed
- or if you already migrate but want to migrate again just use php artisan mingrate:fresh --seed
there 2 actor in this app (Admin-Center,Admin-Field)
for 