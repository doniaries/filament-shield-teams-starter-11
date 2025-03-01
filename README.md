# Filament Shield Team

Filament Starter is a [Filament](https://filamentphp.com/) distribution with lots 
of pre-installed.

## New Installation

Update to Laravel 11
Team A dan Team B

User : superadmin@gmail.com
password : @Iamsuperadmin


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


You can customize your tenant team name at database\Seeders\FirstTenantSeeder IMX will be default



```
Team::create([
    'name' => 'Team 1',
    'slug' => 'team-1',
])->users()->attach(User::find(1));

```

Then Run This

```
php artisan db:seed
```

You can now go to /admin on your site and you should see the filament 
login screen. 

