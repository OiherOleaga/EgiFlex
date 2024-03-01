<script setup>

const props = defineProps({tipo: String});


POST("/filtro", {tipo: props.tipo }).then(res => {
    console.log(res)
})

</script>

<template>
    <div class="col-12 text-white ">
        <form action="" method="">
            <div
                class="d-flex flex-wrap flex-row align-items-center justify-content-center justify-content-md-end justify-content-md-end gap-2 text-center">
                <div class="dropdown">
                    <button class="btn bg-transparent fw-bold dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Ordenar por
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Descargas</a></li>
                        <li><a class="dropdown-item" href="#">Recientes</a></li>
                    </ul>
                </div>
                <div class="dropdown ">
                    <button class="btn bg-transparent fw-bold dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Género
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Horror</a></li>
                        <li><a class="dropdown-item" href="#">Fantasia</a></li>
                        <li><a class="dropdown-item" href="#">Drama</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn bg-transparent fw-bold dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Número de temporadas
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Horror</a></li>
                        <li><a class="dropdown-item" href="#">Fantasia</a></li>
                        <li><a class="dropdown-item" href="#">Drama</a></li>
                    </ul>
                </div>
                <div>
                    <input class="form-control p-1 search" type="search" placeholder="Buscar"
                        aria-label="Buscar">
                </div>
            </div>
        </form>
    </div>
</template>

<style>

</style>