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
        admincolor: '#FF8901',
        iconcolor:'#FFB056',
        main:'#F5F2FF',
        tableiconcolor:'#C8CAD8',
      },
      margin: {
        '1/12': '8.333333%', // 1/12 of the width
      }
    },
  },
  plugins: [],
}

