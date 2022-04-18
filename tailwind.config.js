module.exports = {
  content: require('fast-glob').sync([
    'source/**/*.blade.php',
    'source/**/*.md',
    'source/**/*.html',
  ]),
  theme: {
    extend: {
      fontFamily: {
        'Fira-Sans': ['"Fira Sans"', 'sans-serif'],
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
