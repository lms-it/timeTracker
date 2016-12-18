var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');
var minify = require('gulp-minify');


gulp.task('styles', function() {
    gulp.src('assets/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('styles.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('assets/css'))
});

gulp.task('scripts', function() {
    return gulp.src('assets/js/scripts/*.js')
        .pipe(concat('all.js'))
        .pipe(minify())
        .pipe(gulp.dest('assets/js'));
});


//Watch task
gulp.task('default',function() {
    gulp.watch('assets/scss/**/*.scss',['styles']);
    gulp.watch('assets/js/scripts/*.js',['scripts']);
});
