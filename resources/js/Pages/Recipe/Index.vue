<template>
    <Head title="Recipes" />

    <AuthenticatedLayout >
        <template #header >
            <h2 class="font-semibold text-xl text-white leading-tight" >Recipes</h2>
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
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Head } from "@inertiajs/vue3";
import Recipe from "@/Components/Recipe.vue";
import CreateRecipe from "@/Components/CreateRecipe.vue";




defineProps(["recipes"]);
</script>


