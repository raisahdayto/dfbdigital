const { src, dest, watch, series, parallel } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const cleanCSS = require("gulp-clean-css");
const sourcemaps = require("gulp-sourcemaps");
const htmlmin = require("gulp-htmlmin");
const terser = require("gulp-terser");
const rename = require("gulp-rename");
const strip = require("gulp-strip-comments");
const replace = require("gulp-replace");

// Paths
const paths = {
    php: "src/**/*.php",
    css: "src/css/**/*.css",
    scss: "src/css/**/*.scss",
    js: "src/js/**/*.js",
    images: "src/img/**/*.{jpg,png,svg,gif,ico}",
    fonts: "src/font/**/*",
    dist: {
        base: "dist/",
        css: "dist/css/",
        js: "dist/js/",
        img: "dist/img/",
        fonts: "dist/font/",
    },
};

// Task: Compile and Minify SCSS
function compileScss() {
    return src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass().on("error", sass.logError))
        .pipe(cleanCSS())
        .pipe(rename({ suffix: ".min" }))
        .pipe(sourcemaps.write("./"))
        .pipe(dest(paths.dist.css));
}

// Task: Minify CSS
function minifyCss() {
    return src(paths.css)
        .pipe(cleanCSS())
        .pipe(rename({ suffix: ".min" }))
        .pipe(dest(paths.dist.css));
}

// Task: Minify PHP and Update CSS/JS References
function minifyPhp() {
    return src(paths.php)
        .pipe(
            replace(/src\/css\/(.*?)\.css/g, "css/$1.min.css") // Update CSS references
        )
        .pipe(
            replace(/src\/js\/(.*?)\.js/g, "js/$1.min.js") // Update JS references
        )
        .pipe(
            htmlmin({
                collapseWhitespace: true,
                ignoreCustomFragments: [/<\?[\s\S]*?\?>/],
            })
        )
        .pipe(strip()) // Remove comments
        .pipe(dest(paths.dist.base));
}

// Task: Minify JS
function minifyJs() {
    return src(paths.js)
        .pipe(terser())
        .pipe(rename({ suffix: ".min" }))
        .pipe(dest(paths.dist.js));
}

// Task: Copy Images
function copyImages() {
    return src(paths.images).pipe(dest(paths.dist.img));
}

// Task: Copy Fonts
function copyFonts() {
    return src(paths.fonts).pipe(dest(paths.dist.fonts));
}

// Watch Task
function watchFiles() {
    watch(paths.scss, compileScss);
    watch(paths.css, minifyCss);
    watch(paths.js, minifyJs);
    watch(paths.images, copyImages);
    watch(paths.fonts, copyFonts);
    watch(paths.php, minifyPhp);
}

// Default Task
exports.default = series(
    parallel(compileScss, minifyCss, minifyJs, copyImages, copyFonts, minifyPhp),
    watchFiles
);
