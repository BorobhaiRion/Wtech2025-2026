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
    
    let charCount = text.length;
    let wordCount = text.trim().split(/\s+/).length;
    let reversedText = text.split("").reverse().join("");
     resultDiv.innerHTML = `
        <p><strong>Characters:</strong> ${charCount}</p>
        <p><strong>Words:</strong> ${wordCount}</p>
        <p><strong>Reversed Text:</strong><br>${reversedText}</p>
    `;

    resultDiv.style.display = "block";
}