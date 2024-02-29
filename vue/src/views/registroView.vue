<script setup>
import router from '@/router';
import { ref } from 'vue'
const cliente = ref({});

function resgistrar() {

    if (validarContrasena()) {
        POST("/registrar", cliente.value).then((res) => {
            if (res.ok) {
                router.push("/login")
            } else {
                alert("error al registrar")
            }
        })
    }

}

function validarContrasena() {
    const contrasenaInput = document.getElementById('contra');
    const contrasena = contrasenaInput.value;
    if (contrasena.length < 8) {
        alert('La contraseña debe tener al menos 8 caracteres');
        contrasenaInput.focus();
        return false;
    }
    if (!/[A-Z]/.test(contrasena)) {
        alert('La contraseña debe contener al menos una letra mayúscula');
        contrasenaInput.focus();
        return false;
    }
    if (!/[a-z]/.test(contrasena)) {
        alert('La contraseña debe contener al menos una letra minúscula');
        contrasenaInput.focus();
        return false;
    }
    if (!/[^A-Za-z0-9]/.test(contrasena)) {
        alert('La contraseña debe contener al menos un carácter especial');
        contrasenaInput.focus();
        return false;
    }

    return true;
}
</script>
<template>
    <section class="d-flex justify-content-center align-items-center">
        <div class="container-fluid mx-6 py-2 gradient-form">
            <div class="row h-100 d-flex justify-content-center align-items-center">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black contenedor">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="../components/img/logoEgiFlex.png" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">Somos EgiFlex</h4>
                                    </div>

                                    <form>
                                        <p>Crear una cuenta</p>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="correo" v-model="cliente.correo" class="form-control"
                                                placeholder="Correo electronico" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="contra" v-model="cliente.contrasena"
                                                class="form-control" placeholder="Contrasena" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="nombre" v-model="cliente.nombre" class="form-control"
                                                placeholder="Nombre" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="apellido" v-model="cliente.apellido" class="form-control"
                                                placeholder="Apellido" />
                                        </div>
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-1 mb-3"
                                                @click="resgistrar" type="button"> Crear cuenta</button>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">¿Ya tienes una cuenta?</p>
                                            <button type="button" class="btn gradient-custom-1"><a href="/login">Iniciar
                                                    sesion</a></button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div
                                class="col-lg-6 d-flex align-items-center justify-content-center flex-column gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Tu Portal hacia un Universo de Emociones Cinematográficas</h4>
                                    <p class="small mb-0">¡Prepárate para sumergirte en un mundo lleno de emocionantes
                                        películas y series con EgiFlex! Nos complace presentarte una experiencia de
                                        entretenimiento en línea que transformará la forma en que disfrutas del cine y
                                        la televisión desde la comodidad de tu hogar.</p>
                                </div>
                                <div class="pb-4 ">
                                    <button type="button" class="btn gradient-custom-1 volver"><a href="/">Volver al
                                            Inicio</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
section {
    position: relative;
}

section::before {
    content: "";
    background-image: url(../components/img/ES-es-20240226-popsignuptwoweeks-perspective_alpha_website_large.jpg);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    opacity: 0.4;
}

.volver {
    box-shadow: inset 0 0 10px 0 #730DD9;
}

.gradient-custom-2 {
    background: linear-gradient(to right, #730DD9, #580AA6, #4A0D73, #3B0E59, #0D0D0D);
}

.gradient-custom-1 {
    background: linear-gradient(to right, #730DD9, #580AA6, #4A0D73, #3B0E59);
}

a {
    text-decoration: none;
    color: white;
}

.contenedor {
    box-shadow: 0 0 50px 0 #580AA6;
}

@media (min-width: 768px) {
    .gradient-form {
        height: 100vh !important;
        backdrop-filter: blur(2px);
    }
}

@media (min-width: 769px) {
    .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
    }
}</style>
