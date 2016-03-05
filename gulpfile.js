//gulpfile.js
var gulp    =   require('gulp');
    concat = require('gulp-concat'),
    // uglify = require('gulp-uglify'),
    // jshint = require('gulp-jshint'),
    // stylish = require('jshint-stylish'),
    sass = require('gulp-sass'),
    // cssmin = require('gulp-minify-css');


gulp.task('scripts', function () {
    return gulp.src('resources/assets/js/*.js')
        .pipe(concat('main.js'))
        .pipe(gulp.dest('public/assets/js/'));
});

gulp.task('scss', function () {
    return gulp.src('resources/assets/sass/*.scss')
     	.pipe(concat('style.css'))
        .pipe(sass())
        .pipe(gulp.dest('public/assets/css/'));
});


//creating watcher task
gulp.task('watch', function () {
    gulp.watch('resources/assets/js/*.js', ['scripts']);		        //running scripts task on change
    gulp.watch('resources/assets/sass/app.scss', ['scss']);		// running sass task on change
});

//initially running scripts and sass tasks and also running watch task to watch for changes
gulp.task('default', ['scripts', 'scss', 'watch']);