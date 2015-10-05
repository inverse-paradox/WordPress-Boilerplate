var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    sftp = require('gulp-sftp'),
    //livereload = require('gulp-livereload'),
    del = require('del');

// var host = '45.33.118.223',
//     user = 'delucahomes',
//     pass = 'j)%Rn.5HHH@H8X}2',
//     port = '2222',
//     path = '/test/';


// Styles
gulp.task('styles', function() {
  return sass('scss/global.scss', { style: 'expanded' })
    .pipe(autoprefixer('last 2 version'))
    .pipe(gulp.dest('css'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(minifycss())
    .pipe(gulp.dest('css'))
    .pipe(notify({ message: 'Styles task complete' }));
    // .pipe(sftp({
    // 	host: host,
    // 	user: user,
    // 	pass: pass,
    // 	port: port,
    // 	remotePath: path+'/css/'
    // }))
    //.pipe(livereload());
});

// // Scripts
// gulp.task('scripts', function() {
//   return gulp.src('src/scripts/**/*.js')
//     .pipe(jshint('.jshintrc'))
//     .pipe(jshint.reporter('default'))
//     .pipe(concat('main.js'))
//     .pipe(gulp.dest('dist/scripts'))
//     .pipe(rename({ suffix: '.min' }))
//     .pipe(uglify())
//     .pipe(gulp.dest('dist/scripts'))
//     .pipe(notify({ message: 'Scripts task complete' }));
// });

// Images
gulp.task('images', function() {
  return gulp.src('images/*')
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest('images'))
    .pipe(notify({ message: 'Images task complete' }))
    // .pipe(sftp({
    // 	host: host,
    // 	user: user,
    // 	pass: pass,
    // 	port: port,
    // 	remotePath: path
    // }))
    ;
});

// Clean
gulp.task('clean', function(cb) {
    del(['assets/css', 'assets/js', 'assets/img'], cb)
});

// Default task
gulp.task('default', ['clean'], function() {
    gulp.start('styles', 'images');
});

// Watch
gulp.task('watch', function() {

  // Create LiveReload server
  //livereload.listen();

  // Watch .scss files
  gulp.watch('scss/**/*.scss', ['styles']);

  // Watch .js files
  //gulp.watch('js/*.js', ['scripts']);

  // Watch image files
  gulp.watch('images/*', ['images']);

  // Watch any files in dist/, reload on change
  //gulp.watch(['css/**']).on('change', livereload.changed);

});