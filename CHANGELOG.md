# Changelog
All notable changes to this project will be documented in this file. This
project adheres to [Semantic Versioning](http://semver.org).

## [v0.4.2] - 2016-05-06
### Added
- planned support for AppVeyor/ScrutinizerCI to roadmap
- changelog from Github release notes (@robojamison)

## [v0.4.1] - 2016-04-26
### Fixed
- missing placeholder contributions guidelines file (@ravage84)
- missing preferred editor configuration file (@ravage84)
- missing export-ignore rules file for tests and docs (@ravage84)
- missing placeholder project roadmap file (@ravage84)
- missing explicit CakePHP 3.x dependency in composer.json (@ravage84)

## [v0.4.0] - 2016-04-13
### Fixed
- removed `SyntaxEra\\` namespace in Composer definition (@robojamison)

### Removed
- unused/unimplemented test stubs in `SparkPostTransportTest` (@robojamison)

## [v0.3.3] - 2016-04-12
### Added
- TravisCI integration (@dereuromark)

## [v0.3.2] - 2016-04-07
### Added
- support for PHPUnit unit tests, but no actual tests yet (@robojamison)

## [v0.3.1] - 2016-04-07
### Fixed
- composer sometimes won't download over HTTPS/SSH properly (@robojamison)

## [v0.3.0] - 2016-04-07
### Changed
- re-implemented plugin as Transport instead of as Component (@dereuromark)

## [v0.2.2] - 2016-04-06
### Added
- support for reading SparkPost API key from app config file (@robojamison)

## [v0.2.1] - 2016-04-06
### Removed
- removed SparkPost API key that got accidentally committed (@robojamison)

## [v0.2.0] - 2016-04-06
### Added
- `SparkPostComponent` and proof-of-concept email test (@robojamison)

## [v0.1.1] - 2016-04-06
### Added
- gitignore files w/ rules for CakePHP, Emacs, Vim, etc. (@robojamison)

### Removed
- unneeded sample app files (@robojamison)
