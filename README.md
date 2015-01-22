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

## Approach
Using ready components as possible, and try to keep project as simple as possible with OOP approach.
Due to too enthusiastic decision and time limitation, test will be available in next iteration.
