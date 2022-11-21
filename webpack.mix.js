const mix = require("laravel-mix")
const { readdirSync } = require("fs")
const LiveReloadPlugin = require("webpack-livereload-plugin")

mix.webpackConfig({
    plugins: [new LiveReloadPlugin()]
})

const mainFolder = readdirSync(__dirname + "/scss")
for (const file of mainFolder) {
    if (file.indexOf(".") !== -1) {
        mix.sass("scss/" + file, "css")
    }
}

mix.js("src/counter.js", "compiled/js/counter.js").vue();