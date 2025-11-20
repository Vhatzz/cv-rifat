/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'light-cyan': '#06b6d4',
        'dark-yellow': '#eab308',
        'dark-white': '#ffffff',
      },
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },
    },
  },
  darkMode: 'class',
  plugins: [],
}