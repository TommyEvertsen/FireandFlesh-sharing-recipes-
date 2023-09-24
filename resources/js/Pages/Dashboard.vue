<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">Home</h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-center" style="background-color: #F1EFEF; ">You're logged in as  {{ $page.props.auth.user.name }}</div>
                </div>
            </div>
        </div>

        <div>
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 text-xl font-serif" >
                <div class="bg-white overflow-hidden ">
                    <div class="p-6 text-gray-900 text-center break-words">
                       <p> They say "We eat with our eyes"</p>
                       <p class="">And while that may be true, for me eating should be like an adventure. </p>
                        <p class="mt-5"> I remember i used to 
                        look in my grandmothers recipe book. Just grey handwritten text on white paper. I looked at the name of the recipe and imagined the 
                        sight, the smell and  the taste. Making the dish felt like an adventure into the unknown. </p>
                        <p class="mt-5">This is what i want to 
                        recreate on this site. Adventure! No pictures, no vidoes just imagination and beautiful dish.</p> 
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>

</style>