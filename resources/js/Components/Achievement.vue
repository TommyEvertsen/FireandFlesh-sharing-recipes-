<script setup>
const props = defineProps(["achievements"]);

const form = useForm({
   
    title: props.achievements.title,
    
   
});

import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import Dropdown from "@/Components/Dropdown.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DropdownLink from '@/Components/DropdownLink.vue';
import RecipeButton from "./RecipeButton.vue";

import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import axios from 'axios';



dayjs.extend(relativeTime);
</script>

<template>
    <div class="p-6 flex space-x-2 mb-5 "  style="background-color: #F1EFEF; border-radius: 25px;" >
        <svg xmlns="http://www.w3.org/2000/svg"  class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"  >
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /> </svg>


            <div >
                <h1>{{ achievements.title }}</h1>
               
                

                
            </div> 
            
            
            
         
        </div>
   
</template>
