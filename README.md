## Setup Steps

-   composer Install
-   (.env file is added with the code)
-   create a database with name "pre_ycspl"
-   run this commands

    -   php artisan migrate
    -   php artisan db:seed

## API URLs

-   http://127.0.0.1:8000/api/coaches?timezone=UTC
-   http://127.0.0.1:8000/api/coach/1?timezone=UTC
-   http://127.0.0.1:8000/api/coaches?ava_from_time=13:00&ava_to_time=14:30

## Note

-   Database File (.sql) is added in public folder
