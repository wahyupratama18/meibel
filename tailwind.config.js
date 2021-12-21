const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Open_Sans', 'Nunito', ...defaultTheme.fontFamily.sans],
            },
            animation: {
                bouncing: 'bouncing 2s ease-in-out infinite alternate-reverse both'
            },
            keyframes: {
                bouncing: {
                    '0%': {
                        transform: 'translateY(10px)'
                    },
                    '100%': {
                        transform: 'translateY(-10px)'
                    }
                }
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
