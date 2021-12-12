<form wire:submit.prevent="save" class="space-y-8 divide-y divide-gray-200">
	<div class="space-y-8 divide-y divide-gray-200">
		<div class="bg-white p-4 rounded-md">
			<div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
				<div class="sm:col-span-4">
					<label for="title" class="block text-sm font-medium text-gray-700">Title</label>
					<div class="mt-1">
						<input wire:model="post.title" type="text" name="title" id="title" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Post title">
					</div>
				</div>

				<div class="sm:col-span-6">
					<label for="post" class="block text-sm font-medium text-gray-700">
						Post
					</label>
					<div class="mt-1">
						<x-rich-text model="post.body" :value="$post->body" />
					</div>
					<p class="mt-2 text-sm text-gray-500">Let your thouts flow.</p>
				</div>

				<div class="sm:col-span-4">
					<label for="author" class="block text-sm font-medium text-gray-700">Author</label>
					<div class="mt-1">
						<input wire:model="post.author" type="text" name="author" id="author" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Post title">
					</div>
				</div>
			</div>

			<div class="pt-5">
				<div class="flex justify-end">
					<button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						Cancel
					</button>
					<button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						Save
					</button>
				</div>
			</div>
		</div>
	</div>


</form>