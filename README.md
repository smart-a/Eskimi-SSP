#<p align="center">ESKIMI SSP</p>


## Commands

### Make sure that php composer and node.js are already installed

### Install dependencies
- **Laravel dependencies**: 
  - _composer install_
- **Node dependencies**: 
  - _npm install_

### Set Environment variables
- Duplicate .env.example and rename to .env

### Compile vue app
- _npm run dev_

### Start Docker
- _docker-compose up -d --build_

### Run Migration
- _docker-compose exec app php artisan migrate_

### Run Seeder
- _docker-compose exec app php artisan db:seed --class=AdvertSeeder_

### Link Storage for image upload
- _docker-compose exec app php artisan storage:link_

### View app on browser
- Click => <a href="http://localhost:8080/" target="_blank">Lunch App</a> or enter http://localhost:8080/ in browser url

### View database in phpmyadmin
- http://localhost:8090/index.php?route=/database/structure&server=1&db=eskimi_db
