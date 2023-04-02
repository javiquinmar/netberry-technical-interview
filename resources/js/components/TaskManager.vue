<script setup>
import useCategories from '@/composables/useCategories';
import useTasks from '@/composables/useTasks';
import { onMounted, computed } from 'vue';
import { XMarkIcon } from '@heroicons/vue/24/solid'

const { categories, categoryErrors, getCategories } = useCategories();
const { task, tasks, taskErrors, getTasks, storeTask, removeTask } = useTasks();

const validTask = computed(() => {
  	return task.value.name.length >= 3 
		&& Array.isArray(task.value.categories)
		&& task.value.categories.length > 0;
})

onMounted(() => {
	getCategories();
	getTasks();
});

</script>

<template>
	
	<div class="container py-4 md:py-6 lg:py-8 xl:py-12">
		<h1>Gestor de tareas</h1>
		<div class="grid grid-cols-1 md:grid-cols-8 mt-8 gap-4">
			<div class="md:col-span-4 w-full flex flex-col">
				<input
					type="text"
					v-model="task.name"
					class="form-input"
					:class="taskErrors.name ? 'input-error' : ''"
					placeholder="Escribe aquí el nombre de la nueva tarea"
				/>
				<span v-if="taskErrors.name" class="text-red-500 mt-1">{{ taskErrors.name.join(', ') }}</span>
			</div>
			<div class="md:col-span-3 flex flex-col justify-center">
				<div class="flex flex-wrap justify-evenly items-center gap-4">
					<template v-for="category in categories" :key="'category-' + category.id">
						<div class="relative flex items-start">
							<div class="flex h-6 items-center">
								<input
									v-model="task.categories"
									:value="category.id"
									name="categories"
									type="checkbox"
									class="form-checkbox"
								/>
							</div>
							<div class="ml-1 text-sm leading-6">
								<label for="categories" class="font-medium text-gray-900">{{ category.name }}</label>
							</div>
						</div>
					</template> 	
				</div>
				<span v-if="taskErrors.categories" class="text-red-500 text-center mt-1">{{ taskErrors.categories.join(', ') }}</span>
			</div>
			<div class="flex items-center justify-center">
				<button
					@click="storeTask"
					:disabled="!validTask"
					type="button"
					class="form-button"
					tooltip="Debe tener al menos 3 caracteres y alguna categoría seleccionada"
				>
					Añadir
				</button>
			</div>
		</div>

		<div class="mt-8 flow-root">
			<div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
				<div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
					<table class="min-w-full divide-y divide-gray-300">
						<thead>
							<tr>
								<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
									<a href="#" class="group inline-flex">
										Tarea
									</a>
								</th>
								<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
									<a href="#" class="group inline-flex">
										Categorías
									</a>
								</th>

								<th scope="col" class="relative py-3.5 pl-3 pr-0">
									<span class="sr-only">Edit</span>
								</th>
							</tr>
						</thead>
						<tbody class="divide-y divide-gray-200 bg-white">
							<tr v-for="task in tasks" :key="'task-' + task.id">
								<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ task.name }}</td>
								<td class="flex flex-wrap py-4 gap-4 items-center">
									<span v-for="category in task.categories" :key="`task-${task.id}-category-${category.id}`"
										class="inline-flex items-center rounded-full px-3 py-0.5 text-sm font-medium" 
										:style="{ 'background-color': category.bg_hex_color, 'color': category.text_hex_color }"
									>
										{{ category.name }}
									</span>
								</td>
								<td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm sm:pr-0">
									<XMarkIcon @click="removeTask(task.id)" class="cursor-pointer h-6 w-6 text-red-500" />
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>
