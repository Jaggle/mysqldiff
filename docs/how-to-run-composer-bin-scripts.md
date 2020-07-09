# 如何运行composer安装的可执行脚本？

PHP的包管理工具composer除了可以安装一些PHP项目的依赖，也可以用于安装一些可执行的程序，就像yum, apt-get, homebrew那样。

首先检查composer的可执行程序的安装目录，所有跟目录相关的配置如下：

```bash
➔ composer global config -l | grep dir
Changed current directory to /Users/jake/.composer
[vendor-dir] vendor (/Users/Jake/.composer/vendor)
[bin-dir] {$vendor-dir}/bin (/Users/Jake/.composer/vendor/bin)
[cache-dir] /Users/jake/.composer/cache
[data-dir] /Users/jake/.composer
[cache-files-dir] {$cache-dir}/files (/Users/jake/.composer/cache/files)
[cache-repo-dir] {$cache-dir}/repo (/Users/jake/.composer/cache/repo)
[cache-vcs-dir] {$cache-dir}/vcs (/Users/jake/.composer/cache/vcs)
[archive-dir] .
```

其中`bin-dir`即为可执行程序的安装路径。

你也可以修改这些配置：

```bash
➔ composer global config bin-dir bin/ # 路径相对于data-dir
```


把`bin-dir`加入到path中：

```bash
export PATH="$PATH:/Users/Jake/.composer/vendor/bin" # 如果你用的bash 应当把这一行加入到~/.bashrc中，如果你用的是zsh，应当把这一行加入到~/.zshrc中
```

这样就可以执行通过composer安装的脚本程序了，比如phpunit等等。
