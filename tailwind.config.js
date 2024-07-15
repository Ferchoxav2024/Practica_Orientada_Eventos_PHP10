/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./presentation/**/*.{html,js,php}"],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}