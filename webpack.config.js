const path = require('path');

const appJs = {
    entry: path.resolve(__dirname, 'src/js/app.js'),
    output: {
        path: path.resolve(__dirname, 'storage/public/assets/js'),
        filename: 'app.js'
    }
}

module.exports = [appJs];