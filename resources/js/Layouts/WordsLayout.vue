<script setup>
import { ref } from "vue";
import { Link, Head } from '@inertiajs/vue3'

defineProps({
    title: String
})
const searchWord = ref('');
</script>

<template>
    <Head :title="title" />
    <main>
        <header class="bg-gray-100">
            <Link href="/" class="text-blue-700 underline m-2">Home</Link>
            <Link :href="route('word.index')" class="text-blue-700 underline m-2">tweet</Link>
        </header>
        <article>
            <slot />
        </article>
    </main>
</template>