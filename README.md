# ACTIVITY 3

A self-contained Docker Compose web development environment for IT-302. It runs Nginx, PHP 8.2 (Devilbox), MySQL, phpMyAdmin, a Workspace container, Redis, and Mailhog used to host a PHP web application.

## Services

| Service    | Image/Tag                                  | Port Mapping             | Notes                                                          |
| ---------- | ------------------------------------------ | ------------------------ | -------------------------------------------------------------- |
| Nginx      | `nginx:alpine`                             | `80:80`, `443:443`       | Web server (SSL ready)                                         |
| PHP        | custom build (`devilbox/php-fpm:8.2-work`) | not exposed              | All extensions pre-installed                                   |
| MySQL      | `mysql:8.0`                                | `3306:3306`              | Database with native auth                                      |
| phpMyAdmin | `phpmyadmin/phpmyadmin:latest`             | `8080:80`                | Database management                                            |
| Workspace  | `devilbox/php-fpm:8.2-work`                | not exposed              | Development environment (php, composer, git, node, npm, mysql) |
| Redis      | `redis:alpine`                             | `6379:6379`              | Cache/Queue                                                    |
| Mailhog    | `mailhog/mailhog:latest`                   | `1025:1025`, `8025:8025` | Email testing (SMTP + web UI)                                  |

## Quick Start

```bash
# Build and start all services
docker compose up -d

# Check running services
docker compose ps -a

# View logs
docker compose logs

# Stop everything
docker compose down
```

## Access Points

| Service    | URL                    |
| ---------- | ---------------------- |
| App        | http://localhost       |
| CRUD app   | http://localhost/crud/ |
| phpMyAdmin | http://localhost:8080  |
| Mailhog UI | http://localhost:8025  |
| Redis      | redis://localhost:6379 |

## Database

- Database: `it302_rabosa`
- User: `it302_rabosa`
- Password: `it302_rabosa`
- Root password: `it302_rabosa`
- Initialization scripts in `mysql/init/` run automatically on first start.

## Workspace Container

Enter the development workspace:

```bash
docker compose exec workspace bash
```

Inside the workspace you have `php`, `composer`, `git`, `node`, `npm`, `mysql` and `redis-cli` available:

```bash
php -v
composer --version
git --version
node --version
npm --version
mysql -h mysql -u it302_rabosa -pit302_rabosa it302_rabosa
redis-cli -h redis ping
```

## Useful Commands

```bash
docker compose restart php      # Restart PHP-FPM
docker compose build php        # Rebuild the PHP image
docker compose exec php bash    # Shell into the PHP container
docker compose logs -f          # Follow logs
docker ps -a                    # List all containers
```
