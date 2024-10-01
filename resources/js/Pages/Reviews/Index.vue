<template>
    <Head title="Reviews" />

    <AuthenticatedLayout>
        <span class="sr-only">Reviews</span>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mx-[4%] lg:mx-[8%] xl:mx-[12%]">
            <section 
                id="review-form-section" 
                class="md:col-start-1 md:col-end-2"
                aria-labelledby="form-heading"
            >
                <h2 id="form-heading" class="sr-only">Submit a Review</h2>
                <div class="w-max min-w-full">
                    <ReviewForm />
                </div>
            </section>
            <section 
                id="review-list-section" 
                class="md:col-start-2 md:col-end-3"
                aria-labelledby="reviews-heading"
            >
                <h2 id="reviews-heading" class="sr-only">Customer Reviews</h2>
                <ul class="space-y-4 list-none p-0">
                    <li v-for="review in reviews" :key="review.id">
                        <ReviewCard :review="review" />
                    </li>
                </ul>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import ReviewCard from '@/Components/ReviewCard.vue';
    import ReviewForm from '@/Components/ReviewForm.vue';
    import { Head } from '@inertiajs/vue3';

    defineProps(['reviews'])
</script>