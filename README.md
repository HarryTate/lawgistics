# Lawgistics Plugin

## Plugin Information
**Plugin Name**: Lawgistics  
**Version**: 1.0  
**Author**: Harry Tate

## Description
The Lawgistics plugin registers a custom post type for "Pies" and provides a shortcode to display a list of pies with their type, description, and ingredients. It includes custom fields using Advanced Custom Fields (ACF).

## Requirements
**Advanced Custom Fields Plugin**
https://www.advancedcustomfields.com/

## Installation and Activation

### Step 1: Compress the Plugin Folder
- Ensure you have the following folder structure on your local machine:
lawgistics/
├── assets/
│ └── css/
│ └── style.css
├── lawgistics.php
└── shortcode-pies.php
- Compress the `lawgistics` folder into a ZIP file named `lawgistics.zip`.

### Step 2: Upload and Install the Plugin
1. **Log in to your WordPress admin dashboard**.
2. **Navigate to Plugins > Add New**.
3. **Click on the "Upload Plugin" button** at the top of the page.
4. **Click on "Choose File"**, select the `lawgistics.zip` file from your local machine, and click "Install Now".
5. **Once the plugin is uploaded, click "Activate Plugin"**.

### Step 3: Verify the Plugin Activation
1. **Check if the Custom Post Type is Registered**:
 - Go to the WordPress admin dashboard and look for a new menu item called "Pies".
 - If it appears, it means your custom post type has been registered successfully.

2. **Add a New Pie**:
 - Click on "Pies" and then "Add New".
 - You should see custom fields for "Pie Type", "Description", and "Ingredients".

3. **Check the Styles**:
 - Visit the frontend of your WordPress site and ensure that any styles defined in your `assets/css/style.css` file are being applied.

4. **Use the Shortcode**:
 - Create or edit a page or post, and add the `[pies]` shortcode to display the list of pies.
 - If you have any pies added, they should be listed with their type, description, and ingredients.

### Step 4: Additional Steps (Optional)
- **Ensure ACF Plugin is Active**:
- The custom fields rely on the Advanced Custom Fields (ACF) plugin. Ensure that the ACF plugin is installed and active on your site.
- You can install ACF from Plugins > Add New and searching for "Advanced Custom Fields".

## Usage
- **Shortcode**: `[pies]`
- Use this shortcode in any post or page to display a list of pies with pagination.

## Using the Lookup in the Shortcode
The `lookup` attribute in the shortcode allows you to filter pies by their type.

### Example Usage:
- To display all pies:

[pies]

- To display pies of a specific type, for example, "Apple Pie":

[pies lookup="Apple Pie"]

#### Explanation:
- **Without Lookup**: `[pies]`
- This will display all pies.

- **With Lookup**: `[pies lookup="value"]`
- Replace `"value"` with the type of pie you want to filter by. The shortcode will then display only pies that match the specified type.

### Pagination
The plugin includes a pagination feature to handle large lists of pies. By default, it displays 5 pies per page.

### Example:
- When you use the `[pies]` shortcode, the plugin will automatically paginate the results if there are more than 5 pies.
- You can navigate through the pages using the pagination links generated below the list of pies.

## License
This plugin is licensed under the GPLv2 or later.

## Changelog
**Version 1.0**
- Initial release.


