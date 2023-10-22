<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Achievement from '@/Components/Achievement.vue';


const props = defineProps({
  achievements: Array, 
  recipe: Array,
})


</script>

<template>
<AuthenticatedLayout>

    <!-- Profile name -->
<template #main>

        <div class="text-4xl mt-10 text-center">
            <h1> {{ $page.props.auth.user.name }} </h1>
          <h2>{{ console.log(recipe[1].title)}}</h2>
        </div>
 
         
 

        <!--  HR -->
         <div class="inline-flex items-center justify-center w-full">
            <hr class="w-80 h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <span class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">Achievements</span>
        </div>

        <div id="achievements">
        <Achievement 
        :achievements="achievements"
        />  
        </div>
       
 
    

</template>


</AuthenticatedLayout> 





</template>