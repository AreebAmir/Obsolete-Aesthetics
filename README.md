# Obsolete Aesthetics

A retro-themed music player website built with PHP and MySQL. Users can sign up, log in, browse a library of tracks with cover art, and like/dislike songs. An admin panel allows managing the music library and registered users.

This was one of my first web development projects, built to practice server-side PHP, MySQL, and basic front-end fundamentals before moving on to frameworks. I'm keeping the structure as it was originally written, warts and all — see [Notes](#notes) below for what I'd do differently now.

## Tech stack

- **Backend:** PHP (`mysqli`, prepared statements, `password_hash`/`password_verify`)
- **Database:** MySQL
- **Frontend:** HTML, CSS, vanilla JS + jQuery, Bootstrap 4 (admin panel)

## Features

- User registration and login with hashed passwords
- Main player page listing tracks with cover art and audio playback
- Like / dislike system per track, per user
- Admin panel to add, edit, and delete tracks and users

## Getting started

### Requirements

- PHP 7.4+ with the `mysqli` extension
- MySQL (or MariaDB)
- A local server stack such as [XAMPP](https://www.apachefriends.org/), [MAMP](https://www.mamp.info/), or `php -S` with a separate MySQL install

### Setup

1. **Clone the repo** into your server's document root (e.g. `htdocs` for XAMPP):
   ```bash
   git clone https://github.com/<your-username>/Obsolete-Aesthetics.git
   ```

2. **Create the database.** There's no schema file bundled with the original project, so one (`schema.sql`) has been added here based on the queries used in the code. With MySQL running:
   ```bash
   mysql -u root -p -e "CREATE DATABASE project"
   mysql -u root -p project < schema.sql
   ```

3. **Check the DB credentials.** The app connects with these defaults, matching a typical local XAMPP/MAMP setup (`root` user, no password):
   ```php
   // config.php and dbh.inc.php
   $conn = new mysqli("localhost", "root", "", "project");
   ```
   Update both `config.php` and `dbh.inc.php` if your local MySQL uses different credentials.

4. **Start Apache and MySQL** (e.g. via the XAMPP control panel).

5. **Visit the app** in your browser:
   - `http://localhost/Obsolete-Aesthetics/Registration.php` to create an account
   - `http://localhost/Obsolete-Aesthetics/login.php` to log in
   - `http://localhost/Obsolete-Aesthetics/admin_panel.html` for the admin panel

### Uploads

New tracks/cover art added through the admin panel are written to `uploads/images/` and `uploads/music/`. Make sure these folders are writable by the web server.

## Project structure

```
├── mainpage.php / mainpage.html   # main music player view
├── login.php / login.html         # login
├── Registration.php / Registration.html
├── About.php / About.html
├── admin_panel.html               # admin panel entry point
├── admin_music.php                # manage tracks
├── admin_users.php                # manage users
├── action.php                     # add/edit/delete track logic
├── server.php                     # like/dislike AJAX endpoint
├── config.php / dbh.inc.php       # database connection
├── login.inc.php / signup.inc.php # auth logic
├── schema.sql                     # database schema (added for setup)
├── uploads/                       # user-uploaded images & audio
├── img/, bg_gifs/, js/            # static assets
└── stylesheet.css / style_admin.css
```

Each page generally has a static `.html` version (an early markup/design pass) alongside the `.php` version that's actually wired up to the database — a leftover from how the project evolved.

## Notes

A few things worth flagging honestly, since this is an early project I'm showcasing as-is:

- Queries in `server.php` are not parameterized (unlike `login.inc.php`/`signup.inc.php`, which do use prepared statements), so they're vulnerable to SQL injection.
- The admin panel isn't gated behind an authentication/authorization check.
- Database credentials are hardcoded rather than pulled from environment variables.

If I were building this today, those would be the first three things I'd fix.
