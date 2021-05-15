# Tweety

Twitter-like application on base of [Laravel](https://laravel.com/) framework created for educational purposes.

![](https://img.shields.io/github/license/1mpossible-code/tweety?color=green)

* [Description](#description)
* [Features](#features)
* [Installation](#installation)
* [Usage](#usage)
* [Contributing](#contributing)
* [Credits](#credits)
* [License](#license)

## Description

Tweety is created for educational purposes.

This application uses [Laravel](https://laravel.com/), [Laravel Livewire](https://laravel-livewire.com/)
and [Tailwind CSS](https://tailwindcss.com/).

Tweety uses the best Laravel features and practices.

![](storage/tweety.gif)

## Features

Tweety has following features:

- Followers system
- Personal customizable profile page
- Real-time explore users page
- Tweets system
- Tweets rating system
- Replies system
- Mentions in tweets and replies
- [Notifications](https://laravel.com/docs/8.x/notifications) for mentioned users
- Guest content supported

## Installation

Dependencies:

- [composer](https://getcomposer.org/)
- [docker-compose](https://docs.docker.com/compose/)
- [docker](https://www.docker.com/)

To install Tweety, you must do following:

* Download the archive or clone the project using git

```shell
git clone https://github.com/1mpossible-code/tweety.git
```

## Usage

You can run the build with following:

1. Create `.env` file from `.env.example` file
1. Run `composer install`
1. Run `php artisan key:generate`
1. Run `docker-compose up`
1. Check CONTAINER ID of apache container
1. Run `docker exec -ti CONTAINER ID sh -c "php app/artisan migrate"`
1. Open in browser http://localhost/

## Contributing

Feel freely to contribute this project. [Issues](https://github.com/1mpossible-code/tweety/issues)
and [PRs](https://github.com/1mpossible-code/tweety/pulls) are welcome!

## Credits

You can mail to `linme00p@gmail.com` to contact the author

# License

Copyright © 2021 [1mpossible-code](https://github.com/1mpossible-code). This project
is [GPLv3](https://www.https://www.gnu.org/licenses/gpl-3.0.htmlgnu.org/licenses/gpl-3.0) licensed.
