# Installation

If you would like to develop new features for dbda follow these instructions:

## Laravel 

Install laravel homestead on your local machine.
To your ``.homestead/Homestead.yml`` file add.


```
sites:
    - map: dbda.local
      to: /home/vagrant/Code/dbda/public

databases:
    - ffinder
    - dbda
    - dbda_test
```

Run ``homestead up --provision`` to get the new site installed. 
Enter your vagrant machine with ``homestead ssh``

## Repository

Inside your vagrant environment change type ``cd /home/vagrant/Code``.
Download sources with ``git clone https://github.com/Thomblin/dbda.git`` and ``cd dbda``.
Get all required packages with ``composer update``.

## PHPUnit

You can run phpunit tests with ``vendor/bin/phpunit`` inside ``/home/vagrant/Code/dbda``.
All tests are stored in ``/home/vagrant/Code/dbda/app/tests``.

## Behat

To run behat tests you need to configure a second domain which points to ``/home/vagrant/Code/dbda``.
This domain is needed to load test configurations like another database.

You can either manipulate the nginx configuration within vagrant or change the serve script of homestead itself:

Inside vagrant ``sudo vi /etc/nginx/sites-available/dbda.local``
and change ``server_name dbda.local;`` to ``server_name dbda.local dbda.test;``

Outside vagrant, on your local machine you may change ``~/.composer/vendor/laravel/homestead/scripts/serve.sh`` 
and replace ``server_name $1;`` with ``server_name $1 ${1/.local/.test};``. 
That way the nginx file will be generated correclty whenever you recreate your vagrant environment. 
Do not forget to ``homestead halt`` and ``homestead up --provision`` your environment.

You can run behat tests with ``vendor/bin/beahat`` inside ``/home/vagrant/Code/dbda``.
Behat tests are stored in ``/home/vagrant/Code/dbda/app/tests/behat``.