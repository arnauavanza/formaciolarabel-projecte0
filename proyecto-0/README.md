# Proyecto 0 — Contacts agenda

Warm-up Laravel app: a simple **contacts CRUD** using Blade views (no API, no authentication). Built with Laravel Sail (Docker).

## Requirements

- Docker Desktop (or Docker Engine + Compose) running
- Git
- A terminal (WSL2 recommended on Windows)

You do **not** need PHP, Composer, or MySQL installed on the host; Sail provides them inside containers.

## Project structure (quick map)


| Path                   | Purpose                                                    |
| ---------------------- | ---------------------------------------------------------- |
| `app/`                 | Application code (models, controllers)                     |
| `routes/web.php`       | HTTP routes                                                |
| `database/migrations/` | Database schema as code                                    |
| `resources/views/`     | Blade templates                                            |
| `config/`              | Framework configuration (values often come from `.env`)    |
| `.env`                 | Local secrets and environment settings (**not** committed) |




## Environment setup

From this directory (`proyecto-0`):

### 1. Install PHP dependencies

```bash
docker run --rm \
  -u "$(id -u):$(id -g)" \
  -v "$(pwd):/var/www/html" \
  -w /var/www/html \
  laravelsail/php84-composer:latest \
  composer install --ignore-platform-reqs
```

If `vendor/` already exists (as in a fresh clone after someone ran this), you can skip this step or run:

```bash
./vendor/bin/sail composer install
```

(after Sail is up).

### 2. Environment file

```bash
cp .env.example .env
```

Generate the application key (once Sail is available):

```bash
./vendor/bin/sail artisan key:generate
```

Ensure Sail user IDs match your host user (avoids permission errors when Artisan writes files):

```env
WWWUSER=1000
WWWGROUP=1000
```

Use your real UID/GID from `id -u` / `id -g` if they are not `1000`.

### 3. Start the stack

```bash
./vendor/bin/sail up -d
```

Default app URL: [http://localhost](http://localhost) (port `80` unless `APP_PORT` is set in `.env`).

### 4. Run migrations

```bash
./vendor/bin/sail artisan migrate
```



### 5. Open the app

- Home: [http://localhost](http://localhost)
- Contacts list: [http://localhost/contacts](http://localhost/contacts)



## Useful Sail commands


| Command                                                | What it does                                                          |
| ------------------------------------------------------ | --------------------------------------------------------------------- |
| `./vendor/bin/sail up -d`                              | Start containers in the background                                    |
| `./vendor/bin/sail down`                               | Stop containers                                                       |
| `./vendor/bin/sail ps`                                 | List container status                                                 |
| `./vendor/bin/sail artisan migrate`                    | Apply pending database migrations                                     |
| `./vendor/bin/sail artisan route:list`                 | List registered routes                                                |
| `./vendor/bin/sail artisan route:list --path=contacts` | List only contact routes                                              |
| `./vendor/bin/sail logs`                               | Follow container logs                                                 |
| `./vendor/bin/sail artisan migrate:fresh`              | Drop all tables and re-run migrations (**local only**; destroys data) |




## Features (Project 0)

- List contacts
- Create a contact (`name`, `phone`)
- View a contact
- Edit a contact
- Delete a contact

Routes are registered with `Route::resource('contacts', ...)`.

## Troubleshooting

**Permission denied when running** `artisan make:`*

Project files may be owned by the wrong user (common with Docker/WSL). From `proyecto-0`:

```bash
sudo chown -R "$(whoami):$(whoami)" .
```

Then retry the Artisan command.

**Docker is not running**

Start Docker Desktop (or the Docker daemon), then `./vendor/bin/sail up -d`.

`./vendor/bin/sail: No such file or directory`

Run commands from `proyecto-0` (where `vendor/bin/sail` lives), and make sure `composer install` has been run.

## Tech stack

- Laravel (PHP)
- MySQL (via Sail)
- Blade templates
- Laravel Sail / Docker Compose

