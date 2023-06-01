# Secure Schools Technical Exercise


Initial commits for the Secure Schools software engineer technical exercise, to be completed Sunday 4th June 2023 when I have more time to sit down and look at the task properly.

The task is:
    To use the Wonde API to satisfy the given User Story.
User Story:
    As a Teacher I want to be able to see which students are in my class each day of the week so that I can be suitably prepared.



Some initial thoughts after initally skimming through the task and Wonde API docs:

I would expect in the context of the user story a couple of things are true to keep the task in scope:
    -   The teacher in the user story would be using an existing app, with just the functionality described in the story missing
    -   That the app would be making calls to the Wonde API directly.

However following the above assumptions directly wouldn't fit much in to the emphasis on PHP and Laravel in the job listing and my chat with Maddie about what the role entails.
Therefore for the technical test I intend to take the following approach to demonstrate skills required in the job listing:
    -   A simple, single page frontend app using Vue.js to display the classes for the week for a teacher, as well as the students in that class.
    -   An API using PHP and laravel to serve data to the frontend app, this API will make the relevant calls to the Wonde API to get and serve data to the front end.