<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## TELZIR-APP - Show me the code

## Getting started

## Installation

Clone the repository

    git clone https://github.com/umserqualquer/telzir-app.git

Install all the dependencies using composer

    composer install

Creating aliases

    alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

Starting and installing with laravel sail docker

    sail up -d

or with more information

    sail up

Add the tables using

    sail migrate

## Tutorial

Create a user on the page

    localhost/register

Login to the user on the page

    localhost/login

Add the codes. Example: Origem(DDD Origin), Destino(DDD Destiny) and Valor(Value)

![alt text](https://github.com/umserqualquer/telzir-app/blob/main/resources/images/code_example.png)

Add the plans. Example: Nome(Plan Name) and Valor(Plan Value)

![alt text](https://github.com/umserqualquer/telzir-app/blob/main/resources/images/plan_example.png)

Add the connections. Example: Origem(DDD Origin), Destino(DDD Destiny), Total de Minutos(Connection Time) and Planos(Plans)

![alt text](https://github.com/umserqualquer/telzir-app/blob/main/resources/images/connection_example.png)

So you will get the results

![alt text](https://github.com/umserqualquer/telzir-app/blob/main/resources/images/history_example.png)
