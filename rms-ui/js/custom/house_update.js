document.body.onload = function() {
    let house_type = document.getElementById("house_type");
    let children = house_type.children;
    for (const child of children) {
        if (child.value == houseType) {
            child.selected = true;
        }
    }

    if (status == "occupied") {
        document.getElementById("occupied").checked = true;
    } else if (status == "notOccupie") {
        document.getElementById("notoccupied").checked = true;
    }
}