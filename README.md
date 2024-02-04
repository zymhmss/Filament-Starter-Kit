# Filament Starter Kit

Filament Starter Kit is a distribution of [Filament](https://filamentphp.com/) with a variety of pre-installed components.

## New Installation

To install Filament Starter Kit, use the following composer command:

```bash
composer create-project lingmyat/filament-starter-kit
```

After installation, run migrations:

```bash
php artisan migrate
```

Create the first/admin user:

```bash
php artisan make:filament-user
```

Initialize Filament Shield:

```bash
php artisan shield:install
```

During the Filament Shield installation, respond with "yes" to all the questions.

## Seed First Tenant 

Customize your tenant team name in `database\Seeders\FirstTenantSeeder`. The default team name is 'Min Shin Saw'.

```php
Team::create([
    'name' => 'Min Shin Saw',
    'slug' => 'min-shin-saw',
])->users()->attach(User::find(1));
```

Then run the following command:

```bash
php artisan db:seed
```

Visit `/admin` on your site, and you should see the Filament login screen. Log in with the user created in step #4.

This Starter Kit incorporates the Filament Shield plugin for roles and permissions. For additional usage and commands, refer to the [Filament Shield repository](https://github.com/bezhanSalleh/filament-shield).

All relevant migrations, views, and config files have been published to the main Laravel directory tree in the expected locations. If a package, such as the Spatie packages, is based on another package, the base package migrations and config files are also published.

## License 
The MIT License. Please see [the license file](LICENSE.md) for more information.
