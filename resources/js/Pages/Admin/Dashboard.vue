<script setup>
import { usePage } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const { props } = usePage();
</script>

<template>
  <AdminLayout :auth="props.auth" title="Dashboard Admin">
    <div>
      Bonjour {{ props.auth.user.name }}<br>
      Bienvenue sur le dashboard administrateur personnalisé !
    </div>
  </AdminLayout>
</template>