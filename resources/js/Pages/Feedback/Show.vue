<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from '@inertiajs/vue3';


export default {
  name: "Edit",
  components: {AppLayout, Link},
  props: ['feedback'],
  data() {
    return {
    }
  },

}
</script>

<template>
  <AppLayout title="Questions">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Questions
      </h2>
    </template>


    <div>
      <form>
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Username </label>
                <div class="mt-2">
                  {{ feedback.user.name }}
                </div>
              </div>
              <div v-for="question in feedback.questions" class="sm:col-span-4">
                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Question: {{ question.title }}</label>
                <div class="mt-2">
                  {{ question.pivot.value }}
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <Link :href="route('feedback.index')" as="button" class="text-sm font-semibold leading-6 text-gray-900">Back</Link>
        </div>
      </form>
    </div>

  </AppLayout>
</template>

<style scoped>

</style>
