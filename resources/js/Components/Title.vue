<script setup>
    import { ref } from 'vue'
    const value = ref("MeteoTech");
</script>

<template>
    <div>
        <h1 style="font-size: 7rem;">{{ value }}</h1>
    </div>
</template>