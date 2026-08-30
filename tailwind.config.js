import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                background: '#0D0D10',
                surface: {
                    DEFAULT: '#18181C',
                    elevated: '#202024',
                },
                amber: {
                    DEFAULT: '#FF6B00',
                    soft: '#FF8A3D',
                    deep: '#E85D00',
                },
                silver: {
                    DEFAULT: '#9CA3AF',
                    muted: '#6B7280',
                },
                obsidian: '#0D0D10',
            },
            fontFamily: {
                display: ['"DM Sans"', ...defaultTheme.fontFamily.sans],
                sans: ['"DM Sans"', ...defaultTheme.fontFamily.sans],
            },
            letterSpacing: {
                tightest: '-0.04em',
            },
            animation: {
                'fade-up': 'fadeUp 0.7s ease-in-out both',
                'fade-in': 'fadeIn 0.6s ease-in-out both',
                'float-slow': 'floatSlow 6s ease-in-out infinite',
                'spin-slow': 'spin 1.1s linear infinite',
            },
            keyframes: {
                fadeUp: {
                    '0%': { opacity: '0', transform: 'translateY(16px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                floatSlow: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
            },
        },
    },

    plugins: [forms],
};
