<script setup>
import { ref, onBeforeUnmount, onMounted } from 'vue';
import router from '@/router';

const videoPlayer = ref(null);
const videoSrc = ref([]);
const posterUrl = ref('');
let lastTime;
let siguiente = ref(false);

let args = window.location.search.split("?")[1].split("=");

function timeupdate() {
    if (lastTime + 5 < videoPlayer.value.currentTime && !siguiente.value || lastTime > videoPlayer.value.currentTime) {
        POST("/historial", {
            id: args[1],
            tipo: args[0],
            tiempo: videoPlayer.value.currentTime
        }).then(res => {
            if (res.ok === "cambio episodio" || res.ok === "cambio temporada") {
                siguiente.value = true;
            } else {
                siguiente.value = false;
            }
        });

        lastTime = videoPlayer.value.currentTime
    }
}

onMounted(async () => {
    try {
        const res = await POST("/getVideo", { id: args[1], tipo: args[0] });
        if (res.error) {
            console.error("Error:", res.error);
        } else {
            if (args[0] == 's') {
                args[0] = 'e'
                args[1] = res.video.episodio_id
                history.pushState(null, null, 'watch?e=' + args[1]);
            }
            videoSrc.value = res.video.archivo;
            posterUrl.value = res.video.poster;
            lastTime = parseInt(res.video.tiempo)
            videoPlayer.value.currentTime = lastTime
        }
    } catch (error) {
        console.error("Error al obtener el video:", error);
    }
});

function siguienteEpisodio() {
    POST("/getSerieId", { id: args[1] }).then(res => {
        window.location.search = "?s=" + res.id
    });
}

document.addEventListener("keydown", function (event) {
    /*    if (event.key === "ArrowLeft") {
            videoPlayer.value.currentTime -= 5
        } else if (event.key === "ArrowRight") {
            videoPlayer.value.currentTime += 5
        }
    */
})

</script>

<template>
    <div class="video-container">
        <video ref="videoPlayer" class="video-js" @timeupdate="timeupdate" controls :src="videoSrc" :poster="posterUrl">
            <p>
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </video>
        <button v-if="siguiente" id="siguiente" @click="siguienteEpisodio">siguiente episodio</button>
    </div>
</template>

<style>
.video-container {
    display: flex;
    position: relative;
    justify-content: center;
    align-items: center;
}

.video-js {
    width: 100%;
    max-width: 100rem;
    height: 100%;
}

#siguiente {
    position: absolute;
    top: 80%;
    left: 85%;
    transform: translate(-80%, -85%);
    background-color: rgba(0, 0, 0, 0.5);
    border-color: #730DD9;
    color: white;
    font-size: 70%;
    padding: 1%;
    border-radius: 10px;
    z-index: 10;
}
</style>
