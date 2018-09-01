var jsonReligion = {
    "Religion": [
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
        },
        {
            "id": 5,
            "regName": "Non-Roman Catholic and Protestant (NCCP)"
        },
        {
            "id": 6,
            "regName": "Igreja Católica Apostólica Brasileira nas Filipinas"
        },
        {
            "id": 7,
            "regName": "Aglipayan"
        },
        {
            "id": 8,
            "regName": "Seventh-day Adventist"
        },
        {
            "id": 9,
            "regName": "Bible Baptist Church"
        },
        {
            "id": 10,
            "regName": "United Church of Christ in the Philippines"
        },
        {
            "id": 11,
            "regName": "Jehovah's Witnesses"
        },
        {
            "id": 12,
            "regName": "Church of Christ"
        },
        {
            "id": 13,
            "regName": "Jesus Is Lord Church Worldwide"
        },
        {
            "id": 14,
            "regName": "Tribal Religions"
        },
        {
            "id": 15,
            "regName": "United Pentecostal Church (Philippines) Inc."
        },
        {
            "id": 16,
            "regName": "Philippine Independent Catholic Church"
        },
        {
            "id": 17,
            "regName": "Unión Espiritista Cristiana de Filipinas, Inc."
        },
        {
            "id": 18,
            "regName": "The Church of Jesus Christ of Latter-day Saints"
        },
        {
            "id": 19,
            "regName": "Association of Fundamental Baptist Churches in the Philippines"
        },
        {
            "id": 20,
            "regName": "Evangelical Christian Outreach Foundation"
        },
        {
            "id": 21,
            "regName": "Convention of the Philippine Baptist Church"
        },
        {
            "id": 22,
            "regName": "Crusaders of the Divine Church of Christ Inc."
        },
        {
            "id": 23,
            "regName": "Buddhist"
        },
        {
            "id": 24,
            "regName": "Lutheran Church in the Philippines"
        },
        {
            "id": 25,
            "regName": "Iglesia sa Dios Espiritu Santo Inc."
        },
        {
            "id": 26,
            "regName": "Philippine Benevolent Missionaries Association"
        },
        {
            "id": 27,
            "regName": "Faith Tabernacle Church (Living Rock Ministries)"
        },
        {
            "id": 28,
            "regName": "Others"
        },
        {
            "id": 29,
            "regName": "None"
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