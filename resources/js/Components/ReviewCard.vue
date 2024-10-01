<template>
    <article class="max-w-2xl mx-2 sm:mx-auto p-4 pb-2 sm:p-6 lg:p-8 lg:pb-4">
        <div class="bg-gray-100 shadow-sm rounded-lg p-6 sm:p-10">
            <header>
                <h2 :id="`review-${review.id}`" class="text-lg text-gray-900 font-bold">{{ review.review_title }}</h2>
                <div class="mt-1 flex text-sm text-gray-700">
                    <span>{{ review.user_name }}</span>
                    <span class="mx-1" aria-hidden="true">&middot;</span>
                    <time :datetime="review.created_at">{{ dayjs(review.created_at).fromNow() }}</time>
                </div>
            </header>
            <StarRating :rating="review.rating" />
            <p class="mt-4 text-lg text-gray-900" :aria-labelledby="headerId">
                {{ review.review_text }}
            </p>
            <div v-if="review.image_url" class="mt-4">
                <ReviewImage :imageUrl="review.image_url" :altText="`Review image by ${review.user_name}`" />
            </div>
        </div>
    </article>
</template>
<script setup>
    import dayjs from 'dayjs';
    import relativeTime from 'dayjs/plugin/relativeTime';
    import ReviewImage from './ReviewImage.vue';
    import StarRating from '@/Components/StarRating.vue';

    dayjs.extend(relativeTime);
    defineProps(['review']);
</script>