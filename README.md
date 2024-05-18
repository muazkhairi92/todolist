## Simple To-Do List

This is the repository for **Simple To-Do List**.

## About this Repo

This project provides a simple yet interactive to-do list application with features to manage the list based on user activity and browser behavior. It leverages Laravel for backend functionality and session management, with JavaScript to handle browser events. The included unit tests ensure that all core functionalities work as intended.


## Technologies

- Laravel 10.x
- PHP ^8
- Composer

## Setup

1. Download repository:

```
git clone https://github.com/muazkhairi92/todolist.git
```

2. Please ensure you have install the correct version of PHP and Composer. If not configured, for PHP, please refer this: https://www.php.net/manual/en/install.php. And for Composer please refer this: https://getcomposer.org/doc/00-intro.md.

3. Installing Dependencies:

```
composer install
```

4. Create `.env` file. Copy `.ev.example` and rename it to `.env`.

5. This project uses MySQL for its database. Please setup the database and feed the details in `.env`. Or if no database confirgued, change in `.env` field `SESSION_DRIVER=database` to `SESSION_DRIVER=file`.

if you have configured your database, please run
```
php artisan migrate
```

6. To start server:

```
php artisan serve
```

use the url to use the to-do list!

7. To test all test:

```
php artisan test
```

8. Currently the inactivity period is set to 5 minutes. Please update in `.env` of field `PERIOD_OF_INACTIVITY=5` to any minutes desired.


## Development

### Branch

To start development, create new branch from **staging** branch.

```
git checkout staging
git checkout -b feat/your-new-feature
```

### Pull Request

- Push your new feature to github
- Create PR and choose merge into **staging** branch
