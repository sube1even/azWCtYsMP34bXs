module.exports = function(grunt) {

	var config = {
		theme: 'dist/content/themes/framework'
	};

    grunt.initConfig({

	    config: config,

        pkg: grunt.file.readJSON('package.json'),

	    compass: {
            dist: {
                options: {
                    sassDir: '<%= config.theme %>/stylesheets',
                    cssDir: '<%= config.theme %>/stylesheets',
                    environment: 'production'
                }
            }
        },

        uglify: {
            main: {
                options: {
                    mangle: false
                },
                files: {
                    '<%= config.theme %>/javascript/min/app.min.js': [
	                    '<%= config.theme %>/javascript/main.js'
                    ]
                }
            },
            plugins: {
                options: {
                    mangle: false
                },
                files: {
                    '<%= config.theme %>/javascript/min/plugins.min.js': [
                        'bower_components/modernizr/modernizr.js',
	                    'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
                    ]
                }
            }
        },

	    autoprefixer: {
		    options: {
			    browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1']
		    },
		    files: {
			    expand: true,
			    src: '<%= config.theme %>/stylesheets/*.css'
		    }
	    },

        watch: {
            css: {
                files: '<%= config.theme %>/stylesheets/**/*.scss',
                tasks: ['compass', 'autoprefixer'],
                options: {
                    livereload: true
                }
            },
            js: {
                files: '<%= config.theme %>/javascript/*.js',
                tasks: ['uglify:main'],
                options: {
                    livereload: true
                }
            },
            views: {
                files: '<%= config.theme %>/**/*.php',
                options: {
                    livereload: true
                }
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-autoprefixer');


	grunt.registerTask('build', [
		'compass',
		'uglify',
		'autoprefixer'
	]);

    // Default task(s).
    grunt.registerTask('default', ['watch']);

};