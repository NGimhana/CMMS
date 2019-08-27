# COTENCE

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

### What is COTENCE

__COTENCE__ is a web application which provides functionalities to manage any kind of maintenance 
job task of an organisation.  

![Image](https://raw.githubusercontent.com/NGimhana/CMMS/master/front%20Page.jpg)

### Configuration

COTENCE is totally built on the PHP(7.1)  [Laravel Framework](https://laravel.com/) (5.6). Front-End framework used
is [Vue.js](https://vuejs.org/)

#### System Configuration

Follow below steps to configure the project in your PCs.

 
- Clone the Git Repository [CMMS](https://github.com/NGimhana/CMMS) into your PC
    - __*git clone https://github.com/NGimhana/CMMS*__ 
- Update the Composer
    - __*composer update*__
    
_Note_ : Use [Composer Fresh Install](https://getcomposer.org/) if composer package manager is not installed.    

- Integrate Node_Modules
    - __*npm install*__
    
#### Database Configuration
- Create a new File with __.env__ extension.(No File Name).As Similar as __.env.example__ file.
- Copy and Paste everything presented in the __.env.example__ to the newly created __.env__ file.
- Edit the __.env__ file like below . use  __DB_DATABASE__ to give the MYSQL Database Name , Use __DB_USERNAME__ and __DB_PASSWORD__ to give authentication creditionals to the Laravel application.
 
    ![Env](https://raw.githubusercontent.com/NGimhana/CMMS/master/dbenv.jpg)      

- Then go to cloned project folder and open terminal there and execute __*php artisan migrate*__ to migrate DB relations in the created database.
 
- Execute this command to add Laravel encrption key__*php artisan key:generate*__

 Now the System is Well Configured in the Computer. Have Problems ? Free to Contact Developers.
 
#### Testing and Debuging

- Use Laravel Inbuilt-server or web server solution stack packages like [XAMPP](https://www.apachefriends.org/index.html) to run the system in local PCs. 
    - __*php artisan serve*__ to use the Laravel Inbuilt-Server. System will run on [http://127.0.0.1:8000](http://127.0.0.1:8000) by default.
    - Make Sure to use XAMPP or similar stack packages supports PHP 7.1+
     
### Contributing

Thank you for considering contributing to the COTENCE System. Contributing guidelines will be updated soon. But Issue reporting and Pull Requests are always welcome. 

## Security Vulnerabilities

If you discover a security vulnerability within COTENCE, please send an e-mail to N.Gimhana via [ngimhana94@gmail.com](mailto:ngimhana94@gmail.com). All security vulnerabilities will be promptly addressed.

## License

COTENCE System is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
