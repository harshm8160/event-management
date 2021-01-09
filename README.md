<p align="center">
    <h1 align="center">Event Management System</h1>
    <br>
</p>

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.6.0.


INSTALLATION
------------

### Install with GIT Hub

Get project source code 

    git clone https://github.com/harshm8160/event-management.git
    
Move to directory

    cd event-management
    
Open terminal or command prompt and update dependencies with Composer

    composer update
    
You can then access the application through the following URL:

    http://localhost/event-management

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=event_managemet_system',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```


