<template>
    <div class="min-h-screen bg-blue-50">
        <header class="bg-blue-600 text-white p-4">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">{{ title ?? 'Espace Pro' }}</h1>
                    <div class="mt-1">Connecté en tant que : <b>{{ auth.user.name }}</b> (professionnel)</div>
                </div>
                <button @click="logout"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md font-medium transition-colors">
                    Se déconnecter
                </button>
            </div>
        </header>
        <nav class="bg-blue-700 text-white p-3">
            <a href="/dashboard/pro" class="mr-4 hover:text-blue-200">Dashboard Pro</a>
            <a href="/demandes" class="mr-4 hover:text-blue-200">Demandes disponibles</a>
            <a href="/devis" class="mr-4 hover:text-blue-200">Mes devis</a>
            <a href="/messages" class="mr-4 hover:text-blue-200">Messages</a>
            <a href="/profile/pro" class="mr-4 hover:text-blue-200">Mon profil</a>
        </nav>
        <main class="p-8">
            <slot />
        </main>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'

defineProps({
    title: String,
    auth: Object
});

const logout = () => {
    router.post('/logout')
}
</script>
