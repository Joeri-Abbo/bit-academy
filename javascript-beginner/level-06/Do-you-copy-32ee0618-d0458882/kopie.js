function pushToArray(arr) {
    arr.push(4);
}

function assignNewArray(arr) {
    arr = ["nieuw", "array"];
}

let items = [1, 2, 3];

console.log("Voor de push:", items);
pushToArray(items);
console.log("Na de push:", items);

console.log("Voor de toewijzing:", items);
assignNewArray(items);
console.log("Na de toewijzing:", items);
