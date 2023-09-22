/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.php",
    "./pages/user/*.php",
    "./pages/user/dashboard.php",
    "./pages/admin/*.php",
    "./pages/admin/dashboard.php",
    "./pages/admin/user-list.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
  darkMode: "class",
};
