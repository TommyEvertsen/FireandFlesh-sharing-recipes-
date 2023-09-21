<template>

<AuthenticatedLayout >
<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

      
 

 <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
   <Recipe
    v-for="recipe in recipes"
   :key="recipe.id"
   :recipe="recipe"
   />
 </div>
           
</div>
</AuthenticatedLayout>

    



</template>

<script setup>
import Recipe from '@/Components/Recipe.vue';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";



defineProps(["recipes"]);



</script>