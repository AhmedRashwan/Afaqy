<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Steps To Run The Project

### Step 1: Clone the project

```
git clone https://github.com/AhmedRashwan/Afaqy.git
```

### Step 2: Install the dependencies

```
composer install
```

### Step 3: update the .env file

> Copy the .env.example file and rename it to .env

### Step 4: Run the project

```
./vendor/bin/sail up
```

### Step 5: Run the migrations

```
php artisan migrate
```

### Step 6: Call Expeneses API

- You can use postman or any browser to call the API.
- avialable parameters
    - `search` : search by vehicle name
    - `expense_types` : filter by expense type
    - `min_cost` : filter by min cost
    - `max_cost` : filter by max cost
    - `sort_by` : sort by cost or date
    - `sort_type` : sort type asc or desc
    - `min_creation_date`: filter by min creation date
    - `max_creation_date`: filter by max creation date

#### API Request

```
http://localhost/api/expenses?search=Prof&expense_types[]=insurance&expense_types[]=fuel&min_creation_date=1970-01-16&sort_type=desc&sort_by=cost
```

#### Browser Request

  ```
http://localhost/expenses?search=Prof&expense_types[]=insurance&expense_types[]=fuel&min_creation_date=1970-01-16&sort_type=desc&sort_by=cost
  ``` 

### Step 7: Run the tests

```
./vendor/bin/sail artisan test
```
