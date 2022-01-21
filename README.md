# 掲示板

## requirements

- docker
- docker-compose

## deploy

- aliasの設定をする

    ```bash
    source aliases.sh
    ```

- サーバーの立ち上げ

```bash
u
```

- DBのinitialization

```bash
docker exec -i mysql mysql techc < sql/init.sql
```
