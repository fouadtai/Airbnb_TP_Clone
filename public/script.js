// convert today date to input format
//new Date() : Crée un nouvel objet Date qui représente l'instant actuel.
//.toISOString() : Convertit l'objet Date en une chaîne de caractères au format ISO (YYYY-MM-DDTHH:mm.sssZ).
//.split("T")[0] : Divise la chaîne de caractères à chaque occurrence de "T" et retourne la première partie, qui représente la date au format "YYYY-MM-DD".

//total.textContent : Accède au contenu textuel de l'élément HTML avec l'id total.
//nightPrice.textContent : Accède au contenu textuel de l'élément HTML avec l'id nightPrice et le copie dans total.
total.textContent =  nightPrice.textContent;
 
console.log(total.value);
const today = new Date().toISOString().split("T")[0];
 
start_date.value = today;
start_date.min = today;
 
 
let tomorrow = new Date();
tomorrow.setDate(tomorrow.getDate() + 1);
 
// convert to input format
let tomorrowFormat = tomorrow.toISOString().split("T")[0];
end_date.value = tomorrowFormat;
end_date.min = tomorrowFormat;
 
start_date.addEventListener("change", (e) => {
  let day = new Date(e.target.value);
 
  if (end_date.value < start_date.value) {
    day.setDate(day.getDate() + 1);
    end_date.value = day.toISOString().split("T")[0];
  }
});
 
end_date.addEventListener("change", (e) => {
  let day = new Date(e.target.value);
 
  if (end_date.value < start_date.value) {
    day.setDate(day.getDate() - 1);
    start_date.value = day.toISOString().split("T")[0];
  }
});
 
 
let bookingCalc = () => {
  let diffTime = Math.abs(
    new Date(end_date.value) - new Date(start_date.value)
  );
  let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
  
 
  total.textContent = diffDays * nightPrice.textContent;
};

 
start_date.addEventListener("change", bookingCalc);
end_date.addEventListener("change", bookingCalc);
 
 
 
function copierSpanDansHidden() {
  let spanValue = document.getElementById('total').innerText;
  document.getElementById('hidden_input').value = spanValue;
}



function getRandomInt() {
  return Math.floor(Math.random() * 5);
}

console.log(getRandomInt());

// Exemple d'utilisation : appeler la fonction et afficher le résultat
let randomNumber = getRandomInt()
document.getElementById('randomNumber').value = randomNumber;



