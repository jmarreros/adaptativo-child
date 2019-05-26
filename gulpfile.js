var gulp = require('gulp');
var stylus = require('gulp-stylus');

gulp.task('build', function () {
  return gulp.src('style.styl')
    .pipe(stylus())
    .pipe(gulp.dest('./'));
});


gulp.task('watch', function () {
    gulp.watch('./*.styl', gulp.series('build'));
});

gulp.task('default', gulp.series('watch'));

