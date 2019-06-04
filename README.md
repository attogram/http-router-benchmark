# http-router-benchmark

Benchmark (1k iterations with 1k routes)

```
+---------------------+------+--------------+--------+
| benchAttogramMatch  | 1000 | 1,007.592μs  | 1.00x  |
| benchSunriseMatch   | 1000 | 2,922.666μs  | 2.90x  |
| benchFastRouteMatch | 1000 | 3,289.040μs  | 3.26x  |
| benchAuraMatch      | 1000 | 5,832.127μs  | 5.79x  |
| benchZendMatch      | 1000 | 18,620.681μs | 18.48x |
+---------------------+------+--------------+--------+

+---------------------+------+--------------+-------+
| subject             | its  | mean         | diff  |
+---------------------+------+--------------+-------+
| benchSunriseMatch   | 1000 | 3,285.527μs  | 1.00x |
| benchFastRouteMatch | 1000 | 3,424.920μs  | 1.04x |
| benchAuraMatch      | 1000 | 5,727.049μs  | 1.74x |
| benchZendMatch      | 1000 | 19,213.987μs | 5.85x |
+---------------------+------+--------------+-------+

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
