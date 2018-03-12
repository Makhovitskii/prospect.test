var gulp        = require('gulp'),
    browserSync = require('browser-sync');

gulp.task('browser-sync', function(){
  browserSync({
    proxy: '127.0.0.1/prospect.test/app/',
    notify: false,
  });
});

gulp.task('watch' ,['browser-sync'], function(){
  gulp.watch('app/public/css/*.css', browserSync.reload);
  gulp.watch('app/public/js/*.js', browserSync.reload);
  gulp.watch('app/public/*.php', browserSync.reload);
  gulp.watch('app/aplication/***/**/*.php', browserSync.reload);


});

gulp.task('default', ['watch']);
