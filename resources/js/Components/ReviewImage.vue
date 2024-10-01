<template>
    <div>
        <button
            @click="openModal"
            class="focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg overflow-hidden"
            :aria-label="`Enlarge image of ${altText}`"
        >
            <img
                :src="imageUrl"
                :alt="altText"
                class="w-24 h-24 object-cover transition-transform duration-300 transform hover:scale-105"
            />
        </button>
        <div
            v-if="isModalOpen"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
            @click="closeModal"
        >
        <div class="relative max-w-3xl max-h-full p-4">
            <img
                :src="imageUrl"
                :alt="altText"
                class="max-w-full max-h-[90vh] object-contain"
            />
            <button
                @click="closeModal"
                class="absolute top-2 right-2 text-white bg-black bg-opacity-50 rounded-full p-2 focus:outline-none focus:ring-2 focus:ring-white"
                aria-label="Close enlarged image"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        </div>
    </div>
  </template>
  
  <script setup>
    import { ref } from 'vue';
    
    const props = defineProps(['imageUrl', 'altText']);
    
    const isModalOpen = ref(false);
    
    const openModal = () => {
        isModalOpen.value = true;
        document.body.style.overflow = 'hidden';
    };
    
    const closeModal = () => {
        isModalOpen.value = false;
        document.body.style.overflow = '';
    };
  </script>