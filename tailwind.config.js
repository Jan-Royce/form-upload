const colors = require("tailwindcss/colors");
const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/views/**/*.{html,js,php}", "./src/js/**/*.js"],
  darkMode: 'class',
  plugins: [
    require('@tailwindcss/forms')
  ],
}
