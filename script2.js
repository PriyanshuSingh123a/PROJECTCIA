function borrowBook(record_id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "borrow_book.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("status").innerHTML = xhr.responseText;
        }
    };
    xhr.send("record_id=" + record_id);
}
