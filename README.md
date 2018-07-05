# Typesafe Functions

To assist with boilerplate around working with internal functions but ensuing that your code keeps tools like [phpstan](https://github.com/phpstan/phpstan) and [phpqa](https://github.com/edmondscommerce/phpqa) happy

## Functions Replaced:

### `file_get_contents`

returns false|string by default

replaced with `\ts\file_get_contents`

### `strpos`

returns false|int by default

multiple replacements depending on use case:

`\ts\strpos` to get the actual string position when it is known that the haystack contains the needle

`\ts\stringContains` to check if the haystack contains the needle

`\ts\stringStartsWith` to check if the haystack begins with the needle

### `stripos`

//TODO - but will be as above, but case insensitive

### `print_r`

When passing true, this returns a string, for example
```php
<?php
$string=\print_r(['a'=>1], true);
```
To make this type safe, we replace with 
```php
<?php
$string = \ts\varToString(['a'=>1]);
```

## Reflection

### ReflectionClass

#### Find Replace
| Find  | Replace   |
|---|---|
|`new \ReflectionClass` | `new \ts\Reflection\ReflectionClass` |
| `: \ReflectionClass`  | `: \ts\Reflection\ReflectionClass` |
