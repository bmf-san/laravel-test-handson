# laravel-test-handson
This is a handson for test of laravel.

# Get Started
```
docker-compose build
docker-compose up -d
docker exec -it php /bin/sh -c "cp .env.example .env"
docker exec -it php /bin/sh -c "composer install"
docker exec -it php /bin/sh -c "npm cache verify && npm install"
docker exec -it php /bin/sh -c "php artisan key:generate"
docker exec -it php /bin/sh -c "php artisan migrate && php artisan db:seed"
```

Add hosts settings to /etc/hosts
```
127.0.0.1 laravel-test-handson
```

# License
This project is licensed under the terms of the MIT license.

# Author
bmf - A Web Developer in Japan.
* [@bmf-san](https://twitter.com/bmf_san)
* [bmf-tech](http://bmf-tech.com/)
