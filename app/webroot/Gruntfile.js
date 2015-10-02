module.exports = function (grunt) {

	var config = {
		name: 'commute',
		version: '1',
		fullVersion: '1.0'
	};

	var filesJSConfig = { };
	filesJSConfig[ 'js/min/' + config.name + '-v' + config.fullVersion + '.min.js' ] =  'js/min/' + config.name + '-v' + config.fullVersion + '.js';

	var filesCSSConfig = { };
	filesCSSConfig[ 'css/' + config.name + '-v' + config.fullVersion + '.css' ] = 'sass/app.scss';

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		concat: {
			// 2. Configuration for concatinating files goes here.
			first_version: {
				src: [
					'js/app.js', 'js/libs/**.js', 'js/plugins/**.js', 'js/modules/**.js'
				],
				dest: 'js/min/' + config.name + '-v' + config.fullVersion + '.js',
			}
		},
		uglify: {
			build: {
				files: filesJSConfig
			}
		},
		sass: {
			dist: {
				options: {
					style: 'compressed'
				},
				files: filesCSSConfig
			}
		},
		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'img/',
					src: ['**/*.{png,jpg,gif,svg}'],
					dest: './images/'
				}]
			}
		},
		watch: {
			scripts: {
				files: ['js/**/*.js'],
				tasks: ['concat', 'uglify'],
				options: {
					spawn: false,
				},
			},
			css: {
				files: ['sass/**/*.scss'],
				tasks: ['sass'],
				options: {
					spawn: false,
				}
			}
			/*,
			image: {
				files: ['img/*.{png,jpg,gif,svg}'],
				tasks: ['imagemin'],
				options: {
					spawn: false,
				}
			}*/
		}
	});

	// 3. Where we tell Grunt we plan to use this plug-in.
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks("grunt-image-embed");

	// 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
	grunt.registerTask('default', ['concat', 'uglify', 'sass']);
	grunt.registerTask('dev', ['concat', 'uglify', 'sass', 'watch']);

};