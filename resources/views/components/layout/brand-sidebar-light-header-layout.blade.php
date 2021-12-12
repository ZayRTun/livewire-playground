<div x-data="{showSidebar: false}">
	<div x-show="showSidebar" x-cloak class="fixed inset-0 flex z-40 md:hidden" role="dialog" aria-modal="true">

		{{-- Background overlay --}}
		<div
			x-show="showSidebar"
			x-transition:enter="transition-opacity ease-linear duration-300"
			x-transition:enter-start="opacity-0"
			x-transition:enter-end="opacity-100"
			x-transition:leave="transition-opacity ease-linear duration-300"
			x-transition:leave-start="opacity-100"
			x-transition:leave-end="opacity-0"
			class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>

		<div
			x-show="showSidebar"
			x-on:click.away="showSidebar = false"
			x-on:keyup.escape.window="showSidebar = false"
			x-transition:enter="transition ease-in-out duration-300 transform"
			x-transition:enter-start="-translate-x-full"
			x-transition:enter-end="translate-x-0"
			x-transition:leave="transition ease-in-out duration-300 transform"
			x-transition:leave-start="translate-x-0"
			x-transition:leave-end="-translate-x-full"
			class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-indigo-700">

			<div x-show="showSidebar" class="absolute top-0 right-0 -mr-12 pt-2">
				<button x-on:click="showSidebar = false" type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
					<span class="sr-only">Close sidebar</span>

					<svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>
			</div>

			<div class="flex-shrink-0 flex items-center px-4">
				<img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-300-mark-white-text.svg" alt="Workflow">
			</div>

			<div class="mt-5 flex-1 h-0 overflow-y-auto">
				<x-layout.nav-mobile />
			</div>
		</div>

		<div class="flex-shrink-0 w-14" aria-hidden="true">
		<!-- Dummy element to force sidebar to shrink to fit close icon -->
		</div>
	</div>

<!-- Static sidebar for desktop -->
	<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
		<!-- Sidebar component, swap this element with another sidebar if you like -->
		<div class="flex flex-col flex-grow pt-5 bg-indigo-700 overflow-y-auto">
			<div class="flex items-center flex-shrink-0 px-4">
				<img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-300-mark-white-text.svg" alt="Workflow">
			</div>

			<div class="mt-5 flex-1 flex flex-col">
				<x-layout.nav-desktop />
			</div>
		</div>
	</div>

	<div class="md:pl-64 flex flex-col flex-1">
		<div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
			<button x-on:click="showSidebar = true"  type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
				<span class="sr-only">Open sidebar</span>
				<!-- Heroicon name: outline/menu-alt-2 -->
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
				</svg>
			</button>

			<div class="flex-1 px-4 flex justify-between">
				<div class="flex-1 flex">
					<form class="w-full flex md:ml-0" action="#" method="GET">
						<label for="search-field" class="sr-only">Search</label>

						<div class="relative w-full text-gray-400 focus-within:text-gray-600">
							<div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
								<!-- Heroicon name: solid/search -->
								<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
								</svg>
							</div>

							<input id="search-field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Search" type="search" name="search">
						</div>
					</form>
				</div>

				<div class="ml-4 flex items-center md:ml-6">

					<button type="button" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						<span class="sr-only">View notifications</span>
						<!-- Heroicon name: outline/bell -->
						<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
						</svg>
					</button>

					<!-- Profile dropdown -->
					<x-layout.profile-dropdown />

				</div>
			</div>
		</div>

		<main>
			<div class="py-6">
				<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
					<h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
				</div>

				<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
				<!-- Replace with your content -->
					<div class="py-4">
						{{ $slot }}
					</div>
				<!-- /End replace -->
				</div>
			</div>
		</main>
	</div>
</div>