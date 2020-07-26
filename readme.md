## About GonnaSolve
This project was builded for the Software House task. Creating simple online forum that adopt between [Quora](https://quora.com) and [StackOverflow](https://stackoverflow.com) concept.

### Documentation
![Index Page](documentation/index.png)
![Home Page](documentation/home.png)
![Dashboard Page](documentation/dashboard.png)

### Guide
#### First Installation
For the first installation, you must follow the following commands before run the project :
- Clone from remote repo with command `git clone https://github.com/MuhammadArifFaizin/GonnaSolve/`
- Install the composer with command `composer install`
- Set the `.env` file by editing or copying the `.env.example` for your own local database
- Add the key for the `.env` by command `php artisan key:generate`
- Run the migration with command `php artisan migrate` to create the table
- [Optional] run the seeder to generate table automatically with command `php artisan db:seed`

#### Git Initialization
If you didn't set the git before, you can follow commands below :
- Init the git with `git init`
- Set your user config for commit activity
    * Set username with `git config --global user.name "YOUR_USERNAME"`
    * Set user email with `git config --global user.email "YOUR_EMAIL"`
- Add the remote property with command `git remote add REMOTE_NAME https://github.com/MuhammadArifFaizin/GonnaSolve.git`

#### Running the Project
You can run this project by running the XAMPP in the `PROJECT_DIRECTORY/public`.
Then, make sure the Apache and MySQL has already started, and open the localhost in browser.
But if you didn't want to use localhost, you can run command `php artisan serve` and you will be redirected to `https://localhost:8000`.

#### Commit Changes
To make contribution to this project, make sure that you have added for contributor by the author.
After that, you can use following command to merging your current changes into the remote :
- Check your changes with `git status` to know anything that changed
- Add your changes to staged by `git add --all` for all changes
- Commit the staged file with some change message with `git commit -m "rX.XX - CHANGED_MESSAGE"`. Note that `rX.XX` is the revision version of the changes depend on latest changes, for examples : `r0.03`, `r1.35`, `r4.99`
- To sync your changes with the remote, you must do this :
    * Always make sure that you're updated with the remote by using `git status`, if there are have any differences, you can merge the differences to your local first with `git pull REMOTE_NAME master` to make sure there are no conflict with the latest updates
    * If your local have the latest updates, you can start to push the local commit into the remote by `git push REMOTE_NAME master`
Note :
If you doing any mistakes with previous commit, you can still change it with `git commit --amend -m "CHANGED_MESSAGE"` for revision with different messages or `git commit --amend --no-edit` for revision with same message

### Team
- Ivan Abdillah Rahman (05111840000137)
- Johnivan Aldo Sudiono (05111940000051)
- Muhammad Arif Faizin (05111940000060)
- Adrian Santoso (05111940000130)

### Build by
- Laravel v5.8
- Bootstrap v4.1
- jQuery v3.5.1

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
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

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
