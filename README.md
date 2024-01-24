# FilamentStartedKit

FilamentExtendedStarterKit is a [Filament](https://filamentphp.com/) distribution with lots 
of basic utilities and goodies pre-installed.

## New Installation

```bash
composer create-project lingmyat/filament-starter-kit
```

Install dependencies

```bash
composer update
```

Run migrations

```bash
php artisan migrate
```

Create the first/admin user:

```
php artisan make:filament-user
```

Init FilamentShield

```
php artisan shield:install
```


For the FilamentShield install, answer "yes" to all questions it asks.



Seed First Tenant 


You can customize your tenant team name at database\Seeders\FirstTenantSeeder Min Shin Saw will be default



```
Team::create([
    'name' => 'Min Shin Saw',
    'slug' => 'min-shin-saw',
])->users()->attach(User::find(1));

```

Then Run This

```
php artisan db:seed

```

Then you need to add this code at vendor/bezhansalleh/filament-exceptions/src/Resources/ExceptionResourse.php, due to the filament-exception plugin not include for multi tenant so we need to manually add that.

```
protected static bool $isScopedToTenant = false;
```


In theory, that should be it. You can now go to /admin on your site and you should see the filament 
login screen. Log in with the user you created in step #4 above. 

In this Starter Kit I use filament shield plugin for roles and permissions. If you want to know more usage and commands check out this repo [BezhanSalleh Filament Shield](https://github.com/bezhanSalleh/filament-shield).

All relevant migrations, views and config files have been published to the main Laravel 
directory tree to the locations where you would expect them. If a package (such as, for 
exmaple, the Spatie packages) is based upon another package, the base package 
migrations and config files have been published as well. 


