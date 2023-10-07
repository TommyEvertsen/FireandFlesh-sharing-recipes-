<template >


<AuthenticatedLayout>

  <!-- <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">My recipes</h2>
        </template> -->



           
 <template #main>
  <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 ">

    <Recipe
    v-for="recipe in recipes"
    :key="recipe.id"
    :recipe="recipe"
    />
  </div>

 </template>



<template #footer class="text-center">
            <a href="github.com" class="font-semibold text-white leading-tight text-center" >Developed by Tommy Huynh Evertsen</a>
        </template>
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

.body{
  height: 100%;
}    

.AuthenticatedLayout {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

.main-content{
  flex: 1;
}

</style>