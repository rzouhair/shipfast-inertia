<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3';
import { Toaster } from '@/Components/ui/sonner';
import { usePage } from '@inertiajs/vue3'
import config from '@/config';

const page = usePage()
const user = computed(() => page.props.auth.user)

if (!user.value) {
	window.location.href = route('login')
}

const showingNavigationDropdown = ref(false);

interface NavLink {
	href: string;
	active: boolean;
	text: string;
}
const links: NavLink[] = [
	{
		href: route('dashboard'),
		active: route().current('dashboard'),
		text: 'Dashboard',
	},
];
</script>

<template>
	<AppHead />

	<div>
		<div class="min-h-screen" :data-theme="config.colors.theme">
			<nav class="border-b border-base-300 bg-base-200">
				<!-- Primary Navigation Menu -->
				<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
					<div class="flex justify-between h-16">
						<div class="flex">
							<!-- Logo -->
							<div class="shrink-0 flex items-center">
								<Link :href="route('dashboard')">
									<ApplicationLogo class="block h-9 w-auto fill-current" />
								</Link>
							</div>

							<!-- Navigation Links -->
							<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
								<NavLink v-for="link in links" :key="link.text" :href="link.href" :active="link.active">
									{{ link.text }}
								</NavLink>
							</div>
						</div>

						<div class="hidden sm:flex sm:items-center sm:ms-6">
							<div v-if="user.has_access" class="badge badge-accent ms-3 relative">Paid Plan</div>
							<div v-else class="badge badge-default ms-3 relative">Free Plan</div>
							<!-- Settings Dropdown -->
							<div class="ms-3 relative">
								<Dropdown align="right" width="48">
									<template #trigger>
										<span class="inline-flex rounded-md">
											<button type="button"
												class="btn btn-ghost">
												{{ $page.props.auth.user.name }}

												<svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
													fill="currentColor">
													<path fill-rule="evenodd"
														d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
														clip-rule="evenodd" />
												</svg>
											</button>
										</span>
									</template>

									<template #content>
										<DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
										<DropdownLink as="button" href="/auth/logout">
											Log Out
										</DropdownLink>
									</template>
								</Dropdown>
							</div>
						</div>

						<!-- Hamburger -->
						<div class="-me-2 flex items-center sm:hidden">
							<button @click="showingNavigationDropdown = !showingNavigationDropdown"
								class="btn btn-ghost">
								<svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
									<path :class="{
										hidden: showingNavigationDropdown,
										'inline-flex': !showingNavigationDropdown,
									}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
									<path :class="{
										hidden: !showingNavigationDropdown,
										'inline-flex': showingNavigationDropdown,
									}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
								</svg>
							</button>
						</div>
					</div>
				</div>

				<!-- Responsive Navigation Menu -->
				<div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden">
					<div class="pt-2 pb-3 px-4 md:px-0 space-y-1">
						<ResponsiveNavLink v-for="link in links" :key="link.text" :href="link.href" :active="link.active">
							{{ link.text }}
						</ResponsiveNavLink>
					</div>

					<!-- Responsive Settings Options -->
					<div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
						<div class="px-4">
							<div class="font-medium text-base">
								{{ $page.props.auth.user.name }}
							</div>
							<div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
						</div>

						<div class="mt-3 space-y-1">
							<ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
							<Link :href="route('logout')" method="post" as="button" class="btn btn-ghost flex w-full">
								Log Out
							</Link>
						</div>
					</div>
				</div>
			</nav>

			<!-- Page Heading -->
			<header class="shadow bg-base-100" v-if="$slots.header">
				<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
					<slot name="header" />
				</div>
			</header>

			<!-- Page Content -->
			<main>
				<slot />

				<Toaster />
			</main>
		</div>
	</div>
</template>
