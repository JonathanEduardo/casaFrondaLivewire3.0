import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import animatedtailwindcss from 'tailwindcss-animated';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{

                companyColor: {
                    primary : '#55293B',
                    'primary-lighter': '#663e4e',
                    secondary: '#5D7544',
                    third: '#A67A36',
                    'third-lighter': '#F3E1C0',
                    text1: '#aa8240',
                    text2: '#4d4d4d',


                },




                navigationMenu : {
                    background : '#2C2C2C',
                    text: '#f2f2f2'
                }
            },

        },
    },

    plugins: [forms, typography,  animatedtailwindcss],
};
