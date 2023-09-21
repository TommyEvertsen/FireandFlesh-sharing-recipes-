<template>

<AuthenticatedLayout >

    <CreateRecipe 
    
    />



</AuthenticatedLayout>








</template>

<script setup>
import CreateRecipe from '@/Components/CreateRecipe.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


defineProps(["recipes"]);
</script>