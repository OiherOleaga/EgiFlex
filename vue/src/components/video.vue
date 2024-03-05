<script setup>
import { ref, onBeforeUnmount, onMounted } from 'vue';
import videojs from 'video.js';
import 'video.js/dist/video-js.css';

const videoPlayer = ref(null);
const videoSrcs = ref([]);
const posterUrl = ref('');

let args = window.location.search.split("?")[1].split("=");

onBeforeUnmount(() => {
    if (videoPlayer.value) {
        POST("/historial", { id: args[1], tipo: args[0], tiempo: videoPlayer.value.currentTime });
    }
});

onMounted(async () => {
    try {
        const res = await POST("/getVideo", { id: args[1], tipo: args[0] });
        if (res.error) {
            console.error("Error:", res.error);
        } else {
            if (args[0] == 's') {
                args[0] = 'e'
                args[1] = res.video.episodio_id
                history.pushState(null, null, 'watch?e='+args[1]);
            }
            videoSrcs.value = res.video.archivo;
            posterUrl.value = res.video.poster;
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
    <video ref="videoPlayer" class="video-js">
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

.video-js{
    border: 2px solid #730DD9;
    filter: drop-shadow(0 0 10px #730DD9);
}
</style>
