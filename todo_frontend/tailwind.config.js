/** @type {import('tailwindcss').Config} */
module.exports = {
  content: {
    relative: true,
    files: [
      './index.html',
      './src/components/**/*.{html,js,vue}',
    ]
  },
  theme: {
    extend: {},
  },
  plugins: [],
}

