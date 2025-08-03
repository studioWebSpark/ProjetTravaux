<template>
    <AdminLayout v-if="auth.user.role === 'admin'" :auth="auth" :title="title">
        <slot />
    </AdminLayout>

    <ProLayout v-else-if="auth.user.role === 'artisan' || auth.user.role === 'pro'" :auth="auth" :title="title">
        <slot />
    </ProLayout>

    <ClientLayout v-else :auth="auth" :title="title">
        <slot />
    </ClientLayout>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import ProLayout from '@/Layouts/ProLayout.vue'
import ClientLayout from '@/Layouts/ClientLayout.vue'

const { props } = usePage()

defineProps({
    title: String
})
</script>
