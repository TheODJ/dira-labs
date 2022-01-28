## About Dira Labs API

This API has a single endpoint that helps people join a waitlist accessible at `{base_url}/api/join-waitlist`
> If running on localhost, then base_url can be `localhost:8000` for example

## Request Parameters
Request parameters that should be included in the request to the endpoint include
- waitlist_type: 1 for Investors, 2 for Asset Listers
- name: Full name of Waitlister e.g. 'Obi Wan Kenobi'
- email: Email address of Waitlister
- lister_desc: Description of asset to be added if waitlister is an Asset Lister

> All request parameters are required except lister_desc which is only required if waitlister is an Asset Lister

## To Set Up
- Clone this repository
- Copy `.env.example` to `.env` and edit environment variables to fit environment
- Change directory to installation directory and run `php artisan migrate` to migrate databases and set up locally
- Run `php artisan key:generate` to generate an application key for the application
- Import collection into Postman and test APIs

## Collection Link
- Import the collection and documentation for this project at [here](https://documenter.getpostman.com/view/17990816/UVeCPT92)

## To Run
- Open up Postman
- Make a request to the endpoint