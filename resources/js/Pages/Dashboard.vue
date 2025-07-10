<script setup>
import { usePage } from '@inertiajs/vue3'
const { props } = usePage();
</script>

<template>
    <div>
        <template v-if="props.auth.user.role === 'admin'">
            <h1>Dashboard Administrateur</h1>
            <p>Bienvenue, {{ props.auth.user.name }} (admin)</p>
            <!-- Ici, tu mets le contenu admin -->
        </template>
        <template v-else-if="props.auth.user.role === 'artisan' || props.auth.user.role === 'pro'">
            <h1>Dashboard Artisan</h1>
            <p>Bienvenue, {{ props.auth.user.name }} (artisan)</p>
            <!-- Ici, tu mets le contenu artisan -->
        </template>
        <template v-else>
            <h1>Dashboard Client</h1>
            <p>Bienvenue, {{ props.auth.user.name }} (client)</p>
            <!-- Ici, tu mets le contenu client -->
        </template>
    </div>
</template>
