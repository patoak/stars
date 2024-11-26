let countValue = 0;

function count() {
    countValue++;  
    document.getElementById("clickCount").textContent = countValue; 
    document.getElementById("input").value = countValue; 
}

