/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: [
    "./public/**/*.{html,js,php}",
    "./node_modules/flowbite/**/*.{html,js,php}"
  ],
  theme: {
    screens:{
      sm: '576px',
      md: '768px',
      lg: '992px',
      xl: '1200px'
    },
    container:{
      center:true,
      padding: '1rem'

    },
    extend: {
      fontFamily:{
        poppins: "'Poppins', sans-serif",
        roboto: "'Roboto'', sans-serif"
      },
      colors:{
        'primary' : '#FD3057',
        'secondary' : '#324324'
      }
  },
},
variants:{
  extend:{
    display: ['group-hover'],
    visibility: ['group-hover'],
  }
},
plugins: [
  require('flowbite/plugin')({
      charts: true,
  }),
  require('@tailwindcss/forms')
  // ... other plugins
],
}