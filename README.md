# 🛠 Native enum utilities you always need

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dive-be/php-enum-utils.svg?style=flat-square)](https://packagist.org/packages/dive-be/php-enum-utils)

This library provides a collection of native enum utilities (traits) which you almost always need in every PHP project.

- [Arrayable](#arrayable-backed-enums-only)
- [Assertable](#assertable)
- [Comparable](#comparable)
- [NameListable](#namelistable)
- [ValueListable](#valuelistable-backed-enums-only)
- [WithUtilities](#withutilities-backed-enums-only)

## Installation

You can install the package via composer:

```bash
composer require dive-be/php-enum-utils
```

## Usage

Assume the following `string` backed enum:

```php
enum Role: string
{
    use \Dive\Enum\Arrayable;
    use \Dive\Enum\Assertable;
    use \Dive\Enum\Comparable;
    use \Dive\Enum\NameListable;
    use \Dive\Enum\ValueListable;

    case Administrator = 'admin';
    case Auditor = 'audit';
    case Moderator = 'mod';
}
```

### Arrayable (backed enums only)

Allows you to retrieve a key-value pair of names and values:

```php
Role::toArray(); // ['Administrator' => 'admin', 'Auditor' => 'audit', 'Moderator' => 'mod']
```

### Assertable

> This relies on the enum names being in PascalCase, which follows [Larry Garfield's RFC](https://wiki.php.net/rfc/enumerations).

Allows you to make assertions on enum instances using predicate functions:

```php
$role = Role::Moderator;

$role->isAuditor(); // false
$role->isModerator(); // true
```

### Comparable

Allows you to compare enums. Mostly useful when providing backed values:

```php
$role = Role::Administrator;

$role->equals('admin'); // true
$role->equals(Role::Administrator); // true
$role->equals('mod'); // false
$role->equals(Role::Moderator); // false

$role->equalsAny(['admin', 'mod', 'audit']); // true
$role->equalsAny([Role::Administrator, Role::Auditor]); // true
$role->equalsAny([Role::Moderator, 'audit']); // false
```

### NameListable

Allows you to retrieve a list of the enum names:

```php
Role::toNames(); // ['Administrator', 'Auditor', 'Moderator']
```

### ValueListable (backed enums only)

Allows you to retrieve a list of the enum values:

```php
Role::toValues(); // ['admin', 'audit', 'mod']
```

### WithUtilities (backed enums only)

Aggregator trait for all of the aforementioned utilities.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email oss@dive.be instead of using the issue tracker.

## Credits

- [Muhammed Sari](https://github.com/mabdullahsari)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
