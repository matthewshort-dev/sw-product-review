<template>
    <article class="max-w-2xl mx-2 sm:mx-auto p-4 pb-2 sm:p-6 lg:p-8 lg:pb-4">
        <div class="bg-gray-100 shadow-sm rounded-lg p-6 sm:p-10">
            <header>
                <div class="flex justify-between items-center">
                    <h2 :id="`review-${review.id}`" class="text-lg text-gray-900 font-bold">{{ review.review_title }}</h2>
                    <Dropdown v-if="review.user_id === $page.props.auth.user.id || $page.props.auth.user.is_admin">
                        <template #trigger>
                            <button
                                type="button"
                                aria-haspopup="true"
                                :aria-controls="`dropdown-menu-${review.id}`"
                            >
                                <span class="sr-only">Review options</span>
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </template>
                        <template #content>
                            <div :id="`dropdown-menu-${review.id}`" role="menu" aria-orientation="vertical" aria-labelledby="`review-options-${review.id}`">
                                <DropdownLink
                                    as="button"
                                    :href="route('reviews.destroy', review.id)"
                                    method="delete"
                                    role="menuitem"
                                >
                                    Delete
                                </DropdownLink>
                            </div>
                        </template>
                    </Dropdown>
                </div>
                <div class="mt-1 flex text-sm text-gray-700">
                    <span>{{ review.user_name }}</span>
                    <span class="mx-1" aria-hidden="true">&middot;</span>
                    <time :datetime="review.created_at">{{ dayjs(review.created_at).fromNow() }}</time>
                </div>
            </header>
            <StarRating :rating="review.rating" />
            <div class="mt-4">
                <p class="text-lg text-gray-900" :aria-labelledby="`review-${review.id}`">
                    {{ displayedText }}
                    <span v-if="isTextTruncated">...</span>
                </p>
                <div class="mt-1">
                    <button
                        v-if="isTextTruncated" 
                        @click="toggleFullText" 
                        class="text-blue-600 hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-sm"
                        :aria-expanded="showFullText"
                        :aria-controls="`review-text-${review.id}`"
                    >
                        <span class="sr-only">{{ showFullText ? 'Collapse review text' : 'Expand review text' }}</span>
                        <span aria-hidden="true">{{ showFullText ? 'Read Less' : 'Read More' }}</span>
                    </button>
                </div>
            </div>
            <div v-if="review.image_url" class="mt-4">
                <ReviewImage :imageUrl="review.image_url" :altText="`Review image by ${review.user_name}`" />
            </div>
        </div>
    </article>
</template>
<script setup>
    import Dropdown from '@/Components/Dropdown.vue';
    import DropdownLink from '@/Components/DropdownLink.vue';
    import dayjs from 'dayjs';
    import relativeTime from 'dayjs/plugin/relativeTime';
    import ReviewImage from './ReviewImage.vue';
    import StarRating from '@/Components/StarRating.vue';
    import { ref, computed } from 'vue';

    dayjs.extend(relativeTime);
    const props = defineProps(['review']);

    const maxCharacters = 250;
    const showFullText = ref(false);
    const isTextTruncated = computed(() => props.review.review_text.length > maxCharacters);
    
    const displayedText = computed(() => {
        if(!isTextTruncated.value || showFullText.value) {
            return props.review.review_text
        }

        return props.review.review_text.slice(0, maxCharacters);
    });
    
    const toggleFullText = () => {
        showFullText.value = !showFullText.value;
    };
</script>