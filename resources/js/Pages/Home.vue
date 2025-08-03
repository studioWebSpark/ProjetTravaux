<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-6">
          <div>
            <h1 class="text-3xl font-bold text-gray-900">Plateforme de Travaux</h1>
            <p class="text-gray-600">Connectez particuliers et professionnels</p>
          </div>
          <div>
            
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

        <!-- Left side - Welcome text -->
        <div class="flex flex-col justify-center">
          <h2 class="text-4xl font-bold text-gray-900 mb-6">
            Trouvez le professionnel idéal pour vos travaux
          </h2>
          <p class="text-xl text-gray-600 mb-8">
            Notre plateforme met en relation particuliers et professionnels du bâtiment.
            Créez votre compte en quelques clics et commencez dès aujourd'hui.
          </p>

          <div class="space-y-4">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                  <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">Inscription gratuite</p>
              </div>
            </div>

            <div class="flex items-center">
              <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                  <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">Professionnels vérifiés</p>
              </div>
            </div>

            <div class="flex items-center">
              <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                  <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">Devis gratuits</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Right side - Registration form (only for non-authenticated users) -->
        <div v-if="!auth.user" class="bg-white rounded-lg shadow-lg p-8">
          <h3 class="text-2xl font-bold text-gray-900 mb-6">Créer votre compte</h3>

          <form @submit.prevent="submit" class="space-y-6">
            <!-- Name -->
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                Nom complet
              </label>
              <input id="name" v-model="form.name" type="text" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Votre nom complet" @input="validateName" />
              <div v-if="form.errors.name" class="text-red-500 text-sm mt-1">
                {{ form.errors.name }}
              </div>
              <div v-if="nameFeedback" class="text-sm mt-1" :class="nameFeedback.color">
                {{ nameFeedback.message }}
              </div>
            </div>

            <!-- Email -->
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                Adresse email
              </label>
              <input id="email" v-model="form.email" type="email" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="votre@email.com" @input="validateEmail" />
              <div v-if="form.errors.email" class="text-red-500 text-sm mt-1">
                {{ form.errors.email }}
              </div>
              <div v-if="emailFeedback" class="text-sm mt-1" :class="emailFeedback.color">
                {{ emailFeedback.message }}
              </div>
            </div>

            <!-- Password -->
            <div>
              <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                Mot de passe
              </label>
              <div class="relative">
                <input id="password" v-model="form.password" :type="showPassword ? 'text' : 'password'" required
                  class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                  placeholder="Minimum 8 caractères" @input="validatePassword" />
                <button type="button" @click="showPassword = !showPassword"
                  class="absolute inset-y-0 right-0 pr-3 flex items-center">
                  <svg v-if="showPassword" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                  </svg>
                  <svg v-else class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                </button>
              </div>
              <div v-if="form.errors.password" class="text-red-500 text-sm mt-1">
                {{ form.errors.password }}
              </div>
              <div v-if="passwordFeedback" class="text-sm mt-1" :class="passwordFeedback.color">
                {{ passwordFeedback.message }}
              </div>
            </div>

            <!-- Password Confirmation -->
            <div>
              <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                Confirmer le mot de passe
              </label>
              <div class="relative">
                <input id="password_confirmation" v-model="form.password_confirmation"
                  :type="showPasswordConfirmation ? 'text' : 'password'" required
                  class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                  placeholder="Confirmez votre mot de passe" @input="validatePasswordConfirmation" />
                <button type="button" @click="showPasswordConfirmation = !showPasswordConfirmation"
                  class="absolute inset-y-0 right-0 pr-3 flex items-center">
                  <svg v-if="showPasswordConfirmation" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                  </svg>
                  <svg v-else class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                </button>
              </div>
              <div v-if="passwordConfirmationFeedback" class="text-sm mt-1" :class="passwordConfirmationFeedback.color">
                {{ passwordConfirmationFeedback.message }}
              </div>
            </div>

            <!-- Role Selection -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-3">
                Je suis un :
              </label>
              <div class="space-y-3">
                <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                  <input id="role_client" v-model="form.role" name="role" type="radio" value="client"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300" />
                  <label for="role_client" class="ml-3 flex-1 cursor-pointer">
                    <div class="font-semibold text-gray-900">Particulier</div>
                    <div class="text-sm text-gray-500">Je cherche des professionnels pour mes travaux</div>
                  </label>
                </div>

                <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                  <input id="role_artisan" v-model="form.role" name="role" type="radio" value="artisan"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300" />
                  <label for="role_artisan" class="ml-3 flex-1 cursor-pointer">
                    <div class="font-semibold text-gray-900">Professionnel</div>
                    <div class="text-sm text-gray-500">Je propose mes services de travaux</div>
                  </label>
                </div>
              </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" :disabled="form.processing || !isFormValid"
              class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
              <span v-if="form.processing">Création en cours...</span>
              <span v-else>Créer mon compte</span>
            </button>

            <!-- Login Link -->
            <div class="text-center">
              <span class="text-gray-600">Déjà un compte ?</span>
              <a href="/login" class="text-indigo-600 hover:text-indigo-500 font-medium ml-1">
                Se connecter
              </a>
            </div>
          </form>
        </div>

        <!-- Right side - Welcome message for authenticated users -->
        <div v-else class="bg-white rounded-lg shadow-lg p-8">
          <h3 class="text-2xl font-bold text-gray-900 mb-6">Bienvenue {{ auth.user.name }} !</h3>
          <p class="text-gray-600 mb-6">
            Vous êtes connecté en tant que {{ auth.user.role === 'artisan' ? 'professionnel' : 'particulier' }}.
          </p>
          <a :href="dashboardUrl" class="bg-indigo-600 text-white py-3 px-6 rounded-md font-medium hover:bg-indigo-700">
            Accéder à mon dashboard
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

defineProps({
  auth: Object
})

const { props } = usePage()

const dashboardUrl = computed(() => {
  if (!props.auth || !props.auth.user) return '/login'
  if (props.auth.user.role === 'admin') return '/dashboard-admin'
  if (props.auth.user.role === 'artisan' || props.auth.user.role === 'pro') return '/dashboard/pro'
  return '/dashboard/user'
})

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  role: 'client'
})

// État pour afficher/masquer les mots de passe
const showPassword = ref(false)
const showPasswordConfirmation = ref(false)

// Feedback en temps réel
const nameFeedback = ref(null)
const emailFeedback = ref(null)
const passwordFeedback = ref(null)
const passwordConfirmationFeedback = ref(null)

// Validation en temps réel
const validateName = () => {
  if (form.name.length === 0) {
    nameFeedback.value = null
  } else if (form.name.length < 2) {
    nameFeedback.value = { message: 'Le nom doit contenir au moins 2 caractères', color: 'text-yellow-600' }
  } else {
    nameFeedback.value = { message: 'Nom valide', color: 'text-green-600' }
  }
}

const validateEmail = () => {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  if (form.email.length === 0) {
    emailFeedback.value = null
  } else if (!emailRegex.test(form.email)) {
    emailFeedback.value = { message: 'Format d\'email invalide', color: 'text-red-600' }
  } else {
    emailFeedback.value = { message: 'Email valide', color: 'text-green-600' }
  }
}

const validatePassword = () => {
  if (form.password.length === 0) {
    passwordFeedback.value = null
  } else if (form.password.length < 8) {
    passwordFeedback.value = { message: 'Le mot de passe doit contenir au moins 8 caractères', color: 'text-red-600' }
  } else if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(form.password)) {
    passwordFeedback.value = { message: 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre', color: 'text-yellow-600' }
  } else {
    passwordFeedback.value = { message: 'Mot de passe fort', color: 'text-green-600' }
  }
}

const validatePasswordConfirmation = () => {
  if (form.password_confirmation.length === 0) {
    passwordConfirmationFeedback.value = null
  } else if (form.password_confirmation !== form.password) {
    passwordConfirmationFeedback.value = { message: 'Les mots de passe ne correspondent pas', color: 'text-red-600' }
  } else {
    passwordConfirmationFeedback.value = { message: 'Mots de passe identiques', color: 'text-green-600' }
  }
}

// Validation globale du formulaire
const isFormValid = computed(() => {
  return form.name.length >= 2 &&
    /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email) &&
    form.password.length >= 8 &&
    form.password === form.password_confirmation &&
    form.role
})

const submit = () => {
  form.post('/register')
}
</script>