# http-router-benchmark

PHP Router Benchmarks.

* [docs](docs/)
* [example results](docs/results.md)

## Routers

* [attogram/router](https://github.com/attogram/router)
* [aura/router](https://github.com/aura/router)
* [nikic/fast-route](https://github.com/nikic/fast-route)
* [sunrise/http-router](https://github.com/sunrise/http-router)
* [zendframework/zend-router](https://github.com/zendframework/zend-router)

## Installation

* Clone the repository

```bash
git clone git@github.com:sunrise-php/http-router-benchmark.git
```

* Install dependencies

```bash
composer install
```

## Run Benchmark

unix:

```bash
php vendor/bin/phpbench run --report='generator: "table", cols: ["subject", "its", "mean", "diff"], sort: {mean: "asc"}'
```

windows:

```
vendor\bin\phpbench.bat run --report="generator: "table", cols: ["subject", "its", "mean", "diff"], sort: {mean: "asc"}"
```
