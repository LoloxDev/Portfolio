// Run FULLSCREEN

new fullpage("#fullpage", {
    ancres: ["firstPage", "secondPage", "thirdPage"],
});

function openForm() {
    document.getElementById("popupForm").style.display = "block";
    document.getElementById("openBtn").style.zIndex = "-1";
    document.getElementById("community").style.zIndex = "-1";
}

function closeForm() {
    document.getElementById("popupForm").style.display = "none";
    document.getElementById("openBtn").style.zIndex = "1";
    document.getElementById("community").style.zIndex = "1";
}
