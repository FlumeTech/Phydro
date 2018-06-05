# Phydro - PHP bindings for libhydrogen

## Building

Either install libhydrogen to a standard system location, or check out the source tree and build this extension directly against that.

Example building against libhydrogen sources:
```sh
$ mkdir src
$ cd src
$ git clone https://github.com/jedisct1/libhydrogen.git
$ git clone https://github.com/FlumeTech/phydro.git
$ cd phydro
$ phpize
$ ./configure --with-phydro=../libhydrogen
$ make
```

