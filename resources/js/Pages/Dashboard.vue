<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout class="foodPictureDashboard">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">Home</h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 ">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="p-3 text-center text-white text-2xl font-serif">Welcome  {{ $page.props.auth.user.name }}</div>
                </div>
            </div>
        </div>

        <div>
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 text-xl font-serif " >
                <div class=" overflow-hidden ">
                    <div class="p-6 text-white text-center break-words">
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

.foodPictureDashboard{
    background: 
        linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 1)),  
        url("/resources/images/Optimized-pexels-lumn-351961.jpg");
    background-size: cover; 
    background-repeat: no-repeat; 
    background-position: center center; }

</style>