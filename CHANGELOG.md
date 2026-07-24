# Changelog

All notable changes to `frictionlessdigital\actions` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## v12.2 | Clean up - 2026-07-24

### What's Changed

* Bump dependabot/fetch-metadata from 2.5.0 to 3.0.0 by @dependabot[bot] in https://github.com/Frictionlessdigital/actions/pull/18
* Bump actions/checkout from 4 to 6 by @dependabot[bot] in https://github.com/Frictionlessdigital/actions/pull/12
* Bump stefanzweifel/git-auto-commit-action from 5 to 7 by @dependabot[bot] in https://github.com/Frictionlessdigital/actions/pull/11

**Full Changelog**: https://github.com/Frictionlessdigital/actions/compare/12.1.0...12.2.0

## v12.1 | Laravel 13 - 2026-07-24

### What's Changed

* Bump dependabot/fetch-metadata from 2.3.0 to 2.5.0 by @dependabot[bot] in https://github.com/Frictionlessdigital/actions/pull/14
* Add support for Laravel 13 and PHP 8.3 in CI matrix by @nickfls in https://github.com/Frictionlessdigital/actions/pull/19

**Full Changelog**: https://github.com/Frictionlessdigital/actions/compare/11.2...12.1.0

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
