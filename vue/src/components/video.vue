<script setup>
import { ref, onBeforeUnmount } from 'vue'

const videoPlayer = ref(null)
const videoSrc = ref('')

let args = window.location.search.split("?")[1].split("=")

onBeforeUnmount(() => {
    POST("/historial", { id: args[1], tipo: args[0], tiempo: videoPlayer.value.currentTime })
})

POST("/getVideo", { id: args[1], tipo: args[0] }).then(res => {
    if (res.error) {
        alert("error," + res.error);
    } else {
        videoSrc.value = res.video.archivo
        videoPlayer.value.load()
        videoPlayer.value.currentTime = res.video.tiempo
    }
})
</script>

<template>
    <video ref="videoPlayer" controls preload="auto" width="100%">
        <source :src="videoSrc" type="video/mp4">
    </video>
</template>

<style scoped>
</style>
