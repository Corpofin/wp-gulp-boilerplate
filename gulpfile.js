var gulp = require('gulp'),
    del = require('del'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cleancss = require('gulp-clean-css'),
    sourcemaps = require('gulp-sourcemaps'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin');

var project     = 'theme-name', // Theme directory name
    src         = 'src/',
    dist        = 'dist/'+project+'/',
    bower       = 'bower_components/',
    modules     = 'node_modules/';


/* *********** Primary Tasks ************ */

gulp.task('default', ['watch']);

gulp.task('watch', [
  'php',
  'fonts',
  'images',
  'styles',
  'jquery',
  'scripts',
  'normalize',
  'screenshot'
], function() {
  gulp.watch(src+'**/*.php', ['php']);
  gulp.watch(src+'fonts/*(*.eot|*.svg|*.ttf|*.woff)', ['fonts']);
  gulp.watch(src+'images/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)', ['images']);
  gulp.watch([src+'style.scss', src + 'scss/**/*.scss'], ['styles']);
  gulp.watch(src+'js/**/*.js', ['scripts']);
});

gulp.task('build', ['clean'], function() {
  gulp.start('php','fonts','images','styles:build','jquery','scripts:build','normalize','screenshot')
});


/* *********** Component Tasks ************ */

gulp.task('clean', function() {
  return del([dist+'*', '!'+dist])
});

gulp.task('php', function() {
  return gulp.src(src+'**/*.php')
    .pipe(gulp.dest(dist));
});

gulp.task('fonts', function() {
  return gulp.src(src+'fonts/*(*.eot|*.svg|*.ttf|*.woff)')
    .pipe(gulp.dest(dist+'fonts'));
});

gulp.task('images', function() {
  return gulp.src(src+'images/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)')
    .pipe(imagemin({
      optimizationLevel: 3,
      progressive: true,
      interlaced: true,
      svgoPlugins: [{cleanupIDs: false}]
    }))
    .pipe(gulp.dest(dist+'images'));
});

gulp.task('styles', function() {
  return gulp.src(src+'style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 2 version'))
    .pipe(cleancss())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(dist));
});
// Feels hacky, need a better solution for this
gulp.task('styles:build', function() {
  return gulp.src(src+'style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 2 version'))
    .pipe(cleancss())
    .pipe(gulp.dest(dist));
});

gulp.task('scripts', function() {
  return gulp.src(src+'js/**/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(gulp.dest(dist+'js'));
});
// Also feels hacky, need a better solution for this
gulp.task('scripts:build', function() {
  return gulp.src(src+'js/**/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(uglify())
    .pipe(gulp.dest(dist+'js'));
});

gulp.task('normalize', function() {
  return gulp.src(bower+'normalize-css/normalize.css')
    .pipe(cleancss())
    .pipe(gulp.dest(dist+'lib'));
});

gulp.task('jquery', function() {
  return gulp.src(bower+'jquery/dist/jquery.min.js')
    .pipe(gulp.dest(dist+'lib'));
});

gulp.task('screenshot', function() {
  return gulp.src(src+'screenshot.png')
    .pipe(gulp.dest(dist));
});
