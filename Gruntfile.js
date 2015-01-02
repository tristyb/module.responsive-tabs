module.exports = function(grunt) {

	// because why not
	"use strict";

	// 1. All configuration goes here
	grunt.initConfig({
		pkg: grunt.file.readJSON("package.json"),

		uglify: {
			build: {
				files: {
					"assets/js/scripts.min.js": "assets/js/scripts.js"
				}
			}
		},

		jshint: {
		    all: ['assets/js/scripts.js']
		},

		libsass: {
			global: {
				options: {
					style: "compressed",
					precision: 10
				},
				files: {
					"assets/css/style-unprefixed.css": "assets/scss/style.scss"
				}
			}
		},

		autoprefixer: {
			global: {
				src: "assets/css/style-unprefixed.css",
				dest: "assets/css/style.css"
			}
		},

		watch: {
			options: {
				spawn: false
			},
			js: {
				files: ["assets/js/*.js"],
				tasks: ["jshint", "uglify"]
			},
			css: {
				files: ["assets/scss/*.scss"],
				tasks: ["libsass", "autoprefixer"]
			},
			compression: {
				files: ['assets/**/*', 'language/**/*', 'tmpl/**/*', 'helper.php', 'mod_fancypantsaccordion.php', 'mod_fancypantsaccordion.xml'],
				tasks: ["compress"]
			}
		},

		// browserSync: {
		//     dev: {
		//         bsFiles: {
		//             src : [
		//             	'assets/scss/style.scss',
		//             	'assets/js/scripts.js',
		//             	'index.html'
		//             ]
		//         },
		//         options: {
		//             watchTask: true, // < VERY important
		//             server: {
		//             	baseDir: './'
		//             }
		//         }
		//     }
		// },

		compress: {
			main: {
				options: {
					archive: "mod_tristybResponsiveTabs-x-x-x.zip",
					pretty: true,
					mode: 'zip'
				},
				files: [
					{expand: true, src: ['assets/css/style.css'], dest: '/'},
					{expand: true, src: ['assets/css/index.html'], dest: '/'},
					{expand: true, src: ['assets/js/scripts.min.js'], dest: '/'},
					{expand: true, src: ['assets/js/index.html'], dest: '/'},
					{expand: true, src: ['language/**'], dest: '/'},
					{expand: true, src: ['tmpl/**'], dest: '/'},
					{expand: true, src: ['helper.php'], dest: '/'},
					{expand: true, src: ['index.html'], dest: '/'},
					{expand: true, src: ['mod_fancypantsaccordion.php'], dest: '/'},
					{expand: true, src: ['mod_fancypantsaccordion.xml'], dest: '/'},
				]
			}
		}
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    require("load-grunt-tasks")(grunt);

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
  	grunt.registerTask("default", ["uglify", "libsass", "autoprefixer", "compress", "watch"]);
  	// grunt.registerTask("default", ["libsass", "autoprefixer", "compress", "browserSync", "watch"]);

};