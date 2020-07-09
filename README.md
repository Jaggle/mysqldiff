# MysqlDiff

diff mysql db structure and generate laravel migrations

## 安装

```
composer global require jaggle/mysqldiff
```

> [如何运行composer安装的可执行脚本？](docs/how-to-run-composer-bin-scripts.md)


## 使用

初始化配置文件：

```bash
msyqldiff --init
```

修改配置文件，填写连接信息：

```bash
vim ~/.mysqldiff/config.json
```

开始diff:

```bash
myqldiff
```
