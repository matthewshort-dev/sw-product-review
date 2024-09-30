<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import InputError from '@/Components/InputError.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import { useForm, Head } from '@inertiajs/vue3';

    const form = useForm({
        reviewTitle: '',
        reviewText: '',
    });
</script>
<template>
    <Head title="Reviews" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="bg-gray-100 shadow-sm rounded-lg">
                <div class="p-6 sm:p-10 flex space-x-2">
                    <div class="flex-1">
                        <h1 class="mb-4 text-lg sm:text-2xl">Submit Your Review</h1>
                        <form
                            class="flex flex-col"    
                            @submit.prevent="form.post(route(reviews.store)), { onSuccess: () => form.reset() }"
                        >
                            <div class="mb-4">
                                <label for="review-title" class="block text-sm sm:text-base font-medium text-gray-700">
                                    Review Title<span aria-hidden="true" class="text-red-700 pl-px">*</span>
                                </label>
                                <input
                                    id="review-title"
                                    v-model="form.reviewTitle"
                                    type="text"
                                    required
                                    aria-required="true"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    :aria-invalid="form.errors.reviewTitle ? 'true' : 'false'"
                                    :aria-describedby="form.errors.reviewTitle ? 'review-title-error' : undefined"
                                />
                                <InputError v-if="form.errors.reviewTitle" :message="form.errors.reviewTitle" class="mt-1" id="review-title-error" />
                            </div>
                            <div class="mb-4">
                                <label for="review-text" class="block text-sm sm:text-base font-medium text-gray-700">
                                    Review<span aria-hidden="true" class="text-red-700 pl-px">*</span>
                                </label>
                                <textarea
                                    id="review-text"
                                    v-model="form.reviewText"
                                    required
                                    aria-required="true"
                                    rows="4"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    :aria-invalid="form.errors.reviewText ? 'true' : 'false'"
                                    :aria-describedby="form.errors.reviewText ? 'review-text-error' : undefined"
                                ></textarea>
                                <InputError v-if="form.errors.reviewText" :message="form.errors.reviewText" class="mt-1" id="review-text-error" />
                            </div>
                            <PrimaryButton class="mt-8 justify-center">Submit Review</PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>