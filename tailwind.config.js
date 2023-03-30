const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      container: {
        center: true
      },
      colors: {
        'branch-500': '#ff6b00d9',
        'branch-900': '#ff6b00',
      }
    },
  },
  plugins: [],
}

