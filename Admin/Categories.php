<?php
// Example array of news categories
$newsCategories = array(
    'Politics',
    'Sports',
    'Entertainment',
    'Technology',
    'Health',
    'Science',
);

// Displaying the select dropdown
echo "Select a News Category: ";
echo "<select name='category'>";
foreach ($newsCategories as $category) {
    echo "<option value='$category'>$category</option>";
}
echo "</select>";
?>
