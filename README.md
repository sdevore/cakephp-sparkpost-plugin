# CakePHP SparkPost
A CakePHP plugin for sending mail via SparkPost's REST API

# Introduction
## What is SparkPost?
[SparkPost](https://www.sparkpost.com) is a web-based email delivery service that allows web application developers to
send transactional email via a flexible and reliable REST API. You may have heard of other email delivery services such
as [Mandrill](https://mandrillapp.com) and [SendGrid](https://sendgrid.com).

Unfortunately these services are either not free or were once free but are no longer. Mandrill, in particular, used to 
be the go-to choice for sending transactional email from web application because it was free and easy-to-use, however 
they recently decided to start charging for the service. Luckily, sending emails via SparkPost is free if you send less
than 100,000 emails per month (which most fledgling webapps do).

Syntax Era developed this plugin because we used to use Mandrill, we *still* use CakePHP in most of our apps, and 
because we noticed that there weren't any CakePHP plugins for SparkPost already. We hope that this plugin proves to be
useful to the CakePHP community at large but especially those migrating from Mandrill who still aren't ready/able to
pay for the tiny amount of transactional emails they send.

### Transactional email...?
Transactional email is email that is sent to notify users of something, or sometimes to prompt users to complete an
action. For example, password reset emails and account verification emails are transactional. For more information, see 
[What is transactional email?](https://blog.mailchimp.com/what-is-transactional-email).

## What is CakePHP?
If you don't know what CakePHP is, you might be in the wrong place. CakePHP is a rapid-development PHP web application
framework that uses the MVC (Models/Views/Controllers) architecture. It was first released in August 2005 and is now on
version 3.0 and is more powerful than ever! One of CakePHP's great features is that it supports extending its own 
functionality via the use of plugins, of which this is one. For more information about CakePHP, visit their website at
http://cakephp.org.

# Installation
## Command-Line Installation
Using Composer is the recommended way of installing this plugin because it allows you to easily download the plugin and 
its dependencies and keep them up-to-date and make use of Composer's awesome class auto-loader. Here's how to install 
the plugin using Composer:

1. Open a terminal and `cd` to your CakePHP application's root directory.
2. Run `composer require syntaxera/cakephp-sparkpost` and wait for Composer to download the plugin and its dependencies.
3. If you'd like, open `composer.json` for editing and modify the versioning schema for the plugin to your liking.

# Contributing
## Bug Reports
If you find a bug in the plugin, or know of a missing feature you'd like to see added, feel free to let us know on the 
[Issues page](https://github.com/syntaxera/cakephp-sparkpost/issues). **When reporting a bug, be as descriptive as 
possible. Include what you were doing when the bug occurred, what might have caused it to occur, and how to reproduce it
if possible. Screenshots are nice, too.**

As a matter of courtesy, please use the search tool to verify that an issue has not already been reported before 
creating a new issue. Feel free to add your comments/+1's to an open bug/feature request, but duplicate issues take time 
to prune and crowd out new, important issues.

## Pull Requests
Feeling creative? Found a bug you think you can fix? By all means go ahead! Clone the affected branch, fix the bug, then 
create a pull request and we'll review and accept it as quickly as we can. However, before submitting a pull request, 
please be sure that your code follows our [Code Style Guidelines](http://syntaxera.io/pages/codestyle). PRs that don't 
follow the guidelines will be rejected! (politely, of course)

### A Word on Forks...
At Syntax Era we believe that certain software should be free, and this plugin is definitely in that category. That's 
why we've made this repository public, and why we allow contributions from the community. If you want to take this 
project in a different direction, then we say more power to you. Just fork the repo and develop away! **But because we
have no control over the source code in a fork, we cannot provide support for that software.** Use it at your own risk.

# Legal
## License
Licensed under the MIT License (MIT). See `LICENSE.md` for details.

## Copyright
Copyright (c) 2016 Syntax Era Development Studio

## Contributors
