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

<template>
    <div class="min-h-screen bg-gray-900 text-white">
        <header class="bg-gray-800 p-4 shadow-lg">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">{{ title ?? 'Admin' }}</h1>
                    <div class="mt-1 text-gray-300">Connecté en tant que : <b class="text-red-400">{{ auth.user.name
                            }}</b> (administrateur)</div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-400">{{ new Date().toLocaleDateString('fr-FR') }}</span>
                    <button @click="logout"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md font-medium transition-colors">
                        Se déconnecter
                    </button>
                </div>
            </div>
        </header>

        <nav class="bg-gray-800 p-3 border-b border-gray-700">
            <div class="flex space-x-6">
                <a href="/dashboard-admin"
                    class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition-colors">
                    📊 Dashboard
                </a>
                <a href="/admin/users"
                    class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition-colors">
                    👥 Utilisateurs
                </a>
                <a href="/admin/demandes"
                    class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition-colors">
                    📋 Demandes
                </a>
                <a href="/admin/categories"
                    class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition-colors">
                    🏷️ Catégories
                </a>
                <a href="/admin/statistiques"
                    class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition-colors">
                    📈 Statistiques
                </a>
                <a href="/admin/parametres"
                    class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition-colors">
                    ⚙️ Paramètres
                </a>
            </div>
        </nav>

        <main class="p-8">
            <slot />
        </main>
    </div>
</template>