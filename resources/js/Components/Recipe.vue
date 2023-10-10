<script setup>
const props = defineProps(["recipe"]);

const form = useForm({
    message: props.recipe.message,
    title: props.recipe.title,
    ingridients: props.recipe.ingridients,
    likes: props.recipe.likes
});

const clickLike = async () => {
    try {
        const response = await axios.post(`/recipes/${props.recipe.id}/like`);
        if (response.data.success) {
            props.recipe.likes = response.data.likes;
            console.log(`Updated likes: ${props.recipe.likes}`);
        } else {
            console.error('Failed to like the recipe.');
        }
    } catch (error) {
        console.error('An error occurred while liking the recipe:', error);
    }
}

const editing = ref(false);

//Legg til slik at teksen på oppskriftene ikke blir så lange
const isIngredientsExpanded = ref(false);
const isMessageExpanded = ref(false);

const truncateText = (text, limit = 80) => {
    const words = text.split(" ");
    if (words.length > limit) {
        return words.slice(0, limit).join(" ") + "...";
    }
    return text;
};

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

        <div class="flex-1 block w-full overflow-auto">
            <div class="flex justify-between items-center">
                <div>
                    <span class="text-gray-800"  >{{ recipe.user.name }}</span>
                    <small class="ml-2 text-sm text-gray-600" >{{ dayjs(recipe.created_at).fromNow() }}</small>
                    <small v-if="recipe.created_at !== recipe.updated_at" class="text-sm text-gray-600"> &middot; edited</small >
                </div>


                <!--  Hvis det er innlogget bruker sin oppskrift, gi de rettigheter til å redigere med en dropdown knapp -->
                <Dropdown v-if="recipe.user.id === $page.props.auth.user.id">
                    <template #trigger>
                        <button>                         
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"   viewBox="0 0 20 20" fill="currentColor" > <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />  </svg>
                        </button>
                    </template>

                    <template #content>
                        <button
                            class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out"
                            @click="editing = true"
                        >
                            Edit
                        </button>

                        <DropdownLink as="button" :href="route('recipe.destroy', recipe.id)" method="delete">
                            Delete
                        </DropdownLink>

                    </template>

                </Dropdown>
            </div>

           <!-- Denne formen kommer opp hvis de er i editing mode -->
            <form
                v-if="editing" @submit.prevent=" form.put(route('recipe.update', recipe.id), { onSuccess: () => (editing = false), }) " >

                <input
                    id="recipeTitle"
                    v-model="form.title"
                    placeholder="Monkeys famous chicken stew"
                    class="block w-full mb-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />

                <textarea
                    id="ingridients"
                    v-model="form.ingridients"
                    placeholder="3 Carrots, 2 eggs"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>

                <textarea
                    v-model="form.message"
                    class="mt-4 w-full text-gray-900 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>

                <div class="space-x-2">
                    <PrimaryButton class="mt-4">Save</PrimaryButton>
                    <button class="mt-4" @click=" editing = false; form.reset(); form.clearErrors(); "> Cancel </button>
                </div>
            </form>

           <!--  Hvis de ikke er i editing mode kommer denne formen -->
            <div v-else>
               
                <p class="mt-4 text-xl text-gray-900 font-bold break-words" id="title" >{{ recipe.title }}</p>
                <br />

                <label for="ingredients" class="font-bold text-lg" >Ingredients</label>
                <p id="ingredients" class="mt-4 text-md text-gray-900 break-words">
                {{ isIngredientsExpanded ? recipe.ingridients : truncateText(recipe.ingridients) }}
                </p>
                <button v-if="recipe.ingridients.split(' ').length > 100 && !isIngredientsExpanded" @click="isIngredientsExpanded = true" class="text-red-300">Read More</button>
                <br> <br>

                <label for="howToCook" class="font-bold text-lg" >How to cook</label>
                <p class="mt-4 text-md text-gray-900 break-words" id="howToCook">
                {{ isMessageExpanded ? recipe.message : truncateText(recipe.message) }}
                </p>
                <button v-if="recipe.message.split(' ').length > 100 && !isMessageExpanded" @click="isMessageExpanded = true" class="text-red-300">Read More</button>
                <br>

               
                <p class="mt-4 text-md text-gray-900 break-words" id="howToCook">This recipe has {{ recipe.likes }} likes</p>


                
                <RecipeButton @click="clickLike" class="mt-4  mb-1">Like</RecipeButton>
            </div> 
            
            
            
         
        </div>
    </div >
</template>
