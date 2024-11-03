## Chit Chat API

This is simple api for chat application, where user can create a group chat, join group chat, leave group chat, sent a message and attachment.

This is documentation for this API
https://documenter.getpostman.com/view/3460037/2sAY4xB2JT

## How to Install in local

Clone this repository
```
git clone git@github.com:juangsalaz/chitchat-api.git
```

Run composer install command
```
composer install
```

Run migration command
```
php artisan migrate
```

Run DB Seed command to insert dummy users data
```
php artisan db:seed
```

Generate application key
```
php artisan key:generate
```

Running this app
```
php artisan serve
```

or using docker you can run this command
```
./vendor/bin/sail up
```


