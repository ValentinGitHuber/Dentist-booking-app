<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

Docs: https://laravel.com/docs

## Installing Composer

Source: https://medium.com/@sunilk/laravel-development-guide-setting-up-laravel-on-mac-os-with-xampp-f6d18bb2b55d

1. 	Download composer.phar file from https://getcomposer.org/composer.phar
2. 	Open Terminal and type bellow to test
	```console
	php ~/Downloads/composer.phar --version
	```
   	Above, command will output as below composer version:
	```console
	Composer version 1.7-dev (sd2guirofdhdsgjkfg3fsdj4bfdhf) 20xx–00–00 21:36:46
	```
3. 	Now let’s copy to bin and install it, with below command
	```console
	sudo cp ~/Downloads/composer.phar /usr/local/bin/composer
	sudo chmod +x /usr/local/bin/composer
	```
	Let’s test, if all is good with composer
	```console
	composer --version
	```
	You should get below output
	```console
	Composer version 1.7-dev (sd2guirofdhdsgjkfg3fsdj4bfdhf) 20xx–00–00 21:36:46
	```

## Install MAMP

https://www.mamp.info/en/

## Install this Laravel app after clone

1. 	Open Terminal and go to the application folder

	```console
	cd <path>/laravel
	```

2. 	Run intstallation of composer in your terminal

	```console
	composer install
	```

3. 	Copy .env.example file to .env on the root folder (create .env file if it doesn't exist).

4. 	Open your .env file and change the following fields:
	
...DB_DATABASE=dentist
...DB_USERNAME=root
...DB_PASSWORD=root

5. 	Run next command

	```console
	php artisan key:generate
	```

6. 	Start MAMP server and go to (http://localhost:8888/phpMyAdmin) 

7. 	Create a database with the name `dentist` (the same name as in the .env file)

8. 	Run with terminal to migrate tables

	```console
	php artisan migrate
	```

## Run this project

	Run the following command in app folder after installation

	```console
	php artisan serve
	```

	Go to (http://localhost:8000)

