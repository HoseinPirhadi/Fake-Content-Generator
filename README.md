# Fake Content Generator

<p style="text-align: center"><img src="https://github.com/FakerPHP/Artwork/raw/main/src/socialcard.png" alt="Social card of FakerPHP"></p>

## Description
**Fake Content Generator** is a powerful WordPress plugin that allows you to easily create fake and random content for testing and developing your websites. This plugin is especially useful for developers and web designers who need real-like data for testing and evaluation.

With this plugin, you can effortlessly generate data such as names, emails, text, and other necessary information, thereby streamlining your website development and testing process.

## Features
- Generates random data including names, emails, text, etc.
- Compatible with WordPress and easy to use in various projects
- Requires PHP >= 7.4

## Installation
To install this plugin, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/HoseinPirhadi/Fake-Content-Generator.git
   ```

2. Navigate to the project directory:
   ```bash
   cd Fake-Content-Generator
   ```

3. Install dependencies:
   ```bash
   composer install
   ```

4. Activate the plugin in the WordPress admin panel.

## Usage
To use this plugin, you can utilize the classes and methods available in the project. For example, to generate random data using the Faker library, you can use the following code:

```php
<?php
require_once 'vendor/autoload.php';

// Use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

// Generate data by calling methods
echo $faker->name(); // 'Vince Sporer'
echo $faker->email(); // 'walter.sophia@hotmail.com'
echo $faker->text(); // 'Numquam ut mollitia at consequuntur inventore dolorem.'
```

Each time you call the `$faker->name()` method, you will receive a different random result.

## Documentation
Full documentation for this project can be found at [fakerphp.github.io](https://fakerphp.github.io).

## Contribution
If you would like to contribute to this project, please submit a pull request. We welcome any contributions and feedback.

## License
This project is released under the MIT License. For more details, please refer to the [`LICENSE`](LICENSE) file.

## Support
For any questions or issues, please contact us or raise your queries in the Issues section on GitHub.