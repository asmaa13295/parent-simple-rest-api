# simple-laravel-api


## Prerequisites

- Docker and docker compose. ([Download Docker Community Edition](https://hub.docker.com/search/?type=edition&offering=community))
- Check current used ports on your machine (app is using port 8000 and 3306 , change them in .env file in root DIR if required).


**Installation steps:** 
1. Run `docker-compose up -d` to start app containers.

2. copy 'DataProviderX.json' or/and 'DataProviderY.json' to `storage/app/public` 
    - we have three status for DataProviderX:
        1. authorised which will have statusCode 1
        2. decline which will have statusCode 2
        3. refunded which will have statusCode 3

    - we have three status for DataProviderX:
        1. authorised which will have statusCode 100
        2. decline which will have statusCode 200
        3. refunded which will have statusCode 300

3. Run `docker exec -it app bash` in the terminal
    - Run `composer install`
    - Run `php artisan key:generate`
    - Run `php artisan migrate:install`
    - Run `php artisan migrate` (it will store the provider's data from json files and delete the files to avoid duplication in each time)

**Testing the API** 
- Just `GET` request to `localhost/api/v1/users` to list all data.

**API Filters** 
- `[provider]` with values one of (DataProviderX, DataProviderY)
- `[status]` with values (authorised, decline, refunded)
- `[currency]` string
- `[balanceMin]` & `[balanceMax]` numbers

**API Request Example** 
- `http://localhost/api/v1/users?provider=DataProviderX&currency=USD`

**Run Unit Tests** 
- Run `docker exec -it app bash` to start terminal, then `php artisan test`

**New Users Providers** 
- Add new `DataProviderY` class in `app\Services` directory contains tha mapping logic for the new object.
- Add `DataProviderY` code block to `mapFile` method to define when the code should use the new mapper 
