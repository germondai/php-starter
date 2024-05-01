/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./**/*.{html,js,php}",
        "!./node_modules/**/*",
        "!./vendor/**/*",
        "!./temp/**/*",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
