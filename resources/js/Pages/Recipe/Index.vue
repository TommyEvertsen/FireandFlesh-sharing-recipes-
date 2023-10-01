<template>
    <Head title="Recipes" />

    <AuthenticatedLayout >
        <template #header >
            <h2 class="font-semibold text-xl text-white leading-tight" >Recipes</h2>
        </template>
        <div class="foodPicture">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="">
                <Recipe
                    v-for="recipe in recipes"
                    :key="recipe.id"
                    :recipe="recipe"
                />
            </div>
        </div>
    </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Head } from "@inertiajs/vue3";
import Recipe from "@/Components/Recipe.vue";
import CreateRecipe from "@/Components/CreateRecipe.vue";




defineProps(["recipes"]);
</script>


<style>

.foodPicture{
    background: 
        linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 1)),  
        url("/resources/images/Optimized-pexels-markus-spiske-2818573.jpg");
    background-size: cover; 
    background-repeat: no-repeat; 
    background-position: center center; }

</style>