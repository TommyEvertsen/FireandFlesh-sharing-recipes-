<template>

<AuthenticatedLayout >

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

