# Testbed for Laravel phpunit memory consumption

- `composer install`
- Generate n² methods with:
  `php artisan generateHorde 50`
  
  Files are generate in `tests/Unit/TestHorde/Test<n>Test.php`.
- Run tests:
  `vendor/bin/phpunit`

  Observe the increased memory output:
  ```
  $ vendor/bin/phpunit
  PHPUnit 8.4.3 by Sebastian Bergmann and contributors.

  .21294088
  …
  . 2501 / 2501 (100%)
  50370656


  Time: 12.66 seconds, Memory: 54.00 MB

  OK (2501 tests, 2501 assertions)
  ```

Adjust `\App\Console\Commands\GenerateHorde` to generate a different kind of test.
