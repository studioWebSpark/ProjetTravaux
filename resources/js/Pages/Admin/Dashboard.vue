<template>
  <AdminLayout :auth="props.auth" title="Dashboard Administrateur">
    <div class="space-y-8">
      <!-- Statistiques rapides (déjà présentes) -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-gray-800 p-6 rounded-lg border border-gray-700">
          <div class="flex items-center">
            <div class="p-2 bg-blue-500 rounded-lg">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
              </svg>
            </div>
            <div class="ml-4">
              <p class="text-sm font-medium text-gray-400">Utilisateurs totaux</p>
              <p class="text-2xl font-semibold text-white">1,234</p>
            </div>
          </div>
        </div>

        <div class="bg-gray-800 p-6 rounded-lg border border-gray-700">
          <div class="flex items-center">
            <div class="p-2 bg-green-500 rounded-lg">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <div class="ml-4">
              <p class="text-sm font-medium text-gray-400">Demandes actives</p>
              <p class="text-2xl font-semibold text-white">567</p>
            </div>
          </div>
        </div>

        <div class="bg-gray-800 p-6 rounded-lg border border-gray-700">
          <div class="flex items-center">
            <div class="p-2 bg-yellow-500 rounded-lg">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <div class="ml-4">
              <p class="text-sm font-medium text-gray-400">Professionnels</p>
              <p class="text-2xl font-semibold text-white">89</p>
            </div>
          </div>
        </div>

        <div class="bg-gray-800 p-6 rounded-lg border border-gray-700">
          <div class="flex items-center">
            <div class="p-2 bg-red-500 rounded-lg">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
              </svg>
            </div>
            <div class="ml-4">
              <p class="text-sm font-medium text-gray-400">Revenus du mois</p>
              <p class="text-2xl font-semibold text-white">€12,450</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Actions rapides -->
      <div class="bg-gray-800 p-6 rounded-lg border border-gray-700">
        <h2 class="text-xl font-semibold mb-4">Actions rapides</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <button class="bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-lg transition-colors">
            <div class="flex items-center">
              <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
              <span>Ajouter un utilisateur</span>
            </div>
          </button>

          <button class="bg-green-600 hover:bg-green-700 text-white p-4 rounded-lg transition-colors">
            <div class="flex items-center">
              <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <span>Modérer les demandes</span>
            </div>
          </button>

          <button class="bg-purple-600 hover:bg-purple-700 text-white p-4 rounded-lg transition-colors">
            <div class="flex items-center">
              <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>
              <span>Voir les statistiques</span>
            </div>
          </button>
        </div>
      </div>

      <!-- Activité récente -->
      <div class="bg-gray-800 p-6 rounded-lg border border-gray-700">
        <h2 class="text-xl font-semibold mb-4">Activité récente</h2>
        <div class="space-y-4">
          <div class="flex items-center p-3 bg-gray-700 rounded-lg">
            <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
            <div class="flex-1">
              <p class="text-sm">Nouveau professionnel inscrit : <span class="font-semibold">Jean Dupont</span></p>
              <p class="text-xs text-gray-400">Il y a 5 minutes</p>
            </div>
          </div>

          <div class="flex items-center p-3 bg-gray-700 rounded-lg">
            <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
            <div class="flex-1">
              <p class="text-sm">Nouvelle demande créée : <span class="font-semibold">Rénovation cuisine</span></p>
              <p class="text-xs text-gray-400">Il y a 12 minutes</p>
            </div>
          </div>

          <div class="flex items-center p-3 bg-gray-700 rounded-lg">
            <div class="w-2 h-2 bg-yellow-500 rounded-full mr-3"></div>
            <div class="flex-1">
              <p class="text-sm">Devis accepté : <span class="font-semibold">€2,500</span> pour travaux de peinture</p>
              <p class="text-xs text-gray-400">Il y a 1 heure</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Liste des utilisateurs et pros -->
      <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Tous les utilisateurs</h2>
        <table class="min-w-full bg-white">
          <thead>
            <tr>
              <th class="py-2 px-4 border-b">Nom</th>
              <th class="py-2 px-4 border-b">Email</th>
              <th class="py-2 px-4 border-b">Rôle</th>
              <th class="py-2 px-4 border-b">Date d'inscription</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in props.users" :key="user.id">
              <td class="py-2 px-4 border-b">{{ user.name }}</td>
              <td class="py-2 px-4 border-b">{{ user.email }}</td>
              <td class="py-2 px-4 border-b">
                <span v-if="user.role === 'admin'" class="text-red-600 font-bold">Admin</span>
                <span v-else-if="user.role === 'artisan'" class="text-blue-600 font-bold">Pro</span>
                <span v-else class="text-green-600 font-bold">Client</span>
              </td>
              <td class="py-2 px-4 border-b">{{ new Date(user.created_at).toLocaleDateString('fr-FR') }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const { props } = usePage()
</script>