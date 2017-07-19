# wp-docker-setup
WordPress Docker Setup with Mailhog


## Theme installation

Clone or unzip this repository; replace `elancer-starter` with your theme name

```shell
# @ /
$ docker-compose up
```

```shell
# @ /app/themes/elancer-starter
$ composer install
```

```shell
# @ /app/themes/elancer-starter
$ yarn install
```

```shell
# @ /app/themes/elancer-starter
$ yarn run start
```

For more information about yarn in this project, read theme [Readme](https://github.com/chorstikus/wp-docker-setup/tree/master/app/wp-content/themes/elancer-starter)