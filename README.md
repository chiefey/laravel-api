## Steps to Recreate
1. Follow the instructions to [Install Laravel](https://laravel.com/docs/8.x/installation#getting-started-on-macos) (I'm on macOS)
```
$ cd <project-parent-folder>
$ curl -s "https://laravel.build/laravel-api" | bash
$ cd laravel-api
$ ./vendor/bin/sail up
```
2. Commit to Git
```
$ git init
$ git add .
$ git commit -m "Install Laravel 8"
$ git branch -M main
$ git remote add origin https://github.com/chiefey/laravel-api.git
$ git push -u origin main
```
3. Setup Git branching workflow
> Download Git GUI (like [Sourcetree](https://www.sourcetreeapp.com))<br>
In Sourctree setup [git-flow](https://danielkummer.github.io/git-flow-cheatsheet/) with `Repository > Git flow > Initialize Repository`<br>
Then `Repository > Git flow > Start New Feature` to begin branch

4. Open in Visual Studio Code
```
F1 > Remote-Containers: Attach to Running Container: /laravel-api_laravel.test_1
Open Folder: /var/www/html
```
5. Passport
https://laravel.com/docs/8.x/passport#installation
```
$ composer require laravel/passport
$ php artisan migrate
uncomment database/seeders/DatabaseSeeder.php
$ php artisan db:seed
$ php artisan passport:install
[php artisan passport:keys] Encryption keys already exist. Use the --force option to overwrite them.
https://laravel.com/docs/8.x/passport#password-grant-tokens
$ php artisan passport:client --password
select * from users;
$ php artisan route:list
```
6. Configure [Xdebug](https://laravel.com/docs/8.x/sail#debugging-with-xdebug) with Visual Studio Code
```
$ cp .vscode/launch.example.json .vscode/launch.json
```
7. Install [laravel-api-versioning](https://github.com/mbpcoder/laravel-api-versioning#installation)
```
$ composer require mbpcoder/laravel-api-versioning
$ php artisan vendor:publish --provider="MbpCoder\ApiVersioning\ApiVersioningServiceProvider"
```

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
