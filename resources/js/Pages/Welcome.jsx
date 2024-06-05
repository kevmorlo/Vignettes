import { Link, Head } from '@inertiajs/react';
import ApplicationLogo from '@/Components/ApplicationLogo';

return (
    <div class="overflow-hidden">
        <Head title="Bienvenue" />
        <header>
            <nav v-if="canLogin" class="bg-blue-400 -mx-3 flex flex-1 justify-between items-center pl-8">
                <Link href="'/'">
                    <ApplicationLogo class="h-10" />
                </Link>
                <div class="m-8">
                    <Link
                        v-if="$page.props.auth.user"
                        href="route('dashboard')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Dashboard
                    </Link>

                    <template v-else>
                        <Link
                            href="route('login')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Se connecter
                        </Link>

                        <Link
                            v-if="canRegister"
                            href="route('register')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Créer un compte
                        </Link>
                    </template>
                </div>
            </nav>
        </header>
        <section class="py-8">
            <div class="container mx-auto">
                <div class="text-black py-16">
                    <div class="container mx-auto flex flex-col items-center justify-center">
                        <ApplicationLogo class="h-20" />
                        <h1 class="text-4xl font-bold mb-4 mt-10">Vignettes - L'application de partage de médias anonymes</h1>
                        <h2 class="text-2xl mb-4">Partagez vos plus belles créations et votez pour votre oeuvre préférée avec Vignettes</h2>
                    </div>
                </div>

                <div class="py-8">
                    <div class="flex flex-col items-center justify-center -mx-4">
                        <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0 flex flex-col items-center justify-center">
                            <h3 class="text-2xl font-semibold mb-4">Médias supportés</h3>
                            <ul class="list-disc list-inside text-xl">
                                <li>Photos</li>
                                <li>Vidéos</li>
                                <li>Audio</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-16 text-center text-sm text-black">
            Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </footer>
    </div>
)