<script setup>
import { ref, onBeforeUnmount, onMounted } from 'vue';
import videojs from 'video.js';
import 'video.js/dist/video-js.css';

const videoPlayer = ref(null);
const videoSrcs = ref([]);
const posterUrl = ref('');

let args = window.location.search.split("?")[1].split("=");
let tiempo = 0

function setHistorial() {
    if (videoPlayer.value && tiempo + 5 < videoPlayer.value.currentTime) {
        console.log(videoPlayer.value.currentTime)
        tiempo = videoPlayer.value.currentTime
        POST("/historial", {
            id: args[1],
            tipo: args[0],
            tiempo: tiempo
        }).then(res => {

        });
    }
}

onMounted(async () => {
    try {
        const res = await POST("/getVideo", { id: args[1], tipo: args[0] });
        console.log(res)
        if (res.error) {
            console.error("Error:", res.error);
        } else {
            if (args[0] == 's') {
                args[0] = 'e'
                args[1] = res.video.episodio_id
                history.pushState(null, null, 'watch?e=' + args[1]);
            }
            videoSrcs.value = res.video.archivo;
            posterUrl.value = res.video.poster;
            tiempo = parseInt(res.video.tiempo)
            videoPlayer.value.currentTime = tiempo
            initVideoPlayer();
        }
    } catch (error) {
        console.error("Error al obtener el video:", error);
    }
});

const initVideoPlayer = () => {
    const options = {
        controls: true,
        fluid: true,
        sources: videoSrcs.value,
        poster: posterUrl.value,
    };

    const player = videojs(videoPlayer.value, options);

    player.ready(() => {
        player.currentTime(args.tiempo);
    });
};
</script>

<template>
    <video ref="videoPlayer" @timeupdate="setHistorial" class="video-js" preload="auto">
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
    </video>
</template>

<style>
.vjs-poster img {
    object-fit: cover;
    filter: brightness(69%);
}

.video-js {
    border: 2px solid #730DD9;
    filter: drop-shadow(0 0 10px #730DD9);
}
</style>
