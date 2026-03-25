document.getElementById("analyzeBtn").addEventListener("click", analyzeText);

function analyzeText() {
    let text = document.getElementById("textInput").value;
    let errorMsg = document.getElementById("errorMsg");
    let resultDiv = document.getElementById("result");

   
    errorMsg.textContent = "";
    resultDiv.style.display = "none";

   
    if (text.trim() === "") {
        errorMsg.textContent = "Please enter some text!";
        return;
    }