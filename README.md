## setup

```shell
$ docker-compose build
$ docker-compose up -d
```

A docker container listens localhost:6543.

## stop

```shell
$ docker-compose down
```
## Attack Flag

Nothing

## Defense Flag

 Token format is `token-[A-Za-z0-9]{32}`.

### Check Flag

```python
from . import def_converter

print(def_converter.tokens())
```



