<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <script>
    // Function to validate the form before submitting
    function validateForm() {
        var title = document.getElementById("title").value;
        var author = document.getElementById("author").value;
        var published_year = document.getElementById("published_year").value;

        if (title == "" || author == "" || published_year == "") {
            alert("All fields must be filled out.");
            return false; // Prevent form submission if validation fails
        }
        return true;
    }

    // Function to add a book via AJAX without reloading the page
    function addBook() {
        if (!validateForm()) {
            return; // Do not proceed if the form is not valid
        }

        var title = document.getElementById("title").value;
        var author = document.getElementById("author").value;
        var published_year = document.getElementById("published_year").value;
        var genre = document.getElementById("genre").value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "add_book_action.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Handle the server response
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("response").innerHTML = xhr.responseText;
                // Clear the form fields
                document.getElementById("addBookForm").reset();
                // Optionally update the book list dynamically
                showBooks();
            }
        };

        // Send the form data to add_book_action.php via AJAX
        xhr.send("title=" + title + "&author=" + author + "&published_year=" + published_year + "&genre=" + genre);
    }

    // Function to dynamically fetch and show the book list
    function showBooks() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "show_books.php", true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("booksList").innerHTML = xhr.responseText;
            }
        };

        xhr.send();
    }
    </script>
</head>
<body>

<h2>Add a New Book</h2>

<form id="addBookForm" onsubmit="event.preventDefault(); addBook();">
    Title: <input type="text" id="title" name="title"><br>
    Author: <input type="text" id="author" name="author"><br>
    Published Year: <input type="text" id="published_year" name="published_year"><br>
    Genre: <input type="text" id="genre" name="genre"><br><br>
    <button type="submit">Add Book</button>
</form>

<div id="response"></div>

<h3>Books List:</h3>
<div id="booksList"></div>

<script>
// Show books when the page loads
window.onload = showBooks;
</script>

</body>
</html>
