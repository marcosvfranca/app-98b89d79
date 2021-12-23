## Build and Run
```bash
git clone https://github.com/marcosvfranca/app-98b89d79.git
cd app-98b89d79
``` 
Copy the ./src/.env.example file renaming to ./src/.env

```bash
docker-compose up --build -d
```

## Installing dependencies

```bash
docker-compose exec app composer install
docker-compose exec app php artisan migrate
```

## Running tests

```bash
docker-compose exec app composer test
```

### Stop Everything

```bash
docker-compose down
```
