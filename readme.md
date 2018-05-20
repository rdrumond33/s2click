<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Como instalar S2click
<h5>1- Clonar o projeto usando o comando  do git -> clone https://github.com/rdrumond33/s2click.git.</h5>
<h5>2-Vai ate a pasta com o git bash ou cmd e executa os comandos</h5>
<ul>
 <li>
 Digite o commando "composer install". Ele vai instalar todos os pacotes php necessários.
</li>
<li>
Depois renomear o arquivo '.env.exemple' para '.env' e colocar o banco o nome do banco o usuario e senha
</li>
<li>
Digite o commando "php artisan key:generate". Esse vai gerar uma chave para sua aplicação. Sem isso o Laravel não vai funcionar  
</li>
</ul>


<h5>4- Depois digitar o comando 'php artisan migrate' que irar criar as tabelas</h5>

<h5>5- Depois o comando  'php artisan db:seed' que irar prencher seu banco</h5>
<h5>6- Depois o comando que irar rodar o serve do php 'php artisan serve'</h5>


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
