# S2click - Gestão de Doação

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

<p align="center">
  <img src="https://raw.githubusercontent.com/rdrumond33/s2click/master/public/logo.png" alt="Custom image"/>
</p>

S2click e um projeto criado para o circuito academico da <strong><em>  Unibh </em></strong>com o tema de <strong>Revolução Digital </strong> como objetivo ajudar uma instituição de apoio a pessoas carentes. 

## Requisitos
- Xammp ou Wampserve.
- Composer

## Installation
Clonar o projeto:

```
 git clone https://github.com/rdrumond33/s2click.git.
```

> **Colocar:** Na pasta WWW se for Wampserve se for Xampp htdocs.
> **Recomendo:** colocar locamnte pois o php serve nao funciona direito.

Instalar as depedencias:

```
composer install
```


## Criar o arquivo .env 

```
Criar .env dentro da pasta clonada.
```

Criar a key do laravel:

```
  php artisan key:generate
```

Por ultimo subir o banco de dados:
> **Criar:** O banco de dados.
> **Editar .env:** com o nome do banco e o root e a senha.


```
php artisan migrate
```
