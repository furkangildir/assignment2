# MapReduce nedir?

MapReduce dağıtık mimari üzerinde çok büyük verilerin kolay bir şekilde analiz edilebilmesini sağlayan bir sistemdir. 2004 yılında Google tarafından duyurulan bu sistem aslen 1960’lı yıllarda geliştirilen fonksiyonel programlamadaki map ve reduce fonksiyonlarından esinlenmiştir. Veriler işlenirken bu iki fonksiyon kullanılır.

Map aşamasında ana (master) düğüm (node) verileri alıp daha ufak parçalara ayırarak işçi (worker) düğümlere dağıtır. İşçi düğümler bu işleri tamamladıkça sonucunu ana düğüme geri gönderir. Reduce aşamasında ise tamamlanan işler işin mantığına göre birleştirilerek sonuç elde edilir. Daha basite indirgersek, Map aşamasında analiz edilen veri içerisinden almak istediğimiz veriler çekilir, Reduce aşamasında ise bu çektiğimiz veri üzerinde istediğimiz analiz gerçekleşir.

Daha iyi anlatabilmek için herkesin aşina olduğu ilişkisel veritabanı sistemleri ile (RDBMS) karşılaştırmamız gerekirse, Map aşaması select cümlesi ile ilgili alanları seçmemize ve where ile ilgili sınırlamaları yapmaya, Reduce aşaması ise count, sum, having gibi ilgili veri üzerinde hesaplama yapmamıza benzetilebilir.

Map aşamasındaki işlemler birbirinden bağımsız olarak gerçekleşebildiği için paralel olarak çalışabilir. Bu sayede büyük miktardaki veri küme (cluster) içerisindeki düğümler tarafından hızlı bir şekilde okunabilir. Yani küme içerisinde ne kadar çok düğüm var ise işlem hızlanır. Reduce aşamasında ise aynı anahtara (key) sahip veriler paralel olarak işlenebilir.

Özetle, çok büyük bir veriyi işleyebilmek için çok yüksek donanıma sahip sunucular kullanmak yerine sıradan sunuculardan (commodity hardware) oluşan bir küme üzerinde MapReduce yardımıyla aynı işlem çok daha etkin bir şekilde gerçekleştirilir. Google’ın diğer arama motorları arasında fark yaratmasını sağlayan temel teknolojilerden birisi işte bu MapReduce teknolojisidir.

Sadece Google değil, sosyal medyanın vazgeçilmez olduğu bu günlerde Facebook, Linkedin, Twitter gibi çok fazla veri toplayan şirketler de bu sistemi kullanmaktadır. Son 2 yılda web üzerinde üretilen verilerin geçen 10 seneden daha fazla olduğu gerçeğini düşünecek olursak ilerleyen zamanlarda bu sistemin çok daha fazla öne çıkacağını şimdiden kestirebiliriz.

Klasik veritabanı sistemleri ile Petabyte mertebesindeki verilerin işlenebilmesi ancak milyon dolar seviyesindeki donanım ve yazılım ile mümkün iken, MapReduce bu soruna çok ciddi bir alternatif durumundadır.

MapReduce sisteminin C, C++, Java, Erlang vs gibi bir çok dilde açık kaynaklı ve ücretli uygulaması bulunmaktadır. Adını en çok duyuran ve özellikle son bir yılda öne çıkan proje ise Apache Hadoop projesidir.
