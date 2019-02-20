<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>


## About Dentinst Booking App

Laravel based project that allows a user to book a session to dentist by selecting procedure and time. This app has only learning purposes and can't be used in production. 

The app has two pages on http://127.0.0.1:8000/ and http://127.0.0.1:8000/dashboard

<p align="center">
	<img src="https://user-images.githubusercontent.com/19436522/53125027-95a37f80-3565-11e9-907f-07fb7739a963.png" width="90%">
	<img src="https://user-images.githubusercontent.com/19436522/53125026-950ae900-3565-11e9-816b-dacd61945aa1.png" width="90%">
</p>

Laravel docs: https://laravel.com/docs

To run the app on your machine follow the steps below

## Install Composer

Source: [Setting up Laravel on Mac OS](https://medium.com/@sunilk/laravel-development-guide-setting-up-laravel-on-mac-os-with-xampp-f6d18bb2b55d)

1. 	Download `composer.phar` file from https://getcomposer.org/composer.phar

2. 	Open terminal and run following command to test

	```console
	php ~/Downloads/composer.phar --version
	```

   	Above, command will output composer version:

	```console
	Composer version 1.7-dev (sd2guirofdhdsgjkfg3fsdj4bfdhf) 20xx–00–00 21:36:46
	```

3. 	Now let’s copy to bin and install it with below command

	```console
	sudo cp ~/Downloads/composer.phar /usr/local/bin/composer
	sudo chmod +x /usr/local/bin/composer
	```

	Let’s test if all is good with composer

	```console
	composer --version
	```

	You should get below output

	```console
	Composer version 1.7-dev (sd2guirofdhdsgjkfg3fsdj4bfdhf) 20xx–00–00 21:36:46
	```

## Install MAMP

Download MAMP from https://www.mamp.info/en/

## Install Dentist Booking App

1. 	Open terminal and go to the application folder

	```console
	cd <my path to folder>
	```

2. 	Install composer in project folder

	```console
	composer install
	```

3. 	Copy `.env.example` file to `.env` on the root folder (create `.env` file if it doesn't exist).

4. 	Open your `.env` file and change the following fields:
	
	```
	DB_DATABASE=dentist
	DB_USERNAME=root
	DB_PASSWORD=root
	```

5. 	Generate key

	```console
	php artisan key:generate
	```

6. 	Start MAMP server and go to phpMyAdmin http://localhost:8888/phpMyAdmin

7. 	Create a database with the name `dentist` (the same name as in the `.env` file)

8. 	Migrate database tables

	```console
	php artisan migrate
	```

## Run app

Run the following command in app folder after installation

```console
php artisan server
```

Go to http://localhost:8000

