import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                "theme-primary": "#423D37",
                "theme-sidebar": "#3C3D41",
                "theme-border-sidebar": "#785839",
            },
            fontFamily: {
                "plus-jakarta-sans": "'Plus Jakarta Sans', sans-serif",
            },
        },
    },
};
