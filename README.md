# Secure Schools Technical Exercise


## Scott Mahoney's Technical Test for the Software Engineer position at Secure Schools

The task is:
-   To use the Wonde API to satisfy the given User Story.

User Story:
-   As a Teacher I want to be able to see which students are in my class each day of the week so that I can be suitably prepared.



Some thoughts that have impacted how I went about performing the task after reading through the Wande API docs and the task:

I would expect in the context of the user story a couple of things are true to keep the task in scope:
-   The teacher in the user story would be using an existing app, with just the functionality described in the story missing
-   That the app would be making calls to the Wonde API directly.

However following the above assumptions directly wouldn't fit much in to the emphasis on PHP and Laravel in the job listing and my chat with Maddie about what the role entails.
Therefore for the technical test I have taken the following approach to demonstrate skills required in the job listing:
-   A simple, single page frontend app using Vue.js to display the classes for a teacher, as well as the students in that class.
-   An API using PHP and laravel to serve data to the frontend app, this API will make the relevant calls to the Wonde API to get and serve data to the front end.
-   There is no data in the sample school for lessons to tie class lessons to specific dates, and from that figure out which classes a teacher has on a given date (and week), so I have instead opted to just show the classes that the teacher currently has, and the employees in each class.


## Setup

In the api folder:
-   run composer install
-   copy .env.example to .env
-   set WONDE_ACCESS_TOKEN variable in the .env file to the test access token
-   run php artisan serve

In the frontend folder:
-   run yarn install
-   copy .env.example to .env
-   set VUE_APP_API_URL variable in the .env file to whatever IP the api server is running on
-   run yarn serve