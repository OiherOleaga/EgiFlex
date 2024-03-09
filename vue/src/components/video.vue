<script setup>
import { ref, onBeforeUnmount, onMounted } from 'vue';

const videoPlayer = ref(null);
const videoSrc = ref([]);
const posterUrl = ref('');
let lastTime;

let args = window.location.search.split("?")[1].split("=");

function timeupdate() {
    if (lastTime + 5 < videoPlayer.value.currentTime || lastTime > videoPlayer.value.currentTime) {
        POST("/historial", { 
            id: args[1],
            tipo: args[0],
            tiempo: videoPlayer.value.currentTime
        }).then(res => {
            console.log(res)
        });

        lastTime = videoPlayer.value.currentTime
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
                history.pushState(null, null, 'watch?e='+args[1]);
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
    </div>
</template>

<style>
.video-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.video-js {
    width: 100%;
    max-width: 100rem; 
    height:  100%;
}
</style>
