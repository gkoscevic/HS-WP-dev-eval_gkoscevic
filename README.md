# Home Solutions WP Dev Eval

## Architecture Decisioning Process

### Styling
I kept it very simple with my CSS for this project. I used postcss to allow for some features that aren't available yet natively (i.e nesting). Other than that, very barebones.

If this was something my team and I had to do as a project I'd recommend we use CSS modules in combination with postcss. This would give us access to all the modern functionality of CSS as well as being able to scope our CSS files and class declarations into modules. 

### Javascript
The only functionality I completed that required JavaScript was outputting the user's postal code based on their IP address. For this, I used the Fetch API to hit the `ipapi` and return the user's location data, all of this functionality can be found in `eval/src/scripts/location.js`

### Build Process
I utilized Gulp to watch and serve my assets. Initially I tried to use parceljs to bundle my assets, but it was not as out-of-the-box as I thought it would be and I think this was mainly due to working within a WordPress site. Gulp proved to be a lot more straightforward and easy to work with.

#### CSS
I used gulp's postcss plugin to pipe my CSS in and run it through various plugins for additional features such as supporting css imports, nesting, and autoprefixing. I also conditionally enable sourcemaps when not building for production. When we are building for production I utilized `gulp-if` to minify all CSS for performance.

#### JavaScript
To transpile my JavaScript I used Webpack with a very basic `webpack.config` file. To me, this was the best way to bundle and transpile my JS while also giving us flexibility to expand upon our build system down the road. Just like with my CSS, when we are building for production webpack will automatically minify our JS file.


#### Missing functionality from build system
1. There's no live reload on this currently. I would've liked to spend more time on this to figure out a way to implement hot reloading for the WordPress site
2. If this project would be in production I'd like to add the bundler analyzer from webpack to keep track of our JS build size for performance

## WordPress Functionality and Theme Setup

### Header
* Dynamic inventory availability based on postal code
    * Right now all we are doing is outputting the postal code based on a user's IP. If we were doing this project in production for a real partner I would suggest we utilize categories or tags in the `Gutters` custom post type to define which gutters are available (or not-available) in certain locations. At this point we could use that taxonomy in conjunction with the user's location data to give the user an accurate availability.

### Home Page
* PHP structure and functionality
   * The home page is fairly static at the moment. The main hero is all customizable within the admin and so is each Gutter within the Gutter post type. However, after working through the site and discovering Gutenberg blocks I would've leveraged those to build out the entire homepage within the admin editor and utilize custom `shortcodes` and Gutenberg blocks to allow the editor to add and edit dynamic pieces of the page such as the "Types of Gutters" and "Testimonials" section.
* Testimonials 
  * Based on time constraints, I wasn't able to complete this portion of the home page, but I did want to outline how I would go about accomplishing this.
  * To render testimonials for the user I would set up a custom-post-type that would allow a content editor to enter the name, review and product picture for each customer's testimony.
  * To output these testimonials on the homepage I would've created a custom `shortcode` to allow for injecting the content from within the page editor

## Project Set Up

### Prerequisites
- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

### Starting the Server
1. Clone the repository
2. Run `docker-compose up` from the root of the project
3. Visit `http://localhost` in your browser to access the site
4. Visit `http://localhost/wp-admin` using these credentials: username=admin password=password to access the admin panel

### Theme Set up
1. `cd` into the root of the theme `cd wp-content/themes/eval/`
2. Run `npm install`
3. Run `npm start` to start the development task (this will build and watch all `.js` and `.css` files)
4. Run `npm run build` to build all assets for productions



