/** @type {import('tailwindcss').Config} */
export default {
  content: ["./**/*.php", "./*.php", "./src/**/*.{js,jsx,ts,tsx}"],
  theme: {
    extend: {
      colors: {},
      spacing: {},
      fontFamily: {
        sans: ["Urbanist", "system-ui", "sans-serif"],
        heading: ["Sacramento", "system-ui", "sans-serif"],
      },
    },
  },
};
