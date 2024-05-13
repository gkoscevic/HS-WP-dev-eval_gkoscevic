import { src, dest, watch } from 'gulp';
import postcss from 'gulp-postcss';
import cssvars from 'postcss-simple-vars';
import nested from 'postcss-nested';
import cssImport from 'postcss-import';
import autoprefixer from 'autoprefixer';
import webpack from 'webpack-stream';

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

export const buildScripts = () => src(sources.scripts)
  .pipe(webpack(require("./webpack.config.js")))
  .pipe(dest(dirs.dist))

export const buildStyles = () => src(`${dirs.src}/styles/index.css`)
  .pipe(postcss([cssImport, cssvars, nested, autoprefixer]))
  .pipe(dest(`${dirs.dist}/styles`))

export const devWatch = () => {
  watch(sources.styles, buildStyles);
  watch(sources.scripts, buildScripts);
}

export default devWatch;
