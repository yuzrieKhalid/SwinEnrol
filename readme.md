# Student Enrolment System (SES)

Swinburne Student Enrolment System is a Software Engineering Project for IO47 March Intake 2016. The system is continued to be developed by 3 people:
- Mohamad Yuzrie Bin Khalid
- Jason Thomas Chew
- Sariful Haque

## Instructions

Please read this first before you start development. The technology we're going to use are as follows:
- Ubuntu 14.04 (OS)
- LAMP (Linux, Apache2, MariaDB, PHP 5.6)
- Laravel 5.2
- Bootstrap 3
- Git

For the installation, you can choose to do it in Virtual Machine or Dual Boot with Windows (I won't mind either way). After OS installation, please install LAMP on Ubuntu, you can follow [Digital Ocean tutorial](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu) or [How to Ubuntu](http://howtoubuntu.org/how-to-install-lamp-on-ubuntu). Just a reminder, replace MySQL with [MariaDB installation](http://www.2daygeek.com/install-upgrade-mariadb-10-on-ubuntu-debian-mint/#). Lastly, don't forget to install git. After finsih installation, clone this repository. (If you have problem cloning, refer to below "How to get started" instructions - the ssh part). Once this is done, in the Terminal (working directory), do `php artisan key:generate`. To start the project, do `php artisan serve` and open your internet browser and go to `localhost:8000`. If you see no errors you're good to go.

## Getting Started

1. Open your Terminal
2. `cd Documents`
3. `git clone https://github.com/yuzrieSiddiq/SwinEnrol.git`
4. `cd SwinEnrol`

5. `cp .env.example .env`
6. `gedit .env` (replace DB_USERNAME, DB_DATABASE and DB_PASSWORD)

7. `composer install`
8. `npm install`

9. `php artisan migrate`
10. `php artisan db:seed`
11. `php artisan serve`

12. Open your Internet browser
13. Go to `localhost:8000`
14. You can check your pages by directly doing something like this `localhost:8000/admin/setenrolmentdates`

## Need help?

If you need help for Laravel, refer to [Laracast Fundamentals](https://laracasts.com/series/laravel-5-fundamentals). or refer to the [documentation](http://laravel.com/docs).

Can't find the answer even in stackoverflow?
Answer: Immediately contact Yuzrie or Jason for help. We'll try to help as soon as we can.

## For CSS and Designs
1. The file is called app.scss in `SwinEnrol/resources/assets/sass/app.scss`
2. To see the changes, go to terminal and run `gulp`
2a. Let `gulp` run alongside with `php artisan serve`
2b. If you are constantly doing the css, run `gulp watch` it will run until you stop it, just like `php artisan serve`
3.

## For those new to Ubuntu tips

- `Ctrl + Alt + T` to open Terminal (CMD)
- Right click in the folder to open the terminal to directly go to the directory
- to search for softwares either use `apt-cache search software>` or just use the Software Centre
- to install for softwares either use `apt-get install software>` or just use the Software Centre
- whenever you get permission denied issue, add a `sudo` infront of the command. Example `sudo apt-get install git`

## License

The SES is open-sourced software licensed under the [GNU GPL license](https://opensource.org/licenses/GPL-3.0).
