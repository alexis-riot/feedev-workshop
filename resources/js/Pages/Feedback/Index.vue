<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from '@inertiajs/vue3'

export default {
    name: "Index",
    components: {Link, AppLayout},
    props: ['feedbacks'],
}
</script>

<template>
    <AppLayout title="Questions">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Feedbacks
            </h2>
        </template>


        <div>
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Feedbacks</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all our feedbacks on the platform.</p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <Link :href="route('feedback.create')" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add feedback</Link>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                      <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">User</th>
                                      <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Questions</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created At</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Updated At</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="feedback in feedbacks.data" :key="feedback.id">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ feedback.user.name }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ feedback.questions_count }}</td>
                                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ feedback.created_at }}</td>
                                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ feedback.updated_at }}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                          <Link :href="route('feedback.destroy', feedback.id)" as="button" method="DELETE" class="text-red-600 hover:text-red-900">Delete</Link>
                                          <Link :href="route('feedback.show', feedback.id)" class="text-indigo-600 hover:text-indigo-900">Show</Link>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6" aria-label="Pagination">
                <div class="hidden sm:block">
                    <p class="text-sm text-gray-700">
                        Showing
                        {{ ' ' }}
                        <span class="font-medium">{{ feedbacks.from }}</span>
                        {{ ' ' }}
                        to
                        {{ ' ' }}
                        <span class="font-medium">{{ feedbacks.per_page }}</span>
                        {{ ' ' }}
                        of
                        {{ ' ' }}
                        <span class="font-medium">{{ feedbacks.total }}</span>
                        {{ ' ' }}
                        results
                    </p>
                </div>
                <div class="flex flex-1 justify-between sm:justify-end">
                    <a
                        :href="feedbacks.prev_page_url"
                        :class="!feedbacks.prev_page_url ? 'cursor-not-allowed bg-gray-300 hover:bg-gray-400' : ''"
                        class="relative inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline-offset-0"
                    >
                        Previous
                    </a>
                    <a
                        :href="feedbacks.next_page_url"
                        :class="!feedbacks.next_page_url ? 'cursor-not-allowed bg-gray-300 hover:bg-gray-400' : ''"
                        class="relative ml-3 inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline-offset-0"
                    >
                        Next
                    </a>
                </div>
            </nav>

        </div>

    </AppLayout>
</template>

<style scoped>

</style>
