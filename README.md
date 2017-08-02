# Sourcebot
A news bot.

## Configuration

As Sourcebot relies on messaging platforms for its user interface you will have to configure a few 3rd party services to get going:

- [A Facebook Page](https://web.facebook.com/pages/create)
- [A Facebook App](http://developer.facebook.com)
  - Use the [quickstart](https://developers.facebook.com/docs/messenger-platform/guides/quick-start)
    - Make sure you associate the new Facebook App with the new Facebook Page in Settings -> Advanced.
  - Get a Facebook Page Access Token and set `FACEBOOK_PAGE_ACCESS_TOKEN`
  - Get the Facebook App Secret and set `FACEBOOK_APP_SECRET`
  - Choose any Verify Token and set `FACEBOOK_VERIFY_TOKEN`

## Develop
[![Code Climate](https://codeclimate.com/github/ejcnet/sourcebot/badges/gpa.svg)](https://codeclimate.com/github/ejcnet/sourcebot)

First time:

- run `composer install`
- run `phpunit`

Update dependencies with `composer update`

## Test
[![Test Coverage](https://codeclimate.com/github/ejcnet/sourcebot/badges/coverage.svg)](https://codeclimate.com/github/ejcnet/sourcebot/coverage)

Tests are run with `phpunit`

## Build
[![CircleCI](https://circleci.com/gh/ejcnet/sourcebot.svg?style=svg)](https://circleci.com/gh/Ejcnet/sourcebot)

## Deploy

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

You will always be able to deploy Sourcebot to Heroku with a few clicks and for free.

## Contribute

Contributions are welcome and we follow a simple Github pull request process:

- Fork
- Code
- Test
- Submit a pull request
