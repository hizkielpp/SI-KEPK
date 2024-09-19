const mix = require("laravel-mix");
const browserSync = require("browser-sync-webpack-plugin");

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")])
    .browserSync({
        proxy: "http://localhost:8000",
        host: "localhost",
        open: "external",
        port: 3000,
        files: [
            "app/**/*.php",
            "resources/views/**/*.blade.php",
            "resources/js/**/*.js",
            "resources/css/**/*.css",
            "public/**/*.*",
        ],
    });

if (mix.inProduction()) {
    mix.version();
}
