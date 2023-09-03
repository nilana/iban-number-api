<p>
The API is developed using Laravel 10 Framework.

If you are using Docker, execute the command “docker-compose up -d” in the application root folder.
After all the docker images are downloaded and containers are up, <br>execute the command “docker exec -it nilan-iban-number-php-fpm bash” to go to the fpm container. 
Inside the container run composer install.
Overwrite the following variables in .env file (create the .env from .env.example file)
</P>

<p>
DB_CONNECTION=mysql <br>
DB_HOST=mysql <br>>
DB_PORT=3306 <br>
DB_DATABASE=iban <br>
DB_USERNAME=root <br>
DB_PASSWORD=nilan123 <br><br>
Then run the “php artisan migrate” command to migrate all the DB tables <br>
Now the API is ready and running under the uri http://localhost:19000/api
</p>
<p>
API end points<br><br>

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
</p>