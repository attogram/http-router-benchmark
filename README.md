## Benchmark (1k iterations with 1k routes)

```
+---------------------+------+--------------+-------+
| subject             | its  | mean         | diff  |
+---------------------+------+--------------+-------+
| benchSunriseMatch   | 1000 | 17,856.609μs | 1.00x |
| benchFastRouteMatch | 1000 | 20,920.968μs | 1.17x |
| benchAuraMatch      | 1000 | 44,480.588μs | 2.49x |
| benchZendMatch      | 1000 | 96,778.725μs | 5.42x |
+---------------------+------+--------------+-------+
```

## Installation

#### Cloning the repository

```bash
git clone git@github.com:sunrise-php/http-router-benchmark.git
```

#### Installing dependencies

```bash
composer install
```

## Benchmark run

```bash
php vendor/bin/phpbench run --report='generator: "table", cols: ["subject", "its", "mean", "diff"], sort: {mean: "asc"}'
```
