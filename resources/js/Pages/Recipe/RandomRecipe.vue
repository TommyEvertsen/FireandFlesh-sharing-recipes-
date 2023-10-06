<template>
<AuthenticatedLayout class="foodPictureRandom">

    <!-- <template #header >
            <h2 class="font-semibold text-xl text-white leading-tight" >Random recipe</h2>
        </template> -->

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

         
<div class="">
  <Recipe
   v-for="recipe in recipes"
  :key="recipe.id"
  :recipe="recipe"
  />
</div>
          
</div>


<template #footer class="text-center">
            <a href="github.com" class="font-semibold text-white leading-tight text-center" >Developed by Tommy Huynh Evertsen</a>
        </template>
</AuthenticatedLayout>   

</template>    

<script setup> 
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Recipe from '@/Components/Recipe.vue';
import NavLink from "@/Components/NavLink.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";


defineProps(["recipes"]);
</script>


<style>

.foodPictureRandom{
    background: 
        linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 1)),  
        url("/resources/images/Optimized-pexels-sherali-khan-10156672.jpg");
    background-size: cover; 
    background-repeat: no-repeat; 
    background-position: center center; }

</style>