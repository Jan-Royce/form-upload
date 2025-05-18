# Frontend

The styles are built using [Tailwind CSS](https://tailwindcss.com/).

JavaScript is built using [Webpack](https://webpack.js.org/).

## npm 

This app utilizes the following npm scripts:

- `npm run watch:styles` - Watch styles
- `npm run build:styles` - Build styles (unminified)
- `npm run build:styles:prod` - Build styles (minified)
- `npm run watch:webpack` - Watch scripts (development mode)
- `npm run build:webpack` - Build scripts (unminified, development mode)
- `npm run build:webpack:prod` - Build scripts (minified, production mode)
- `npm run build:prod` - Build minified scripts and styles

## JavaScript

This app utilizes Webpack to bundle the JavaScript file(s).

### app.js

This is the default JavaScript file to be used with this app.

To initialize the app, use:

```html
<script>
    let version = '{{app.version}}';
    App.init(version);
</script>
```

This will enable theme detection and locale changing.

### Modules

The following modules are included with this app:

- [theme](modules/theme.md)