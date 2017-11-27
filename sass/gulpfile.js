var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('nano', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./'))
        console.log('Woy! Its Nano Ceramic')
});

//Watch task
gulp.task('ceramic',function() {
    gulp.watch('sass/**/*.scss',['nano']);
});
