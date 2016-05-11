# Swinburne Student Enrollment System (SSES)

Swinburne Student Enrollment System is a Software Engineering Project for IO47 March Intake 2016. The system is developed by 5 people:
- Mohamad Yuzrie Bin Khalid
- Muhammad Arslan
- Jason Thomas Chew
- Abdalla Fadel Alhassi
- Sariful Haque

## (Framework) Laravel Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Instructions

Please read this first before you start development. The technology we're going to use are as follows:
- Ubuntu 14.04 (OS)
- LAMP (Linux, Apache2, MariaDB, PHP 5.6)
- Laravel 5.2
- Bootstrap 3
- Git

For the installation, you can choose to do it in Virtual Machine or Dual Boot with Windows (I won't mind either way). After OS installation, please install LAMP on Ubuntu, you can follow [Digital Ocean tutorial](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu) or [How to Ubuntu](http://howtoubuntu.org/how-to-install-lamp-on-ubuntu). Just a reminder, replace MySQL with [MariaDB installation](http://www.2daygeek.com/install-upgrade-mariadb-10-on-ubuntu-debian-mint/#). Lastly, don't forget to install git. After finsih installation, clone this repository. (If you have problem cloning, refer to below "How to get started" instructions - the ssh part). Once this is done, in the Terminal (working directory), do `php artisan key:generate`. To start the project, do `php artisan serve` and open your internet browser and go to `localhost:8000`. If you see no errors you're good to go.

## Additional Instructions 12th May 2016

I doubt you guys would even read this but... here goes.

For those of you who (at the 3rd last week of the semester still haven't get a grasp of how things work) were late, Jason has decided to give an easy life for you by creating a Database Seeder. WTF is that? Answer: Its something good. It automatically sets a sample data in your database; so you don't have to use 'php artisan tinker' and add every sample data manually (like I did before). So, simply follow this steps:

1. Open your Terminal
2. `cd Documents`
3. `git clone https://github.com/yuzrieSiddiq/SwinEnrol.git`
4. `cd SwinEnrol`
5. `cp .env.example .env`
6. `gedit .env` (refer to 'How to get started' and if you follow this, you can skip ssh installation)
7. `composer install`
8. `npm install`
9. `php artisan db:seed`
10. `php artisan migrate`
11. `php artisan serve`
12. Open your Internet browser
13. Go to `localhost:8000`
14. You can check your pages by directly doing something like this `localhost:8000/admin/setenrolmentdates`

```
~Happy Coding~

```
* p.s : Should you see error at any point of the steps, please contact me asap
* p.s.s : This does *NOT* require you to put your `SwinEnrol` folder into `/var/www`
* p.s.s.s : Your `.html` is now `.blade.php` and you can find in `resources/views/`
* p.s.s.s.s : (I'm not even sure is this the right way to "p.s") Do not procrastinate the documentation. That's your main tasks.

## How to get started

Firstly, install ssh as in [this tutorial](https://help.github.com/enterprise/11.10.340/user/articles/generating-ssh-keys/). Then proceed to clone this repository. Then, make a .env file by using the following command: `cp .env.example .env`. Edit the .env through `gedit .env` and update the DB_DATABASE, DB_USERNAME, DB_PASSWORD (don't worry, .env would not be added when you commit your work, so your credential is safe unless accessed from your own PC).

If you need help for Laravel, refer to [Laracast Fundamentals](https://laracasts.com/series/laravel-5-fundamentals).

## For those new to Ubuntu tips

- `Ctrl + Alt + T` to open Terminal (CMD)
- Right click in the folder to open the terminal to directly go to the directory
- to search for softwares either use `apt-cache search software>` or just use the Software Centre
- to install for softwares either use `apt-get install software>` or just use the Software Centre
- whenever you get permission denied issue, add a `sudo` infront of the command. Example `sudo apt-get install git`

## License

The SSES is open-sourced software licensed under the [GNU GPL license](https://opensource.org/licenses/GPL-3.0).
