# Call By Value & Call By Reference

Yazdığımız programlama dillerinde hepimiz fonksiyonlar/metodlar tanımlıyoruz. Bunlara parametre geçiyoruz bazen dönüş değeri olarak , bazen ise verdiğimiz parametreler üzerinde değişiklik yapıp sonucunu alıyoruz.

Programlama dillerinde, fonksiyonlar iki şekilde çağrılabilir: Call by Value ve Call by Reference.

Genelde fonksiyon method tanımlamalarımız extra bildirmediğimiz sürece “reference by value” yaklamşımı kullanılır. Bizde ilk önce bunu bir örnek ile göreceğiz.

## Call by value
Normal şartlarda bu nasıl gerçekleşiyor basit bir örnek yapalım. İlk örneğimizde 2 değişkeni birbiriyle değiştiren klasik bir swap fonksiyonu yazcağız. Örneğimizi inceleyelim.
```C
#include <stdio.h>


void swap(int a,int b) {
    int temp;
    temp = a;
    a = b;
    b = temp;
}

int main() {

    int a = 50 , b = 20;
    printf("a: %d \t b: %d \n",a,b);

    /* calling a function to swap the values */
    swap(a, b);

    printf("a: %d \t b: %d \n",a,b);

    return 0;
}
```

Yukarıdaki kodu incelersek standart bir swap fonksiyonumuz var. Ancak bunu çağırsak bile çıktı değişmiyor. a ve b değişkenlerimiz değerlerini koruyorlar.

```
a: 50 b: 20
a: 50 b: 20
``` 
Reference by value’da bir değişkenin değerini bu fonksiyonun parametresine kopyalar. Bu nedenle, ana işlevin parametresinde yapılan değişiklikler bağımsız değişkeni etkilemez. Sadece fonkssiyonun içerisinde geçerlidir. Aynı değerden memory’de 2 tane vardır. Parametre olarak geçilenler direk değerleri kopyalanmıştır.

Yaptığınız değişiklikler kopyalanan değerler üzerinde yapılır. Foksiyon dışındakiler etkilenmez. Fonksiyon çalıştıktan sonra kopya silinir ve memory’de sizin geçtikleriniz aynen duruyordur. Bu yüzden çıktılarımız aynı.

## Call by Reference
Call by reference'ta ise fonksiyona parametre olarak referencelarını geçiyoruz. Yani memory’de nerde olduklarını. Fonksiyonun içerisinde ise bu değerler ile memory’deki yerini bildiğimiz değişkendeki değerlerle yine istediğimiz işlemi yapabiliyoruz. Diğer yaklaşımdan farklı değerler kopyalanmadığı için yaptığımız her değişiklik değeri değiştiriyor.

Az önce yaptığımız swap fonksiyonunu şimdide call by reference ile yazalım.
```C
#include <stdio.h>

void swap(int *a,int *b) {
    int temp;
    temp = *a;
    *a = *b;
    *b = temp;
}

int main() {

    int a = 50 , b = 20;
    printf("a: %d \t b: %d \n",a,b);

    /* calling a function to swap the values */
    swap(&a, &b);

    printf("a: %d \t b: %d \n",a,b);


    return 0;
}
``` 
Bu seferki durumda ise gördüğünüz gibi main içerisinde swap fonksiyonmuza & işareti ile referansını geçtik. İçeride ise parametre olarak geçilen değerin referansı ile memorydeki adresine ulaştık ve o değerler üzerinde işlem yaptık.

```
a: 50 b: 20
a: 20 b: 50
``` 

## Call by value 
### Avantajları
* Parametre olarak geçilen ana değişkenler değişmez.
* Takibatı ve debug yapması daha kolaydır.Ana değişkendeki değerleri değiştirmediği için fonksiyon içinde daha rahat geçici işlem vs yapılabilir.
### Dezavantajları
* Hafıza açısından verimli değildir.Aynı değişken için oluşturulmuş iki adet kopya vardır..
## Call by reference 
### Avantajları
* Fonksiyon argümanın değerini değiştirebilir.
* Bellek alanından tasarruf etmenize yardımcı olur. Tek bir değeri tutmak için yinelenen veriler oluşturmaz.
* Bu yöntemde işlem yapılan parametrenin bir kopyası yoktur. Bu nedenle çok hızlı işlenir.
### Dezavantajları
* Referans alan bir fonksiyonun parametresinin boş olmadığından emin olması gerekir.
* Çok iş parçacıklı programlarla çalışırken tehlikelidir.
* Takibatı ve debug’ı bi nebze daha zordur.