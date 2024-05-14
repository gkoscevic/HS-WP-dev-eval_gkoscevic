import { src, dest, watch, parallel, series } from 'gulp';
import rimraf from 'gulp-rimraf';
import postcss from 'gulp-postcss';
import cssvars from 'postcss-simple-vars';
import nested from 'postcss-nested';
import cssImport from 'postcss-import';
import autoprefixer from 'autoprefixer';
import webpack from 'webpack-stream';
import exec from 'gulp-exec';
import gulpif from 'gulp-if';
import cssnano from 'gulp-cssnano';

const env = process.env.NODE_ENV;
const isProduction = env === 'production';

// build directories
const dirs = {
  src: 'src',
  dist: 'dist'
};

// file sources
const sources = {
  styles: `${dirs.src}/**/*.css`,
  scripts: `${dirs.src}/**/*.js`
}

// transpile and bundle javascript
export const buildScripts = () => src(sources.scripts)
  .pipe(webpack(require("./webpack.config.js")))
  .pipe(dest(dirs.dist))

// run CSS through postcss and bundle
export const buildStyles = () => src(`${dirs.src}/styles/index.css`)
  .pipe(postcss([cssImport, cssvars, nested, autoprefixer]))
  .on('error', (errorInfo) => {  // if the error event is triggered, do something
    console.log(errorInfo.toString()); // show the error information
    this.emit('end'); // tell gulp that the task is ended gracefully and resume
  })
  .pipe(gulpif(isProduction, cssnano())) // only minify css in production build
  .pipe(dest(`${dirs.dist}/styles`))

// move fonts from src to dist
export const moveFonts = () => src(`${dirs.src}/fonts/`)
  .pipe(exec(() => `cp -R ${dirs.src}/fonts/ ${dirs.dist}/fonts`))

// watch task for styles and scripts
export const devWatch = () => {
  watch(sources.styles, buildStyles);
  watch(sources.scripts, buildScripts);
}

// Clean dist folder
export const clean = () => src(`${dirs.dist}/*`, { read: false }).pipe(rimraf());

// Development Task
export const dev = series(clean, parallel(buildStyles, moveFonts, buildScripts), devWatch);

// Serve Task
export const build = series(clean, parallel(buildStyles, moveFonts, buildScripts));

export default dev;
