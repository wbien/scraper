# Super Scraper - test project

Super Scraper scrap the Unite Students site for properties and rooms data

## Install

clone code form github
```sh
$ git clone https://github.com/wbien/scraper.git
```

install dependencies
```sh
$ cd scraper
$ composer install
```

## Usage

default csv output
```sh
$ cd app
$ php scraper.php
```

to output json, use:
```sh
$ php scraper.php -f json
```

