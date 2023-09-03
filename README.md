The API is developed using Laravel 10 Framework.

If you are using Docker, execute the command “docker-compose up -d” in the application root folder.
After all the docker images are downloaded and containers are up, execute the command “docker exec -it nilan-iban-number-php-fpm bash” to go to the fpm container. 
Inside the container run composer install.
Overwrite the following variables in .env file (create the .env from .env.example file)
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=iban
DB_USERNAME=root
DB_PASSWORD=nilan123
Then run the “php artisan migrate” command to migrate all the DB tables
Now the API is ready and running under the uri http://localhost:19000/api 
API end points
POST /register - User registration 
Parameters 

name - Required
email - Required
password - Required
password_confirmation – Required

POST /login - User Login 
Parameters

email - Required
password – Required

POST /iban – Save IBAN 
Parameters:

iban - Required
The API is developed using Laravel 10 Framework.

If you are using Docker, execute the command “docker-compose up -d” in the application root folder.
After all the docker images are downloaded and containers are up, execute the command “docker exec -it nilan-iban-number-php-fpm bash” to go to the fpm container. 
Inside the container run composer install.
Overwrite the following variables in .env file (create the .env from .env.example file)
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=iban
DB_USERNAME=root
DB_PASSWORD=nilan123
Then run the “php artisan migrate” command to migrate all the DB tables
Now the API is ready and running under the uri http://localhost:19000/api 
API end points
POST /register - User registration 
Parameters 

name - Required
email - Required
password - Required
password_confirmation – Required

POST /login - User Login 
Parameters

email - Required
password – Required

POST /iban – Save IBAN 
Parameters:

iban - Required
