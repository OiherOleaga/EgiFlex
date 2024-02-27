<script setup>

</script>

<template>
  <article class="w-100 min-vh-100">
    <section class="bestmodulePrice-parent">
      <div class="container-fluid my-0 p-0 bestmodulePrice">
        <div class="layout row m-0 d-flex">
          <div class="d-flex flex-column col-md-12 align-items-center justify-content-start px-4 p-0 m-0">
            <div class="d-flex flex-column align-items-center gap-4 text-center">
              <img src="../components/img/generatedtext (2).png" alt="">
              <p class="w-75">En <span class="rounded p-1">EgiFlex</span> encontrarás películas icónicas, series premiadas
                y mucho más.<br>
                <span class="fs-6 text-white">*Exclusivo para Egibide.</span>
              </p>
              <a href="/register" class="rounded-pill btn btn-md px-4 fw-bold text-white">REGISTRATE YA</a>
            </div>
            <div class="logo d-none d-md-block">
              <img src="../components/img/spa.avif" class="img-fluid img" alt="aquamanlogo">
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="beam-must-sees-parent">
      <div class="py-5 container beam-must-sees">
        <div class="layout row m-0 d-flex">
          <div class="d-flex flex-column col-md-4 align-items-start justify-content-center col-md-6">
            <div class="text-center text-md-start text-white">
              <h2>Todo lo que no te puedes perder</h2>
              <p>Disfruta de todos nuestros títulos más rompedores, series aclamadas por la crítica.</p>
            </div>
          </div>
          <div class="d-flex flex-column col-md-4 align-items-start justify-content-center col-md-6">
            <div>
              <img src="../components/img/thelastofus_personajes.avif" class="img img-fluid" alt="tlou">
            </div>
            <div class="tloulogo">
              <img src="../components/img/the-last-of-us-logo.avif" class="img img-fluid" width="180px" alt="tloulogo">
            </div>
          </div>
          <div class="d-flex flex-column col-md-4 align-items-start justify-content-start col-md-12">
            <div class="container px-0 image-grid">
              <div class="row gap-sm-4 gap-md-0 justify-content-center">
                <div class="col-12 col-md-3">
                  <img src="../components/img/Caratula-BSO-Wednesday-Danny-Elfman-Chris-Bacon.jpeg"
                    class="rounded img img-fluid" alt="">
                </div>
                <div class="col-12 col-md-3">
                  <img src="../components/img/Caratula-BSO-Wednesday-Danny-Elfman-Chris-Bacon.jpeg"
                    class="rounded img img-fluid" alt="">
                </div>
                <div class="col-12 col-md-3">
                  <img src="../components/img/Caratula-BSO-Wednesday-Danny-Elfman-Chris-Bacon.jpeg"
                    class="rounded img img-fluid" alt="">
                </div>
                <div class="col-12 col-md-3">
                  <img src="../components/img/Caratula-BSO-Wednesday-Danny-Elfman-Chris-Bacon.jpeg"
                    class="rounded img img-fluid" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </article>
</template>

<style scoped>
.bestmodulePrice-parent {
  position: relative;
  margin-bottom: 0rem;
  height: 600px;
  background-size: auto 100%;
  background-position: calc(50% + 290px) center;
  background-repeat: no-repeat;
  background-color: #000000;
  background-image: url(../components/img/Aquaman2_Takeover_desktop_1.avif);
  z-index: 2;
}

.bestmodulePrice-parent::before {
  background-image: linear-gradient(0deg, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .6) 50%, rgba(0, 0, 0, 0) 100%);
  content: "";
  height: 600px;
  position: absolute;
  width: 100%;
  z-index: -1;
}

@media screen and (min-width: 768px) {
  .bestmodulePrice .logo {
    grid-column-start: 2;
    text-align: center;
    max-width: 200px;
    justify-self: end;
    position: relative;
    bottom: -210px;
  }
}

.bestmodulePrice .logo img {
  width: 200px;
}

.bestmodulePrice .logo::after {
  content: "© & TM DC © 2024 WBEI";
  font-size: .6rem;
  color: #bbb;
  line-height: normal;
  display: block;
}

.bestmodulePrice {
  min-height: auto;
}

.bestmodulePrice>div {
  height: 570px;
}

.bestmodulePrice>div>div {
  display: grid !important;
  grid-template-columns: 50% 50%;
  align-self: center;
  justify-content: center !important;
  column-gap: 0rem;
}

.bestmodulePrice p {
  color: white;
  font-size: 1.5rem;
  margin-bottom: 0rem;
}

.bestmodulePrice p span:first-child {
  background-color: #730DD9;
  font-weight: 700;
  text-transform: uppercase;
}

.bestmodulePrice p span:last-child {
  font-weight: 500;
  text-transform: uppercase;
}

.bestmodulePrice a {
  background-color: #730DD9;
}

@media screen and (max-width: 767px) {
  .bestmodulePrice>div>div {
    grid-template-columns: 100%;
    align-self: center;
  }

  .bestmodulePrice-parent {
    height: auto;
    background-position: center top !important;
    background-size: 100% !important;
    background-image: url(https://hbomax-images.warnermediacdn.com/2024-02/Aquaman2_Takeover_mobile_1.jpg?host=wme-hbomax-drupal-prod.s3.amazonaws.com&w=767);
  }
}

.beam-must-sees-parent {
  position: relative;
  background-size: cover;
  background-position: center center;
  z-index: 1;
  background-image: url(https://hbomax-images.warnermediacdn.com/2023-05/thelastofus_leadimage.jpg?host=wme-hbomax-drupal-prod.s3.amazonaws.com&w=2000);
}

.beam-must-sees-parent::before {
  content: '';
  height: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background: linear-gradient(180deg, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0) 20%, rgba(0, 0, 0, 0) 75%, rgba(0, 0, 0, 1) 100%);
  z-index: -1;
}

.tloulogo {
  position: relative;
  align-self: center;
  right: 60px;
  bottom: 70px;
}</style>
