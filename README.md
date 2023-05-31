# quicky-example
A very, very small and simple demonstration of QuickyPHP.

## Installation

```bash
# get files
git clone https://github.com/david-prv/quicky-example.git
cd quicky-example

# install dependencies
composer install --no-dev

# run server
php quicky-cli start
```

## Authentication
Username: `admin@example.tld`  
Password: `admin`

## Overview

### /
> Home page, showing a bootstrap default blog site

### /login
> Using GET, it is the login page (which is also from bootstrap) for the account dashboard (No CSRF or sth similar)  
> Using POST, it is the endpoint for the login-form

### /logout
> Destroys the session and logs you out

### /dashboard
> A dummy bootstrap dashboard, showing your email address. This page is only visible, iff you are logged in. For login credentials see above. No other credentials work.

## Credits
- Bootstrap Example Pages: [getbootstrap.com](https://getbootstrap.com/docs/4.0/examples/)
- QuickyPHP: [GitHub Page](https://github.com/david-prv/quickyphp)
