aanmelden("fout");

aanmelden("geheim");

function aanmelden(wachtwoord) {
    let bericht = "Er is niemand thuis";

    if (wachtwoord == "geheim") {
        bericht = "Welkom!";
    } else {
        bericht = "FOUT WACHTWOORD!";
    }
    console.log(bericht);
}
