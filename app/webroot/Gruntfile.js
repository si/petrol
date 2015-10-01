module.exports = function (grunt) {

	var config = {
		name: 'commute',
		version: '1',
		fullVersion: '1.0'
	};

	var filesJSConfig = { };
	filesJSConfig[ 'build/v' + config.version + '/js/' + config.name + '-v' + config.fullVersion + '.min.js' ] =  'build/v' + config.version + '/js/' + config.name + '-v' + config.fullVersion + '.js';

	var filesCSSConfig = { };
	filesCSSConfig[ 'build/v' + config.version + '/css/' + config.name + '-v' + config.fullVersion + '.css' ] = 'src/main/sass/main-test.scss';


	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		concat: {
			// 2. Configuration for concatinating files goes here.
			first_version: {
				src: [
					'src/common/js/common.js', 'src/main/js/main-test.js', 'src/common/js/launcher.js'
				],
				dest: 'build/v' + config.version + '/js/' + config.name + '-v' + config.fullVersion + '.js',
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
					cwd: 'src/images/',
					src: ['**/*.{png,jpg,gif,svg}'],
					dest: './build/images/'
				}]
			}
		},
		watch: {
			scripts: {
				files: ['src/**/*.js'],
				tasks: ['concat', 'uglify'],
				options: {
					spawn: false,
				},
			},
			css: {
				files: ['src/main/sass/**/*.scss'],
				tasks: ['sass'],
				options: {
					spawn: false,
				}
			},
			image: {
				files: ['src/images/*.{png,jpg,gif,svg}'],
				tasks: ['imagemin'],
				options: {
					spawn: false,
				}
			}
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
	grunt.registerTask('default', ['concat', 'uglify', 'imagemin', 'sass']);
	grunt.registerTask('dev', ['concat', 'uglify', 'imagemin', 'sass', 'watch']);

};