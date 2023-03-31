<script setup>
import { ChevronDownIcon } from "@heroicons/vue/20/solid";

const people = [
	{ name: "Lindsay Walton", title: "Front-end Developer", email: "lindsay.walton@example.com", role: "Member" },
	{ name: "Lindsay Walton", title: "Front-end Developer", email: "lindsay.walton@example.com", role: "Member" },
	{ name: "Lindsay Walton", title: "Front-end Developer", email: "lindsay.walton@example.com", role: "Member" },
	{ name: "Lindsay Walton", title: "Front-end Developer", email: "lindsay.walton@example.com", role: "Member" },
	{ name: "Lindsay Walton", title: "Front-end Developer", email: "lindsay.walton@example.com", role: "Member" },
	{ name: "Lindsay Walton", title: "Front-end Developer", email: "lindsay.walton@example.com", role: "Member" },
	{ name: "Lindsay Walton", title: "Front-end Developer", email: "lindsay.walton@example.com", role: "Member" },
	{ name: "Lindsay Walton", title: "Front-end Developer", email: "lindsay.walton@example.com", role: "Member" },
	{ name: "Lindsay Walton", title: "Front-end Developer", email: "lindsay.walton@example.com", role: "Member" },
];

const task = {
	id: null,
	name: "",
	categories: [],
};
</script>

<template>
	<div class="container py-4 md:py-6 lg:py-8 xl:py-12">
		<h1>Gestor de tareas</h1>

		<div class="grid grid-cols-1 md:grid-cols-8 mt-8 gap-4">
			<input
				type="text"
				v-model="task.name"
				class="md:col-span-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
				placeholder="Escribe aquí el nombre de la nueva tarea"
			/>
			<div class="md:col-span-3 flex justify-evenly items-center">
				<div class="relative flex items-start">
					<div class="flex h-6 items-center">
						<input
							id="candidates"
							aria-describedby="candidates-description"
							name="candidates"
							type="checkbox"
							class="cursor-pointer h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
						/>
					</div>
					<div class="ml-1 text-sm leading-6">
						<label for="candidates" class="font-medium text-gray-900">PHP</label>
					</div>
				</div>
                <div class="relative flex items-start">
					<div class="flex h-6 items-center">
						<input
							id="candidates"
							aria-describedby="candidates-description"
							name="candidates"
							type="checkbox"
							class="cursor-pointer h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
						/>
					</div>
					<div class="ml-1 text-sm leading-6">
						<label for="candidates" class="font-medium text-gray-900">Javascript</label>
					</div>
				</div>
				<div class="relative flex items-start">
					<div class="flex h-6 items-center">
						<input
							id="candidates"
							aria-describedby="candidates-description"
							name="candidates"
							type="checkbox"
							class="cursor-pointer h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
						/>
					</div>
					<div class="ml-1 text-sm leading-6">
						<label for="candidates" class="font-medium text-gray-900">CSS</label>
					</div>
				</div>
			</div>
			<button
				type="button"
				class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
			>
				Añadir
			</button>
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
										<span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
											<ChevronDownIcon class="h-5 w-5" aria-hidden="true" />
										</span>
									</a>
								</th>
								<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
									<a href="#" class="group inline-flex">
										Categorías
										<span class="ml-2 flex-none rounded bg-gray-100 text-gray-900 group-hover:bg-gray-200">
											<ChevronDownIcon class="h-5 w-5" aria-hidden="true" />
										</span>
									</a>
								</th>

								<th scope="col" class="relative py-3.5 pl-3 pr-0">
									<span class="sr-only">Edit</span>
								</th>
							</tr>
						</thead>
						<tbody class="divide-y divide-gray-200 bg-white">
							<tr v-for="person in people" :key="person.email">
								<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ person.name }}</td>
								<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.title }}</td>
								<td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm sm:pr-0">
									<a href="#" class="text-indigo-600 hover:text-indigo-900"
										>Edit<span class="sr-only">, {{ person.name }}</span></a
									>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>
