const woorden = ["The", "quick", "brown", "fox", "jumps", "over", "the", "lazy", "dog"];

function getWoordenMetLetters(words, letters) {
    for (let i = 0; i < words.length; i++) {
        let word = words[i];
        let show = false;
        for (let j = 0; j < letters.length; j++) {
            let letter = letters[j];
            if (word.includes(letter)) {
                console.log(word + " bevat de letter '" + letter + "'");
            }
        }
    }
}

getWoordenMetLetters(woorden, ['o', 'p', 'q']);