# php-trial

# Description
Trying out my latest php & symfony skills

# User Stories

- homepage: As a user I can read what this website is about.
- signup: As a user I can signup and become a member.
- login: As a user I can login to see private member content.
- mijn gegevens: As a user I can see my personal data when I am logged in.
- 404: As a user I get information when something goes wrong on the client side.
- 500: As a user I get information when something goes wrong on the server side.

# Routes
GET:    /home
POST:   /signup
POST:   /login
POST:   /mijn-gegegevens-inzien

# Models

User Model:
- username
- password

Member Model:
- first_name
- last_name
- street
- housenumber
- postal_code
- city
- email
- phone
- memebership_fee
- member_category

# Todo

1. GitHub Repository
2. Create project
3. Set up the routes
4. Create Masterpage
5. Create Homepage
6. Create Signup
7. Create Login
8. Set up database
9. Create entities
10. Create member detail form
11. Store data in database
12. Form validation
13. Retrieve data from database