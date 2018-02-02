var gulp         = require('gulp'),
    gutil        = require('gulp-util'),
    css_compile  = require('gulp-sass'),
    postcss      = require('gulp-postcss'),
    browserSync  = require('browser-sync'),
    cssnano      = require('gulp-cssnano'),
    autoprefixer = require('autoprefixer'),
    sourcemaps   = require('gulp-sourcemaps'),
    iconfont     = require("gulp-iconfont"),
    consolidate  = require("gulp-consolidate"),
    del          = require('del'),
    imagemin     = require('gulp-imagemin'),
    pngquant     = require('imagemin-pngquant'),
    cache        = require('gulp-cache'),
    pug          = require('gulp-pug');

gulp.task('css_compile', function(){
    var log = css_compile({}); // log errors without task stop
    log.on('error',function(e){
        gutil.log(e);
        log.end();
    });
    return gulp.src('src/sass/*.sass')
        .pipe(log)
        .pipe(sourcemaps.init())
        .pipe(css_compile({}))
        .pipe(postcss([ autoprefixer({ browsers: ['last 3 versions'] }) ]))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('src/css'))
        .pipe(browserSync.reload({stream: true}));
});


// Compile pug to html
gulp.task('pug', function() {
    var log = pug({}); // log errors without task stop
    log.on('error',function(e){
        gutil.log(e);
        log.end();
    });
    return gulp.src('src/**/*.pug')
        .pipe(log)
        .pipe(pug({pretty: true}))
        .pipe(gulp.dest('src'))
        .pipe(browserSync.reload({stream: true}));
});


// Build icon font
gulp.task("build:icons", function() {
   return gulp.src(["src/assets/font-icons/*.svg"])//path to svg icons
     .pipe(iconfont({
       fontName: "myicons",
       formats: ["ttf", "eot", "woff", "svg"],
       centerHorizontally: true,
       fixedWidth: true,
       normalize: true
     }))
     .on("glyphs", function (glyphs) {

       gulp.src("src/assets/font-icons/util/*.scss") // Template for scss files
           .pipe(consolidate("lodash", {
               glyphs: glyphs,
               fontName: "myicons",
               fontPath: "../fonts/"
           }))
           .pipe(gulp.dest("src/sass"));//generated scss files with classes
     })
     .pipe(gulp.dest("src/assets/fonts/"));//icon font destination
});


// Start browserSync
gulp.task('browserSync', function() {
    browserSync.init({
        // server: {
        //     baseDir: 'src',
        //     logLevel: "info"
        // },
        host: 'localhost',
        port: 3000,
        proxy: true,
        open: false,
        notify: true,
        browser: "chrome.exe"
    })
});


// Minify css for build
gulp.task('css-libs', ['sass'], function() {
    return gulp.src('public/main.css') // Choose style to minify
        .pipe(cssnano()) // Minifying
        .pipe(rename({suffix: '.min'})) // Adding suffix .min
        .pipe(gulp.dest('public')); // Load to destination
});


// Watching changes
gulp.task('default', ['watch']);
gulp.task('watch', ['browserSync', 'css_compile', 'pug'], function(){
    gulp.watch('src/**/*.pug', ['pug']);
    gulp.watch('src/**/*.sass', ['css_compile']);
    gulp.watch('src/**/*.html').on('change', browserSync.reload);
});


// Clear Gulp cache
gulp.task('clear', function () {
    return cache.clearAll();
});


// Clear dist before build
gulp.task('clean', function() {
    return del.sync('public/');
});


// Optimize images
gulp.task('img', function() {
    return gulp.src('src/img/**/*') // Берем все изображения
        .pipe(cache(imagemin({ // Сжимаем их с наилучшими настройками
            interlaced: true,
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        })))
        .pipe(gulp.dest('public/img')); // Выгружаем на продакшен
});


// Build to public
gulp.task('build', ['img', 'css_compile'], function() {

    var buildCss = gulp.src([ // Put css to production
        'src/**/*.css'
        ])
    .pipe(gulp.dest('public'));

    var buildFonts = gulp.src('src/assets/fonts/**/*') // Put fonts to production
    .pipe(gulp.dest('public/assets/fonts'));

    var buildJs = gulp.src('src/js/**/*') // Put scripts to production
    .pipe(gulp.dest('public/js'));

    var buildHtml = gulp.src('src/*.html') // Put html to production
    .pipe(gulp.dest('public'));

});
