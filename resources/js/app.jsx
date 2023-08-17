import React from 'react'
import { createRoot } from 'react-dom/client'
import { createInertiaApp } from '@inertiajs/inertia-react'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'

import Footer from './Commons/Footer'
import Header from './Commons/Header'
import { BrowserRouter } from 'react-router-dom'

createInertiaApp({
    // Below you can see that we are going to get all React components from resources/js/Pages folder
    resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob('./Pages/**/*.jsx')),
    setup({ el, App, props }) {
        createRoot(el).render(

            <BrowserRouter>
                <main>
                    <Header />
                    <App {...props} />
                </main>

                <Footer />
            </BrowserRouter>



        )
    },
})
