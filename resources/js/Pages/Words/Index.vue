<script setup>
import { ref } from "vue";
import { Link } from '@inertiajs/vue3'
import WordsLayout from '@/Layouts/WordsLayout.vue'
import dayjs from 'dayjs'

defineProps({
    words: Array
})

const userName = ref('');
const newContent = ref('');
const searchWord = ref('');
</script>

<template>
    
    <WordsLayout title="tweet">
        <h2 class="text-lg border-b py-2">
            <Link :href="route('word.index')" class="">
                つぶやき
            </Link>
        </h2>
        
        <div class="flex w-150 mr-4">
            <div class="w-30 mr-2">
                <input type=text name=userName v-model="userName" placeholder="なまえ" size=5 class="p-1 m-1 text-sm w-full border" />
            </div>
            <div class="w-50 mr-2">
                <input type=text name=newContent v-model="newContent" size=15 class="p-1 m-1 text-sm w-full border" />
            </div>
            <div class="w-20">
                <Link v-if="newContent !== ''"
                    as="button" method="post" :href="route('word.store')" :data="{content: newContent, userName: userName}"
                    class="border border-gray-400 m-1 p-1 text-sm">
                    つぶやく
                </Link>
                <Link v-if="newContent === ''" disabled
                    as="button" method="post" :href="route('word.store')" :data="{content: newContent, userName: userName}"
                    class="border border-gray-400 m-1 p-1 text-sm">
                    つぶやく
                </Link>
            </div>
        </div>
        
        <div>
            <input type=text name=search v-model="searchWord" size=15 class="p-1 m-1 text-sm" />
            
            <Link v-if="searchWord !== ''" as="button" method="get" :href="route('word.search',{ queryWord: searchWord })" preserve-state class="border border-gray-400 m-1 p-1 text-sm">検索</Link>
            <Link v-if="searchWord === ''" as="button" method="get" :href="route('word.index')" preserve-state class="border border-gray-400 m-1 p-1 text-sm">検索</Link>
        </div>
   
        
        <ul class="list-disc list-inside p-2">
            <li v-for="word in words">
                {{ word.content }}
                ({{ word.user_name }})
                {{ dayjs(word.created_at).format('YYYY-MM-DD HH:mm:ss') }}
                <Link as="button" method="delete" :href="route('word.delete',word.id)" preserve-scroll :only="['words']" class="border border-red-400 m-1 p-1 text-sm text-red-400">×</Link>
            </li>
        </ul>
        
    </WordsLayout>
</template>