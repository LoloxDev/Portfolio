// Run FULLSCREEN
new fullpage("#fullpage", {
    autoScrolling: true,
    navigation: true,
    anchors: ['section1', 'section2', 'section3', 'section4', 'section5'],
    fixedElements:'.nav, #loader',
    navigationTooltips: ['Acceuil','Projets','Parcours','Compétences','Présentation'],
    showActiveTooltip: true,
    navigationPosition:true,
});

function openForm() {
    document.getElementById("popupForm").style.display = "block";
    document.getElementById("openBtn").style.zIndex = "-1";
    document.getElementById("community").style.zIndex = "-1";
    document.getElementById("bottom").style.display = "none";
    document.getElementById("nav").style.top ="-5px";
}

function closeForm() {
    document.getElementById("popupForm").style.display = "none";
    document.getElementById("openBtn").style.zIndex = "1";
    document.getElementById("community").style.zIndex = "1";
    document.getElementById("bottom").style.display = "block";
    document.getElementById("nav").style.top = "20px";
}

function openForm2() {
    document.getElementById("connect").style.display = "block";
}

function closeForm2() {
    document.getElementById("connect").style.display = "none";
}
