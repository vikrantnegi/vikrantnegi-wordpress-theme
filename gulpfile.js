'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
//var rename = require("gulp-rename");


gulp.task('default', function () {
    return gulp.src('./sass/**/*.scss')
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(autoprefixer({
					browsers: ['last 4 versions'],
					cascade: false
				}))
				 //.pipe(rename('ithcustom.css'))
        .pipe(gulp.dest('./'));
});

gulp.task('watch', function () {
    gulp.watch('./sass/**/*.scss', ['default']);
});
