<script setup>
defineProps({
    title: String,
    auth: Object
});
</script>

<template>
    <div class="min-h-screen bg-gray-900 text-white">
        <header class="bg-gray-800 p-4">
            <h1 class="text-2xl font-bold">{{ title ?? 'Admin' }}</h1>
            <div class="mt-2">Connecté en tant que : <b>{{ auth.user.name }}</b> (admin)</div>
        </header>
        <nav class="bg-gray-800 p-2">
            <!-- Ajoute ici tes liens admin -->
            <a href="/admin" class="mr-4">Dashboard Admin</a>
            <a href="/users" class="mr-4">Utilisateurs</a>
            <a href="/demandes" class="mr-4">Demandes</a>
            <!-- ... -->
        </nav>
        <main class="p-8">
            <slot />
        </main>
    </div>
</template>