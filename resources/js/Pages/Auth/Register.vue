<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: 'client' // Valeur par défaut
})

const submit = () => {
    form.post('/register')
}
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Créer votre compte
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Choisissez votre profil pour commencer
                </p>
            </div>

            <form class="mt-8 space-y-6" @submit.prevent="submit">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Nom complet</label>
                        <input id="name" v-model="form.name" name="name" type="text" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Nom complet" />
                    </div>
                    <div>
                        <label for="email" class="sr-only">Adresse email</label>
                        <input id="email" v-model="form.email" name="email" type="email" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Adresse email" />
                    </div>
                    <div>
                        <label for="password" class="sr-only">Mot de passe</label>
                        <input id="password" v-model="form.password" name="password" type="password" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Mot de passe" />
                    </div>
                    <div>
                        <label for="password_confirmation" class="sr-only">Confirmer le mot de passe</label>
                        <input id="password_confirmation" v-model="form.password_confirmation"
                            name="password_confirmation" type="password" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Confirmer le mot de passe" />
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Je suis un :
                    </label>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input id="role_client" v-model="form.role" name="role" type="radio" value="client"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300" />
                            <label for="role_client" class="ml-3 block text-sm font-medium text-gray-700">
                                <div class="font-semibold">Particulier</div>
                                <div class="text-gray-500">Je cherche des professionnels pour mes travaux</div>
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="role_artisan" v-model="form.role" name="role" type="radio" value="artisan"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300" />
                            <label for="role_artisan" class="ml-3 block text-sm font-medium text-gray-700">
                                <div class="font-semibold">Professionnel</div>
                                <div class="text-gray-500">Je propose mes services de travaux</div>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" :disabled="form.processing"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50">
                        <span v-if="form.processing">Création en cours...</span>
                        <span v-else>Créer mon compte</span>
                    </button>
                </div>

                <div class="text-center">
                    <a href="/login" class="text-indigo-600 hover:text-indigo-500">
                        Déjà un compte ? Se connecter
                    </a>
                </div>
            </form>
        </div>
    </div>
</template>
