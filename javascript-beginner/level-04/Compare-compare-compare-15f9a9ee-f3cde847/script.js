let nederlandInwoners = parseInt(process.argv[2]);
let duitslandInwoners = parseInt(process.argv[3]);
let frankrijkInwoners = parseInt(process.argv[4]);

console.log("Nederland heeft minder inwoners dan Duitsland én Frankrijk: " + (nederlandInwoners < duitslandInwoners
    && nederlandInwoners < frankrijkInwoners).toString());

console.log("Nederland óf Frankrijk heeft meer inwoners dan Duitsland: " + (nederlandInwoners > duitslandInwoners
    || frankrijkInwoners > duitslandInwoners).toString());

console.log("Nederland heeft niet meer inwoners dan Duitsland: " + (nederlandInwoners <=
    duitslandInwoners).toString());
