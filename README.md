# FLS :: Actions

Based on phenomenal [Loris Leiva](https://lorisleiva.com/) [Actions for Laravel](https://laravelactions.com/), this package is just a wrapper with a few methods added to sugar-syntax it.

This is for version 9.x and above, which is NOT directly compatible with 1.x. 

## Installation

```bash
composer require "frictionlessdigital/actions":"^9.0"
```

**Note that root namespace for the package is `Fls` not `Frictionlessditial`.**

### Config

The package does not require configuration.

## Usage

Read base documentation here: [Laravel Actions](https://laravelactions.com/)

### Action::tap($value, $closure)

The protected method is similar to `tap()`: will return the `$value` after passing it to the `$closure`.

```php
return $this->tap(User::first(), fn(User $user) => $user->delete());
```
is the equivalent of
```php

$user = User::first();

$user->delete();

return $user;

// $user;
```

### Action::pipe($value, $closure)

Similar to `pipe()`, this protected method will return the result `$value` after running the `$closure`; closure is free to modify the `$value`.

```php
return $this->pipe(User::first(), fn($user) => $user->delete());
```
is the equivalent of
```php
$user = User::first();

return $user->delete();

// true;
```

### Action::validated()

This is an alias for `validateAttributes()` - returns an array of attributes validated througn `rules()`.

```php
use Fls\Actions\Action;

class UserAction extends Action
{
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'notes' => ['nullable', 'string'],
        ];
    }

    ...
    public function handle($attributes) {
        return $this->fill($attributes)->validated();
    }
}

UserAction::run([
    'name' => 'John',
    'email' => 'john@smith.com',
]);

//  ['name' => 'John', 'email' => 'john@smith.com']

```

### Action::validate()

This method will validate the attribute, throw an exception is data is not valid, but the return value is the class itself; good for chaining.

```php
use Fls\Actions\Action;

class UserAction extends Action
{
    ...
    public function handle(User $user, $attributes) {
        return $this->fill($attributes)
                    ->validate()
                    ->tap($user, fn(User $user) => $user->update($this->validated()));
    }
}
```

Could be useful if you need to make sure validation is complete before chaining-in another action.

### Action::runInTransaction(...$attributes)

This method will wrap the action in a DB transaction.

```php

use Fls\Actions\Action;
use App\User;

class CreateUserAction extends Action
{
    public function handle(User $user, $attributes) 
    {
        return $user->create($attributes);
    }
}
```

and can be executed using `run` and `runInTransaction` alike. In the latter case, the action will be executed inside a `DB::transaction`. 
Return value would match between the two. 

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email support@frictionlesssolutions.com instead of using the issue tracker.

## Credits

- [Cyrill N Kalita][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-author]: https://github.com/nickfls
[link-contributors]: ../../contributors

___

<p align="center"><a href="http://frictionlesssolutions.com" title="Fricitonless Solutions Inc."><img src="./resources/docs/gramma.png"></a></p>
