// function untuk operator
const tambah = (...angka) => {
  let hasil = 0;
  for (let num of angka) {
    hasil += num;
  }
  return hasil;
};
  
const kurang = (...angka) => {
  let hasil = angka[0];
  for (let i = 1; i < angka.length; i++) {
    hasil -= angka[i];
  }
  return hasil;
};
  
const kali = (...angka) => {
  let hasil = 1;
  for (let num of angka) {
    hasil *= num;
  }
  return hasil;
};
  
const bagi = (...angka) => {
  let hasil = angka[0];
  for (let i = 1; i < angka.length; i++) {
    hasil /= angka[i];
  }
  return hasil;
};
  
const modulus = (...angka) => {
  let hasil = angka[0];
  for (let i = 1; i < angka.length; i++) {
    hasil %= angka[i];
  }
  return hasil;
};

// function utama untuk kalkulator
const kalkulator = (operator, ...angka) => {
  switch (operator) {
    case '+':
      return tambah(...angka);
    case '-':
      return kurang(...angka);
    case '*':
      return kali(...angka);
    case '/': 
      return bagi(...angka);
    case '%':
      return modulus(...angka);
    default:
    return "Operator tidak valid!";
  }
};

// melakukan percobaan
console.log(kalkulator("+", 23, 40, 25)); // operator penambahan
console.log(kalkulator("-", 100, 40, 25)); // operator penambahan
console.log(kalkulator("*", 5, 3, 6)); // operator penambahan
console.log(kalkulator("/", 80, 5, 2)); // operator penambahan
console.log(kalkulator("%", 20, 3)); // operator penambahan