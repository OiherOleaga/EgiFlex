<p align="center">
  <a href="https://github.com/OiherOleaga/egiflex/graphs/contributors">
    <img src="https://img.shields.io/github/contributors/OiherOleaga/egiflex" alt="Contributors" />
  </a>
</p>
<p style="text-align: center; border-bottom: 2px solid lightgray;">&nbsp;</p>
<div align="center">
    <a href="https://github.com/OiherOleaga/egiflex">
    <img src="laravel/public/egiflex/logoEgiFlex.png" alt="Logo" width="250" height="250">
  </a>

  <h3 align="center">EgiFlex</h3>

  <p align="center">Bienvenido al repositorio oficial de EgiFlex, en este repositorio podras encontrarte todo el codigo de nuestra aplicación web.</p>
  <p align="center"><a href="http://egiflex.es">Vue</a></p>
  <p align="center"><a href="http://admin.egiflex.es">Laravel</a></p>


</div>

<div align="center">

[![Vue][Vue.js]][Vue-url] [![Laravel][Laravel.com]][Laravel-url] [![Tailwind][Tailwind.com]][Tailwind-url] [![Bootstrap][Bootstrap.com]][Bootstrap-url] ![MySQL]

</div>


# Índice
* [Como desplegar el repositorio](#como-desplegar-el-repositorio)
* [Ejecutar aplicacion backend en local](#ejecutar-aplicacion-backend-en-local)
* [Ejecutar aplicacion frontend en local](#ejecutar-aplicacion-frontend-en-local)
* [Usuarios](#usuarios)
    * [Administradores](#administradores)
    * [Clientes](#clientes)

# Como desplegar el repositorio

Para desplegar el repositorio lo podras realizar con el siguiente comando de docker:
```
git clone https://github.com/OiherOleaga/KillerBeer
```

# Ejecutar aplicacion backend en local [![Laravel][Laravel.com]][Laravel-url] [![Tailwind][Tailwind.com]][Tailwind-url]
Una vez clonado el repositorio oficial tendras que ejecutar los siguientes comandos en una **terminal linux**:

* Crear carpeta vendor:
```sh
composer install o composer update
```
* Copiar env.example:
```sh
cp env.example env.
```
* Parar el servicio apache si se esta ejecutando:
```sh
sudo service apache2 stop
```
* Posicionarse en la carpeta **Laravel** y ejecutar el siguiente comando con Docker ejecutandose:

_La terminal Linux ha de estar vinculada a la terminal wsl. Mirar [aqui](https://docs.docker.com/desktop/wsl/) para la documentacion oficial._
```sh
./vendor/bin/sail up -d
```
* Ejecutar los migrates:
``` sh
./vendor/bin/sail artisan migrate:fresh
```
o
``` sh
php artisan migrate:fresh
```
* Ejecutar los seeders:
``` sh
./vendor/bin/sail artisan db:seed
```
o
``` sh
php artisan db:seed
```
* Ejecutar un servidor:
``` sh
./vendor/bin/sail artisan serve
```
o
``` sh
php artisan serve
```
* Ejecutar el frontend:
``` sh
npm run dev
```
# Ejecutar aplicacion frontend en local [![Vue][Vue.js]][Vue-url] [![Bootstrap][Bootstrap.com]][Bootstrap-url]

Instalar [node.js](https://nodejs.org/en) si no esta instalado.

* Instalar npm si no esta instalado:
``` sh
  npm install npm@latest -g
```

* Instalar los paquetes:
``` sh
  npm install
```

* Ejecutar el siguiente comando:
``` sh
  npm run dev
```

# Usuarios ![MySQL]

#### Administradores
| Correo  | Contraseña |
| ------------- | -------------
| oiher@gamil.com  | contrasena1
| david@gamil.com | contrasena2 
| anartz@gamil.com  | contrasena3
| markel@gamil.com  | contrasena4

#### Clientes
| Correo    |Nombre |Apellido | Contraseña | Estado |
| ------------- | ------------- | ------------- | -------------| -------------
| oiher@ikasle.egibide.org | Oiher  | Perro  |  12345  |Activo |
| david@ikasle.egibide.org | David |Moreno  | 12345  | Activo  |
| anartz@ikasle.egibide.org | Anartz | Pato | 12345  | Activo  |
| markel@ikasle.egibide.org | Markel | Guapo  | 12345  | Activo |
| cliente5@example.com | Pedro | Sanchez  | contrasena5  | Inactivo |




<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/OiherOleaga/killerBeer

[contributors-url]: https://github.com/OiherOleaga/killerBeer/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/othneildrew/Best-README-Template/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=for-the-badge
[stars-url]: https://github.com/othneildrew/Best-README-Template/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://github.com/othneildrew/Best-README-Template/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/othneildrew/Best-README-Template/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/othneildrew
[product-screenshot]: images/screenshot.png
[Next.js]: https://img.shields.io/badge/next.js-000000?style=for-the-badge&logo=nextdotjs&logoColor=white
[Next-url]: https://nextjs.org/
[React.js]: https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB
[React-url]: https://reactjs.org/
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Angular.io]: https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-url]: https://angular.io/
[Svelte.dev]: https://img.shields.io/badge/Svelte-4A4A55?style=for-the-badge&logo=svelte&logoColor=FF3E00
[Svelte-url]: https://svelte.dev/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
[Tailwind.com]: https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white
[Tailwind-url]: https://tailwindcss.com/
[MySQL]: https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white

