<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";


const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen ">
           

            <!-- Page Heading -->
            <header :style="{ 'background-color': 'rgb(221, 83, 83)'  }">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>

            <!-- Footer -->
            <!-- <footer class="bg-white shadow" v-if="$slots.footer">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="footer" />
                </div>
            </footer> -->



        </div>
    </div>
</template>
