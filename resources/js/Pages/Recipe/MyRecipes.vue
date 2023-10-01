<template>

<AuthenticatedLayout class="foodPictureMy">

  <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">My recipes</h2>
        </template>

<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

 <div class="">
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

<style>

.foodPictureMy{
    background: 
        linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 1)),  
        url("/resources/images/Optimized-pexels-engin-akyurt-1435735.jpg");
    background-size: cover; 
    background-repeat: no-repeat; 
    background-position: center center;  }

</style>