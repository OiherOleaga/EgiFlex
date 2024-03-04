<script setup>
import router from '@/router';

fetch(route("/checkSession"), {
    headers: { "sessionId": localStorage.getItem("sessionId") }
  })
  .then(res => res.json())
  .then(res => {
    if (res.logged) {
      router.push("/content");
    }
  })
  .catch(err => {
    console.log(err)
  });
</script>

<template>
  <article class="w-100 min-vh-100">
    <section class="bestmodulePrice-parent">
      <div class="container-fluid my-0 p-0 bestmodulePrice">
        <div class="layout row m-0 d-flex">
          <div class="d-flex flex-column col-md-12 align-items-center justify-content-start px-4 p-0 m-0">
            <div class="d-flex flex-column align-items-center gap-4 text-center">
              <img src="../components/img/generatedtext (2).png" class="img egiflex img-fluid" alt="egiflex">
              <p class="w-75">En <span class="rounded p-1">EgiFlex</span> encontrarás películas icónicas, series premiadas
                y mucho más.<br>
                <span class="fs-6 text-white">*Exclusivo para Egibide.</span>
              </p>
              <a href="/registro" class="rounded-pill btn btn-md px-4 fw-bold text-white">REGISTRATE YA</a>
            </div>
            <div class="logo d-none d-md-block ">
              <img src="../components/img/spa.avif" class="img-fluid img opacity-75" alt="aquamanlogo">
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="important" class="beam-must-sees-parent">
      <div class="py-5 container beam-must-sees">
        <div class="layout row m-0 d-flex">
          <div class="d-flex flex-column col-md-4 align-items-start justify-content-center col-md-6">
            <div class="text-center text-md-start text-white">
              <h2 class="h1">Todo lo que no te puedes perder</h2>
              <p class="fst-italic fs-4">Disfruta de todos nuestros títulos más rompedores, las series y pel&iacute;culas
                m&aacute;s aclamadas por la crítica.</p>
            </div>
          </div>
          <div class="d-flex flex-column col-md-4 align-items-start justify-content-center col-md-6">
            <div>
              <img src="../components/img/thelastofus_personajes.avif" class="img img-fluid" alt="tlou">
            </div>
            <div class="tloulogo">
              <img src="../components/img/the-last-of-us-logo.avif" class="img img-fluid" alt="tloulogo">
            </div>
          </div>
          <div class="d-flex flex-column col-md-4 align-items-center justify-content-center col-md-12">
            <div class="container image-grid gap-3 d-flex flex-column">
              <div class="row gap-3 gap-md-0 justify-content-center">
                <div class="col-5 col-md-3 ">
                  <img src="../components/img/Caratula-BSO-Wednesday-Danny-Elfman-Chris-Bacon.jpeg"
                    class="rounded img img-fluid equal-image" alt="">
                </div>
                <div class="col-5 col-md-3">
                  <img src="../components/img/strangerthings.jpg" class="rounded img img-fluid equal-image" alt="">
                </div>
                <div class="col-5 col-md-3">
                  <img src="../components/img/13_reasons_why_season_2_a_netflix_original_series_soundtrack-portada.jpg"
                    class="rounded img img-fluid equal-image" alt="">
                </div>
                <div class="col-5 col-md-3">
                  <img src="../components/img/2022100519442283899.jpg" class="rounded img img-fluid equal-image" alt="">
                </div>
              </div>
              <div class="row gap-3 gap-md-0 justify-content-center">
                <div class="col-5 col-md-3">
                  <img src="../components/img/mindhunter.jpg" class="rounded img img-fluid equal-image" alt="">
                </div>
                <div class="col-5 col-md-3">
                  <img src="../components/img/punisher-1560758007.jpg" class="rounded img img-fluid equal-image" alt="">
                </div>
                <div class="col-5 col-md-3">
                  <img src="../components/img/SuicideSquad.jpeg" class="rounded img img-fluid equal-image" alt="">
                </div>
                <div class="col-5 col-md-3">
                  <img src="../components/img/openhaimer.jpg" class="rounded img img-fluid equal-image" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="series" class="beam-series-parent">
      <div class="py-5 container beam-series">
        <div class="layout row m-0 d-flex">
          <div class="d-flex flex-column col-md-4 align-items-start justify-content-center col-md-6">
            <div class="text-center text-md-start text-white">
              <h2 class="h1">Las series de las que todos hablan</h2>
              <p class="fst-italic fs-4">Encuentra tu nueva obsesión en nuestro creciente catálogo lleno de series
                adictivas, reality shows y clásicos icónicos de la televisión.</p>
            </div>
          </div>
          <div class="d-flex flex-column col-md-4 align-items-start justify-content-center col-md-6">
            <div>
              <img src="../components/img/friends_leadimage.avif" class="img img-fluid" alt="tlou">
            </div>
            <div class="friendslogo">
              <img
                src="https://hbomax-images.warnermediacdn.com/2023-05/friends_tt_en.png?host=wme-hbomax-drupal-prod.s3.amazonaws.com&w=400"
                class="img img-fluid" alt="tloulogo">
            </div>
          </div>
          <div class="d-flex flex-column col-md-4 align-items-center justify-content-center col-md-12">
            <div class="container image-grid gap-3 d-flex flex-column">
              <div class="row gap-3 gap-md-0 justify-content-center">
                <div class="col-5 col-md-3">
                  <img src="../components/img/Peaky_Blinders_Serie_de_TV-549874356-large.jpg"
                    class="rounded img img-fluid equal-image" alt="">
                </div>
                <div class="col-5 col-md-3">
                  <img src="../components/img/tendenciasdebodas-que-ver-series-netflix-thesinner.jpg"
                    class="rounded img img-fluid equal-image" alt="">
                </div>
                <div class="col-5 col-md-3">
                  <img src="../components/img/maldicion-hill-house-portada.jpg" class="rounded img img-fluid equal-image"
                    alt="">
                </div>
                <div class="col-5 col-md-3">
                  <img src="../components/img/a74a9f9bb7a278bd11d78cf036d0aa14.jpg"
                    class="rounded img img-fluid equal-image" alt="">
                </div>
              </div>
              <div class="row gap-3 gap-md-0 justify-content-center">
                <div class="col-5 col-md-3">
                  <img src="../components/img/227436.jpg" class="rounded img img-fluid equal-image" alt="">
                </div>
                <div class="col-5 col-md-3">
                  <img src="../components/img/lacasadepapel-cartel.jpg" class="rounded img img-fluid equal-image" alt="">
                </div>
                <div class="col-5 col-md-3">
                  <img src="../components/img/2148622.jpg" class="rounded img img-fluid equal-image" alt="">
                </div>
                <div class="col-5 col-md-3">
                  <img src="../components/img/086520.jpg" class="rounded img img-fluid equal-image" alt="">
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <section id="faq" class="beam-faq-parent">
      <div class="py-5 container beam-series">
        <div class="layout row m-0 d-flex">
          <div class="d-flex flex-column col-md-4 mb-2 align-items-center justify-content-center col-md-12">
            <div class="text-center text-white">
              <h1 class="fs-1 lh-base">Lo que todo el mundo se pregunta sobre <span class="rounded p-1">EgiFlex</span></h1>
            </div>
          </div>
          <div class="d-flex flex-column col-md-4 align-items-center justify-content-center col-md-12">
            <div class="container">
              <div class="row mx-0 mx-md-5">
                <div class="col">
                  <div class="accordion text-white bg-transparent" id="accordionExample">
                    <div class="accordion-item border-0 bg-transparent text-white">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button fs-3 collapsed bg-transparent" type="button"
                          data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                          aria-controls="collapseOne">
                          ¿Qué es EgiFlex?
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse bg-transparent"
                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body bg-transparent">
                          EgiFlex es una experiencia de streaming y descarga espectacular que te trae las mejores
                          historias de Warner
                          Bros., HBO, Netflix, DC, Cartoon Network y mucho más... ¡GRATIS!.
                        </div>
                      </div>
                    </div>

                    <div class="accordion-item border-0 bg-transparent">
                      <h2 class="accordion-header bg-transparent" id="headingTwo">
                        <button class="accordion-button collapsed fs-3 bg-transparent" type="button"
                          data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                          aria-controls="collapseTwo">
                          ¿Por qué es exclusivo de Egibide?
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse bg-transparent"
                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body bg-transparent">
                          En un esfuerzo por enriquecer la experiencia educativa y cultural de sus estudiantes, Egibide se
                          asoció con EgiFlex, un innovador servicio de streaming y descarga de series y películas, para crear una
                          plataforma exclusiva y adaptada a las necesidades educativas únicas de la institución. </div>
                      </div>
                    </div>
                    <div class="accordion-item border-0 bg-transparent">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed fs-3 border-0 bg-transparent" type="button"
                          data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                          aria-controls="collapseThree">
                          ¿Cuáles son los titulos más populares entre los alumnos?
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          Nuestros títulos más vistos son True Detective: Noche polar, Barbie, Succession, Friends y Juego
                          de Tronos.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="sponsors" class="beam-sponsors-parent">
      <div class="py-5 container beam-series">
        <div class="layout row m-0 d-flex">
          <div class="d-flex flex-column col-md-4 mb-2 align-items-center justify-content-center col-md-12">
            <div class="text-center text-white">
              <h1 class="h1">Nuestros patrocinadores</h1>
            </div>
          </div>
          <div class="d-flex flex-column col-md-4 align-items-center justify-content-center col-md-12">
            <div class="container img-grid">
              <div class="row gap mx-2 mx-md-5">
                <div class="col-12 col-sponsors gap-4 gap-md5 justify-content-center d-flex">
                  <img src="../components/img/Warner_Bros_logo.svg.png" class="sponsors img img-fluid" alt="">
                  <img src="../components/img/dg18rij-b1c260ee-4ac9-4f74-ad9a-8639563b76da.png"
                    class="sponsors img img-fluid" width="200px" alt="">
                  <img src="../components/img/Disney+_logo.svg.png" class="sponsors img img-fluid" alt="">
                  <img src="../components/img/Netflix_2015_logo.svg.png" class="sponsors img img-fluid" alt="">
                  <img src="../components/img/Amazon-Prime-Video-Logo.png" class="sponsors img img-fluid" alt="">
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
.egiflex {
  transform: skew(-12deg);
  transform-origin: top;
}

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

  .friendslogo {
    max-width: 60%;
    align-self: center;
  }

  .tloulogo {
    max-width: 50%;
    align-self: center;
  }

  .equal-image {
    object-fit: cover;
    aspect-ratio: 0.5;
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
  right: -24%;
  align-self: flex-start;
  bottom: 70px;
}

.tloulogo img {
  width: 200px;
}

.equal-image {
  object-fit: cover;
  aspect-ratio: 0.7;
}

.beam-series-parent {
  background-size: cover;
  background-position: center center;
  z-index: 1;
  background-image: url(https://hbomax-images.warnermediacdn.com/2023-05/frinds_background.jpg?host=wme-hbomax-drupal-prod.s3.amazonaws.com&w=2000);
}

.beam-series-parent::before {
  content: '';
  height: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  background: linear-gradient(180deg, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0) 20%, rgba(0, 0, 0, 0) 75%, rgba(0, 0, 0, 1) 100%);
}

.friendslogo {
  position: relative;
  right: -20%;
  align-self: flex-start;
  bottom: 70px;
}

.beam-faq-parent {
  background-size: cover;
  background-position: center center;
  background-image: url(https://hbomax-images.warnermediacdn.com/2021-07/hbo_max_background_faded.png?host=wme-hbomax-drupal-prod.s3.amazonaws.com&w=1920);
}

.beam-faq-parent span:first-child {
  background-color: #730DD9;
  font-weight: 700;
  text-transform: uppercase;
}

.accordion-body {
  color: white;
  font-weight: 200;
  font-size: 20px;
}

.accordion-button {
  color: #730DD9;
  font-weight: 100;
  text-shadow: 0px 0px 15px #aa6be968;
}

.accordion-button:focus,
.accordion-button:not(:focus) {
  box-shadow: none;
}

.beam-sponsors-parent {
  background-size: cover;
  background-position: center center;
  background-image: url(https://hbomax-images.warnermediacdn.com/2021-10/HBOMax%20price%20background%20V2.jpg?host=wme-hbomax-drupal-prod.s3.amazonaws.com&w=1920);
}

.sponsors {
  object-fit: contain;
  width: 13%;
  z-index: 1;
}
</style>
