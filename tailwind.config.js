// tailwind.config.js
module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        'brand-bg': '#020202',
        'brand-card': '#19191a',
        'brand-border': '#373739',
        'brand-gold': '#c9b977',
        'brand-light': '#ecdda2',
      },
    },
  },
  plugins: [],
}