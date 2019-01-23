# laravel-test-handson
This is handson for test of laravel

# Get Started
```
cd 
cp .env.example .env 
```

```
docker-compose build
docker-compose up -d
```

```
docker exec -it php /bin/sh -c "composer install"
docker exec -it php /bin/sh -c "npm cache verify && npm install"
docker exec -it php /bin/sh -c "php artisan key:generate"
docker exec -it php /bin/sh -c "php artisan migrate && php artisan db:seed"
```
