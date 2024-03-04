<script>
import { Link } from '@inertiajs/vue3'
import WordsLayout from '@/Layouts/WordsLayout.vue'
</script>

<template>
    <WordsLayout title="words">
        <div>
            Hello world!<br>
            <Link href="/" class="text-sm text-blue-700 underline">
                    home
            </Link>
        </div>
    </WordsLayout>
</template>