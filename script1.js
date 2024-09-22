function validateForm() {
    let title = document.forms[0]["title"].value;
    if (title == "") {
        alert("Title must be filled out");
        return false;
    }
}
