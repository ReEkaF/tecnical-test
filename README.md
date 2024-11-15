# Vehicle Rent and Booking Management System study case Nickel Company

This application is designed to assist Field and central Admins in a nickel mining company to efficiently manage and track vehicle rentals and bookings.
Since i just do this project in 2 days(spend my day to do it),i cant put all off my idea in here cuz it time limitation,but i have learn something from  here.

## Key Features

### Booking Management

    This app can make Field Admin make proposal and approval for rent vehicle that come from worker/driver request,id Field Admin make approval it will be tranfer to Center Admin for double validation ,and if Center Admin approved then worker/drive can have acces to vehicle depend how long it time depend on field Admin proposal

### Fuel Management

    This app can make field Admin input fuel that already used in time of used vehicle that booked before,with this method Center Admin can get information how much fuel is need in every mine company have.

### Tracking Vehicle

    This app can track booking transaction with Admin-Field and Admin-Center approval(2 level approval),and also the history aba=out transaction can be download periodicly in app as excel.

### Service
    this app can schedule service for vehicle they want to service 

## Tech Requiment

### 1. Laravel

        this app using laravel v.11 soo make sure you already have the requiment for this version
        for specific laravel requiment you can check:
        https://laravel.com/
        i currenly using PHP version: 8.3.9
### 2. Tailwind CSS
        this app using tailwind as it frond-end framework i use ,and i use some of componen that i ussually use in my project
        this app also usng datatable too, soo user can easly search the data they need.
### 3. Laravel Excel
        this app using laravel excel to export data to excel for more information you can check:
        https://laravel-excel.com/
### 4. MySql
        Server version: 8.0.30 - MySQL Community Server - GPL thats My database version
## Installation Requirements

### requiment to install
- composer install
- npm install
- npm install flowbite
- composer require maatwebsite/excel
Note : maybe some people need to download more but this all i already install in this project,if you stuck you can see the documentation in tech i use in this project

## Hot To use 

## started
1. Clone project if you use git,but i guess all of use have it,git clone project
2. composer install
3. copy env.example and rename to env
4. php artisan key:generate
5. npm install
6. composer require maatwebsite/excel
### seed
- you can use use database with php artisan migrate --seed
- or if you already migrate but want to migrate again just use php artisan mingrate:fresh --seed
### login
there 2 actor in this app (Admin-Center,Admin-Field)
- Admin Center 
    - username : admin
    - password : admin123
- Admin Field(this actor have 6 different acc represent its own mine location)
    - username : adminfield1
    - password : adminfield123
### operate as admin field
- Admin-Field have 4 menu 
    1. Dashboard for monotiring with visual graph
    2. Create Booking (you can create booking here)
    3. Record booking (you can recod booking here you can mark it as in use or done,if you mark as done you need to input fuel usage and dictance vehicle)
    4. Schedule Service (you can Schedule service here)
    5. Report (you can download booking report here as axcel)
    Note : you can only operate and get data from 1 mine location since this was admin-field acc
- Admin-Center have 3 menu 
    1. Dashboard for monitpring with visual graph
    2. approval (you can approve booking proposal here)
    3. report (you can get report from all mine here)

## i think thats all --- thanks 

