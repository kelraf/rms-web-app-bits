document.body.onload = function() {
    checks = document.getElementsByClassName("update");
    if(checks) {
        for(const element of checks) {
            if(element.value == gender) {
                element.checked = true;
            }
        }
    }
}