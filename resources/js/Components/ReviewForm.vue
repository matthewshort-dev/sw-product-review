<template>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="bg-gray-100 shadow-sm rounded-lg">
        <div class="p-6 sm:p-10 flex space-x-2">
            <div class="flex-1">
                <h1 class="mb-4 text-lg sm:text-2xl">Submit Your Review</h1>
                <form
                    class="flex flex-col"    
                    @submit.prevent="form.post(route('reviews.store'), { onSuccess: () => form.reset() })"
                >
                    <div class="mb-4">
                        <label for="review-title" class="block text-sm sm:text-base font-medium text-gray-700">
                            Review Title<span aria-hidden="true" class="text-red-700 pl-px">*</span>
                        </label>
                        <input
                            id="review-title"
                            v-model="form.review_title"
                            type="text"
                            required
                            aria-required="true"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                            :aria-invalid="form.errors.review_title ? 'true' : 'false'"
                            :aria-describedby="form.errors.review_title ? 'review-title-error' : undefined"
                        />
                        <InputError v-if="form.errors.review_title" :message="form.errors.review_title" class="mt-1" id="review-title-error" />
                    </div>
                    <div class="mb-4">
                        <label for="review-text" class="block text-sm sm:text-base font-medium text-gray-700">
                            Review<span aria-hidden="true" class="text-red-700 pl-px">*</span>
                        </label>
                        <textarea
                            id="review-text"
                            v-model="form.review_text"
                            required
                            aria-required="true"
                            rows="4"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                            :aria-invalid="form.errors.review_text ? 'true' : 'false'"
                            :aria-describedby="form.errors.review_text ? 'review-text-error' : undefined"
                        ></textarea>
                        <InputError v-if="form.errors.review_text" :message="form.errors.review_text" class="mt-1" id="review-text-error" />
                    </div>
                    <div class="mb-4">
                        <h3 id="file-upload-header" class="block text-sm sm:text-base font-medium text-gray-700 mt-4">Add Image (optional)</h3>
                        <div class="flex items-center border border-gray-300 bg-white rounded-lg mt-1" role="group" aria-labelledby="file-upload-header">
                            <input
                                class="hidden"
                                type="file"
                                @change="handleFileChange"
                                accept="image/*"
                                id="file-input"
                                aria-describedby="file-input-description"
                            />
                            <label for="file-input" class="border border-gray-300 bg-gray-100 text-sm sm:text-base font-bold text-gray-700 px-4 py-2 m-2 rounded-sm cursor-pointer hover:bg-gray-200 transition-colors duration-300">
                                Select Files
                            </label>
                            <span id="file-input-description" class="ml-4 text-sm sm:text-base text-gray-400">
                                {{ selectedFile ? selectedFile.name : 'No file chosen.' }}
                            </span>
                        </div>
                    </div>
                    <PrimaryButton class="mt-8 justify-center">Submit Review</PrimaryButton>
                </form>
            </div>
        </div>
    </div>
    </div>
</template>

<script setup>
    import InputError from '@/Components/InputError.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import { useForm } from '@inertiajs/vue3';
    import { ref } from 'vue';

    const form = useForm({
        review_title: '',
        review_text: '',
    });

    const selectedFile = ref(null);

    const handleFileChange = (event) => {
        const file = event.target.files[0];

        if (file) {
            selectedFile.value = file;
        }
    };
</script>