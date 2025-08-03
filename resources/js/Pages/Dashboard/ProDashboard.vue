<template>
    <Dashboard title="Dashboard Professionnel" :auth="props.auth">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-6">Tableau de bord professionnel</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-blue-100 p-6 rounded-lg">
                    <h3 class="font-semibold text-blue-900 text-lg mb-2">Demandes disponibles</h3>
                    <p class="text-blue-700">Consultez les demandes de travaux</p>
                </div>

                <div class="bg-green-100 p-6 rounded-lg">
                    <h3 class="font-semibold text-green-900 text-lg mb-2">Mes devis</h3>
                    <p class="text-green-700">Gérez vos devis</p>
                </div>

                <div class="bg-purple-100 p-6 rounded-lg">
                    <h3 class="font-semibold text-purple-900 text-lg mb-2">Messages</h3>
                    <p class="text-purple-700">Consultez vos messages</p>
                </div>
            </div>
        </div>
    </Dashboard>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import Dashboard from '@/Pages/Dashboard.vue'

const { props } = usePage()
</script>
