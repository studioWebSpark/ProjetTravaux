<template>
    <ClientLayout :auth="props.auth" title="Dashboard Client">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-6">Tableau de bord client</h1>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Bienvenue {{ props.auth.user.name }} !</h2>
                <p class="text-gray-600 mb-6">Vous êtes connecté en tant que particulier.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-green-100 p-4 rounded-lg">
                        <h3 class="font-semibold text-green-900">Mes demandes</h3>
                        <p class="text-green-700">Suivez l’avancement de vos demandes de travaux.</p>
                    </div>
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <h3 class="font-semibold text-blue-900">Créer une nouvelle demande</h3>
                        <p class="text-blue-700">Décrivez votre projet et recevez des devis de professionnels.</p>
                    </div>
                    <div class="bg-purple-100 p-4 rounded-lg">
                        <h3 class="font-semibold text-purple-900">Messages</h3>
                        <p class="text-purple-700">Consultez vos messages</p>
                    </div>
                </div>
            </div>
        </div>
    </ClientLayout>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import ClientLayout from '@/Layouts/ClientLayout.vue'

const { props } = usePage()
</script>