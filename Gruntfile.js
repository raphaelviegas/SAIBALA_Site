module.exports = function(grunt) {

  grunt.initConfig({
    uglify: {
      'assets/dist/js/main.js': ['assets/js/*.js']
    },
    less: {
      'assets/dist/css/style.css': ['assets/less/style.less', 'assets/less/*/*.less']
    },
    copy: {
      main: {
        files: [
          {expand: true, cwd: 'assets/fonts/', src: ['**'], dest: 'assets/dist/fonts'},
          {expand: true, cwd: 'assets/less/others', src: ['**'], dest: 'assets/dist/css'},
        ],
      },
    },
    watch: {
      js: {
        files: ['assets/js/*.js'],
        tasks: ['uglify'],
        options: {
          spawn: false,
          livereload: true
        },
      },
      css: {
        files: ['assets/less/*.less','assets/less/*/*.less'],
        tasks: ['less'],
        options: {
          spawn: false,
          livereload: true
        },
      },
      html: {
        files: ['*.php', '**/*.php'],
        options: {
          spawn: false,
          livereload: true
        }
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['uglify', 'less', 'copy', 'watch']);

};