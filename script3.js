// Function to delete a book
function deleteBook(book_id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_book_action.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("response").innerHTML = xhr.responseText;
            // Optionally refresh the book list dynamically
            showBooks();
        }
    };

    xhr.send("book_id=" + book_id);
}
