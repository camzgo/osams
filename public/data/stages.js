var jsonStages = {
    "Stages": [
        {
            "id": 1,
            "regName": "Roman Catholic"
        },
        {
            "id": 2,
            "regName": "Islam"
        },
        {
            "id": 3,
            "regName": "Evangelicals (PCEC)"
        },
        {
            "id": 4,
            "regName": "Iglesia Ni Cristo"
        }

    ]
};


$(document).ready(function () {
    var listItems = '<option selected disabled value="">--Select--</option>';
    for (var i = 0; i < jsonReligion.Religion.length; i++) {
        listItems += "<option value='" + jsonReligion.Religion[i].regName + "'>" + jsonReligion.Religion[i].regName + "</option>";
    }

    $("#religion").html(listItems);
});