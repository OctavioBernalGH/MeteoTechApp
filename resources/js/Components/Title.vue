<script setup>
    import { ref } from 'vue'
    const value = ref("MeteoTech");
</script>

<template>
    <div style="background: linear-gradient(to bottom, lightblue , lightyellow); background-clip: text;">
        <h1 style="font-size: 7rem; color: transparent;">{{ value }}</h1>
    </div>
</template>