```bash
$ git clone https://github.com/doretienshinh/itss_jp_2.git
$ cd itss_jp_2
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```
Then open the .env file and change the address to connect to your database
```bash
$ php artisan config:cache
$ php artisan migrate
php artisan db:seed
$ php artisan storage:link
$ npm install
$ npm run build
$ php artisan serve
```
