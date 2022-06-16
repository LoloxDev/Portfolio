var verifList = ["verdictReservia",
"verdictMontigny",
"verdictEno&Lo",
"verdictJadoo",
"verdictSpringfield"];

var checkList = ["ReserviaSelector",
"MontignySelector",
"Eno&LoSelector",
"JadooSelector",
"SpringfieldSelector"];

var projList = ["Reservia",
"Montigny",
"Eno&Lo",
"Jadoo",
"Springfield"];



function Check(value) {

for(let i=0; i<verifList.length ; i++) {


    if (value.id == checkList[i]) {

    document.getElementById(verifList[i]).innerHTML = value.checked;

    }

    if ((value.id == checkList[i]) && document.getElementById(verifList[i]).innerHTML === "true") {
        console.log("yep");
        document.getElementById(projList[i]).style.display = "block";
    } else if ((value.id == checkList[i]) && document.getElementById(verifList[i]).innerHTML === "false") {
        console.log("nop");
        document.getElementById(projList[i]).style.display = "none";
    }
};
}


