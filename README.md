# Website-StudentParty
Implementation of a website for the management of student parties. It was realized within the framework of a project in the third semester of my bachelor's degree (2020).

## Test account

* Email = a@a.a
* Password = admin

# Features (without account, but very limited)

* See the list of parties with some information (with a search menu and selections)
* Create an account and log in
* Lost password (by mail) then reset the password (on the site)

## Features (with account)

* View the list of information (with a search menu and special selections for users)
* Open the party organizer's profile in a new tab
* Open a detailed description of the event in a new tab
* View the list of participants in a new tab (from the page with the detailed description)
* Add the party to your favorites (from the page with the detailed description)
* Sign up for the party (from the page with the detailed description) and receive the confirmation by email
* Create a party
* Access your profile and modify your name, email address or password
* Access your history (organization and participation) from your profile
* Log out

## Global features

* A contact form
* Legal notices (empty for the moment)
* Social networks (empty for the moment)
* A language change (only two languages available for now: English and French)

Note: they didn't seem to work when I tested before my last commit, I'm sorry about that. However, it was not the case 2 months ago.

## Comments

I didn't have the time to add all the features I thought of. I hope to add them later:
* fix the libraries problem
* real time verification of fields (at login and account creation)
* add a graph to show how active the user is
* add a rating system after a party
* add a banning system (for unruly students :p )
* automatically disconnect the user after a certain time

## Appendices:

I used the following libraries:
* sendgrid-php : to send emails
* phpqrcode : to create a qrcode (registration to a party)
* fdpf17 : to create a pdf (from a qrcode to send it by email)
* awesomplete : to display cities in ajax

# Description of the page layout
## The site will be a one-page site:

* The home page "index.php" which will always have:
    * A responsive "header" with the logo in the center, below the buttons to access the different sections: "home" - "login" - "signin" if no session is open, otherwise: "home" - "profile" - "add" - "disconnect". 
    * A footer with a contact form (scrolling) and below the legal notices, social networks and the choice of language (language also recorded in the database).
    
* The "index.php" page will have several variable sections, but only one at a time:
    * By default: a "base" section with the list of ads. There will be a select to let the user choose to sort the ads and a search field for a specific ad. Same section to see the history of the parties accessible from the user's profile.
    * A "login" section with the possibility to log in or click on links to create an account or to retrieve your login information (see other sections).
    * A "forgot" section to request a password reset.
    * A "reset_pwd" section to reset your password.
    * A "signin" section to create an account.
    * An "add" section to add or edit an ad.
    * A "details" section to display the details of an ad. He will be able to add ads to his favorites
    * A "coming" section to display the participants.
    * A "profile" section to modify his information and password (only if a session is opened and the user clicks on his profile) and the information on a user (accessible to all).
    
    * The user will be able to :
    * click on another profile and see the history of the parties (participated, organized).
    * See the number of places remaining and the gender ratio of an ad.
    * Receive confirmation of his registration by email with a QR code attached in pdf format.

## Project structure

* Folder `assets` : put the files `*.js`, `*.css`, `*.php` and all the images, in dedicated folders.
* Folder `templates` : put all files common to all pages (navbar, footer...).
* Home page = `index.php`.
* For the other pages, organize them according to the desired urls.

