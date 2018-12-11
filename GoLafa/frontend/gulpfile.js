//BEST WORKING STARTER CONFIG WITH WORKING HOT-RELOAD
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    browserSync = require('browser-sync'),
    cssnano = require('gulp-cssnano'),
    sourcemaps = require('gulp-sourcemaps'),
    del = require('del'),
    cache = require('gulp-cache')

// Watching changes
gulp.task('watch', ['sass'], function() {
    browserSync.init({
        server: './src',
        browser: 'chrome.exe'
    });
    gulp.watch('src/sass/**/*.sass', ['sass']);
    gulp.watch('src/index.html').on('change', browserSync.reload);
});
// SASS
gulp.task('sass', function () {
    return gulp.src('src/sass/styles.sass')
        .pipe(sass())
        .pipe(gulp.dest('src'))
        .pipe(browserSync.stream());
});

gulp.task('default', ['watch']);


// SERVICE TASKS
// Minify css for build
gulp.task('minifyStyles', ['sass'], function () {
    return gulp.src('dist/style.css') // Choose style to minify
        .pipe(cssnano()) // Minifying
        .pipe(rename({ suffix: '.min' })) // Adding suffix .min
        .pipe(gulp.dest('dist')); // Load to destination
});

// Clear Gulp cache
gulp.task('clear', function () {
    return cache.clearAll();
});

// Clear dist before build
gulp.task('clean', function () {
    return del.sync('dist/');
});

// Build to dist
gulp.task('build', ['sass'], function () {
    var buildJs = gulp.src('src/js/**/*') // Put scripts to production
        .pipe(gulp.dest('dist/js'))
    var buildHtml = gulp.src('src/*.html') // Put html to production
        .pipe(gulp.dest('dist'));
    var buildHtml = gulp.src('src/*.css') // Put html to production
        .pipe(gulp.dest('dist'));
});
