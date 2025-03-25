// arrow function untuk mencetak deret fibonacci
const fibonacci = (n) => {
    let a = 0, b = 1, hasil;
    console.log("Deret Fibonacci:");
    for (let i = 0; i < n; i++) {
        console.log(a);
        hasil = a + b;
        a = b;
        b = hasil;
    }
};

// mencetak 10 angka pertama dalam deret Fibonacci
fibonacci(10);
