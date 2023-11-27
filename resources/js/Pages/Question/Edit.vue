<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import {useForm} from "@inertiajs/vue3";

export default {
  name: "Edit",
  components: {AppLayout},
  props: ['question'],
  data() {
    return {
      form: useForm({
        title: this.question.title,
        description: this.question.description,
      }),
    }
  },
  methods: {
    submit() {
      this.form.put(route('question.update', this.question.id));
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
      <form v-on:submit.prevent="submit">
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="mt-2">
                  <input type="text" v-model="form.title" name="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  <span v-if="form.errors.title" class="text-sm text-red-600">{{ form.errors.title }}</span>
                </div>
              </div>
              <div class="sm:col-span-4">
                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                <div class="mt-2">
                  <textarea name="description" v-model="form.description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  <span v-if="form.errors.description" class="text-sm text-red-600">{{ form.errors.description }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>    </div>

  </AppLayout>
</template>

<style scoped>

</style>
