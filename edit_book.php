<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <script>
    // Function to update a book via AJAX without reloading the page
    function updateBook() {
        var book_id = document.getElementById("book_id").value;
        var title = document.getElementById("title").value;
        var author = document.getElementById("author").value;
        var published_year = document.getElementById("published_year").value;
        var genre = document.getElementById("genre").value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_book_action.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Handle the server response
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("response").innerHTML = xhr.responseText;
                // Optionally refresh the book list dynamically
                showBooks();
            }
        };

        // Send the form data to update_book_action.php via AJAX
        xhr.send("book_id=" + book_id + "&title=" + title + "&author=" + author + "&published_year=" + published_year + "&genre=" + genre);
    }

    // Fetch and populate the book data into the form for editing
    function loadBookData(book_id) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_book.php?book_id=" + book_id, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var book = JSON.parse(xhr.responseText);
                document.getElementById("book_id").value = book.book_id;
                document.getElementById("title").value = book.title;
                document.getElementById("author").value = book.author;
                document.getElementById("published_year").value = book.published_year;
                document.getElementById("genre").value = book.genre;
            }
        };

        xhr.send();
    }
    </script>
</head>
<body>

<h2>Edit Book</h2>

<form id="editBookForm" onsubmit="event.preventDefault(); updateBook();">
    <input type="hidden" id="book_id" name="book_id">
    Title: <input type="text" id="title" name="title"><br>
    Author: <input type="text" id="author" name="author"><br>
    Published Year: <input type="text" id="published_year" name="published_year"><br>
    Genre: <input type="text" id="genre" name="genre"><br><br>
    <button type="submit">Update Book</button>
</form>

<div id="response"></div>

<script>
// Load book data based on book ID (e.g., from the URL or list)
loadBookData(1); // Example: Load book with ID 1 for editing
</script>

</body>
</html>
