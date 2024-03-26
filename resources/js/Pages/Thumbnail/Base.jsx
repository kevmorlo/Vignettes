const { default: ApplicationLogo } = require("@/Components/ApplicationLogo");

<header className="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
<div className="flex lg:justify-center lg:col-start-2">
    <ApplicationLogo />
</div>
<nav className="-mx-3 flex flex-1 justify-end">
    {auth.user ? (
        <Link
            href={route('dashboard')}
            className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Dashboard
        </Link>
    ) : (
        <>
            <Link
                href={route('login')}
                className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Se connecter
            </Link>
            <Link
                href={route('register')}
                className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Créer un compte
            </Link>
        </>
    )}
</nav>
</header>