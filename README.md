## Benchmark (1k iterations with 1k routes)

```
+---------------------+------+---------------+-------+
| subject             | its  | mean          | diff  |
+---------------------+------+---------------+-------+
| benchSunriseMatch   | 1000 | 23,047.975μs  | 1.00x |
| benchFastRouteMatch | 1000 | 24,175.528μs  | 1.05x |
| benchAuraMatch      | 1000 | 78,496.834μs  | 3.41x |
| benchZendMatch      | 1000 | 104,996.797μs | 4.56x |
+---------------------+------+---------------+-------+
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
