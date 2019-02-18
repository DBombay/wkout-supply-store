Workout Supply Store
== 

Description
--
Built as an exercise to learn some PHP and Symfony. The backend is a PHP API with React and Bootstrap as
the front end. Database is MySql.


ORM
---
Entities, Tables, and ORM were all generated and controlled with composer's helpers:

Entities, Repositories, and Relations built through:
```
php bin/console make:entity
```

Migrations and Schema built through:

```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

To Run
--
1. Clone the Repo down
    ```bash
    https://github.com/DBombay/wkout-supply-store.git
    ```
2. Navigate to the directory and run:
    ```bash
    composer install
    yarn install
    ```
3. Start the Symfony server
    ```bash
    php bin/console server:run
    ```
4. Open another tab in yur terminal and start webpack
    ```bash
    yarn encore dev --watch
    ```
5. Go to your browser and navigate to `localhost:8000`
6. ???
7. Profit.
