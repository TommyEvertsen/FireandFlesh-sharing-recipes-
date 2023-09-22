<template>

    
<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 mt-5" style="background-color: #F1EFEF; border-radius: 25px;">
 

    <h1 class="text-bold text-xl text-center mb-5">Add a new recipe</h1>
    <form @submit.prevent=" form.post(route('recipe.store'), { onSuccess: () => form.reset(), })">

        <label for="recipeTitle" class="block text-sm font-medium text-gray-700" >Name of your recipe</label >

        <input
            id="recipeTitle"
            v-model="form.title"
            placeholder="Monkeys famous chicken stew"
            class="block w-full mb-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
         <InputError :message="form.errors.title" class="mt-2" />

         <label
            for="ingridients"
            class="block text-sm font-medium text-gray-700"
            >Needed ingredients</label
        >
        
        <textarea
            id="ingridients"
            v-model="form.ingridients"
            placeholder="3 Carrots, 2 eggs"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>
        <InputError :message="form.errors.ingridients" class="mt-2" />
        <br />

        <label
            for="howToCook"
            class="block text-sm font-medium text-gray-700"
            >How to cook</label
        >
        <textarea
            id="howToCook"
            v-model="form.message"
            placeholder="Boil them, mash them, stick them in a stew."
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>
        <InputError :message="form.errors.message" class="mt-2" />
        <PrimaryButton class="mt-4">Add recipe</PrimaryButton>
    </form>
</div>
    </template>

<script setup>
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Head } from "@inertiajs/vue3";
import Recipe from "@/Components/Recipe.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const form = useForm({
    message: "",
    title: "",
    ingridients: "",
});

defineProps(["recipes"]);
</script>