const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        '/*.blade.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                'playfair' :  'Playfair Display, serif',
                'Lato' : 'Lato, sans-serif',
            },
            width: {
                '100' : '47rem',
                '101' : '340px',
            },
            height : {
                '600' : '800px',
            },
            padding:{
                '62' : '15.8rem'
            },
            colors: {
                'main-color' : '#06a49c',
                'link' : '#2a303b',
                'facebook' : '#3b5998'
            },
            boxShadow: {
                '3xl': '0 0 20px -12px #7f7f7fba',
                // box-shadow:  ;
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
