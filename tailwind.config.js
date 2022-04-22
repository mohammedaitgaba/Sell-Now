module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#1c2126',
        'secondary': '#3c4045',
        'third': '#ced4db',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}