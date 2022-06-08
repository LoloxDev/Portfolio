// Run FULLSCREEN
new fullpage("#fullpage", {});

function openForm() {
    document.getElementById("popupForm").style.display = "block";
    document.getElementById("openBtn").style.zIndex = "-1";
    document.getElementById("community").style.zIndex = "-1";
    document.getElementById("bottom").style.display = "none";
}

function closeForm() {
    document.getElementById("popupForm").style.display = "none";
    document.getElementById("openBtn").style.zIndex = "1";
    document.getElementById("community").style.zIndex = "1";
    document.getElementById("bottom").style.display = "block";
}
