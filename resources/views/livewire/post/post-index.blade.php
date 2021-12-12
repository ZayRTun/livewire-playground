@push('styles')
	<link rel="stylesheet" href="{{ asset('/css/trix.css') }}">
@endpush

<div>
	<div class="my-3 text-right">
		<a href="{{ route('create-post')  }}" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
			<!-- Heroicon name: solid/pencil -->
			<svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
				<path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
			</svg>
			Write a post
		</a>
	</div>

	<div class="bg-white pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
		<div class="relative max-w-lg mx-auto divide-y-2 divide-gray-200 lg:max-w-7xl">
			<div>
				<h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
					Press
				</h2>
				<div class="mt-3 sm:mt-4 lg:grid lg:grid-cols-2 lg:gap-5 lg:items-center">
					<p class="text-xl text-gray-500">
						Get weekly articles in your inbox on how to grow your business.
					</p>

					<form method="POST" action="/newsletter" class="mt-6 flex flex-col sm:flex-row lg:mt-0 lg:justify-end">
						@csrf

						<div>
							<label for="email-address" class="sr-only">Email address</label>
							<input id="email-address" name="email-address" type="email" autocomplete="email" required class="appearance-none w-full px-4 py-2 border border-gray-300 text-base rounded-md text-gray-900 bg-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 lg:max-w-xs" placeholder="Enter your email">
							@error('email')
								<p class="text-sm text-red-400">{{ $message }}</p>
							@enderror
						</div>

						<div class="mt-2 flex-shrink-0 w-full flex rounded-md shadow-sm sm:mt-0 sm:ml-3 sm:w-auto sm:inline-flex">
							<button type="submit" class="w-full bg-indigo-600 px-4 py-2 border border-transparent rounded-md flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto sm:inline-flex">
								Notify me
							</button>
						</div>
					</form>

				</div>
			</div>

			<div class="mt-6 pt-10 grid gap-16 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-12">
				@foreach ($posts as $post)
					<x-post-card :post="$post" />
				@endforeach
			</div>
		</div>
	</div>
</div>