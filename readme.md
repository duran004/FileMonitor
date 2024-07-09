# File Monitor

[![Total Downloads](https://img.shields.io/packagist/dt/dcyilmaz/file-monitor.svg?style=flat-square)](https://packagist.org/packages/dcyilmaz/file-monitor)

File Monitor is a Laravel package that allows you to monitor file changes within your application. It helps in keeping track of modifications, creations of files and directories.

## Installation

You can install the package via Composer:

### Install package
```bash
composer require dcyilmaz/file-monitor
```
### Install file_records table
```bash
php artisan migrate
```
### Scan all files
```bash
php artisan file-monitor:check --init
```
### You should see this kind of writing.
![image](https://github.com/duran004/FileMonitor/assets/132943905/225c1e45-f712-4564-ab71-f0585a71da1d)

### You can then scan and check your files at any time with this command
```bash
php artisan file-monitor:check
```
### This is how you can see your scan results
![image](https://github.com/duran004/FileMonitor/assets/132943905/552f994b-273d-4bb1-a9c3-863a574f9650)
![image](https://github.com/duran004/FileMonitor/assets/132943905/be167310-f447-40af-9521-615dae83ed6b)
