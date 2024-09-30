<template>
    <Head title="Reviews" />

    <AuthenticatedLayout>
        <ReviewForm />
    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import ReviewForm from '@/Components/ReviewForm.vue';
    import { Head } from '@inertiajs/vue3';
</script>