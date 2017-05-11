var gulp = require('gulp'),
    sys = require('sys'),
    util = require('util'),
    exec = require('child_process').exec;

gulp.task('phpunit', function() {
    exec('./vendor/bin/phpunit --colors=always --stop-on-failure tests/', function(error, stdout) {
        sys.puts(stdout);
    });
});


gulp.task('default', ['phpunit'], function() {
    // watch JS files
    gulp.watch('./**/*.php', ['phpunit']);
});

