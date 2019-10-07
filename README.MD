- Author: David Stein
- Version: 1.0.0.0
# WRBB Site Documentation 
## Section 1: Git
### Section 1.1 - Workflow
Our git workflow is simple and operates on three sections of branches: Master, Develop, and Features.

- Master - This is our production code. Whatever is on this branch reflects what is currently on the website. It is what users see. Code should never be pushed to Master unless it has already been validated. 
- Develop - The Develop branch is branched from Master. It will be equivalent to Master every time a new version of the website is released. Develop is not user facing and will be used to test that new features can integrate into production code without breaking other aspects of the site. Once all the features for a version of the website have been merged into Develop and tested, it will be merged into Master and Master’s version will be updated.  Features - A new Feature branch will be created for every new element you want to add to the site, for any bug fixes, any additions, and any amendments. Any time you want to change the site in any way, you will create a Feature branch. These will be branched from the Develop branch. You should pull from Develop regularly to ensure that your feature is up to date with any additions others have made to the Develop branch. This will minimize issues when your Feature branch is ready to be merged into Develop. When you are ready to submit your Feature branch for review, create a merge request on GitLab (covered in section 4). It will be reviewed and once it is ready, merged into Develop.
## Section 1.2 - Versioning
When the site goes live the version will be 1.0.0.0. The first number relates to MAJOR releases. This number will be increased after a paradigm shifting change has been implemented, or enough updates have been pushed to necesitate an increase. The second number relates to major visual changes. Most often it will only increase when the third number necessitates it. The third number relates to a batch of updates. We will operate on a two month development cycle. After two months all new features on Develop will be validated and merged with Master; the third number will be updated. The fourth number will be updated for hotfixes. These include time sensitive bug fixes and time sensitive features. They will be pushed as they are completed rather than after the end of a two month cycle.

## Section 2 - Setting Up Your Project
### Section 2.1 - Clone the Repo
-	Navigate to your wordpress install in your terminal. Go to the “themes” directory inside “wp-content”
-	Run `git clone https://gitlab.com/david1996/WRBB-Site.git`
-	Verify that a new directory with the theme files has been created

### Section 2.2 - Getting Started with Understrap
Preparations: Install node.js and Gulp
You need node.js and Gulp installed on your computer globally.
To install node.js visit the node.js website for the latest installer for your OS. Download and install it like any other program.

To install Gulp open up your terminal, enter:
`npm install --global gulp-cli`
and hit enter.
Now you have node.js and Gulp installed globally. 
Installing dependencies
- Make sure you have installed Node.js on your computer globally
- Then open your terminal and browse to the location of your UnderStrap Theme copy
- Run: `npm install`
- When this command completes, you should be able to see a new directory named “node_modules” under project's root directory ({your-theme-name}/node_modules)

## Section 3 - Feature Development
### Section 3.1 - Setup

Creating a new branch
- Navigate to the root of the theme’s git repository in your terminal
- Run git checkout develop
- Run git pull and then run git checkout -b feature-{your-feature-name}

Enabling the theme
- Start WAMP or MAMP and open up your site  (your local site’s url will be something like `localhost/{project-name}`)
- Navigate to `localhost/{project-name}/wp-admin`
- Sign in with the credentials you created when you set up WAMP or MAMP
- In the left sidebar navigate to Appearance => Themes
- Click “Activate” on the WRBB theme

Section 3.2 - Adding JS, PHP, SASS, and CSS
In order to add SASS/CSS for your feature, you will create a file with an appropriate name for your feature and add it to the `wp-content/themes/wrbb-site/sass/theme/wrbb-styles` directory. Ensure that this is the directory in which you add your files as there are other similarly named directories. Your SASS/CSS file should have the .scss extension. Finally edit the file `wp-content/themes/wrbb-site/sass/theme/_theme.scss` by adding the line 

```css
@import "wrbb-styles/{my-sass-file-name-here}";
```
Congratulations, your SASS/CSS file has now been added to the site. You may not see your styles take effect right away - don’t worry, this will be covered in section 3.3.

In order to add javascript to the site, create your .js file with an appropriate name for your feature and add it to the `wp-content/themes/wrbb-site/js` directory. Again don’t worry if you don’t see your changes show up right away, this will be covered in 3.3.

To add php, create your .php file with an appropriate name for your feature and add it to `wp-content/themes/wrbb-site/wrbb-templates`.
Section 3.3 - Editing JS, PHP, SASS, and CSS
There are multiple options for editing your code. You may edit in an IDE of your choice and then add it to the requisite directory as detailed in section 3.2 - or you may add a blank file, as per the instructions in 3.2, and edit in wordpress’s built-in editor. To find the site files, go to Appearance => Editor in the Admin panel. From there, you may open the file you’d like to edit and save any changes you make. 

In order to initialize your changes and see them take effect there are two commands you need to run. In the root directory of your theme, that is “wp-content/themes/wrbb-site”, run the command gulp watch in your terminal. This command will continue to run until you terminate it, and will detect changes to your CSS/SASS files and compile them on the fly. After you add a new CSS/SASS file or edit one in the wordpress editor, refresh your page and you should see your changes take effect. In order to load your Javascript files, run gulp scripts in your root directory in the terminal. This will compile, minify, and uglify your JS and make it available to the site. PHP files will be available as soon as they are added. 

## Section 4 - Code Style and Review
### Section 4.1 - SASS and Bootstrap
We chose the Understrap theme because it incorporates the power of Bootstrap with Wordpress. Take advantage of it. Bootstrap is a responsive JS framework that includes many built-in, pre-defined variables and components that make developing faster and easier. If you use these you will be making your life a million times easier and our code more uniform. Buttons, cards, containers, breadcrumbs, sliders, dropdowns and much more. It’s all there. Refer to the Bootstrap documentation early and often when developing your features! Here is a link to the Bootstrap page: https://getbootstrap.com/docs/4.1/getting-started/introduction/ 

Bootstrap also uses SASS to create styles. Many of you will be familiar with CSS. SASS is a CSS extension that has the capacity to make it much more powerful. With SASS you can use variables to define styles that will be used in many places, nest styles for greater readability, use import statements, and much more. Bootstrap has many SASS variables predefined that will be integral to development of the site. When developing, make sure to check if a style has already been defined before you recreate it. Please read over the SASS documentation to learn about more of the features. https://sass-lang.com/guide
That being said, if you are new to CSS and your skills are shaky, feel free to stick with what you’re used to. If there is a more elegant SASS solution, someone will point you to it in the code review.

### Section 4.2 - Javascript

ECMAScript 6 is not the latest version of Javascript, but it is the latest version that is widely supported. While ES6 conventions will not be required, they are recommended. Here is a link to features of ES6 that differ from previous versions: http://es6-features.org/. Note especially the sections on Arrow Functions, Constants, Destructuring, Classes, and Promises. These are useful for writing clean code quickly. If you’re unfamiliar with any of the concepts, there are resources around the web that will explain them. Here is one: https://codeburst.io/es6-tutorial-for-beginners-5f3c4e7960be

### Section 4.3 - PHP
PHP is an important part of wordpress and will be used in the creation of templates for pages and posts. For example, imagine you are developing the Album Review page. Each album review page will have the same structure. In order to allow non-technical users to upload their album reviews, you will need to create a template for them that will take in raw information like a title, text, and pictures and arrange it on the page the same way every time. Understrap comes with several skeleton php templates that you can use to jumpstart your own. If you would like to use one, copy and paste the code from the file, do not overwrite it. Here is a resource for creating templates: https://premium.wpmudev.org/blog/creating-custom-page-templates-in-wordpress/
Be sure to check out the helpful links section on PHP and Wordpress to find out more about how to use PHP with wordpress and what it is used for.

### Section 4.4 - Review

Once your feature is complete and has been pushed to your branch on the gitlab repository, you can create a merge request. You do this by selecting merge request from the menu on gitlab, selecting your branch, and setting the branch to be merged into to Develop. Select the current  webmaster as the reviewer and your code will then be assigned to be reviewed. Once your code is reviewed and any suggested changes have been made, it will be merged into the Develop branch. Congratulations you did it!

## Section 5 - Helpful Links
- [Git](https://www.atlassian.com/git/tutorials)
- [Github](https://guides.github.com/activities/hello-world/)
- [Bootstrap 1](https://www.w3schools.com/bootstrap4/)
- [Bootstrap 2](https://getbootstrap.com/docs/4.1/getting-started/contents/)
- [SASS](https://sass-lang.com/guide)
- [Javascript](https://javascript.info/)
- [Wordpress 1](https://codex.wordpress.org/)
- [Wordpress 2](http://www.wpbeginner.com/)
- [Wordpress 3](http://www.wpbeginner.com/wp-tutorials/how-to-create-custom-post-types-in-wordpress/)
- [Wordpress 4](https://premium.wpmudev.org/blog/getting-started-with-wordpress-development/)

[Deep Breathing](https://www.uofmhealth.org/health-library/uz2255)


