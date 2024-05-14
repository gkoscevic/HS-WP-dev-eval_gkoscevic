# Home Solutions WP Dev Eval

## Architecture Decisioning Process

### Styling
I kept it very simple with my CSS for this project. I used postcss to allow for some features that aren't available yet natively (i.e nesting). Other than that, very barebones.

If this was something my team and I had to do as a project I'd recommend we use CSS modules in combination with postcss. This would give us access to all the modern functionality of CSS as well as being able to scope our CSS files and class declarations into modules. 

### Javascript
For my JavaScript setup I kept it as barebones as possible. The only functionality I completed was outputting the user's postal code based on their IP address. For this, I used the Fetch API to hit the ipapi and return the user's location data, all of this functionality can be found in `eval/src/scripts/location.js`

### Build Process
I utilized Gulp to watch and serve my assets. For CSS, this was as simple as utilizing gulp's postcss plugins. To transpile my JavaScript I used Webpack with a very basic `webpack.config` file.

Initially I tried to use parceljs to bundle my assets, but it was not as out-of-the-box as I thought it would be and I think this was mainly due to working within a WordPress site. Gulp proved to be a lot more straightforward and easy to work with, if I wanted to spend more time on this piece I would've added tasks to handle performance optimizations during the build process along with handling our assets differently based on the environment we were building for.

## WordPress Functionality and Theme Setup

### Header
* Dynamic inventory availability based on postal code
    * Right now all we are doing is outputting the postal code based on a user's IP. If we were doing this project in production for a real partner I would suggest we utilize categories or tags in the `Gutters` custom post type to define which gutters are available (or not-available) in certain locations. At this point we could use that taxonomy in conjunction with the user's location data to give the user an accurate availability.

### Home Page
* Testimonials 
  * Based on time constraints, I wasn't able to complete this portion of the home page, but I did want to outline how I would go about accomplishing this. To render testimonials for the user I would've set up a custom-post-type that would've allowed an admin user to enter the name, review and product picture for each customer's testimony. To render this on the home page I would've used a simple `WP_Query` to retrieve the testimonials and then loop over them to output them on the page.

### Single Gutter Page



