<h1 align="center">Laravel-lang</h1>
<p align="center">52 languages support for Laravel 5 application based on <a href="https://github.com/caouecs/Laravel-lang">caouecs/Laravel-lang</a>. <a href="https://github.com/overtrue/laravel-lang/blob/master/README_CN.md">δΈ­ζθ―΄ζ</a></p>
<p align="center"><a href="https://github.com/overtrue/laravel-lang"><img alt="For Laravel 5" src="https://img.shields.io/badge/laravel-5.*-green.svg" style="max-width:100%;"></a>
<a href="https://github.com/overtrue/laravel-lang"><img alt="For Lumen 5" src="https://img.shields.io/badge/lumen-5.*-green.svg" style="max-width:100%;"></a>
<a href="https://packagist.org/packages/overtrue/laravel-lang"><img alt="Latest Stable Version" src="https://img.shields.io/packagist/v/overtrue/laravel-lang.svg" style="max-width:100%;"></a>
<a href="https://packagist.org/packages/overtrue/laravel-lang"><img alt="Latest Unstable Version" src="https://img.shields.io/packagist/vpre/overtrue/laravel-lang.svg" style="max-width:100%;"></a>
<a href="https://packagist.org/packages/overtrue/laravel-lang"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/overtrue/laravel-lang.svg?maxAge=2592000" style="max-width:100%;"></a>
<a href="https://packagist.org/packages/overtrue/laravel-lang"><img alt="License" src="https://img.shields.io/packagist/l/overtrue/laravel-lang.svg?maxAge=2592000" style="max-width:100%;"></a></p>


# Features

- Laravel 5 & Lumen support.
- Translations Publisher.
- Made with π.

# Install

```shell
$ composer require "overtrue/laravel-lang:~3.0"
```

#### Laraval 5.*

After completion of the above, Replace the `config/app.php` content

```php
Illuminate\Translation\TranslationServiceProvider::class,
```
with:

```php
Overtrue\LaravelLang\TranslationServiceProvider::class,
```

#### Lumen

Add the following line to `bootstrap/app.php`:

```php
$app->register(Overtrue\LaravelLang\TranslationServiceProvider::class);
```

# Configuration

### Laravel
you can change the locale at `config/app.php`:

```php
'locale' => 'zh-CN',
```

### Lumen

set locale in `.env` file:

```
APP_LOCALE=zh-CN
```

# Usage

There is no difference with the usual usage.

If you need to add additional language content, Please create a file in the `resources/lang/{LANGUAGE}`  directory.

### Add custom language items

Here, for example in Chinese:

`resources/lang/zh-CN/demo.php`:

```php
<?php

return [
    'user_not_exists'    => 'η¨ζ·δΈε­ε¨',
    'email_has_registed' => 'ι?η?± :email ε·²η»ζ³¨εθΏοΌ',
];
```
Used in the template:

```php
echo trans('demo.user_not_exists'); // η¨ζ·δΈε­ε¨
echo trans('demo.email_has_registed', ['email' => 'anzhengchao@gmail.com']);
// ι?η?± anzhengchao@gmail.com ε·²η»ζ³¨εθΏοΌ
```

### Replace the default language items partially

We assume that want to replace the `password.reset` message:

`resources/lang/zh-CN/passwords.php`:

```php
<?php

return [
    'reset' => 'ζ¨ηε―η ε·²η»ιη½?ζεδΊοΌδ½ ε―δ»₯δ½Ώη¨ζ°ηε―η η»ε½δΊ!',
];
```

You need only add the partials item what you want.

### publish the language files to your project `resources/lang/` directory:

```shell
$ php artisan lang:publish [LOCALES] {--force}
```

examples:

```shell
$ php artisan lang:publish zh-CN,zh-HK,th,tk
```

# License

MIT

[badge_laravel]:      https://img.shields.io/badge/laravel-5.*-green.svg
[badge_lumen]:        https://img.shields.io/badge/lumen-5.*-green.svg
[badge_stable]:       https://img.shields.io/packagist/v/overtrue/laravel-lang.svg
[badge_unstable]:     https://img.shields.io/packagist/vpre/overtrue/laravel-lang.svg
[badge_downloads]:    https://img.shields.io/packagist/dt/overtrue/laravel-lang.svg?maxAge=2592000
[badge_license]:      https://img.shields.io/packagist/l/overtrue/laravel-lang.svg?maxAge=2592000

[link-github-repo]:   https://github.com/overtrue/laravel-lang
[link-packagist]:   https://packagist.org/packages/overtrue/laravel-lang
