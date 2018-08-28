var jsonData = {
    "Records": [
{
        "id": 1,
        "munCode": "01",
        "munName": "Apalit"
},
{
    "id": 2,
    "munCode": "02",
        "munName": "Arayat"
},
{
    "id": 3,
        "munCode": "03",
            "munName": "Bacolor"
},
{
    "id": 4,
        "munCode": "04",
            "munName": "Candaba"
},
{
    "id": 5,
        "munCode": "05",
            "munName": "Floridablanca"
},
{
    "id": 6,
        "munCode": "06",
            "munName": "Guagua"
},
{
    "id": 7,
        "munCode": "07",
            "munName": "Lubao"
},
{
    "id": 8,
        "munCode": "08",
            "munName": "Macabebe"
},
{
    "id": 9,
        "munCode": "09",
            "munName": "Magalang"
},
{
    "id": 10,
        "munCode": "010",
            "munName": "Masantol"
},
{
    "id": 11,
        "munCode": "011",
            "munName": "Mexico"
},
{
    "id": 12,
        "munCode": "012",
            "munName": "Minalin"
},
{
    "id": 13,
        "munCode": "013",
            "munName": "Porac"
},
{
    "id": 14,
        "munCode": "014",
            "munName": "San Luis"
},
{
    "id": 15,
        "munCode": "015",
            "munName": "San Simon"
},
{
    "id": 16,
        "munCode": "016",
            "munName": "Sta. Ana"
},
{
    "id": 17,
        "munCode": "017",
            "munName": "Sta. Rita"
},
{
    "id": 18,
        "munCode": "018",
            "munName": "Santo Tomas"
},
{
    "id": 19,
        "munCode": "019",
            "munName": "Sasmuan"
},
{
    "id": 20,
        "munCode": "020",
            "munName": "Mabalacat City"
},
{
    "id": 21,
        "munCode": "021",
            "munName": "San Fernando City"
},
{
    "id": 22,
        "munCode": "022",
            "munName": "Angeles City"
}
]
};

$(document).ready(function () {
    var listItems = '<option selected disabled value="0">--Select--</option>';
    
    for (var i = 0; i < jsonData.Records.length; i++) {
        listItems += "<option value='" + jsonData.Records[i].munName + "'>" + jsonData.Records[i].munName + "</option>";
    }

    $("#municipality").html(listItems);
});