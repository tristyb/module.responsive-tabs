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

		sass: {
			global: {
				options: {
					outputStyle: "compressed",
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
				tasks: ["sass", "autoprefixer"]
			},
			compression: {
				files: ['assets/**/*', 'language/**/*', 'tmpl/**/*', 'helper.php', 'mod_webhausresponsivetabs.php', 'mod_webhausresponsivetabs.xml'],
				tasks: ["compress"]
			}
		},

		compress: {
			main: {
				options: {
					archive: "mod_webhausResponsiveTabs-x-x-x.zip",
					pretty: true,
					mode: 'zip'
				},
				files: [
					{expand: true, src: ['assets/css/style.css'], dest: '/'},
					{expand: true, src: ['assets/css/index.html'], dest: '/'},
					{expand: true, src: ['assets/js/scripts.min.js'], dest: '/'},
					{expand: true, src: ['assets/js/index.html'], dest: '/'},
					{expand: true, src: ['assets/index.html'], dest: '/'},
					{expand: true, src: ['language/**'], dest: '/'},
					{expand: true, src: ['tmpl/**'], dest: '/'},
					{expand: true, src: ['helper.php'], dest: '/'},
					{expand: true, src: ['index.html'], dest: '/'},
					{expand: true, src: ['mod_webhausresponsivetabs.php'], dest: '/'},
					{expand: true, src: ['mod_webhausresponsivetabs.xml'], dest: '/'},
				]
			}
		}
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    require("load-grunt-tasks")(grunt);

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
  	grunt.registerTask("default", ["uglify", "sass", "autoprefixer", "compress", "watch"]);

};
