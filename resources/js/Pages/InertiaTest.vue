<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    Inertiaのテスト<br>
    <Link href="/">Linkでwelcomeに移動</Link><br>
    <Link :href="route('inertia.index')">名前付きルート</Link><br>
    <Link :href="route('inertia.show', {id: 1})">名前付きルート show/1</Link><br>
</template>