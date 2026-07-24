# Changelog

All notable changes to `frictionlessdigital\actions` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## [Unreleased]

### Added

- Support for Laravel 13 (`illuminate/support: ^12.0|^13.0`), while remaining backward compatible with Laravel 12.

### Changed

- Bumped `lorisleiva/laravel-actions` to `^2.10` (first release supporting Laravel 13).
- Bumped `orchestra/testbench` to `^10.0|^11.0` so the test suite can run against both Laravel 12 and 13.
- Updated `dev-master` branch alias to `13.x-dev`.
- Added a Laravel 13 / PHP 8.3+ row to the CI test matrix.
- Converted `tests/ActionTest.php` from `@test` doc-comment annotations to `#[Test]` attributes, as doc-comment metadata is dropped in PHPUnit 12.

## [0.1.0] - 2021-07-26

- Initial Commit
