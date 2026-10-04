# IT0049 POS Application — TFA3

This CodeIgniter 4 project implements the TFA3 customer and user account forms, validation, edit workflows, and user avatar uploads.

## Setup

1. Configure the `default` database group in `app/Config/Database.php` (or the equivalent environment variables) to point to your TFA2 POS database.
2. Confirm the database contains `customers` (`id`, `full_name`, `email`) and `users` (`id`, `username`, `full_name`, and optionally `email`) tables. The user account table must have a unique `username` column.
3. Apply the avatar column migration once with `php spark migrate`. It adds a nullable `avatar` column to `users`.
4. Point the web server document root to this project's `public` directory. For a local development server, run `php spark serve` from the project root.
5. The PHP image extension (GD or Imagick) must be enabled for avatar resizing.

## TFA3 pages

- `/customers` lists customers; `/customers/new` creates one; `/customers/edit/{id}` edits one.
- `/users` lists users and their prepared avatars; `/users/new` creates one; `/users/edit/{id}` edits one and accepts a JPG or PNG avatar up to 2 MB.
- Uploaded avatar thumbnails are stored under `public/uploads`; the database stores only each generated filename. Users without an uploaded image use `public/uploads/avatar-placeholder.svg`.

The project does not include database credentials or a database export. Export your configured POS database separately when preparing the final submission.

## Framework information

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds the distributable version of the framework.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 8.2 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - The end of life date for PHP 8.1 was December 31, 2025.
> - If you are still using below PHP 8.2, you should upgrade immediately.
> - The end of life date for PHP 8.2 will be December 31, 2026.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
