# Aiatar

Aiatar - simple generator for user avatar with ai prompt

## Installation

```bash
composer require lukawar/aiatar
```

```bash
php artisan vendor:publish --tag=config
```

## Usage


```php
use Lukawar\Aiatar;

$generator = app(Aiatar::class);
$image = $generator->generate('A face with man in glasses with beard');

Storage::disk('public')->put('avatar.png', $image);
```