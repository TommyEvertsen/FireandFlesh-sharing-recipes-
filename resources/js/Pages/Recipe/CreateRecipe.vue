<template>

<AuthenticatedLayout class="foodPictureCreate">

    <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">Add new recipe</h2>
        </template>
    
    <CreateRecipe 
    
    />

</AuthenticatedLayout>


</template>

<script setup>
import CreateRecipe from '@/Components/CreateRecipe.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


defineProps(["recipes"]);
</script>

<style>

.foodPictureCreate{
    background: 
        linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 1)),  
        url("/resources/images/Optimized-pexels-ian-turnell-709567.jpg");
    background-size: cover; 
    background-repeat: no-repeat; 
    background-position: center center; }

</style>