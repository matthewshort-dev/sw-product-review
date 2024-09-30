<template>
    <div
        role="radiogroup"
        aria-label="Rate this item from 1 to 5 stars"
        class="flex items-center space-x-1 mt-1"
        @keydown="(e) => handleKeyDown(e)"
        @mouseleave="handleMouseLeave"
    >
        <label
            v-for="starIndex in 5"
            :key="starIndex"
            class="cursor-pointer"
            @mouseenter="handleMouseEnter(starIndex)"
        >
            <input
                type="radio"
                :name="'rating'"
                :value="starIndex"
                :checked="props.modelValue === starIndex"
                @change="handleClick(starIndex)"
                @focus="handleMouseEnter(starIndex)"
                @blur="handleMouseLeave()"
                class="sr-only"
                :aria-label="`${starIndex} star${starIndex !== 1 ? 's' : ''}`"
            />
                <svg
                    xmlns="http://www.w3.org/2000/svg" 
                    viewBox="0 0 24 24" 
                    :fill="currentRating >= starIndex ? 'currentColor' : 'none'"
                    stroke="currentColor" 
                    class="w-6 h-6 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    :class="currentRating >= starIndex ? 'text-yellow-400' : 'text-gray-300'"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
        </label>
    </div>
</template>
<script setup>
    import { ref, computed } from 'vue';

    const props = defineProps({
        modelValue: {
            type: Number,
            default: 0
        }
    });

    const emit = defineEmits(['update:modelValue']);

    const hoverRating = ref(0);
    const focusedRating = ref(0);

    const currentRating = computed(() => 
        Math.max(props.modelValue, hoverRating.value, focusedRating.value)
    );

    const handleMouseEnter = (starIndex) => {
        hoverRating.value = starIndex;
    };

    const handleMouseLeave = () => {
        hoverRating.value = 0;
    };

    const handleFocus = (starIndex) => {
        focusedRating.value = starIndex;
    };

    const handleBlur = () => {
        focusedRating.value = 0;
    };

    const handleClick = (starIndex) => {
        emit('update:modelValue', starIndex);
    };

    const handleKeyDown = (e) => {
        if (e.key === 'ArrowRight' || e.key === 'ArrowUp') {
            e.preventDefault();
            emit('update:modelValue', Math.min(5, props.modelValue + 1));
        } else if (e.key === 'ArrowLeft' || e.key === 'ArrowDown') {
            e.preventDefault();
            emit('update:modelValue', Math.max(0, props.modelValue - 1));
        }
    };
</script>