/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.html'],
  theme: {
    extend: {
      colors: {
        'primary': '#800947',
        'secondary': '#03346E',
        'logo': '../assets/logo.png'
      },
      boxShadow: {
        'bgBlurPrimary': '0px 10px 250px 250px rgba(128, 9, 71, 1)',
        'bgBlurSecondary': '0 4px 250px 250px rgba(3, 52,110, 1)'
      }
    },
  },
  plugins: [],
}

