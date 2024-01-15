let city = process.argv[2];


if (city.toString().toLocaleLowerCase() === "amsterdam") {
    console.log(city + " is de hoofdstad");
} else {
    console.log(city + " is niet de hoofdstad");
}
