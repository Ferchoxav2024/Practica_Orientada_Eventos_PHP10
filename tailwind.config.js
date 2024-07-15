/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./presentation/styles/*.{html,js,php}"],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}