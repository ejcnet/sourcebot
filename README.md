# Sourcebot
A news bot.

### Requirements

Sourcebot relies on messaging platforms for its user interface so you will have to configure a few 3rd party services to actually use it:

- A [Facebook Page](https://web.facebook.com/pages/create)
- A [Facebook App](http://developer.facebook.com) with the Facebook Messenger product

## Develop
[![Code Climate](https://codeclimate.com/github/ejcnet/sourcebot/badges/gpa.svg)](https://codeclimate.com/github/ejcnet/sourcebot)

### Requirements
- [PHP 7.1+](http://php.net/downloads.php)
- [Xdebug](https://xdebug.org/download.php)
- [Composer](https://getcomposer.org/)
- A local web-server e.g. [Apache](https://www.apache.org/dyn/closer.cgi)


### First time

- Run `composer install`
- Visit localhost to confirm you see `index.php`
- Run `cp .env.example .env`
- Edit `.env`
- Run `phpunit`

## Test
[![Test Coverage](https://codeclimate.com/github/ejcnet/sourcebot/badges/coverage.svg)](https://codeclimate.com/github/ejcnet/sourcebot/coverage)

Tests are run with `phpunit`

## Build
[![CircleCI](https://circleci.com/gh/ejcnet/sourcebot.svg?style=svg)](https://circleci.com/gh/Ejcnet/sourcebot)

## Deploy

After deploy you probably want to give your bot a nice home page as `web/index.php` currently displays this `README.md`.

### Requirements
- [PHP 7.1+](http://php.net/downloads.php)
- [Composer](https://getcomposer.org/)
- A web-server e.g. [Apache](https://www.apache.org/dyn/closer.cgi)

### Heroku
[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

You will always be able to deploy Sourcebot to Heroku with a few clicks and for free.

## Contribute

Contributions are welcome and follows the straightforward Github pull request process:

- Fork
- Code
- Test
- Submit a pull request
